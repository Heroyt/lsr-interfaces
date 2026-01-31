<?php
declare(strict_types=1);

namespace Lsr\Interfaces;


use ArrayAccess;
use JsonSerializable;

/**
 * @extends ArrayAccess<string, mixed>
 */
interface TemplateParametersInterface extends ArrayAccess, JsonSerializable
{

    /**
     * Get only component-level props
     *
     * @return array<string, mixed>
     */
    public function getProps(): array;

}