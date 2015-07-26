<?php

namespace Solid\LiskovSubstitutionPrinciple\Solid;

use Solid\LiskovSubstitutionPrinciple\Driver\Guzzle as GuzzleDriver;

class Guzzle implements BrowserVisitorInterface
{
    public function __construct(GuzzleDriver $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function visit($url)
    {
        $this->guzzle()->openUrl($url);
    }
}
