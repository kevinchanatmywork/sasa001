<?php


include_once("model/user.php");

  
class Model {  
    public function validate_create_user($username, $email, $mobile, $password, $date_of_birth ){
        $errormsg='';
        
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errormsg.= "Please fill in the email correctly.<br/>";
        }
        
        if (! preg_match ( "/^[0-9+ ]{8,}$/", $mobile )) {
        $errormsg.= "Please fill in the mobile number correctly.<br/>";
        }
        
        return $errormsg;
        
    }  
    public function validate()  
    {  
        // here goes some hardcoded values to simulate the database  
        return array(  
            "Jungle Book" => new Book("Jungle Book", "R. Kipling", "A classic book."),  
            "Moonwalker" => new Book("Moonwalker", "J. Walker", ""),  
            "PHP for Dummies" => new Book("PHP for Dummies", "Some Smart Guy", "")  
        );  
    }  
      
    public function getBook($title)  
    {  
        // we use the previous function to get all the books and then we return the requested one.  
        // in a real life scenario this will be done through a db select command  
        $allBooks = $this->getBookList();  
        return $allBooks[$title];  
    }  
      
      
}  
?>