<?php

namespace Solid\DependencyInversionPrinciple\Solid;

interface PostRepository
{
    public function getOnePost($id);
}