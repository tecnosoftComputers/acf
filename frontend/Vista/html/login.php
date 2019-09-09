<section class="login-block ">
  <div class="container">
    <div class="col-lg-offset-1 col-lg-10">
      <div class="border_login">
        <div class="row">
          <div class="col-md-5 login-sec">
            <h2 class="text-center">Login Now</h2>

            <form action = "<?php echo PUERTO."://".HOST;?>/login/" method = "post" id="form-login" name="form-login" autocomplete="off">
              <?php if(isset($message)){ echo '<label class="text-danger">'.$message.'</label>'; }?>
              <div class="form-group">
                <label for="exampleInputEmail1" class="">User</label>
                <input type="text" class="form-control" placeholder="" name="username" id="username" />

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1" class="">Password</label>
                <input type="password" class="form-control" placeholder="" name="password" id="password" />
              </div>

              <div class="form-check">
                <button id="login" type="submit" class="btn btn-login">Login</button><br />
              </div>
            </form>      
            <br><br>
            <div class="copy-text"> 
              <a href="<?php echo PUERTO.'://'.HOST.'/'; ?>" target="_blank">Tecnosoft Computers</a> Copyrights &copy; All Rights Reserved 2019
            </div>
          </div>
          <div class="col-md-7 banner-sec">
            <img width="100%" src="<?php echo PUERTO.'://'.HOST.'/imagenes/logoinicial.jpg'; ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
