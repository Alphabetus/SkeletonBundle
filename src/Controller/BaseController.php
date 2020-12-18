<?php


namespace Alphabetus\Bundle\SkeletonBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    private $params;
    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $logs = $this->getLog();
        return $this->render("@Skeleton/test.html.twig", [
            "logs" => $logs
        ]);
    }

    protected function getLog()
    {
        $file = __DIR__;
        $logs = file_get_contents($file);
        return $this->params->get('kernel.project_dir');
    }
}