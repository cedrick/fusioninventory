<?php


	echo form_open(base_url() . 'admin_user/login');
	$username= array(
										'name' => 'username',
										'id'	 => 'username',
										'value'	 => ''
									);
									
	
									
 $password = array(
									 'name' => 'password',
									 'id'	 => 'password',
									 'value'	 => ''
									);


?>
<div class="login" style="margin-left:400px;">
<ul style="list-style:none;">
<div class="top" align="center" style="border-style:solid; border-color:#B7DDF2;"><font color="#FFFFFF" face="Arial">Admin&nbsp;Login</font></div>
<div class="logback" style="border-style:solid; border-color:#B7DDF2;">
<div class="welcome" align="center">
  <font color=#666666 face="Arial">
    Welcome to Fusion Equipments Inventory System. To continue, please input your username and password. 
  </font>
</div>
<br />
<table align="center">

  <tr>
    <td>
      <label><font face="Arial">Username</font></label>
    </td>
    <td>
      <li>
          <div>
            <?php echo form_input($username); ?>
          </div>
       </li>
    </td>
  </tr>
  <tr>
    <td>
      <label><font face="Arial">Password</font></label>
    </td>
    <td>
     <li>
        <div>
          <?php echo form_password($password); ?>
        </div>
   		</li>
    </td>
  </tr>
  <tr>
  <td>
  </td>
    <td>  
       <li>
        <div>
          <?php echo form_submit(array('name' => 'submit_name', 'id' => 'submit_id', ), 'Login'); ?>
           <font color="#AA0000" face="Arial">
            <?php echo validation_errors(); ?>
          </font>
        </div>
     	</li>
     </td>
   </tr>
</table>
</div>
</ul>
</div>
      
<?php echo form_close(); ?>

<br /><br />
