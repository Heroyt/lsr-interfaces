<?php

namespace Lsr\Interfaces;

/**
 * Interface for working with session data
 *
 * @since v0.2.1
 */
interface SessionInterface
{

	/**
	 * Get a singleton instance
	 *
	 * @return static
	 */
	public static function getInstance() : static;

	/**
	 * @post Initialized a session storage if not already initialized
	 *
	 * @return void
	 */
	public function init() : void;

	/**
	 * Read a session value
	 *
	 * @param string     $key
	 * @param mixed|null $default
	 *
	 * @pre init() method was called
	 *
	 * @return mixed
	 */
	public function get(string $key, mixed $default = null) : mixed;

	/**
	 * Set a new session value.
	 *
	 * @param string $key
	 * @param mixed  $value
	 *
	 * @pre init() method was called
	 *
	 * @return void
	 */
	public function set(string $key, mixed $value) : void;

	/**
	 * Delete a session value by its key.
	 *
	 * @param string $key
	 *
	 * @pre  init() method was called
	 * @post value is removed from session
	 *
	 * @return void
	 */
	public function delete(string $key) : void;

	/**
	 * Clear all session data
	 *
	 * @return void
	 */
	public function clear() : void;

	/**
	 * Read a flash value. It will be deleted automatically.
	 *
	 * @param string     $key
	 * @param mixed|null $default
	 *
	 * @pre  init() method was called
	 * @post flash value is deleted
	 *
	 * @return mixed
	 */
	public function getFlash(string $key, mixed $default = null) : mixed;

	/**
	 * Set a temporary value into session storage. Flash value will be lost after reading.
	 *
	 * @param string $key
	 * @param mixed  $value
	 *
	 * @pre  init() method was called
	 * @post flash value is stored in session
	 *
	 * @return void
	 */
	public function flash(string $key, mixed $value) : void;

}