<?php

namespace Solid\LiskovSubstitutionPrinciple;

interface BrowserDriverInterface
{
    public function boot();

    public function visit($url);
}
