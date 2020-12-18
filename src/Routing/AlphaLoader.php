<?php


namespace Alphabetus\Bundle\SkeletonBundle\Routing;


use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

class AlphaLoader extends Loader
{

    private $loaded = false;

    /**
     * @inheritDoc
     */
    public function load($resource, string $type = null)
    {
        if (true === $this->loaded) {
            throw new \RuntimeException('Do not add the "extra" loader twice');
        }
        $collection = new RouteCollection();

        $resource = '@SkeletonBundle/Resources/config/routing.yaml';
        $type = 'yaml';

        $importedRoutes = $this->import($resource, $type);

        $collection->addCollection($importedRoutes);
        return $collection;
    }

    /**
     * @inheritDoc
     */
    public function supports($resource, string $type = null)
    {
        return $type === 'annotation';
    }
}