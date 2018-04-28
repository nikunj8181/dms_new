<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <form action="<?php echo base_url('userrole/insertData'); ?>" id="form_userrole" method="post" enctype="multipart/form-data" class="horizontal-form">
<div class="modal-header blue">
    <button type="button" class="closebtn fa fa-close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> Add User Role</h4>
</div>
<div class="modal-body">
      <div class="row">
              <div class="col-md-12">
                  <div class="tabbable-line boxless tabbable-reversed">
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Role Title <span class="required" aria-required="true">*</span></label>
                                                <input type="text" id="Title" name="Title" class="form-control" placeholder="Role Title">
                                            </div>
                                        </div>
                                    </div>
                                                               
                            <!-- END FORM-->
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