<?php 
namespace App\classes;

use App\classes\Database;
class Login{

public function loginCheck($data){
    $username = $data['username'];
    $password =$data['password'];
    $sql = "SELECT * FROM users WHERE username='$username' AND password= '$password' ";
   $result = mysqli_query(Database::dbCon(),$sql);


 if($result){
    if(mysqli_num_rows($result) ==1){
     
        $row = mysqli_fetch_assoc($result);
       session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['user_name'] = $row['username'];
    echo "<script>window.location.href='index.php';</script>";
  
    }else{
        $loginError = "Username or Password Invalid";
        return $loginError;
    }
  }else{
      die();
  }

}
}
?>