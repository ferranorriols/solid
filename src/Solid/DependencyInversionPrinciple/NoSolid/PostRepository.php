<?php

namespace Solid\DependencyInversionPrinciple\NoSolid;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    public function getOnePost($id)
    {
        return $this->findOneBy(['id' => $id]);
    }
}
