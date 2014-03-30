   <div class="loginrow row">
   	<div class="col-sm-3"></div>
   	<div class="col-sm-6">

   		<?php echo form_open("handler/login");?>

   		<?php if($error){ ?>
   		<div class="alert alert-danger">
   			<strong>Oh snap!</strong> Wrong email/password. Try again.
   		</div>

   		<?php } ?>


   		<?php if($required){ ?>
   		<div class="alert alert-info">
   			<strong>Hey there!</strong> You need to login to complete the operation.
   		</div>

   		<?php } ?>

   		<?php if($loggedIn){ ?>
   		<div class="alert alert-info">
   			You are already logged in as <strong><?php echo $loggedUser;?></strong>. You can log in as a different user.
   		</div>

   		<?php } ?>

   		<div class="input-group input-group-md">
   			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
   			<input type="text" name='email' class="form-control" placeholder="Email">
   		</div>

   		<div class="input-group input-group-md">
   			<span class="input-group-addon"><i class="fa fa-key"></i></span>
   			<input type="password" name='password' class="form-control" placeholder="Password">
   		</div>

   		<div class="bottompanel">
   			<a class="btn btn-lg btn-info" value='I am new' href='<?php echo base_url();?>register'>I am new</a>
   			<input class="btn btn-lg btn-info" value='Login' type='submit' /><br>
   		<!-- 	<a href="#">Forgot Password?</a> -->



   		</div>

   		<?php echo form_input(array('name'=>'redirect_url', 'value'=> $redirect_url, 'type'=>'hidden'));?>

   	</form>

   </div>
   <div class="col-sm-3"></div>
</div>