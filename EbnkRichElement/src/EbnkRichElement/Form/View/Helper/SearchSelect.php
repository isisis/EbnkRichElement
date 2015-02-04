<?php
namespace EbnkRichElement\Form\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormSelect;
use Zend\Form\Exception;

class SearchSelect extends FormSelect {
    protected $script = 'ebnkrichelement/form/element/searchselect';
	    	
    public function render(ElementInterface $element)
    {
    	$select = parent::render($element);
        $view = $this->getView();
        //$this->prepareCustomAttributes($element);
        return $view->render($this->script, array('element' => $element, 'select'=>$select));                
    }
    
    /*
    public function prepareCustomAttributes(ElementInterface $element) {
        $attributes = $element->getAttributes();
        
        $element->setAttributes($attributes);
        
        return $element;
    }*/
}