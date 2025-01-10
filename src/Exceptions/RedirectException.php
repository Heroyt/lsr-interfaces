<?php
declare(strict_types=1);

namespace Lsr\Exceptions;

use Lsr\Core\Requests\Request;

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
	 * @param Request|null $request
	 */
	public function __construct(
		public readonly string|array $url = [],
		int                          $code = 302,
		public readonly ?Request     $request = null,
	) {
		parent::__construct('Redirect to: ' . json_encode($url), $code);
	}

}