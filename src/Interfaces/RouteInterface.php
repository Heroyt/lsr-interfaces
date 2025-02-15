<?php
/**
 * @author Tomáš Vojík <xvojik00@stud.fit.vutbr.cz>, <vojik@wboy.cz>
 */

namespace Lsr\Interfaces;

use Lsr\Enums\RequestMethod;

interface RouteInterface
{

	/**
	 * Create a new route
	 *
	 * @param RequestMethod                              $type       [GET, POST, DELETE, PUT]
	 * @param string                                     $pathString Path
	 * @param callable|array{0: class-string, 1: string} $handler    Callback
	 *
	 * @return RouteInterface
	 */
	public static function create(RequestMethod $type, string $pathString, callable|array $handler): RouteInterface;

	/**
	 * Compare two route paths.
	 *
	 * Ignores different parameter names, but checks if both paths contain parameter at the same place.
	 *
	 * @param string[] $path1
	 * @param string[] $path2
	 *
	 * @return bool True if the paths match.
	 */
	public static function compareRoutePaths(array $path1, array $path2): bool;

	/**
	 * Get route handler
	 *
	 * @return callable|array{0: class-string|object, 1: string}
	 */
	public function getHandler(): callable|array;

	/**
	 * Get a string representation for this route
	 *
	 * @return string
	 */
	public function getReadable(): string;

	/**
	 * Get split route path
	 *
	 * @return string[]
	 */
	public function getPath(): array;

	/**
	 * Get route's name
	 *
	 * @return string Can be empty if no name is set
	 */
	public function getName(): string;

	/**
	 * Get route's request method
	 *
	 * @return RequestMethod
	 */
	public function getMethod(): RequestMethod;

	/**
	 * Compare another route with this route
	 *
	 * @param RouteInterface $route
	 *
	 * @return bool
	 */
	public function compare(RouteInterface $route): bool;

}