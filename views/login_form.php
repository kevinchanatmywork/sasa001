

<div class="form">
<h1>Login</h1>

<form id="form_login" method="post" action="" autocomplete="off">


<div>
    <div class="row">
        <div class="text_static">Email</div>
        <div class="text_field"><input type="text" name="email" style="width:80%;" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/></div>
    </div>
    
    <div class="row">
        <div class="text_static">Password</div>
        <div class="text_field"><input type="text" name="password" style="width:80%;" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"/></div>
    </div>
</div>
    
    <div class="row"><?php echo $error_msg; ?></div>
<div class="row">
<input  type="submit" name="login" value="submit"/>
<input  type="hidden" name="page" value="login"/>
</div>
    
</form>




<form id="form_login" method="post" action="" autocomplete="off">

<input type="submit" name="create" value="Create New Account"/>
<input type="hidden" name="page" value="create_account"/>
<input type="hidden" name="action" value="summary"/>
</form>
</div>