

<div class="form">
<h1>Create Account</h1>

<div>
    <div class="row">
    <form  method="post" action="" autocomplete="off">
        <input  type="submit" name="login" value="Back"/>
        <input  type="hidden" name="page" value="main"/>
        <input type="hidden" name="action" value="summary"/>
    </form>
    </div>
    <?php echo $error_msg; ?>
    <form id="form_create" method="post" action="" autocomplete="off">
        <input type="hidden" name="page" value="create_account"/>
        <input type="hidden" name="action" value="submit"/>
        
    <div class="row">
        <div class="text_static">Name</div>
        <div class="text_field"><input type="text" name="user_name" style="width:80%;"  value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name'];  ?>"/></div>
    </div>
    <div class="row">
        <div class="text_static">Email</div>
        <div class="text_field"><input type="text" name="email" style="width:80%;" placeholder="eg: apple@abc.com" value="<?php if(isset($_POST['email'])) echo $_POST['email'];  ?>" /></div>
    </div>
    
    <div class="row">
        <div class="text_static">Mobile</div>
        <div class="text_field"><input type="text" name="mobile" style="width:80%;" placeholder="8 Digit Mobile Number" value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile']; ?>"/></div>
    </div>
    <div class="row">
        <div class="text_static">Password</div>
        <div class="text_field"><input type="text" name="password" style="width:80%;" value="<?php if(isset($_POST['password'])) echo $_POST['password'];  ?>" /></div>
    </div>
     <div class="row">
        <div class="text_static">Date of Birth</div>
        <div class="text_field"><input type="text" name="dob" id="datepicker" readonly style="width:80%;" value="<?php if(isset($_POST['dob'])) echo $_POST['dob']; ?>" /></div>
    </div>

    <div class="row">
        <input class="login_button" type="submit" name="submit" value="submit"/>
    </div>
    
    </form>
</div>

</div>