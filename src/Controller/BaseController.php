<?php


namespace Alphabetus\Bundle\SkeletonBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @return Response
     * @Route("/b/t", name="bundle.test")
     */
    public function test()
    {
        return $this->render("@Skeleton/test.html.twig");
    }
}