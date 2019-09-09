<style>.unselectable{background-color: #ddd;cursor: not-allowed;}
.sidenav {height: 100%;width: 0;position: fixed;z-index: 1;top: 0;left: 0;overflow-x: hidden;padding-top: 0px;transition: 0.5s;margin-top:-10px; background-color:#ccc;}
.sidenav a {padding: 8px 8px 8px 32px;text-decoration: none;color: #818181;display: block;transition: 0.3s;}
.sidenav a:hover {color: #f1f1f1;}
.sidenav .closebtn {position: absolute; top: 0;right: 0px;font-size: 36px;margin-left: 50px;}
#main {transition: margin-left .5s;padding: 20px;}
@media screen and (max-height: 450px) {.sidenav {padding-top: 15px;}.sidenav a {font-size: 18px;}
 }
</style>

<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>ACF</title>
    <link href="<?php echo PUERTO."://".HOST;?>/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo PUERTO."://".HOST;?>/css/metisMenu/metisMenu.min.css" rel="stylesheet" />
    <link href="<?php echo PUERTO."://".HOST;?>/css/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="<?php echo PUERTO."://".HOST;?>/css/datatables-responsive/dataTables.responsive.css" rel="stylesheet" />
    <link href="<?php echo PUERTO."://".HOST;?>/css/sb-admin-2.css" rel="stylesheet" />
    <link href="<?php echo PUERTO."://".HOST;?>/css/nativo.css" rel="stylesheet" />
    <link href="<?php echo PUERTO."://".HOST;?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo PUERTO."://".HOST;?>/css/morrisjs/morris.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo PUERTO."://".HOST;?>/css/sweetalert.css">
    <link rel="stylesheet" href="<?php echo PUERTO."://".HOST;?>/css/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo PUERTO."://".HOST;?>/css/style.css">
    <link rel='stylesheet' href='<?php echo PUERTO."://".HOST;?>/css/bootstrap-select.min.css'>
    <link rel="stylesheet" href="<?php echo PUERTO."://".HOST;?>/css/jquery-ui.min.css">
    <?php
        if (isset($template_css) && is_array($template_css)){
            foreach($template_css as $file_css){
                if(!empty($file_css)){
                    echo '<link rel="stylesheet" href="'.PUERTO.'://'.HOST.'/css/'.$file_css.'.css">';
                }
            }  
        }
    ?>
</head>
</script>
<body>

<?php if($menu != ''){
    echo $menu;
    echo '<br/><br/><br/>'; 
} ?>
