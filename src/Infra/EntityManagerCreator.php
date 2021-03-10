<?php

namespace Werner\MVC\Infra;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__.'/../Model/Entity'];
        $isDevMode = false;

        $sqliteDbParams = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__.'/../../db.sqlite',
        ];

        $psqlDbParams = [
            'driver' => 'pdo_pgsql',
            'host' => 'ec2-54-145-102-149.compute-1.amazonaws.com',
            'port' => 5432,
            'dbname' => 'd2cqlte31etun',
            'charset' => 'utf-8',
            'user' => 'osuqulbdhpesfm',
            'password' => 'a01fd3647f55142ba178320da3b2c45edaa11065fd7030da49d119785632651b',
        ];

        // -> host (string): Hostname of the database to connect to.
        // -> port (integer): Port of the database to connect to.
        // -> dbname (string): Name of the database/schema to connect to.
        // -> charset (string): The charset used when connecting to the database.
        // -> user (string): Username to use when connecting to the database.
        // -> password (string): Password to use when connecting to the database.

        $cache = new \Doctrine\Common\Cache\ArrayCache();

        $config = new Configuration();
        $config->setMetadataCacheImpl($cache);
        $driverImpl = $config->newDefaultAnnotationDriver(__DIR__.'/../Model/Entity');
        $config->setMetadataDriverImpl($driverImpl);
        $config->setQueryCacheImpl($cache);
        $config->setProxyDir(__DIR__.'/../Proxies');
        $config->setProxyNamespace('Werner\\MVC\\Proxies');

        $config->setAutoGenerateProxyClasses(true);

        // $config = Setup::createAnnotationMetadataConfiguration(
        //     $paths,
        //     $isDevMode
        // );

        return EntityManager::create($psqlDbParams, $config);
    }
}
