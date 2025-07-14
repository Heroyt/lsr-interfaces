<?php
declare(strict_types=1);

namespace Lsr\Basic;

use JsonException;
use Lsr\Exceptions\DispatchBreakException;
use Lsr\Interfaces\RequestFactoryInterface;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Message\ServerRequestInterface;

final readonly class NyholmRequestFactory implements RequestFactoryInterface
{

	private ServerRequestCreator $requestCreator;

	public function __construct() {
		$psr17Factory = new Psr17Factory();
		$this->requestCreator = new ServerRequestCreator(
			$psr17Factory, // ServerRequestFactory
			$psr17Factory, // UriFactory
			$psr17Factory, // UploadedFileFactory
			$psr17Factory // StreamFactory
		);
	}

	/**
	 * @inheritDoc
	 */
	public function getHttpRequest(): ServerRequestInterface {
		return $this->fromPsrRequest($this->requestCreator->fromGlobals());
	}

	/**
	 * @inheritDoc
	 */
	public function fromPsrRequest(ServerRequestInterface $request): ServerRequestInterface {
		// Maybe parse JSON body
		foreach ($request->getHeader('content-type') as $headerValue) {
			if (strtolower(trim(explode(';', $headerValue, 2)[0])) === 'application/json') {
				$body = $request->getBody();
				$body->rewind();
				try {
					$data = json_decode($body->getContents(), true, 512, JSON_THROW_ON_ERROR);
				} catch (JsonException $e) {
					throw DispatchBreakException::createBadRequest(
						'Invalid JSON body: ' . $e->getMessage(),
					);
				}
				assert(is_array($data));
				$request = $request->withParsedBody($data);
				$body->rewind();
				break;
			}
		}

		return $request;
	}
}