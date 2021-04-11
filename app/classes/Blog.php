<?php 
namespace App\classes;
use App\classes\Database;
class Blog{
    public function addBlog($data){
       $file_name = $_FILES['photo']['name'];
       $fileex = explode('.',$file_name);
       $fileex2 = end($fileex);
       $file_name = date('Ymdhis. ').$fileex2;
       $name = $_SESSION['name'];
        $title = $data['title'];
        $content = $data['content'];
        $cat_id = $data['cat_id'];
       $status = $data['status'];  
        $sql ="INSERT INTO new_blog ( cat_id, title, content, photo, name, status) VALUES('$cat_id','$title','$content','$file_name','$name','$status') ";
     $result = mysqli_query(Database::dbCon(),$sql);
     if($result){
         move_uploaded_file($_FILES['photo']['tmp_name'],'../uploads/'.$file_name);
         $insert_msg = "Blog Save SUccess";
         return $insert_msg;
     }else{
        $insert_msg = "Blog Not Save";
        return $insert_msg;
     }
    }

    public function updateBlog($data){
        $file_name = $_FILES['photo']['name'];
        $fileex = explode('.',$file_name);
        $fileex2 = end($fileex);
        $file_name = date('Ymdhis. ').$fileex2;
        $name = $_SESSION['name'];
         $title = $data['title'];
         $content = $data['content'];
         $cat_id = $data['cat_id'];
        $status = $data['status']; 
        $id = $_POST['id'];
        if($_FILES['photo']['name']==NULL){
            $sql = "UPDATE `new_blog` SET `cat_id` = '$cat_id',`title`= '$title',`content`= '$content',`name`= '$name',`status`='$status' WHERE `id`='$id'";
        }else{
        $file_name = $_FILES['photo']['name'];
        $fileex = explode('.',$file_name);
        $fileex2 = end($fileex);
        $file_name = date('Ymdhis. ').$fileex2;
        $sql = "UPDATE `new_blog` SET `cat_id` = '$cat_id',`title`= '$title',`content`= '$content',`photo`= '$file_name',`name`= '$name',`status`='$status' WHERE `id`='$id'";
        move_uploaded_file($_FILES['photo']['tmp_name'],'../uploads/'.$file_name);
        }

     $result = mysqli_query(Database::dbCon(),$sql);
     if($result){
        header('location:edit-blog.php?id=' .$id);
     }else{
        header('location:edit-blog.php?id=' .$id);
     }
    }


    public function allBlog(){
        $result =  mysqli_query(Database::dbCon(),"SELECT new_blog.*,category.category_name
        FROM new_blog
        INNER JOIN category ON new_blog.cat_id = category.id ORDER BY id DESC");
        return $result;
        }

        public function  active($id){
            mysqli_query(Database::dbCon(),"UPDATE new_blog SET  status = 1 WHERE id= '$id' ");
        }
        public function  inactive($id){
            mysqli_query(Database::dbCon(),"UPDATE new_blog SET  status = 0 WHERE id= '$id' ");
        }
        public function  delete($id){
            mysqli_query(Database::dbCon(),"DELETE FROM new_blog  WHERE id= '$id' ");
        }
    
        public function selectRow($id=' '){
            return  mysqli_query(Database::dbCon(),"SELECT * FROM  new_blog WHERE id = '$id' ");
            
             }

 }
?>