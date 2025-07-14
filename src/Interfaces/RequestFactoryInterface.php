<?php
declare(strict_types=1);

namespace Lsr\Interfaces;

use Psr\Http\Message\ServerRequestInterface;

interface RequestFactoryInterface
{

	/**
	 * Get a request from HTTP context.
	 */
	public function getHttpRequest(): ServerRequestInterface;

	/**
	 * Create a new instance of Request decorator from any PSR-7 ServerRequestInterface.
	 */
	public function fromPsrRequest(ServerRequestInterface $request): ServerRequestInterface;

}