<?php

$config = array(
	'routes' => array(
        'frontend-hello' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route' => '/hello',
                'defaults' => array(
                    'controller' => 'frontend-default',
                    'action' => 'hello',
                ),
            ),
        ),
		'frontend-mau' => array(
	        'type' => 'Zend\Mvc\Router\Http\Literal',
	        'options' => array(
	            'route' => '/mau',
	            'defaults' => array(
	                'controller' => 'frontend-default',
	                'action' => 'mau',
	            ),
	        ),
	    ),
		'frontend-ciao' => array(
	        'type' => 'Zend\Mvc\Router\Http\Segment',
	        'options' => array(
	            'route' => '/ciao/:id',
	            'defaults' => array(
	                'controller' => 'frontend-default',
	                'action' => 'ciao',
	            ),
	        ),
	    ),
    ),
    'di' => array(
        'instance' => array(
            'alias' => array(
                'frontend-default' => 'Frontend\Controller\DefaultController',
            ),
            'Zend\View\PhpRenderer' => array(
                'parameters' => array(
                    'options' => array(
                        'script_paths' => array(
                            'frontend' => __DIR__ . '/../views',
                        ),
                    ),
                ),
            ),
        ),
    ),
);


return array(
	'production' => $config,
	'staging' => $config,
	'testing' => $config,
	'development' => $config,
);
