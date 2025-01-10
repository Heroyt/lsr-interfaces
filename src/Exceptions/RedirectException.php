<?php
declare(strict_types=1);

namespace Lsr\Exceptions;

/**
 * @phpstan-type RedirectCode int<300,308>
 *
 * @method RedirectCode getCode()
 */
class RedirectException extends \RuntimeException
{

	/**
	 * @param non-empty-string|array<int|string, string> $url
	 * @param RedirectCode                               $code
	 */
	public function __construct(
		public readonly string|array $url,
		int                          $code = 302
	) {
		parent::__construct('Redirect to: ' . json_encode($url), $code);
	}

}