<?php
declare(strict_types=1);

namespace Lsr\Exceptions;

use Psr\Http\Message\UriInterface;

trait RedirectException
{

	/**
	 * Create a new DispatchBreakException with a redirect response
	 *
	 * @param int<300,308> $code
	 */
	public static function creteRedirect(
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

}