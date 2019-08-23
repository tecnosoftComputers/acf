<?php
@session_start();
    //if (isset($_REQUEST['y'])) { // CAMBIO DE MODULO
            $num = $_REQUEST['y'];
            $num2 = $_REQUEST['x'];
            require_once ("../../datos/db/connect.php");
        	require_once ("../../controlador/conf.php");
        	$env = new DBSTART;
        	$cc = $env->abrirDB();

            $lasesion  = $_SESSION['lasesion'];
            $usuario = $_SESSION['usuario'];

            $sql = $cc->prepare("UPDATE sesion_init SET modulo='$num', id_empresa='$num2'  WHERE num_sesion='$lasesion'");

            if ($sql -> execute() ) {

                if($num==3){
                    header('location: ../../newStructure/'); 
                    exit;
                }else{
                    echo '<script type="text/javascript">
                        window.location.href = "../../inicializador/vistas/app/in.php";
                      </script>';
                }

            }else{
                echo '<div class="alert alert-danger">
                        <b>Error al generar!</b>
                      </div>';
            }
    //}

    /*if (isset($_REQUEST['x'])){ // CAMBIO DE EMPRESA
        $num = $_REQUEST['x'];
        require_once ("../../datos/db/connect.php");
        require_once ("../../controlador/conf.php");
        $env = new DBSTART;
        $cc = $env->abrirDB();

        $usuario    = $_SESSION['usuario'];
        $lasesion   = $_SESSION['lasesion'];

        $sql = $cc->prepare("UPDATE sesion_init SET id_empresa='$num' WHERE num_sesion='$lasesion'");

        if ($sql -> execute() ) {

            if($num==3){
                header('location: ../../newStructure/'); 
                exit;
            }else{
                echo '<script type="text/javascript">
                    window.location.href = "../../inicializador/vistas/app/in.php";
                  </script>';
            }

        }else{
            echo '<div class="alert alert-danger">
                    <b>Error al generar!</b>
                  </div>';
            }
    }*/