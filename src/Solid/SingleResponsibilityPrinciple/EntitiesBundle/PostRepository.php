<?php

namespace Solid\SingleResponsibilityPrinciple\EntitiesBundle;

class PostRepository
{
    public function getOnePost($id)
    {
        return new Post();
    }
}
