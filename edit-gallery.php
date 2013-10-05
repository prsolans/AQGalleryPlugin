<?php 
 global $wpdb;
 $url = site_url();
 $id = $_GET['id'];
    $table = $wpdb->prefix."aqdct_gallery";
    $query = "SELECT * FROM $table WHERE id=$id";
    $results = $wpdb->get_results($query);
?>
<?php foreach($results as $result): ?>

<form class="form-horizontal" action="<?=$url?>/wp-content/plugins/aqdct-gallery/update-gallery.php">
  <input type='hidden' name='id' value='<?=$id?>'/>
  <div class="control-group">
    <label class="control-label" for="name">Name</label>
    <div class="controls">
    <input type="text" name="name" value="<?=$result->name?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="description">Description</label>
    <div class="controls">
    <textarea name="description" rows="6" cols="40"><?=$result->description?></textarea>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox" id="live"> Live
      </label>
      <button type="submit" class="btn">Update</button>
    </div>
  </div>
</form>


<?php endforeach; ?>

<?php
echo $url;
?>
