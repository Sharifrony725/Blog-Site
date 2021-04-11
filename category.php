<?php 
require_once 'vendor/autoload.php';
$cat = new \App\classes\Category();
$category =  $cat->allActiveCategory();
$catId = $_GET['id'];
$catPost = $cat->catPost($catId);

?>
<?php include "header.php";?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
     
      <div class="col-md-8">

        <h1 class="my-4"></h1>
        <?php 
        while($row2 = mysqli_fetch_assoc($catPost)){?>

        <!-- Blog Post -->
        <div class="card mb-4">
     
          <img class="card-img-top" src="uploads/<?= $row2['photo']?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?= $row2['title']?></h2>
            <p class="card-text"><?= substr($row2['content'],0, 250)?>... </p>
            <a href="post.php?id=<?= $row2['id']?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?= date('d M Y',strtotime($row2['createtime'])) ?> by
            <a href="#"><?= $row2['name']?></a>
          </div>
        
       
        </div>
        <?php } ?>
      
       

      </div>

<?php include "widget.php";?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

 <?php include "footer.php"; ?>