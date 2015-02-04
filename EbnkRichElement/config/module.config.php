<?php
namespace EbnkRichElement;

return array(
	'ebnkrichelement' => array(
		'form_element_render' => array(
			/* 'FormElementFQCN' => 'viewhelpername', */
			'EbnkRichElement\Form\Element\SearchSelect' => 'EbnkRichElement\Form\View\Helper\SearchSelect',
			'EbnkRichElement\Form\Element\DoctrineSearchSelect' => 'EbnkRichElement\Form\View\Helper\DoctrineSearchSelect'			
		),
	),
    'view_helpers' => array(
    	'invokables' => array(
			'formelement' => 'EbnkRichElement\Form\View\Helper\FormElement',
			'EbnkRichElement\Form\View\Helper\SearchSelect' => 'EbnkRichElement\Form\View\Helper\SearchSelect',
			'EbnkRichElement\Form\View\Helper\DoctrineSearchSelect' => 'EbnkRichElement\Form\View\Helper\DoctrineSearchSelect',			
        ),
    ),	
    'view_manager' => array(        
        'template_map' => array(
            'ebnkrichelement/form/element/searchselect' => __DIR__ . '/../view/ebnkrichelement/form/element/searchselect.phtml',
        ),
        'template_path_stack' => array(
            'EbnkRichElement' => __DIR__ . '/../view'
        )
    ),
    'translator' => array(
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),    
);