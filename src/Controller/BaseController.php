<?php


namespace Alphabetus\Bundle\SkeletonBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
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
        $file = __DIR__ . "/var/alpha-logs/raw.txt";
        $logs = file_get_contents($file);
        return $logs;
    }
}