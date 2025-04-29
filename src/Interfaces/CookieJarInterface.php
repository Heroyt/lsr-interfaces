<?php
declare(strict_types=1);

namespace Lsr\Interfaces;

interface CookieJarInterface
{

	/**
	 * @param non-empty-string $name
	 */
	public function get(string $name, ?string $default = null): ?string;

	/**
	 * @return array<string,string>
	 */
	public function all(): array;

	/**
	 * @param non-empty-string $name
	 * @param string           $value
	 * @param int<0,max>       $expire
	 * @param string           $path
	 * @param string           $domain
	 * @param bool             $secure
	 * @param bool             $httponly
	 */
	public function set(string $name, string $value, int $expire = 0, string $path = '/', string $domain = '', bool $secure = false, bool $httponly = false): void;

	/**
	 * @param non-empty-string $name
	 */
	public function delete(string $name): void;

}