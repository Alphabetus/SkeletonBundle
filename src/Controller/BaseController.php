<?php


namespace Alphabetus\Bundle\SkeletonBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    private $root_dir;

    public function __construct(ParameterBagInterface $params)
    {
        $this->root_dir = $params->get('kernel.project_dir');
    }

    /**
     * @return Response
     * @Route("/_logs", name="logger.index")
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
        $file_uri = "/var/alpha-logs/raw.txt";
        $file = $this->root_dir . $file_uri;
        if (file_exists($file)) {
            return file_get_contents($file);
        } else {
            return "";
        }
    }
}