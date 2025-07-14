<?php
declare(strict_types=1);

namespace Lsr\Interfaces;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

interface ResponseFactoryInterface
{

	/**
	 * Create a PSR-7 Response object.
	 *
	 * @param array<string, string|string[]> $headers
	 */
	public function createResponse(
		int                         $code = 200,
		array                       $headers = [],
		null|StreamInterface|string $body = null,
		string                      $version = '1.1',
		?string                     $reason = null
	): ResponseInterface;

	/**
	 * Create a PSR-7 Response object with a JSON body.
	 *
	 * Handles serialization and automatically sets the Content-Type header to application/json.
	 *
	 * @param array<string, string|string[]> $headers
	 */
	public function createJsonResponse(
		mixed   $data,
		int     $code = 200,
		array   $headers = [],
		string  $version = '1.1',
		?string $reason = null
	): ResponseInterface;

	/**
	 * Converts a string into a PSR-7 StreamInterface.
	 */
	public function createStream(string $content): StreamInterface;

	/**
	 * Converts a resource into a PSR-7 StreamInterface.
	 *
	 * @param resource $resource
	 */
	public function createResourceStream($resource): StreamInterface;

}