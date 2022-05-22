<?php

require "category_backend.php";

$all_categories = select_category($connect);

// echo "<pre>";
// print_r($all_categories);
// echo "</pre>";
?> 
<div >
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php for($i=0 ; $i<count($all_categories) ; $i++){?>
    <tr>
      <th scope="row"><?php echo ($i+1) ?></th>
      <td><img src="image/image_category/<?php echo $all_categories[$i]['category_image']?>" width=100px height="100px"></td>
      <td><?php echo $all_categories[$i]['category_name']?></td>
      <td>
        <form action="index.php?" method="get" style="display:inline-block;">
                <input type="hidden"  value="<?php echo $all_categories[$i]["category_id"] ?>" name="update">
                <button type="submit" class="btn btn-sm btn-outline-secondary">edit</button>
        </form>

        <form action="" method="post" style="display:inline-block;">
            <input type="hidden" value="<?php echo $all_categories[$i]["category_id"] ?>" name="delete">
            <input type="submit" name = "delete1" class="btn btn-sm btn-outline-danger" value="delete">
      </form>
      </td>
    </tr>
   <?php 
  
      }
   ?>
  </tbody>
</table> 
</div>

          <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
if(isset($_POST['delete'])){

    $id = $_POST['delete'];
    echo $id;
    delete_category($connect , $id);
}
?>

