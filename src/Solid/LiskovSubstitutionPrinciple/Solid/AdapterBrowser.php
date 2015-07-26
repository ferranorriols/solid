<?php

namespace Solid\LiskovSubstitutionPrinciple\Solid;

use Solid\LiskovSubstitutionPrinciple\BrowserDriverInterface;

class AdapterBrowser implements BrowserDriverInterface
{
    protected $browser;
    protected $allowActions;

    public function __construct(BrowserVisitorInterface $browser)
    {
        $this->browser = $browser;
    }

    public function boot()
    {
        $this->allowActions = true;
    }

    public function visit($url)
    {
        if ($this->allowActions) {
            $this->browser->go($url);
        }
    }
}