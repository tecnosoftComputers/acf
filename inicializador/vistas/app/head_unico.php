<style>
.sidenav {height: 100%;width: 0;position: fixed;z-index: 1;top: 0;left: 0;overflow-x: hidden;padding-top: 0px;transition: 0.5s;margin-top:-10px}
.sidenav a {padding: 8px 8px 8px 32px;text-decoration: none;color: #818181;display: block;transition: 0.3s;}
.sidenav a:hover {color: #f1f1f1;}
.sidenav .closebtn {position: absolute;top: 0;right: 25px;font-size: 36px;margin-left: 50px;}
#main {transition: margin-left .5s;padding: 20px;}
@media screen and (max-height: 450px) {.sidenav {padding-top: 15px;}.sidenav a {font-size: 18px;}}
</style>
<?php
    @session_start();
    if(isset($_SESSION['acfSession']["correo"]))  {
    }else{
        session_unset();
        session_destroy();
        header("../index.php?cid=ventas");
    }
?>
<?php 
    require_once FRONTEND_RUTA."controlador/conf.php";
    require_once FRONTEND_RUTA."datos/db/connect.php";
    require_once FRONTEND_RUTA."controlador/func.php";
    
    $cc = new DBSTART;
    $db = $cc->abrirDB();
    $cid      = $_SESSION['acfSession']['correo'];
    $user     = $_SESSION['acfSession']['usuario'];
    //$lasesion = $_SESSION['acfSession']['lasesion'];
    $id_empresa = $_SESSION['acfSession']['id_empresa'];
?>
 <?php
    $upd = $db->prepare("select * from usuarios_empresas eu inner join usuarios u on u.id_usuario = eu.id_user 
                inner join empresa e on e.id_empresa = eu.empresas where eu.id_user = '$user' AND eu.estado='A'");
    $upd->execute();
    $all_upd = $upd->fetchAll(PDO::FETCH_ASSOC);
    
    /******   E X T R A E R   L A     I D    D E   L A    E M P R E S A   ******/
    /*$buscar = $db->prepare("SELECT * FROM sesion_init WHERE num_sesion='$lasesion'");
    $buscar->execute();
    $all_buscar = $buscar->fetchAll(PDO::FETCH_ASSOC);

        foreach((array) $all_buscar as $data_buscar) {
            $elvalor    = $data_buscar['id_empresa'];
            $id_param   = $data_buscar['modulo'];
        }*/
        $sql = $db->prepare("SELECT * FROM empresa WHERE id_empresa='$id_empresa'");
        $sql->execute();
        $all_sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach( $all_sql as $newdata){
            $nombreacceso = $newdata['nombre_empresa'];
        }
        
    // Ver el config general
    $conf = $db->prepare("select * from config");
    $conf->execute();
    $all_conf = $conf->fetchAll(PDO::FETCH_ASSOC);

    // Ver los modulos selecionables
    $upde = $db->prepare("select * from usuarios_modulos eu inner join usuarios u on u.id_usuario = eu.id_user 
                            inner join config e on e.id_config = eu.modulos where eu.id_user = '$user' AND eu.estado='A'");
    $upde->execute();
    $all_upde = $upde->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>ACF</title>
    <link href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/metisMenu/metisMenu.min.css" rel="stylesheet" />
    <link href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet" />
    <link href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/dist/css/sb-admin-2.css" rel="stylesheet" />
    <link href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/dist/css/nativo.css" rel="stylesheet" />
    <link href="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/js/jquery-2.2.4.min.js"></script>
</head>
<body >
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="border-bottom:1px solid #b1d09e; margin-bottom: -60px">
    <div class="navbar-header"> 
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="">
            <form action="<?php echo PUERTO.'://'.HOST; ?>/controlador/c_sesion/generar.php" class="navbar-form" method="request">
                <select name="y" class="form-control" onchange='this.form.submit()' style="width: 200px;">
                    <?php foreach((array) $all_upde as $vale_conf) { ?>
                    <?php if ($id_param == $vale_conf['id_config']){ ?>
                            <option value="<?php echo $vale_conf['id_config'] ?>" style="font-size: 15px;" selected=""> <?php echo $vale_conf['name_access'] ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $vale_conf['id_config'] ?>" style="font-size: 15px;"> <?php echo $vale_conf['name_access'] ?></option>
                    <?php } } ?>
                    </select>
                <noscript><input type="submit" value="Submit" /></noscript>
            </form>
        </li>
        
        <li class="">
            <form action="<?php echo PUERTO.'://'.HOST; ?>/controlador/c_sesion/generar.php" class="navbar-form" method="request">
                <select name="x" class="form-control" onchange='this.form.submit()' style="width: 300px;">
                    <?php foreach((array) $all_upd as $vale) { ?>
                        <?php if ($elvalor == $vale['id_empresa']){ ?>
                        <option value="<?php echo $vale['id_empresa'] ?>" style="font-size: 15px;" selected=""> <?php echo $vale['nombre_empresa'] ?></option>
                    <?php }else{ ?>
                        <option value="<?php echo $vale['id_empresa'] ?>" style="font-size: 15px;"> <?php echo $vale['nombre_empresa'] ?></option>
                        <?php } } ?>
                </select>
                <noscript><input type="submit" value="Submit" /></noscript>
            </form>
        </li>
                <?php
                    // 1. Nivel de usuario o rol    2. Base de datos     3. Administración de entrada
                    head_inits($cid, $db,$id_param,$user); ?>
                
            <li><a><i class="fa fa-user"></i> <?php echo strtoupper($_SESSION['acfSession']["elrol"]);  ?> </a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-sign-in fa-fw"></i> <?php //echo $_SESSION['acfSession']["persona"]; ?>&nbsp;</a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href=""><?php echo strtoupper($_SESSION['acfSession']["persona"]); ?></a></li>
                        <li class="divider"></li> 
                        <li><a href="<?php echo PUERTO.'://'.HOST; ?>/datos/db/close.php"><i class="fa fa-sign-out fa-fw"></i> CERRAR SESIÓN</a></li>
                    </ul>
                </li>
            </ul>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="text-decoration:none"><i class="fa fa-times" style="font-size: 30px;"></i></a>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse"> 
                        <ul class="nav" id="side-menu">
                            <li><a href="../in.php?cid=dashboard/init"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                            <?php if ($_SESSION['acfSession']['correo'] == 1){
                                require_once FRONTEND_RUTA.INICIALIZADOR."permisos/seguridad.php";
                                require_once FRONTEND_RUTA.INICIALIZADOR."permisos/company.php";
                            }else{
                                require_once FRONTEND_RUTA.INICIALIZADOR."permisos/company.php";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-list-ul"></i></span>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</nav>
<br /><br /><br />