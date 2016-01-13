<?php

use Application\System\System;

// utworzenie obiektu klasy systemowej
$system = new System();

// autoloader klas
function __autoload($class) {
        $tmp = explode('\\', $class);
        $tmp_str = "";
        for($i=0;$i<2;$i++){
            $tmp_str .= strtolower($tmp[$i]) . '\\';
        }
        if(count($tmp) == 3){
            $tmp_str .= $tmp[2];
        } elseif(count($tmp) == 4){
            $tmp_str .= $tmp[2]. '\\' .$tmp[3];
        }

	$class = $_SERVER['DOCUMENT_ROOT'] . '/../' . str_replace('\\', '/', $tmp_str) . '.php';
	require_once($class);
}