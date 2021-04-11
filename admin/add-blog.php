<?php 
require_once 'header.php';
require_once '../vendor/autoload.php';
$category = new \App\classes\Category();
$blog = new \App\classes\Blog();

$allActiveCategory = $category->allActiveCategory();
if(isset($_POST['add-blog'])){
    $insert_msg = $blog->addBlog($_POST);
}
?>


<div class="row">

<div class="col-lg-12">
                      <section class="card">
                          <header class="card-header">
                              Blog Add Form 
                          </header>
                          <div class="card-body">
                             <?php 
                                if(isset($insert_msg)){?>
                                    <h5 class= "text-center"><?= $insert_msg?></h5>
                              
                         <?php  } ?>
                              <form action="" method="POST" enctype="multipart/form-data">
                                  <div class="form-group row">
                                      <label for="cat_id" class="col-sm-3 col-form-label">Category </label>
                                      <div class="col-sm-9">
                                          <select name="cat_id" id="cat_id" class="form-control">
                                            <option value="" name="">Select Category</option>
                                            <?php while($row = mysqli_fetch_assoc($allActiveCategory)){ ?>
                                                <option value="<?= $row['id']?>"><?= $row['category_name']?></option>
                                        <?php  } ?>
                                         
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="title" class="col-sm-3 col-form-label">Blog Title</label>
                                      <div class="col-sm-9">
                                          <input name="title" type="text" class="form-control" id="title" placeholder="Blog Name">
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="content" class="col-sm-3 col-form-label">Blog Content</label>
                                      <div class="col-sm-9">
                                      <textarea name="content" class="summernote" id="content" ></textarea>
                                        
                                      </div>
                                  </div>
                               
                                  <div class="form-group row">
                                      <label for="file" class="col-sm-3 col-form-label">Photo</label>
                                      <div class="col-sm-9">
                                          <input name="photo" type="file" class="form-control" id="photo" >
                                      </div>
                                  </div>
                           
                                  <fieldset class="form-group">
                                      <div class="row">
                                          <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                                          <div class="col-sm-9">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="status" id="active" value="1" >
                                                  <label class="form-check-label" for="active">
                                                      Active
                                                  </label>
                                              </div>
                                              <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="status" id="inactive" value="0">
                                                  <label class="form-check-label" for="inactive">
                                                      Inactive
                                                  </label>
                                              </div>
                                        
                                          </div>
                                      </div>
                                  </fieldset>
                              
                                  <div class="form-group row">
                                      <div class="col-sm-10">
                                          <button type="submit" class="btn btn-primary" name="add-blog">Save</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>

                  </div>
</div>

<?php 
require_once 'footer.php';
?>
