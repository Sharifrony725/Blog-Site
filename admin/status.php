<?php 
require_once '../vendor/autoload.php';
$cat = new \App\classes\Category();
$blog = new \App\classes\Blog();
    if(isset($_GET['active'])&& isset($_GET['cat'])){
        $id = $_GET['id'];
        $cat->active($id);
        echo "<script>window.location.href='manage-category.php';</script>";
        
    }

        if(isset($_GET['inactive'])&& isset($_GET['cat'])){
            $id = $_GET['id'];
            $cat->inactive($id);
            echo "<script>window.location.href='manage-category.php';</script>";
        }
    //echo "<script>window.location.href='manage-category.php';</script>";
    if(isset($_GET['active'])&& isset($_GET['blog'])){
        $id = $_GET['id'];
        $blog->active($id);
        echo "<script>window.location.href='manage-blog.php';</script>";
        
    }

        if(isset($_GET['inactive'])&& isset($_GET['blog'])){
            $id = $_GET['id'];
            $blog->inactive($id);
            echo "<script>window.location.href='manage-blog.php';</script>";
        }
?>