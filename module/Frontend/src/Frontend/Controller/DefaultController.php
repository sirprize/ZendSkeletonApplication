<?php

namespace Frontend\Controller;

use Zend\Mvc\Controller\ActionController;

class DefaultController extends ActionController
{
    public function helloAction()
    {
        return array();
    }

	public function mauAction()
    {
		#die(get_class($this->getRequest()));
		#die(get_class($this->getResponse()));
		return $this->redirect()->toRoute('frontend-ciao', array('id' => 'xxxxxxxxxxx'));
        return array();
    }
	
	public function ciaoAction()
    {
		$id = $this->getEvent()->getRouteMatch()->getParam('id');
		$url = $this->url()->fromRoute('frontend-ciao', array('id' => $id));
		die($url);
		#print '<pre>'; print_r($this->getEvent()); exit;
		#print '<pre>'; print_r($this->getRequest()->query()); exit;
		#die(get_class($this->getRequest()->query()));
        #die('ciao: '.$this->getRequest()->query()->getParam('id'));
    }
}
