<?php
        // put your code here
        include_once("models/validate.php");  
        include_once("models/users.php");  
  
class Page_Controller {  
     public $validate;   
     public $user;
  
     public function __construct()    
     {    
          $this->validate = new Validate();  
            $this->user = new users();
     }   
      
     public function invoke()  
     {  
        $page='';
        $action='';
        $error_msg='';
        if (isset($_POST['page']))  {
            $page=$_POST['page'];
        }
        if (isset($_POST['action']))  {
            $action=$_POST['action'];
        }
        
        
        
        if ($page == 'create_account' && $action=='submit'){
            $error_msg = $this->validate->validate_create_user($_POST['user_name'], $_POST['email'], $_POST['mobile'], $_POST['password'], $_POST['dob']);
            if($error_msg == ""){
              
                $search_user_result = $this->user->search_user($_POST['email']);
                if(sizeof($search_user_result)>0){
                    $error_msg.='Email exists in our database';
                }
                if ($error_msg == ""){
                $this->user->create_user($_POST['user_name'], $_POST['email'], $_POST['mobile'], $_POST['password'], $_POST['dob']);   
                $page='create_successful';
                }
            }
        }
        
        if ($page == 'login'){
            
            $auth_result = $this->user->search_user($_POST['email']);
            if (sizeof($auth_result)<=0){
                $error_msg.='please input correct username';
                $page='main';   
            } else{
                if( password_verify($_POST['password'], $auth_result[0]['password']) == FALSE ){
                    $error_msg.='please input correct password.';
                    $page='main';   
                }
                
                
                
                
            }
        }
         include 'views/header.php';
        
        switch ($page) {
            case "login"                : include 'views/login_detail.php';
                break;
            case "create_account"       : include 'views/create_account.php';                
                break;
            case "create_successful"    : include 'views/create_successful.php';                
                break;
            default                     : include 'views/login_form.php';
        }
         include 'views/footer.php';
     }  
}  
?>
   