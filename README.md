# EbnkRichElement

A [Zend Framework 2](http://framework.zend.com/manual/current/en/user-guide/overview.html) Module that provides additional rich form elements you can use inside ZF2 Forms and Fieldsets. This module does also extend ZF2's formelement view helper and enables you to add your custom renderers by configuration, so you can add new form elements from any of your modules.

Warning: Don't use this module for production yet, since it's in development stage. Feel free to try it out and contribute or give me some code reviews and improvement tipps.

# Documentation
* [Installation](#installation)
* [Requirements](#requirements)
* [The Form Elements](#the-form-elements)
	* [SearchSelect](#searchselect)
	* [DoctrineSearchSelect](#doctrinesearchselect)
* [Adding Custom Elements](#adding-custom-elements)
* [ToDo](#todo)
* [Demo](#demo)

## Installation
Download the zip of this repository and put the module directory into the /vendor directory inside your ZF2 Application.
Composer installation is comming soon.

Then introduce the module to your application in the *application.config.php*
```php
// ... config array ...
	'modules' => array(       
		// ... other modules ...
		'EbnkRichElement',
	),
// ... config array ...	
```

## Requirements
The Form Elements are based on JQuery and JQuery UI, so you want to add the js files to the head of your markup first if you're not using JQuery yet.
* http://jquery.com/download/
* http://jqueryui.com/

## The Form Elements

### SearchSelect
Basic initialization of *EbnkRichElement\Form\Element\SearchSelect* in your form should look like this
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

```php
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

Instead of *if* statement you could call a custom seach function of a repository class that searchs a database table with the key. Then you could format the data into arrays like I did it here.
The first element in the array will be used for the *value* attribute of the option and the second one as the *text* thats presented to the user inside the select element.

### DoctrineSearchSelect
...

## Adding Custom Elements
This modules gives you the flexibility to add custom form element renderers to your application from configuration.

> Many described solutions on the net tell you to override ZF2's *formelement* view helper to do so. The problem with this solution is - if another module overrides it as well and it's being loaded after your module in the bootstrap hierarchy, it's going to override your view helper and your form elements are not going to be rendered correctly.

In this module the *formelent* view helper is also being overriden, but it enables you to add renderers from configuration. So you won't need to override it in other modules where you want to add custom elements.

This is how it works:
```php
	// in your module.config.php
	'ebnkrichelement' => array(
		'form_element_render' => array(
			// 'FormElementFQCN' => 'viewhelpername',
			'YourModule\Form\Element\SomeElement' => 'yourModuleSomeElement',
		),
	),
	'view_helpers' => array(
		'invokables' => array(
			'yourModuleSomeElement' => 'YourModule\Form\View\Helper\SomeElement',
		),
	),	
```

# ToDo
* some code cleaning
* jquery-select2 element integration

# Demo
![EbnkRichElement-SearchSelect-Demo-1](demo/SearchSelect_demo1.png)
Image showing opened up dialog of the SearchSelect element. The dialog will open up if you click on the add button next to the select field. 

At disabled elements the dialog will open up when you click on the select field. Buttons are being translated from the translator to german in my app. Translation depends on your current locale.

As you can see behind, I'm using the SearchSelect inside a FormCollection here. To make it work correctly inside collection, you want to set the *collection_mode* option to *true* when initializing the element.
