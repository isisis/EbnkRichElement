# EbnkRichElement

A [Zend Framework 2](http://framework.zend.com/manual/current/en/user-guide/overview.html) Module that provides additional rich form elements you can use inside ZF2 Forms and Fieldsets. This module does also extend ZF2's formelement view helper and enables you to add your custom renderers by configuration, so you can add new form elements from any of your modules.

Warning: Don't use this module for production yet, since it's in development stage. Feel free to try it out and contribute or give me some code reviews and improvement tipps.

# Documentation
## Installation
Download the zip of this repository and put it into the /vendor directory inside your ZF2 Application.
Composer installation is comming soon.

### Requirements
The Form Elements are based on JQuery and JQuery UI, so you want to add the js files to the head of your Markup first if you're not using JQuery yet.
* http://jquery.com/download/
* http://jqueryui.com/
