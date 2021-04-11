<?php 
require_once '../vendor/autoload.php';
$cat = new \App\classes\Category();
$blog = new \App\classes\Blog();
if(isset($_GET['cat'])){
    $id = $_GET['id'];
    $cat->delete($id);
    echo "<script>window.location.href='manage-category.php';</script>";

}
if(isset($_GET['blog'])){
    $id = $_GET['id'];
    $blog->delete($id);
    echo "<script>window.location.href='manage-blog.php';</script>";

}
?>