<?php

namespace Lsr\Enums;

enum RequestMethod: string
{

	case GET = 'GET';
	case POST = 'POST';
	case PUT = 'PUT';
	case UPDATE = 'UPDATE';
	case DELETE = 'DELETE';
	case CLI = 'CLI';

}