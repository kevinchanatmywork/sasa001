

<div class="form">
<h1>Login Detail</h1>

<form id="form_login" method="post" action="" autocomplete="off">


<div>
    <div class="row">
<input  type="submit" name="login" value="Back"/>
<input  type="hidden" name="page" value="main"/>
<input  type="hidden" name="action" value="summary"/>
<input  type="hidden" name="email" value="<?php echo $auth_result[0]['email'];?>"/>
<input  type="hidden" name="password" value=""/>
</div>
    
    
    <div class="row">
        <div class="text_static">Username</div>
        <div class="text_field"><?php echo $auth_result[0]['user_name'];?></div>
    </div>
    
    <div class="row">
        <div class="text_static">Email</div>
        <div class="text_field"><?php echo $auth_result[0]['email'];?></div>
    </div>
    
    <div class="row">
        <div class="text_static">Mobile</div>
        <div class="text_field"><?php echo $auth_result[0]['mobile'];?></div>
    </div>
    
   
    
    <div class="row">
        <div class="text_static">Date of Birth</div>
        <div class="text_field"><?php echo $auth_result[0]['date_of_birth'];?></div>
    </div>
</div>

    
</form>



</div>