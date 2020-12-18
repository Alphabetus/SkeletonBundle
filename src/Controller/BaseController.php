<?php


namespace Alphabetus\Bundle\SkeletonBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    private $root_dir;
    private $logs;

    public function __construct(ParameterBagInterface $params)
    {
        $this->root_dir = $params->get('kernel.project_dir');
        $this->logs = $this->getLog();
    }

    /**
     * @return Response
     * @Route("/_logs", name="logger.index")
     */
    public function index()
    {
        $logs_array = $this->breakDownLogs($this->logs);
        $logs_output = $this->cleanLogEntries($logs_array);
        return $this->render("@Skeleton/test.html.twig", [
            "logs" => $logs_array
        ]);
    }

    protected function getLog()
    {
        $file_uri = "/var/alpha-dump/dump.txt";
        $file = $this->root_dir . $file_uri;
        if (file_exists($file)) {
            return file_get_contents($file);
        } else {
            return "";
        }
    }

    protected function breakDownLogs($logs_massive)
    {
        return explode("--------------------------------------", $logs_massive);
    }

    protected function cleanLogEntries($logs_array)
    {
        $logs_output = [];
        foreach ($logs_array as $l) {
            array_push($logs_output, str_replace("\n" ,"", $logs_array));
        }
        return $logs_output;
    }
}