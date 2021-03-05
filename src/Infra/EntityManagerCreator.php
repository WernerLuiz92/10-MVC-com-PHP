<?php

namespace Werner\MVC\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__.'/../Entity'];
        $isDevMode = true;

        $dbParams = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__.'/../../db.sqlite',
        ];

        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );

        return EntityManager::create($dbParams, $config);
    }
}
