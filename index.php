<?php

$controller = 'classlogin';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "controller/".$controller."controller.php";//Llama al controller y busca con la variable de REQUEST de controller que sea extension .php
    $controller = ucwords($controller) . 'Controller';//En el parametro que se asigna a la variale controller el primer caracter de la letra es en mayuscula
    $controller = new $controller;// Asigna un nueva instancia a la variable controller
    $controller->Index();//El controller se referencia al metodo index
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $metodo = isset($_REQUEST['m']) ? $_REQUEST['m'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/".$controller."controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // ejecuta la accion del contralador
    call_user_func( array( $controller, $metodo ) );
}