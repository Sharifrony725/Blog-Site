<?php 
require_once 'vendor/autoload.php';
$cat = new \App\classes\Category();
$category =  $cat->allActiveCategory();
$getId = $_GET['id'];
$singlePost = $cat->singlePost($getId);
$post = mysqli_fetch_assoc($singlePost);


?>
<?php include "header.php";?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">
        </h1>

        <!-- Blog Post -->
        <div class="card mb-4">
     
     <img class="card-img-top" src="uploads/<?= $post['photo']?>" alt="Card image cap">
     <div class="card-body">
       <h2 class="card-title"><?= $post['title']?></h2>
       <p class="card-text"><?= $post['content']?></p>
     </div>
     <div class="card-footer text-muted">
       Posted on <?= date('d M Y',strtotime($post['createtime'])) ?> by
       <a href="#"><?= $post['name']?></a>
     </div>
   
  
   </div>

       
        

  

      </div>

<?php include "widget.php";?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

 <?php include "footer.php"; ?>