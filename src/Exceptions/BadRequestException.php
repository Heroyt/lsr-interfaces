<?php
declare(strict_types=1);

namespace Lsr\Exceptions;

trait BadRequestException
{

	public static function createBadRequest(
		string|array|null $message = 'Bad request',
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