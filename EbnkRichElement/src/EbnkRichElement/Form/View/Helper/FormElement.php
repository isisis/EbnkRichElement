<?php
namespace EbnkRichElement\Form\View\Helper;

use Zend\Form\View\Helper\FormElement as BaseFormElement;
use Zend\Form\ElementInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FormElement extends BaseFormElement implements ServiceLocatorAwareInterface
{
    protected $serviceLocator;		
	
	public function getFormElementRenderConfig() {
		$config = $this->serviceLocator->getServiceLocator()->get('Configuration');
		if(isset($config['ebnkrichelement']['form_element_render'])) {
			$formElementRenderConfig = $config['ebnkrichelement']['form_element_render'];
			return $formElementRenderConfig;
		}
		return array();
	}
	
	public function addClasses() {
		$config = $this->getFormElementRenderConfig();
		foreach($config as $class=>$helper) {
			$this->addClass($class, $helper);
		}
	}
	
    public function render(ElementInterface $element) 
    {
    	// add classes from config before rendering
    	$this->addClasses();
		
        $renderer = $this->getView();
        if(!method_exists($renderer, 'plugin')) {
            return '';
        }
        
        return parent::render($element);
    }
	
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }	
}
?>