<?php

require "category_backend.php";

$all_admins = view_all_admin($connect);


?> 
<div >
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php for($i=0 ; $i<count($all_admins) ; $i++){?>
    <tr>
      <th scope="row"><?php echo ($i+1) ?></th>
      <td><?php echo $all_admins[$i]['admin_name']?></td>
      <td><?php echo $all_admins[$i]['admin_email']?></td>
      <td><?php echo $all_admins[$i]['admin_password']?></td>
      <td>
        <form action="index.php" method="get" style="display:inline-block;">
                <input type="hidden"  value="<?php echo $all_admins[$i]["admin_id"] ?>" name="updateadmin">
                <button type="submit" class="btn btn btn-outline-secondary">edit</button>
        </form>

        <form action="" method="post" style="display:inline-block;">
            <input type="hidden" value="<?php echo $all_admins[$i]["admin_id"] ?>" name="deleteadmin">
            <input type="submit" name = "delete1" class="btn btn btn-outline-danger" value="delete">
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
if(isset($_POST['delete1'])){

    $id = $_POST['deleteadmin'];

    delete_admin($connect , $id);
}
?>
