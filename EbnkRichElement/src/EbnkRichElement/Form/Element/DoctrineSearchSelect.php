<?php
namespace EbnkRichElement\Form\Element;

use DoctrineORMModule\Form\Element\EntitySelect;

class DoctrineSearchSelect extends EntitySelect {
	
    /**
     * @var string
     */
	protected $requestRoute;
    /**
     * @var string
     */
	protected $requestAction = 'searchSelect';
	/**
     * @var string
     */
	protected $requestParameter = 'key';
	/**
     * @var boolean
     */
	protected $isMulti = true;
	/**
     * @var boolean
     */
	protected $collectionMode = false;
	/**
     * @var boolean
     */
	protected $readOnly = false;			
	
	public function setRequestRoute($requestRoute) {
		$this->requestRoute = $requestRoute;
	}
	
	public function getRequestRoute() {
		return $this->requestRoute;
	}
	
	public function setRequestAction($requestAction) {
		$this->requestAction = $requestAction;
	}
	
	public function getRequestAction() {
		return $this->requestAction;
	}
	
	public function setRequestParameter($requestParameter) {
		$this->requestParameter = $requestParameter;
	}
	
	public function getRequestParameter() {
		return $this->requestParameter;
	}
	
	public function setIsMulti($isMulti) {
		$this->isMulti = $isMulti;
	}
	
	public function getIsMulti() {
		return $this->isMulti;
	}
	
	public function setCollectionMode($collectionMode) {
		$this->collectionMode = $collectionMode;
	}
	
	public function getCollectionMode() {
		return $this->collectionMode;
	}
	
	public function setReadOnly($readOnly) {
		$this->readOnly = $readOnly;
	}
	
	public function getReadOnly() {
		return $this->readOnly;
	}			
	
	public function setOptions($options) {
		parent::setOptions($options);
		
		if(isset($this->options['request_route'])) {
			$this->setRequestRoute($this->options['request_route']);
		}
		if(isset($this->options['request_action'])) {
			$this->setRequestAction($this->options['request_action']);
		}
		if(isset($this->options['request_parameter'])) {
			$this->setRequestParameter($this->options['request_parameter']);
		}
		if(isset($this->options['is_multi'])) {
			$this->setIsMulti($this->options['is_multi']);
		}
		if(isset($this->options['collection_mode'])) {
			$this->setCollectionMode($this->options['collection_mode']);
		}
		if(isset($this->options['read_only'])) {
			$this->setReadOnly($this->options['read_only']);
		}					
	}
}