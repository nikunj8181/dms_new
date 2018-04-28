<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
#table-wrapper {
  position:relative;
}
#table-scroll {
  height:250px;
  overflow:auto;
  margin-top:20px;
}
#table-wrapper table {
  width:100%;
}
#table-wrapper table thead th .text {
  position:absolute;   
  top:-20px;
  z-index:2;
  height:20px;
  width:35%;
}
</style>
 <form action="<?php echo base_url('filemanager/insertData'); ?>" id="form_addFile" method="post" enctype="multipart/form-data" class="horizontal-form">
<div class="modal-header blue">
    <button type="button" class="closebtn fa fa-close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> Upload Report</h4>
</div>
<div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tabbable-line boxless tabbable-reversed">
            <div class="portlet-body form">
              <div class="form-body">
                <div class="row">
                    <input type="hidden" name="companyId" value="<?php echo @$userInfo['companyId']; ?>">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label class="control-label">Category <span class="required" aria-required="true">*</span></label>
                          <select name="categoryId" id="categoryId" class="form-control bs-select">
                            <?php
                              if(!empty($category)){
                                foreach ($category as $cat){
                            ?>
                              <option value="<?php echo $cat['id']; ?>"><?php echo $cat['Title']; ?></option>
                            <?php
                                }
                              }
                            ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Document Title <span class="required" aria-required="true">*</span></label>
                          <input type="text" id="docTitle" name="docTitle" class="form-control">
                      </div>
                      <div class="form-group">
                          <label class="control-label">Description </label>
                          <textarea id="docDescription" name="docDescription" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Select Report</label>
                        <input type="file" name="userDoc" id="userDoc" value=""/>
                      </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div id="table-wrapper">
                        <div id="table-scroll">
                          <table class="table table-striped table-bordered table-hover" id="customer">
                            <thead>
                                 <tr>
                                    <th width="5%"><input type="checkbox" id="chkParent"></th>
                                    <th>Name</th>
                                    <th width="5%">Edit</th>
                                    <th width="5%">View</th>
                                    <th width="5%">Print</th>
                                    <th width="5%">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($customers)){
                                    foreach ($customers as $key => $customer){
                                ?>
                                <tr class="odd gradeX">
                                  <td>
                                      <input type="checkbox" name="customer[]" value="<?php echo $customer['id']; ?>">
                                  </td>
                                  <td><?php echo @$customer['FirstName']." ".$customer['LastName']; ?></td>
                                  <td><input type="checkbox" name="edit[<?php echo $customer['id']; ?>]" value="1"></td>
                                  <td><input type="checkbox" name="view[<?php echo $customer['id']; ?>]" value="1"></td>
                                  <td><input type="checkbox" name="print[<?php echo $customer['id']; ?>]" value="1"></td>
                                  <td><input type="checkbox" name="download[<?php echo $customer['id']; ?>]" value="1"></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                          </table>
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

    $('#chkParent').click(function() {
      var isChecked = $(this).prop("checked");
      $('#customer tr td:first-child').find('input[type="checkbox"]').prop('checked', isChecked);
    });

    $('#customer tr td:first-child').find('input[type="checkbox"]').click(function() {
      var isChecked = $(this).prop("checked");
      var isHeaderChecked = $("#chkParent").prop("checked");
      if (isChecked == false && isHeaderChecked){
        $("#chkParent").prop('checked', isChecked);
      }else{
        $('#customer tr td:first-child').find('input[type="checkbox"]').each(function(){
            if ($(this).prop("checked") == false)
                isChecked = false;
        });
        $("#chkParent").prop('checked', isChecked);
      }
    });
});
</script>