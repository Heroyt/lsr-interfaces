<?php
/**
 * @author Tomáš Vojík <xvojik00@stud.fit.vutbr.cz>, <vojik@wboy.cz>
 */

namespace Lsr\Interfaces;

use Lsr\Enums\RequestMethod;

interface RouteInterface
{
	/**
	 * Route constructor.
	 *
	 * @param RequestMethod  $type
	 * @param callable|array $handler
	 */
	public function __construct(RequestMethod $type, callable|array $handler);

	/**
	 * Create a new route
	 *
	 * @param RequestMethod  $type       [GET, POST, DELETE, PUT]
	 * @param string         $pathString Path
	 * @param callable|array $handler    Callback
	 *
	 * @return RouteInterface
	 */
	public static function create(RequestMethod $type, string $pathString, callable|array $handler) : RouteInterface;

	/**
	 * Handle a Request - calls any set Middleware and calls a route callback
	 *
	 * @param RequestInterface|null $request
	 */
	public function handle(?RequestInterface $request = null) : void;

	/**
	 * Get route handler
	 *
	 * @return callable|array
	 */
	public function getHandler() : callable|array;

	/**
	 * Get a string representation for this route
	 *
	 * @return string
	 */
	public function getReadable() : string;

	/**
	 * Get split route path
	 *
	 * @return string[]
	 */
	public function getPath() : array;

	/**
	 * Get route's name
	 *
	 * @return string Can be empty if no name is set
	 */
	public function getName() : string;

	/**
	 * Get route's request method
	 *
	 * @return RequestMethod
	 */
	public function getMethod() : RequestMethod;

}