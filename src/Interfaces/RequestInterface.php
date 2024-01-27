<?php
/**
 * @author Tomáš Vojík <xvojik00@stud.fit.vutbr.cz>, <vojik@wboy.cz>
 */

namespace Lsr\Interfaces;

use JsonSerializable;
use Lsr\Core\Requests\Exceptions\RouteNotFoundException;
use Lsr\Enums\RequestMethod;

interface RequestInterface extends JsonSerializable
{

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

	/**
	 * @param string     $name
	 * @param mixed|null $default
	 *
	 * @return string|numeric-string
	 */
	public function getParam(string $name, mixed $default = null): string;

	public function setPreviousRequest(RequestInterface $request) : static;

	public function addError(string $error) : static;

	public function addPassError(string $error) : static;

	/**
	 * @return string[]
	 */
	public function getErrors() : array;

	/**
	 * @return string[]
	 */
	public function getPassErrors() : array;

	public function addNotice(string $notice) : static;

	public function addPassNotice(string $notice) : static;

	/**
	 * @return string[]
	 */
	public function getNotices() : array;

	/**
	 * @return string[]
	 */
	public function getPassNotices() : array;

}