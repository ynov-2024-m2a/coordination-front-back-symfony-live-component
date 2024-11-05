<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
class Footer
{
    public string $siteTitle = 'Symfony UX Demo';
    public array $navigationLinks = [];

    public function __construct()
    {
        $this->navigationLinks = [];
    }

    public function getLogoIcon(): string
    {
        return 'bi:bootstrap-fill';
    }
}