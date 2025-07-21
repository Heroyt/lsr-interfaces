<?php
declare(strict_types=1);

namespace Lsr\Exceptions;

use Lsr\Basic\NyholmResponseFactory;
use Lsr\Interfaces\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class DispatchBreakException extends \RuntimeException
{

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

	/**
	 * Create a new DispatchBreakException with a redirect response
	 *
	 * @param int<300,308> $code
	 */
	public static function createRedirect(
		string|UriInterface $url = '/',
		int                 $code = 302,
	): self {
		return self::create(
			null,
			$code,
			[
				'Location' => (string)$url,
			]
		);
	}

	/**
	 * @param string|array<string,mixed>|object|null $message
	 */
	public static function createBadRequest(
		string|array|object|null $message = 'Bad request',
		int                      $code = 400,
		array                    $headers = [],
	): self {
		return self::create(
			$message,
			$code,
			$headers,
		);
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