<?php
/**
 * @author Tomáš Vojík <xvojik00@stud.fit.vutbr.cz>, <vojik@wboy.cz>
 */

namespace Lsr\Interfaces;

use JsonSerializable;
use Lsr\Core\Requests\Exceptions\RouteNotFoundException;
use Lsr\Enums\RequestMethod;
use Psr\Http\Message\ServerRequestInterface;

interface RequestInterface extends JsonSerializable, ServerRequestInterface
{

	/**
	 * @return string[]
	 */
	public function getPath(): array;

	public function getType(): RequestMethod;

	/**
	 * @param array<string,string> $params
	 *
	 * @return $this
	 */
	public function setParams(array $params): static;

	/**
	 * @template T of mixed|null
	 * @param string     $name
	 * @param T $default
	 *
	 * @return string|T
	 */
	public function getParam(string $name, mixed $default = null): mixed;

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

	/**
	 * @param string|array{title?:string,content:string,type?:string} $notice
	 *
	 * @return $this
	 */
	public function addNotice(string|array $notice): static;

	/**
	 * @param string|array{title?:string,content:string,type?:string} $notice
	 *
	 * @return $this
	 */
	public function addPassNotice(string|array $notice): static;

	/**
	 * @return array<string|array{title?:string,content:string,type?:string}>
	 */
	public function getNotices(): array;

	/**
	 * @return array<string|array{title?:string,content:string,type?:string}>
	 */
	public function getPassNotices(): array;

}