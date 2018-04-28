<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($data[0]))
  $editdata=$data[0];
?>
 <form action="<?php echo base_url('category/updateData'); ?>" id="form_addCategory" method="post" enctype="multipart/form-data" class="horizontal-form">
<div class="modal-header blue">
    <button type="button" class="closebtn fa fa-close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> Edit Category</h4>
</div>
<div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tabbable-line boxless tabbable-reversed">
            <div class="portlet-body form">
              <input type="hidden" name="id" id="id" value="<?php echo @$editdata['id']; ?>" />
              <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Category Title <span class="required" aria-required="true">*</span></label>
                            <input type="text" id="firstName" name="Title" value="<?php echo @$editdata['Title']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Group <span class="required" aria-required="true">*</span></label>
                            <select name="groupId" class="form-control bs-select">
                              <option value=""></option>
                              <?php
                                if(!empty($group)){
                                  foreach ($group as $grp){
                                    $sel="";
                                    if($grp['id']==@$editdata['groupId']){
                                      $sel="selected";
                                    }
                              ?>
                                <option value="<?php echo $grp['id']; ?>" <?php echo $sel; ?>><?php echo $grp['Title']; ?></option>
                              <?php
                                  }
                                }
                              ?>
                            </select>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
            </div>
          </div>        
        </div>
      </div>
    </div> 
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
   <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
</div>
</form>
<script type="text/javascript">
$(document).ready(function(){
    
    jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value.indexOf(" ") < 0 && value != ""; 
    }, "No space please and don't leave it empty");
});
</script>