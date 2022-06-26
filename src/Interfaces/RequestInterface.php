<?php
/**
 * @author Tomáš Vojík <xvojik00@stud.fit.vutbr.cz>, <vojik@wboy.cz>
 */

namespace Lsr\Interfaces;

use JsonSerializable;
use Lsr\Enums\RequestMethod;

interface RequestInterface extends JsonSerializable
{

	public function __construct(array|string $query);

	public function handle() : void;

	public function getRoute() : ?RouteInterface;

	public function getPath() : array;

	public function getMethod() : RequestMethod;

}