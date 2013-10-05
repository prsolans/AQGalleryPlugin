    <div class='row'>
      <div class="span5">  
        <p class='lead'>Add a new gallery:</p>

      </div>
      <div class='span7'>  
      <p class='lead'>Select an existing gallery to edit:</p>
      <table class='table' style='width: 800px'>
        <tr><th>Name</th><th>Description</th><th>Actions</th></tr>
      <?php 
       global $wpdb;
          $table = $wpdb->prefix."aqdct_gallery";
          $query = "SELECT * FROM $table";
          $results = $wpdb->get_results($query);

      foreach($results as $result)
      {
          echo "<tr><td>";
          echo $result->name."</td><td>";
          echo $result->description."</td><td><a href='admin.php?page=aqgallery_edit&id=".$result->id."'>Edit</a> | <a href=''>Delete</a></td></tr>";
      }
      ?>
      </table>
      </div>
    </div>

</div>
