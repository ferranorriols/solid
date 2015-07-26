<?php

namespace Solid\LiskovSubstitutionPrinciple\NoSolid;

use Solid\LiskovSubstitutionPrinciple\BrowserDriverInterface;
use Solid\LiskovSubstitutionPrinciple\Driver\Guzzle as GuzzleDriver;

class Guzzle implements BrowserDriverInterface
{
    public function __construct(GuzzleDriver $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function boot() {}

    public function visit($url)
    {
        $this->guzzle()->openUrl($url);
    }
}