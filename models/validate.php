<?php




  
class Validate {  
    public function validate_create_user($username, $email, $mobile, $password, $date_of_birth ){
        $errormsg='';
        
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errormsg.= "Please fill in the email correctly.<br/>";
        }
        
        if (! preg_match ( "/^[0-9+ ]{8,}$/", $mobile )) {
        $errormsg.= "Please fill in the mobile number correctly.<br/>";
        }
        
        
        if (strlen($password) < 8 || strlen($password) > 16) {
            $errormsg.= "Password should be min 8 characters and max 16 characters<br/>";
        }
        if (!preg_match("/\d/", $password)) {
            $errormsg.= "Password should contain at least one digit<br/>";
        }
        if (!preg_match("/[A-Z]/", $password)) {
            $errormsg.= "Password should contain at least one Capital Letter<br/>";
        }
        if (!preg_match("/[a-z]/", $password)) {
            $errormsg.= "Password should contain at least one small Letter<br/>";
        }
        if (!preg_match("/\W/", $password)) {
            $errormsg.= "Password should contain at least one special character<br/>";
        }
        if (preg_match("/\s/", $password)) {
            $errormsg.= "Password should not contain any white space<br/>";
        }
        
        
        
        
        return $errormsg;
        
    }  
    
   
    
    
    
    
    
      
      
}  
?>