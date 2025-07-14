<?php
declare(strict_types=1);

namespace Lsr\Exceptions;

use Lsr\Basic\NyholmResponseFactory;
use Lsr\Interfaces\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;

class DispatchBreakException extends \RuntimeException
{

	use RedirectException;
	use BadRequestException;

	protected static ResponseFactoryInterface $responseFactory;

	public function __construct(
		public readonly ResponseInterface $response,
	) {
		parent::__construct('', $this->response->getStatusCode());
	}

	/**
	 * @param object|array<string|int,mixed>|string|resource $data
	 * @param int                                            $code
	 * @param array<string,string>                           $headers
	 *
	 * @return static
	 */
	public static function create(
		mixed $data,
		int   $code = 200,
		array $headers = []
	): static {
		if (is_string($data)) {
			$response = self::getResponseFactory()
			                ->createResponse(
				                $code,
				                $headers,
				                self::getResponseFactory()->createStream($data)
			                );
		}
		else if (is_resource($data)) {
			$response = self::getResponseFactory()
			                ->createResponse(
				                $code,
				                $headers,
				                self::getResponseFactory()->createResourceStream($data)
			                );
		}
		else {
			$response = self::getResponseFactory()
			                ->createJsonResponse(
				                $data,
				                $code,
				                $headers,
			                );
		}

		return new static($response);
	}

	public static function getResponseFactory(): ResponseFactoryInterface {
		if (!isset(self::$responseFactory)) {
			self::$responseFactory = new NyholmResponseFactory();
		}
		return self::$responseFactory;
	}

	public static function setResponseFactory(ResponseFactoryInterface $responseFactory): void {
		self::$responseFactory = $responseFactory;
	}

	public function getResponse(): ResponseInterface {
		return $this->response;
	}

}