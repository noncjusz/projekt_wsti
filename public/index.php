<?php

use Application\System\System;

// utworzenie obiektu klasy systemowej
$system = new System();

// autoloader klas
function __autoload($class) {
	$class = $_SERVER['DOCUMENT_ROOT'] . '/../' . str_replace('\\', '/', $class) . '.php';
	require_once($class);
}