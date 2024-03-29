<?php
 session_start();
 require_once ("datos/db/connect.php");
 require_once ("controlador/func.php");
 $message = "";

try {
      if(isset($_POST["login"])){
           if(empty($_POST["username"]) || empty($_POST["password"])){
                $message = '<label>All fields are required</label>';
           }else{
                $query = DBSTART::abrirDB()->prepare(
                        "SELECT  u.id_usuario, u.correo,u.passw,u.estado,u.position,u.role,u.namesurname
                            FROM usuarios u INNER JOIN usuarios_empresas ue ON u.id_usuario = ue.id_user
                                  WHERE u.correo=:correo AND u.passw=:passw AND u.estado = 'A'");
                $query->execute(
                     array(
                              'correo' =>       $_POST["username"],
                              'passw'  =>       sha1($_POST["password"])
                          )
                );
                $count = $query->rowCount();
                $empresa = $query->fetch();

                if($count > 0){
                  $sql = DBSTART::abrirDB()->prepare("SELECT DISTINCT count(num_sesion) as contador FROM sesion_init");
                    $sql->execute();
                    $cant = $sql->fetchAll(PDO::FETCH_ASSOC);

                    foreach((array) $cant as $val) {
                        echo $sesiones = $val['contador'];
                        $sesiones = $sesiones + 1;
                    }exit;
                    $_SESSION["correo"]      = $empresa["position"];
                    $_SESSION["usuario"]     = $empresa["id_usuario"];
                    $_SESSION["elrol"]       = $empresa["role"];
                    $_SESSION["persona"]     = $empresa["namesurname"];
                    // Nuevo iniciar con la empresa
                    //$_SESSION["empresas"]    = $empresa["id_empresa"];
                    
                    $estado = 'I'; // ultimo cambio
                    la_sesion($sesiones, $_SESSION["usuario"], $estado, DBSTART::abrirDB());

                    // generar un clave encriptada de sesion para extreerla
                    $solucion = DBSTART::abrirDB()->prepare("SELECT * FROM sesion_init WHERE num_sesion='$sesiones'");
                    $solucion->execute();
                    $ext = $solucion->fetchAll(PDO::FETCH_ASSOC);

                    foreach((array) $ext as $premier) {
                      $premier_sesion = $premier['num_sesion'];
                      $id_empresa = $premier['id_empresa'];
                    }
                    
                    $_SESSION['lasesion'] = $premier_sesion;
                    $_SESSION["id_empresa"] = $id_empresa;

                    // Crud -> Insert quien inicio sesion a la tabla sesion
                    
                    header("location:inicializador/vistas/app/in.php");
                }else {
                     $message = '<div class="alert alert-danger">Datos Incorrectos</div>';  
                }
           }
      }
 }
 catch(PDOException $error){
      $message = $error->getMessage();
 }
 ?>
 <!DOCTYPE html>  
 <html style="">
      <head>
           <title>LOGIN | ACF</title>  
      </head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
  <script>
 /* grecaptcha.ready(function() {
      grecaptcha.execute('reCAPTCHA_site_key', {action: '?cid=init/view_voucher'}).then(function(token) {
         ...
      });
  });*/
  </script>
<style>
.login-block{background: white;  /* fallback for old browsers */width:100%;padding : 25px 0; height: 100%; margin:0 auto}
.banner-sec{background:url(inicializador/img/logoinicial.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
.container{background:#fff; border-radius: 10px; box-shadow: 5px 10px 5px 10px #1e6cb6;}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}

body {
 /*background: url(inicializador/imagen/logoin.jpg)no-repeat; background-size: cover*/
}
/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;-webkit-transform: translate3d(0, -100%, 0);transform: translate3d(0, -100%, 0);}
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;-webkit-transform: translate3d(0, -100%, 0);transform: translate3d(0, -100%, 0);}
  100% {
    opacity: 1;-webkit-transform: none;transform: none;}
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;-webkit-animation:fadeIn ease-in 1;-moz-animation:fadeIn ease-in 1;animation:fadeIn ease-in 1;
  -webkit-animation-fill-mode:forwards;-moz-animation-fill-mode:forwards;animation-fill-mode:forwards;
  -webkit-animation-duration:1s;-moz-animation-duration:1s;animation-duration:1s;
}
</style>
<body>

<section class="login-block fadeInDown">
    <div class="container">
    <div class="col-lg-12">
  <div class="row">
    
    <div class="col-md-4 login-sec">
        <h2 class="text-center">Login Now</h2>
         
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="login-form" method="post">
          <?php if(isset($message)){ echo '<label class="text-danger">'.$message.'</label>'; }?>
          <div class="form-group">
            <label for="exampleInputEmail1" class="">Usuario</label>
            <input type="text" class="form-control" placeholder="" name="username" />
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="">Password</label>
            <input type="password" class="form-control" placeholder="" name="password" />
          </div>

            <div class="form-check">
            <!--<label class="form-check-label">
              <input type="checkbox" class="form-check-input">
              <small>Remember Me</small>
            </label>-->
            <button type="submit" class="btn btn-login float-right" name="login" onclick="asd(1)">Enter</button><br />
          </div>
      </form>      
      
<div class="copy-text"> <a href="../../" target="_blank">Tecnosoft Computers</a> Copyrights &copy; All Rights Reserved 2019</div>
    </div>
    <div class="col-md-8 banner-sec">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <!--<img class="d-block img-fluid" src="inicializador/img/image001.png" alt="First slide">-->
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Sistema ACF en desarrollo</h2>
            <p></p>
        </div> 
  </div>
    </div>
            </div>
    </div>
  </div>
  </div>
</div>
</section>
      </body>
 </html>