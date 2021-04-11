<?php 
namespace App\classes;
use App\classes\Database;
class Category{
    public function addCategory($data){
        $category_name = $data['category_name'];
        $status = $data['status'];
        $sql = "INSERT INTO category(category_name, status) VALUES ('$category_name','$status')";
     $result = mysqli_query(Database::dbCon(),$sql);
     if($result){
         $insert_msg = "Category Save Success";
         return $insert_msg;
     }else{
        $insert_msg = "Category Not Save";
        return $insert_msg;
     }
    }

    public function updateCategory($data){
        $category_name = $data['category_name'];
        $status = $data['status'];
        $id = $data['id'];
        $sql = "UPDATE  category SET category_name = '$category_name', status = '$status' WHERE id = '$id' ";
     $result = mysqli_query(Database::dbCon(),$sql);
     if($result){
        header('location:edit-category.php?id=' .$id);
     }else{
        header('location:edit-category.php?id=' .$id);
     }
    }

    public function selectRow($id=' '){
   return  mysqli_query(Database::dbCon(),"SELECT * FROM  category WHERE id = '$id' ");
   
    }

public function allCategory(){
$result =  mysqli_query(Database::dbCon(),"SELECT * FROM  category ");
return $result;
}   

public function allActiveCategory(){
    $result =  mysqli_query(Database::dbCon(),"SELECT * FROM  category WHERE status = 1 ");
    return $result;
    }
public function allActivePost(){
        $result =  mysqli_query(Database::dbCon(),"SELECT * FROM  new_blog WHERE status = 1 ORDER BY id DESC");
        return $result;
        }

        public function searchPost($text){
            $result =  mysqli_query(Database::dbCon(),"SELECT * FROM  new_blog WHERE content LIKE '%$text%' and status = 1 ORDER BY id DESC");
            return $result;
            }

        public function catPost($id){
            $result =  mysqli_query(Database::dbCon(),"SELECT * FROM  new_blog WHERE status = 1 and cat_id ='$id' ORDER BY id DESC");
            return $result;
            }

    public function  active($id){
        mysqli_query(Database::dbCon(),"UPDATE category SET  status = 1 WHERE id= '$id' ");
    }
    public function  inactive($id){
        mysqli_query(Database::dbCon(),"UPDATE category SET  status = 0 WHERE id= '$id' ");
    }
    public function  delete($id){
        mysqli_query(Database::dbCon(),"DELETE FROM category  WHERE id= '$id' ");
    }
    public function singlePost($id){
        return  mysqli_query(Database::dbCon(),"SELECT * FROM  new_blog WHERE id = '$id'");
    }


}
?>