<?php 
    global $wpdb;
    $url = site_url();
    $aqgallery_update = 'false';
    $id = $_GET['id'];
    $table = $wpdb->prefix."aqdct_gallery";
    $query = "SELECT * FROM $table WHERE id=$id";
    $results = $wpdb->get_results($query);

    $table = $wpdb->prefix."aqdct_gallery";

?>
<?php foreach($results as $result): ?>

<?php if(isset($_POST['aqgallery_update'])): ?>

<?php
    $name = $_POST['aqgallery_name'];
    $desc = $_POST['aqgallery_description'];  

    $update = "UPDATE $table SET name='$name', description='$desc' WHERE id=$id";

    $wpdb->query($update);
?>

<div class="alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Update!</strong> Your changes have been saved.
</div>

<form class="form-horizontal" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <input type='hidden' name='aqgallery_update' value='true'/>
  <input type='hidden' name='aqgallery_id' value='<?=$id?>'/>
  <div class="control-group">
    <label class="control-label" for="name">Name</label>
    <div class="controls">
    <input type="text" name="aqgallery_name" value="<?=$name?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="description">Description</label>
    <div class="controls">
    <textarea name="aqgallery_description" rows="6" cols="40"><?=$desc?></textarea>
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

<?php elseif(isset($_GET['flag'])): ?>
<form class="form-horizontal" method="post" action="admin.php?page=aqgallery">
  <input type='hidden' name='aqgallery_delete' value='true'/>
  <input type='hidden' name='aqgallery_id' value='<?=$id?>'/>

Are you sure you want to delete this gallery? All images will still be in the media library, but the gallery will no longer exist.
<br/>
      <button type="submit" class="btn btn-danger">Delete</button>
</form>
<?php else: ?>

<form class="form-horizontal" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <input type='hidden' name='aqgallery_update' value='true'/>
  <input type='hidden' name='aqgallery_id' value='<?=$id?>'/>
  <div class="control-group">
    <label class="control-label" for="name">Name</label>
    <div class="controls">
    <input type="text" name="aqgallery_name" value="<?=$result->name?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="description">Description</label>
    <div class="controls">
    <textarea name="aqgallery_description" rows="6" cols="40"><?=$result->description?></textarea>
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

<?php endif; ?>

<?php endforeach; ?>

