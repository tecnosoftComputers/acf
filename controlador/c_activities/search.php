<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
  	require_once ("../../datos/db/connect.php");
  	$env = new DBSTART;
  	$db = $env->abrirDB();
          
    if (isset($_POST['ss'])){
    	$nn = $_POST['number'];

    	$sql = $db-

    }