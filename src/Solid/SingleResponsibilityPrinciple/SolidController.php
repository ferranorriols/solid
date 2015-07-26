<?php

namespace Solid\SingleResponsibilityPrinciple;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Solid\SingleResponsibilityPrinciple\EntitiesBundle\PostRepository;

class SolidController
{
    /**
     * @var EngineInterface
     */
    protected $templating;
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @param EngineInterface $templating
     * @param PostRepository  $repository
     */
    public function __construct(EngineInterface $templating, PostRepository $repository)
    {
        $this->templating = $templating;
        $this->repository = $repository;
    }

    public function simpleAction($id)
    {
        $post = $this->repository->getOnePost($id);

        return $this->templating->renderResponse(
                'WHVBlogBundle::Blog/post.html.twig', [
                'post'        => $post,
                'current_url' => '',
                'from'        => 'post',
            ]
        );
    }
}
