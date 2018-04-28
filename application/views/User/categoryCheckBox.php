<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
  if(!empty($category)){
    foreach ($category as $i => $cat){
?>
  <div class="md-checkbox">
      <input type="checkbox" id="checkbox2_<?php echo $i; ?>" name="categoryId[]" value="<?php echo $cat['id']; ?>" class="md-check">
      <label for="checkbox2_<?php echo $i; ?>">
          <span></span>
          <span class="check"></span>
          <span class="box"></span> <?php echo $cat['Title']; ?> </label>
  </div>
  <?php
    }
  }else{
?>
<p>No category found</p>
<?php
  }
?>