<?php

namespace Frontend;

use Zend\Config\Config,
	Zend\Module\Manager,
	Zend\EventManager\StaticEventManager,
	Zend\Module\Consumer\AutoloaderProvider;

class Module implements AutoloaderProvider
{
	
	public function init(Manager $manager)
	{
		// get notified when configuration is known and the application is bootstrapped
		$events = StaticEventManager::getInstance();
		#$events->attach('bootstrap', 'bootstrap', array($this, 'onBootstrap'));
		
		// get notified when all modules are loaded
		$events = $manager->events();
		$events->attach('init.post', array($this, 'onModulesLoaded'));
	}
	
	
	public function onModulesLoaded($e)
	{
		#die('modules loaded');
	}
	
	
	public function onBootstrap($e)
	{
		#die(get_class($e)); // Zend\EventManager\Event
		$moduleManager = $e->getParam('modules'); // Zend\Module\Manager
		$application = $e->getParam('application'); // Zend\Mvc\Application
		$locator = $application->getLocator(); // Zend\Di\Di
		$router = $application->getRouter(); // Zend\Mvc\Router\Http\TreeRouteStack
		$config = $moduleManager->getMergedConfig(); // Zend\Config\Config
		// do stuff such as configuring plugins (eg url viewhelper)
	}
	
	
	public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
	
	
	public function getConfig($env = null)
	{
		#return new Config(array());
		
		$config = new Config(
			include __DIR__ . '/configs/module.config.php'
		);
		if ($env and isset($config->{$env})) {
			return $config->{$env};
		}
		return $config;
	}
}
