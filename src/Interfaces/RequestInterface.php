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
	public function handle(): void;

	public function getRoute(): ?RouteInterface;

	/**
	 * @return string[]
	 */
	public function getPath(): array;

	public function getType(): RequestMethod;

	/**
	 * @param array<string,string|numeric|null> $params
	 *
	 * @return $this
	 */
	public function setParams(array $params): static;

	/**
	 * @param string     $name
	 * @param mixed|null $default
	 *
	 * @return string|numeric|null
	 */
	public function getParam(string $name, mixed $default = null): string|int|float|null;

	public function setPreviousRequest(RequestInterface $request): static;

	public function addError(string $error): static;

	public function addPassError(string $error): static;

	/**
	 * @return string[]
	 */
	public function getErrors(): array;

	/**
	 * @return string[]
	 */
	public function getPassErrors(): array;

	public function addNotice(string $notice): static;

	public function addPassNotice(string $notice): static;

	/**
	 * @return string[]
	 */
	public function getNotices(): array;

	/**
	 * @return string[]
	 */
	public function getPassNotices(): array;

}