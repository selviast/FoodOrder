
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Login </b>Food Ordering</a>
  </div>
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?= $this->session->flashdata('message')?>

      <form action="<?= base_url('auth');?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?= form_error('email','<small class="text-danger">', '</small>')?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password','<small class="text-danger">', '</small>')?>
        <div class="row">
          <div class="col-12">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
          <div class="col-4">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <p class="mb-1">
        <a href="<?//= base_url('auth/registration')?>">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<script type="text/javascript">
var flash = '<?php echo $this->session->flashdata('message')?>';
if(flash != ""){
  setTimeout(function(){    
    $("#notif").slideUp(1000, function(){ $(this).remove() });
  }, 2000);
}
</script>

