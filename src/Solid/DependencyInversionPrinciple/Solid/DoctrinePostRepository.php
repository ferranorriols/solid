<?php

namespace Solid\DependencyInversionPrinciple\Solid;

use Doctrine\ORM\EntityRepository;

class DoctrinePostRepository extends EntityRepository implements PostRepository
{
    public function getOnePost($id)
    {
        return $this->findOneBy(['id' => $id]);
    }
}
