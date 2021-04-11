<?php 
require_once 'header.php';
require_once '../vendor/autoload.php';
$blog = new \App\classes\Blog();
$allpost = $blog->allBlog();


?>

    <div class="row">
                        <div class="col-sm-12">
                            <section class="card">
                                <header class="card-header">
                                All Blog Post
                                    <span class="tools pull-right">
                                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                                        <a href="javascript:;" class="fa fa-times"></a>
                                    </span>
                                </header>
                                <div class="card-body">
                                    <div class="adv-table">
                                        <table  class="display table table-bordered table-striped" >
                                        <thead>
                                            <tr>
                                                <td>SI No</td>
                                                <td>Category name</td>
                                                <td>Ttile</td>
                                                <td>Content</td>
                                                <td>Photo</td>
                                                <td>Status</td>
                                                <td style="width: 250px;">Action</td>
                                            </tr>
                                        </thead>
                                         <tbody>

        <?php  
        $sl = 1;
   while($row = mysqli_fetch_assoc($allpost)){ ?>
                                              <tr>
                    <td><?= $sl; ?></td>
                    <td><?=  $row['category_name']  ?></td>
                    <td><?=  $row['title']  ?></td>
                    <td><?=  $row['content']  ?></td>
                    <td><img style="width: 25px;" src="../uploads/<?= $row['photo']  ?>" alt=""></td>
                    <td><?=  $row['status'] ==1 ?'Active' : 'Inactive' ?></td>
         <td>
             <?php
              if($row['status']==1){ ?>
                <a href="status.php?id=<?= $row['id']; ?>&blog=blog&inactive=inactive" class="btn btn-info btn-sm"> <i class="fa   fa-arrow-down"></i> Inactive</a>
          <?php }else{ ?>
            <a href="status.php?id=<?= $row['id']; ?>&blog=blog&active=active" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up" aria-hidden="true"> Active</i></a>
       <?php  }  ?>
         

        

    <a href="edit-blog.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i></a>

        <a href="delete.php?id=<?= $row['id']; ?>&blog=blog" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"> Delete</i></a>
      </td>
                                             </tr>
         <?php $sl++;  } ?>                                     
                                         </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
<?php 
require_once 'footer.php';
?>
