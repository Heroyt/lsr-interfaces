<?php
/**
 * @author Tomáš Vojík <xvojik00@stud.fit.vutbr.cz>, <vojik@wboy.cz>
 */

namespace Lsr\Interfaces;

use JsonSerializable;
use Lsr\Core\Requests\Exceptions\RouteNotFoundException;
use Lsr\Enums\RequestMethod;

interface RequestInterface extends JsonSerializable, \Psr\Http\Message\RequestInterface
{

	/**
	 * @param string[]|string $query
	 */
	public function __construct(array|string $query);

	/**
	 * Handle a request
	 *
	 * @post Call all Middleware
	 * @post Call a handler function
	 *
	 * @return void
	 * @throws RouteNotFoundException
	 */
	public function handle() : void;

	public function getRoute() : ?RouteInterface;

	/**
	 * @return string[]
	 */
	public function getPath() : array;

	public function getMethod() : RequestMethod;

}