<?php
declare(strict_types=1);

namespace Lsr\Interfaces;

use Lsr\Exceptions\TemplateDoesNotExistException;

interface ViewFactoryInterface
{
    /**
     * Renders a view from a latte template
     *
     * @param non-empty-string $template Template name
     * @param array<string, mixed>|TemplateParametersInterface $params Template parameters
     *
     * @throws TemplateDoesNotExistException
     */
    public function view(string $template, array|TemplateParametersInterface $params = []): void;


    /**
     * Renders a view from a latte template
     *
     * @param non-empty-string $template Template name
     * @param array<string, mixed>|TemplateParametersInterface $params Template parameters
     *
     * @return string
     * @throws TemplateDoesNotExistException
     */
    public function viewToString(string $template, array|TemplateParametersInterface $params = []): string;

    /**
     * @param string|null $locale
     * @return $this
     */
    public function setLocale(?string $locale): static;

}