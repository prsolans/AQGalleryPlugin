


<div class='row'>
<div class='span3'>  
  <p class='lead'>Add a new gallery:</p>

</div>
<div class='span3'>  
<p class='lead'>Select the gallery you wish to edit:</p>
<table class='table'>
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
    echo $result->description."</td><td><a href='admin.php?page=aqgallery_edit&id=".$result->id."'>Edit</a></td></tr>";
}
?>
</table>
</div>
</div>


</div>
