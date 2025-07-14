<?php
declare(strict_types=1);

namespace Lsr\Basic;

use Lsr\Interfaces\ResponseFactoryInterface;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

final class NyholmResponseFactory implements ResponseFactoryInterface
{

	/**
	 * @inheritdoc
	 * @throws \JsonException
	 */
	public function createJsonResponse(
		mixed   $data,
		int     $code = 200,
		array   $headers = [],
		string  $version = '1.1',
		?string $reason = null
	): ResponseInterface {
		return $this->createResponse(
			$code,
			$headers,
			$this->createStream(json_encode($data, JSON_THROW_ON_ERROR)),
			$version,
			$reason
		)->withHeader('Content-Type', 'application/json');
	}

	public function createResponse(
		int                         $code = 200,
		array                       $headers = [],
		null|StreamInterface|string $body = null,
		string                      $version = '1.1',
		?string                     $reason = null
	): ResponseInterface {
		return new Response(
			$code,
			$headers,
			$body,
			$version,
			$reason
		);
	}

	public function createStream(string $content): StreamInterface {
		return new Psr17Factory()->createStream($content);
	}

	public function createResourceStream($resource): StreamInterface {
		return new Psr17Factory()->createStreamFromResource($resource);
	}

}