<?php
require_once "src/sections.php";
require_once "src/calcular.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// calculadora/route.php?action=pi --> pi.php

// calculadora/route.php?action=about/Javito --> ["about", "Javito"]

// parsea la accion Ej: sumar/1/2 --> ['sumar', 5, 4]
// calculadora/route.php?action=sumar/1/2

// action          destino
//home             ShowHome()
//filtro/num           ShowFiltrar(:/num)
//
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'filtro': 
        if (isset($params[1])) {
            showFiltrar($params[1]); 
        } else {
            echo "no se encontro q filtrar"; 
        }
        break;
    case'lista':
        if(isset($params[1])){
        ShowLista($params[1]);
    }else{
        Showlista();
    }break;
    case 'home': 
        showHome(); 
        break;
    default: 
        echo('404 Page not found'); 
        break;
}


?>