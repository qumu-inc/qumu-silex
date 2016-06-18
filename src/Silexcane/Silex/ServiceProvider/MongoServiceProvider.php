<?php
namespace Silexcane\Silex\ServiceProvider;

use Pimple\ServiceProviderInterface;
use Silex\Application;

class MongoServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        if (!isset($app['mongodb.server'])) {
            $app['mongodb.server'] = 'mongodb://localhost';
        }
        if (!isset($app['mongodb.options'])) {
            $app['mongodb.options'] = [];
        }
        $app['mongodb.client'] = $app->share(function() use ($app) {
            return new \MongoClient($app['mongodb.server'], $app['mongodb.options']);
        });
    }
}
