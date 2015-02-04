<?php
namespace EbnkRichElement\Form\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\Exception;

class DoctrineSearchSelect extends SearchSelect {
    protected $script = 'ebnkrichelement/form/element/searchselect';
	    	    
    /*
    public function prepareCustomAttributes(ElementInterface $element) {
        $attributes = $element->getAttributes();
        
        $element->setAttributes($attributes);
        
        return $element;
    }*/
}