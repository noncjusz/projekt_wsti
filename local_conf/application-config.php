<?php

return array(
	'router' => array(
		'home' => array(
			'uri' => '/',
			'type' => 'literal',
			'options' => array(
				'controller' => 'Application\Controller\Ranking',
				'action' => 'ranking',
			),
		),
		
		'offer' => array(
			'uri' => '/oferta/:offer_id(,?:credit?)(,?:time?)',
			'type' => 'segment',
			'variables' => array(
				'offer_id' => '[0-9]+',
				'credit' => '[0-9]*',
				'time' => '[0-9]*',
			),
			'options' => array(
				'controller' => 'Application\Controller\Offer',
				'action' => 'offer',
			),
		),
		
		'application_form' => array(
			'uri' => '/wniosek/:offer_id',
			'type' => 'segment',
			'variables' => array(
				'offer_id' => '[0-9]+',
			),
			'options' => array(
				'controller' => 'Application\Controller\Application',
				'action' => 'form',
			),
		),
		
		'application_sent' => array(
			'uri' => '/wniosek/:offer_id,wyslano',
			'type' => 'segment',
			'variables' => array(
				'offer_id' => '[0-9]+',
			),
			'options' => array(
				'controller' => 'Application\Controller\Application',
				'action' => 'sent',
			),
		),
	),
	
	'navigation' => array(
		'default' => array(
			array(
				'route' => 'home',
				'label' => 'Ranking',
				'pages' => array(
					array(
						'route' => 'offer',
						'label' => 'Oferta',
						'pages' => array(
							array(
								'route' => 'application_form',
								'label' => 'Wniosek - formularz',
							),
							array(
								'route' => 'application_sent',
								'label' => 'Wniosek - wysłano',
							),
						),
					),
				),
			),
		),
	),
	
	'db' => array(
		'connection' => array(
			'host' => 'localhost',
			'db' => 'projekt_db',
			'user' => 'root',
			'password' => '',
		),
	),
);