<?php
declare(strict_types=1);

namespace Lsr\Exceptions;

trait BadRequestException
{

	/**
	 * @param string|array<string,mixed>|object|null $message
	 */
	public static function createBadRequest(
		string|array|object|null $message = 'Bad request',
		int               $code = 400,
		array             $headers = [],
	): self {
		return self::create(
			$message,
			$code,
			$headers,
		);
	}

}