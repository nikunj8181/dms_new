<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($data[0]))
  $editdata=$data[0];
?>
 <form action="<?php echo base_url('user/updateData'); ?>" id="form_addUser" method="post" enctype="multipart/form-data" class="horizontal-form">
<div class="modal-header blue">
    <button type="button" class="closebtn fa fa-close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> Edit User</h4>
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
                            <label class="control-label">First Name <span class="required" aria-required="true">*</span></label>
                            <input type="text" id="FirstName" name="FirstName" value="<?php echo @$editdata['FirstName']; ?>" class="form-control">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" name="LastName" id="LastName" value="<?php echo @$editdata['LastName']; ?>" class="form-control">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"  id="emailID">
                            <label class="control-label">Email <span class="required" aria-required="true">*</span></label>
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo @$editdata['email']; ?>" placeholder="example@domain.com">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Phone <span class="required" aria-required="true">*</span></label>
                            <input type="text" id="phone" name="phone" value="<?php echo @$editdata['phone']; ?>" class="form-control">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <?php if($this->session->userdata('userType')!='manager'){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Company <span class="required" aria-required="true">*</span></label>
                            <select name="companyId" id="companyId" class="form-control bs-select">
                              <option value="">Select Company</option>
                              <?php
                                if(!empty($company)){
                                  foreach ($company as $comp){
                                    $selComp="";
                                    if($comp['id']==@$editdata['companyId']){
                                        $selComp="selected";
                                    }
                              ?>
                                <option value="<?php echo $comp['id']; ?>" <?php echo $selComp; ?>><?php echo $comp['Title']; ?></option>
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
                <?php }else{ ?>
                <input type="hidden" name="companyId" value="<?php echo @$userInfo['companyId']; ?>">
                <?php } ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">User Type <span class="required" aria-required="true">*</span></label>
                            <select name="userType" id="userType" class="form-control bs-select">
                              <option value="">Select User type</option>
                              <?php
                                if(!empty($userType)){
                                  foreach ($userType as $utype){
                                    $selUt="";
                                    if($utype['alias']==@$editdata['userType']){
                                        $selUt="selected";
                                    }
                              ?>
                                <option value="<?php echo $utype['alias']; ?>" <?php echo $selUt; ?>><?php echo $utype['Title']; ?></option>
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

                <div class="row" id="category">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Category <span class="required" aria-required="true">*</span></label>
                            <div class="md-checkbox-inline" id="catResponse">
                                <?php
                                $edCat=array();
                                if(!empty($data_category)){
                                    foreach ($data_category as $editCat){
                                        $edCat[]=$editCat['category_id'];
                                    }
                                }
                                    if(!empty($category)){
                                      foreach ($category as $i => $cat){
                                        $checkedCat="";
                                        if(in_array($cat['id'], $edCat)){
                                            $checkedCat="checked";
                                        }
                                ?>
                                <div class="md-checkbox">
                                    <input type="checkbox" id="checkbox2_<?php echo $i; ?>" name="categoryId[]" value="<?php echo $cat['id']; ?>" class="md-check" <?php echo $checkedCat; ?>>
                                    <label for="checkbox2_<?php echo $i; ?>">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> <?php echo $cat['Title']; ?> </label>
                                </div>
                                <?php
                                  }
                                }
                              ?>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                         <label class="control-label"></label>
                            <div class="md-checkbox-inline">
                                <div class="md-checkbox">
                                    <input id="checkbox1_1" name="newFile" value="1" class="md-check" type="checkbox" <?php if(@$editdata['newFile'] == 1){ echo "checked"; }?>>
                                    <label for="checkbox1_1">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Allow to upload new report </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                         <label class="control-label"></label>
                            <div class="md-checkbox-inline">
                                <div class="md-checkbox">
                                    <input id="checkbox1_2" name="removeFile" value="1" class="md-check" type="checkbox" <?php if(@$editdata['removeFile'] == 1){ echo "checked"; }?>>
                                    <label for="checkbox1_2">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Allow to remove report </label>
                                </div>
                            </div>
                        </div>
                    </div>
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

    $("#companyId").change(function(){
        var hiddenUrl = $('#hiddenUrl').val();
        var url = hiddenUrl+'user/getcategory';
        var _comp = this.value;
        $.ajax({
          type    : 'POST',
          url     : url,
          data    : {"_id":_comp},
          dataType  : 'HTML',
          success: function(response){
            $('#catResponse').html(response);
          }
        });
    });
});
</script>