<?php

namespace Lsr\Interfaces;

/**
 * @template T of object
 */
interface AuthInterface
{

	/**
	 * Check if the user is logged in and do all necessary logic.
	 *
	 * @return void
	 */
	public function init() : void;

	/**
	 * Logout current user
	 *
	 * @return void
	 */
	public function logout() : void;

	/**
	 * Try to log in
	 *
	 * @param string $email
	 * @param string $password
	 * @param bool   $remember
	 *
	 * @return bool If the login was successful
	 */
	public function login(string $email, string $password, bool $remember = false) : bool;

	/**
	 * Register a new user
	 *
	 * @param string $email
	 * @param string $password
	 * @param string $name
	 *
	 * @return T|null New user object if successful
	 */
	public function register(string $email, string $password, string $name = '') : ?object;

	/**
	 * Check if user is logged in
	 *
	 * @return bool
	 */
	public function loggedIn() : bool;

	/**
	 * Check if user is currently logged in and has specified right
	 *
	 * @param string $right
	 *
	 * @return bool
	 */
	public function hasRight(string $right) : bool;

	/**
	 * Get logged in user object
	 *
	 * @return T|null
	 */
	public function getLoggedIn() : ?object;

	/**
	 * Get all current user's rights
	 *
	 * @return string[]
	 */
	public function getRights() : array;

}