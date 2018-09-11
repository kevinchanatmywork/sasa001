<?php
        // put your code here
        include_once("models/model.php");  
  
class Page_Controller {  
     public $model;   
  
     public function __construct()    
     {    
          $this->model = new Model();  
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
            $error_msg = $this->model->validate_create_user($_POST['user_name'], $_POST['email'], $_POST['mobile'], $_POST['password'], $_POST['dob']);
            
        }
        
        echo $error_msg;
         include 'views/header.php';
        
        switch ($page) {
            case "login"                : include 'views/login_detail.php';
                break;
            case "create_account"       : include 'views/create_account.php';                
                break;
            default                     : include 'views/login_form.php';
        }
            
        
        
        
        include 'views/footer.php';
         /*
          if (!isset($_GET['page']))  
          {  
               // no special book is requested, we'll show a list of all available books  
               $books = $this->model->getBookList();  
               include 'views/booklist.php'; 
          } 
          else 
          { 
               // show the requested book 
               $book = $this->model->getBook($_GET['book']); 
               include 'views/viewbook.php';  
          }
          */
     }  
}  
?>
   