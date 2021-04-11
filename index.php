<?php 
require_once 'vendor/autoload.php';
$cat = new \App\classes\Category();
$category =  $cat->allActiveCategory();
$post =  $cat->allActivePost();
?>
<?php include "header.php";?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
 
      <div class="col-md-8">

        
        <?php if(isset($_GET['search'])){
          $search = $_GET['search'];
          $search = $cat->searchPost($search);
          if(mysqli_num_rows($search) > 0){
          while($row3 = mysqli_fetch_assoc($search)){?>
      <div class="card mb-4">
          
          <img class="card-img-top" src="uploads/<?= $row3['photo']?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?= $row3['title']?></h2>
            <p class="card-text"><?= substr($row3['content'],0, 250)?>... </p>
            <a href="post.php?id=<?= $row3['id']?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?= date('d M Y',strtotime($row3['createtime'])) ?> by
            <a href="#"><?= $row3['name']?></a>
          </div>
        
        
        </div>

         <?php    
         }
        }else{
          echo '<h1 class="my-4 text-center" >Not Found!</h1>';
        }

          }else{?>

        <?php 
        while($row1 = mysqli_fetch_assoc($post)){?>

        <!-- Blog Post -->
        <div class="card mb-4">
     
          <img class="card-img-top" src="uploads/<?= $row1['photo']?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?= $row1['title']?></h2>
            <p class="card-text"><?= substr($row1['content'],0, 250)?>... </p>
            <a href="post.php?id=<?= $row1['id']?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?= date('d M Y',strtotime($row1['createtime'])) ?> by
            <a href="#"><?= $row1['name']?></a>
          </div>
        
       
        </div>
        <?php } ?>
      
        <?php  } ?>

      </div>
      
<?php include "widget.php";?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

 <?php include "footer.php"; ?>