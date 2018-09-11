<?php

class users {  
    public $username;  
    public $email;  
    public $mobile;
    public $password;
    public $date_of_birth;
      
    public function __construct($username, $email, $mobile, $password, $date_of_birth )    
    {    
        $this->username = $username;  
        $this->email = $email;  
        $this->mobile = $mobile;
        $this->password = $password;  
        $this->date_of_birth = $date_of_birth;  
    }   
    
    
    
    
}  

?>