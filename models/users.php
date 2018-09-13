<?php
include_once 'models/database.php';

class users {  
    public $db;
    public $username;  
    public $email;  
    public $mobile;
    public $password;
    public $date_of_birth;
     
      
    public function __construct(/*$username, $email, $mobile, $password, $date_of_birth*/ )    
    {    
        
         
        
       // $this->username = $username;  
       // $this->email = $email;  
       // $this->mobile = $mobile;
       // $this->password = $password;  
       // $this->date_of_birth = date('Y-m-d', strtotime($date_of_birth));  
        $this->db = new DBModel();
        $this->db->connectDB();
        
    }   
    
    
    
    
    
    public function create_user($username, $email, $mobile, $password, $date_of_birth ){
        
        $date_of_birth = date('Y-m-d', strtotime($date_of_birth));  
        
        $password= password_hash($password, PASSWORD_DEFAULT);
        
        
        $sql='insert into sasa_db.user (user_name,email,mobile,password,date_of_birth,create_time) value 
            ("'.$username.'","'.$email.'","'.$mobile.'","'.$password.'","'.$date_of_birth.'", now() ) ';
        
        
        $this->db->execBySQL($sql);
    }
    
    
    
    public function search_user($email){
        $sql = 'SELECT * FROM sasa_db.user where email="'.$email.' "';
        
        $data = $this->db->selectBySQL($sql);
        return $data;
    }
    
    /*
    public function auth_user($email,$password){
        
        
        $sql = 'SELECT * FROM sasa_db.user where email="'.$email.'" ';
        $data = $this->db->selectBySQL($sql);
        return $data;
        
    }
    */
    
    
    
}  

?>