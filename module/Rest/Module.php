<?php

/*
 * Crysthiano A. Soares
 * Modulo Restful em desenvolvimento 
 */

namespace Rest;

use Zend\Mvc\MvcEvent;

class Module
{
	public function onBootstrap(MvcEvent $e)
	{
		$sharedEvents = $e->getApplication()->getEventManager()->getSharedManager();
		$sharedEvents->attach('Zend\Mvc\Controller\AbstractRestfulController', MvcEvent::EVENT_DISPATCH, array($this, 'postProcess'), -100);
	}

	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				)
			)
		);
	}

	public function getServiceConfig()
	{
		return array(
			'factories' => array(
				'Rest\Service\ProcessJson' => function ($sm) {
					$serializer = $sm->get('jms_serializer.serializer');
					return new Service\ProcessJson(null, null, $serializer);
				},
				'Rest\Service\Categoria' => function($sm) {
                    $em = $sm->get("Doctrine\ORM\EntityManager");
                    $categoriaService = new \Application\Service\Categoria($em);
                    return $categoriaService;
                },
                'Rest\Service\Produto' => function($sm) {
                    $em = $sm->get("Doctrine\ORM\EntityManager");
                    $produtoService = new \Application\Service\Produto($em);
                    return $produtoService;
                }
			)
		);
	}

	public function postProcess(MvcEvent $e)
	{
		$processJson = $e->getTarget()->getServiceLocator()->get('Rest\Service\ProcessJson');
		$data = $e->getResult();
		$response = new \Zend\Http\Response();

		$processJson->setResponse($response);
		$processJson->setData($data);

		return $processJson->process();
	}
}