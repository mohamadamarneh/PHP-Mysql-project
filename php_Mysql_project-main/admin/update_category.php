<?php 

require "category_backend.php";

$id = $_GET['update'];
$single_category = select_one_category($connect , $id);
// echo "<pre>";
// print_r($single_category);
// echo "</pre>";
?>

  <div></div>
      
  <div class="container mt-5" style="min-height: 700px;">
      <h1>Update Category</h1>

      <form method="post"  enctype='multipart/form-data'>
            <div class="form-group">
              <label class="mt-4">Category Name</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="update_name" value="<?php echo $single_category['category_name'] ?>">
            </div>
            <div class="form-group">
              <label class="mt-4">Category Image</label>
              <input type="file" class="form-control" id="exampleFormControlInput1" name="update_image" value="<?php echo $single_category['category_image'] ?>" >
              
            </div>
              <div class="form-group mt-4">
              <img src="image/image_category/<?php echo $single_category['category_image']?>" width=100px height="100px">
            </div>
            <div class="form-group mt-4">
            <input type="submit" class="btn btn lg btn-outline-primary" value = "Add" name="submit">
            </div>
</form>

<?php 

if(isset($_POST['submit'])){
  if(!empty($_POST["update_name"])&& !empty($_FILES["update_image"]["name"])){
  move_uploaded_file($_FILES["update_image"]["tmp_name"],"image/image_category" . $_FILES["update_image"]["name"]);
  $category_name = $_POST['update_name'];
  $category_image = $_FILES['update_image']['name'];

  update_category($connect , $category_name , $category_image , $id);

  
}
}
?>