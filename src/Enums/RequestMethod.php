<?php

namespace Lsr\Enums;

/**
 * @property string $value
 * @method static RequestMethod from(string $value)
 * @method static RequestMethod|null tryFrom(string $value)
 */
enum RequestMethod: string
{

	case GET = 'GET';
	case POST = 'POST';
	case PUT = 'PUT';
	case UPDATE = 'UPDATE';
	case DELETE = 'DELETE';
	case CLI = 'CLI';

}