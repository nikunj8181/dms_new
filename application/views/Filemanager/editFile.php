<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($data))
  $editdata=$data;
?>
 <form action="<?php echo base_url('filemanager/updateData'); ?>" id="form_addFile" method="post" enctype="multipart/form-data" class="horizontal-form">
<div class="modal-header blue">
    <button type="button" class="closebtn fa fa-close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> Edit Company</h4>
</div>
<div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tabbable-line boxless tabbable-reversed">
            <div class="portlet-body form">
              <input type="hidden" name="id" id="id" value="<?php echo @$editdata['id']; ?>" />
              <input type="hidden" name="companyId" value="<?php echo @$editdata['companyId']; ?>">
              <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label class="control-label">Category <span class="required" aria-required="true">*</span></label>
                          <select name="categoryId" id="categoryId" class="form-control bs-select">
                            <?php
                              if(!empty($category)){
                                foreach ($category as $cat){
                                  $catSel="";
                                  if($cat['id']==@$editdata['categoryId']){
                                    $catSel="selected";
                                  }
                            ?>
                              <option value="<?php echo $cat['id']; ?>" <?php echo $catSel;
                               ?>><?php echo $cat['Title']; ?></option>
                            <?php
                                }
                              }
                            ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Document Title <span class="required" aria-required="true">*</span></label>
                          <input type="text" id="docTitle" name="docTitle" class="form-control" value="<?php echo @$editdata['docTitle']; ?>">
                      </div>
                      <div class="form-group">
                          <label class="control-label">Description </label>
                          <textarea id="docDescription" name="docDescription" class="form-control"><?php echo @$editdata['docDescription']; ?></textarea>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Select Report</label>
                        <input type="hidden" name="oldFile" value="<?php echo @$editdata['docName']; ?>"/>
                        <input type="file" name="userDoc" id="userDoc" class="ignore" value="" />
                      </div>
                    </div>
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
                                  /*$cus=array();
                                  foreach ($editCus as $key => $value){
                                    $cus[]=$value['customer_id'];
                                  }
                                  echo "<pre>";
                                  print_r($cus);
                                  echo "</pre>";*/
                                    foreach ($customers as $key => $customer){
                                      $cusCheck=$editCkeck=$viewCkeck=$printCkeck=$dwnCkeck="";
                                      if($customer['id']==@$editCus[$key]['customer_id']){
                                        $cusCheck="checked";
                                        if(@$editCus[$key]['editFile']==1){
                                          $editCkeck="checked";
                                        }

                                        if(@$editCus[$key]['viewFile']==1){
                                          $viewCkeck="checked";  
                                        }

                                        if(@$editCus[$key]['printFile']==1){
                                          $printCkeck="checked";  
                                        }

                                        if(@$editCus[$key]['dwnFile']==1){
                                          $dwnCkeck="checked";  
                                        }
                                      }


                                      /*$editCkeck=$viewCkeck=$printCkeck=$dwnCkeck="";
                                      if($customer['id']==@$editCus[$key]['customer_id']){
                                        if(@$editCus[$key]['editFile']==1){
                                          $editCkeck="checked";  
                                        }

                                        if(@$editCus[$key]['viewFile']==1){
                                          $viewCkeck="checked";  
                                        }

                                        if(@$editCus[$key]['printFile']==1){
                                          $printCkeck="checked";  
                                        }

                                        if(@$editCus[$key]['dwnFile']==1){
                                          $dwnCkeck="checked";  
                                        }
                                      }*/
                                ?>
                                <tr class="odd gradeX">
                                  <td>
                                      <input type="checkbox" name="customer[]" value="<?php echo $customer['id']; ?>" <?php echo @$cusCheck; ?>>
                                  </td>
                                  <td><?php echo @$customer['FirstName']." ".$customer['LastName']; ?></td>
                                  <td><input type="checkbox" name="edit[<?php echo $customer['id']; ?>]" value="1" <?php echo @$editCkeck; ?>></td>
                                  <td><input type="checkbox" name="view[<?php echo $customer['id']; ?>]" value="1" <?php echo @$viewCkeck; ?>></td>
                                  <td><input type="checkbox" name="print[<?php echo $customer['id']; ?>]" value="1" <?php echo @$printCkeck; ?>></td>
                                  <td><input type="checkbox" name="download[<?php echo $customer['id']; ?>]" value="1" <?php echo @$dwnCkeck; ?>></td>
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