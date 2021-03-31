<?php  
namespace App\classes; 
class Database{
    public static function dbCon(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "blog";
      $link = mysqli_connect($host,$user,$pass,$db);
      return $link;
    }
}
?>