 
      <?php 
       global $wpdb;
          $table = $wpdb->prefix."aqdct_gallery";

          ?>   

<?php if(isset($_POST['aqgallery_update'])): ?>
          <?php
    $name = $_POST['aqgallery_name'];
    $desc = $_POST['aqgallery_description'];  

    $insert = "INSERT INTO $table (name, description) VALUES ('$name', '$desc')";

    $wpdb->query($insert);
?>

<?php elseif(isset($_POST['aqgallery_delete'])): ?>

  <?php 
      $id = $_POST['aqgallery_id'];
      $delete = "DELETE FROM $table WHERE id = $id";

      $wpdb->query($delete);
  ?>

<?php endif; ?>
  <div class='row'>
      <div class="span5">  
        <p class='lead'>Add a new gallery:</p>
        <form class="form-horizontal" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <input type='hidden' name='aqgallery_update' value='true'/>
  <div class="control-group">
    <label class="control-label" for="name">Name</label>
    <div class="controls">
    <input type="text" name="aqgallery_name" value="">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="description">Description</label>
    <div class="controls">
    <textarea name="aqgallery_description" rows="6" cols="40"></textarea>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox" id="live"> Live
      </label>
        <button type='submit' class='btn btn-primary large'>Add new gallery</button>
    </div>
  </div>
</form>
      </div>
      <div class='span6 offset1'>  
      <p class='lead'>Select an existing gallery to edit:</p>
      <table class='table' style='width: 700px'>
        <tr><th>Name</th><th>Actions</th></tr>
      <?php 
          $query = "SELECT * FROM $table";
          $results = $wpdb->get_results($query);

      foreach($results as $result)
      {
          echo "<tr><td>";
          echo $result->name."</td><td><a href='admin.php?page=aqgallery_edit&id=".$result->id."'>Edit</a> | <a id='delete' href='admin.php?page=aqgallery_edit&id=".$result->id."&flag=delete'>Delete</a></td></tr>";
      }
      ?>
      </table>
      </div>
    </div>

</div>
