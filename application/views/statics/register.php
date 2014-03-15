   <div class="loginrow row">
   	<div class="col-sm-3"></div>
   	<div class="col-sm-6">

   		<?php echo form_open("handler/register", array('id'=>'registrationForm'));?>

   	

   		<div class="input-group input-group-md">
   			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
   			<input type="text" name='email' class="form-control" placeholder="Email">
   		</div>

   		<div class="input-group input-group-md">
   			<span class="input-group-addon"><i class="fa fa-key"></i></span>
   			<input id='password' type="password" name='password' class="form-control" placeholder="Password">
   		</div>

        <div class="input-group input-group-md">
          <span class="input-group-addon"><i class="fa fa-key"></i></span>
          <input type="password" class="form-control" name='password_repeat' placeholder="Password Again">
       </div>

       <div style='margin-top:30px' class="input-group input-group-md">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" class="form-control" name='name' placeholder="Your Name">
       </div>

       <div class="input-group input-group-md">
          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
          <input type="text" class="form-control" name='contact' placeholder="Contact no.">
       </div>

        <div class="bottompanel">
                <input class="btn btn-lg btn-info" value='Register' type='submit' />
                  
                </div>

      

   </form>

</div>
<div class="col-sm-3"></div>
</div>