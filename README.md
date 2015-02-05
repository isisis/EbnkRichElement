# EbnkRichElement

A [Zend Framework 2](http://framework.zend.com/manual/current/en/user-guide/overview.html) Module that provides additional rich form elements you can use inside ZF2 Forms and Fieldsets. This module does also extend ZF2's formelement view helper and enables you to add your custom renderers by configuration, so you can add new form elements from any of your modules.

Warning: Don't use this module for production yet, since it's in development stage. Feel free to try it out and contribute or give me some code reviews and improvement tipps.

# Documentation
## Installation
Download the zip of this repository and put the module directory into the /vendor directory inside your ZF2 Application.
Composer installation is comming soon.

### Requirements
The Form Elements are based on JQuery and JQuery UI, so you want to add the js files to the head of your markup first if you're not using JQuery yet.
* http://jquery.com/download/
* http://jqueryui.com/

## The Form Elements

### SearchSelect
Basic initialization of EbnkRichElement\Form\Element\SearchSelect in your form should look like this
```php
		$this->add(array(
			'type' => 'EbnkRichElement\Form\Element\SearchSelect',
			'name' => 'nameOfYourFormElement',
			'attributes' => array(
				'id' => 'idOfYourFormElement',
			),
			'options' => array(
				'label' => 'YourLabel',
				'property' => 'name',
				'request_route' => 'route/subroute',
				'request_action' => 'searchSelect',
				'is_multi' => false,
				'value_options' => array(
					'0' => 'Option1',
					'1' => 'Option2',
					'2' => 'Option3',
					'3' => 'Option4',
				),
			),
		));
```
The options *request_route* and *request_action* should be an existing route in your route configuration.

Inside the requested controller action you will receive the *key* as a post parameter. You can use this parameter for your search logic and want to return JSON formatted data with additional options for the user.
As I told my form element to invoke the *searchSelect* action, the controller action could look something like this:

```<?php
	public function searchSelectAction() {
		$results = array();
		if($this->request->isPost()) {
			$key = $this->request->getPost('key');
			if($key != "" && strlen($key) > 0) {
				if($key == "k") {
			  		$results = array(
			  			array(4,"km"),
			  			array(5,"kg"),
			  		);
			  	} elseif($key == "qm") {
			  		$results = array(
			  			array(6,"qm"),
			  		);
			  	}
			}
		}
		return new JsonModel(array('data'=>$results));
	}
```

As you don't want to cover all search queries the user could do, you can call a custom seach function of a repository class thats searches a database table with the key and format the data as I did here.
The first element in the array will be used for the *value* attribute of the option and the second one as the *text* thats presented to the user inside the select element.

### DoctrineSearchSelect
...
