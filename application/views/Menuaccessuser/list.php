<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
.jstree-default .jstree-clicked {
  background-color: #fff !important;
}
</style>
<div class="page-fixed-main-content">
  <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
            <div class="col-md-12">
             <?php if($this->session->flashdata('message')){ ?>
                  <div class="alert alert-success">
                    <?php echo $this->session->flashdata('message'); ?>
                  </div>
                  <?php } ?>
              <!--Start Modal-->
                <div class="modal fade" id="ajax" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="../assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                                <span> &nbsp;&nbsp;Loading... </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End modal -->
                <!-- FORM LISTING START -->
                <form action="<?php echo base_url('menuaccessuser/listing'); ?>" id="form_PickorderMaster" method="post" enctype="multipart/form-data" class="horizontal-form">
                <div class="portlet box blue">
                    <div class="portlet-title">
                      <div class="caption">
                          <i class="fa fa-filter"></i>Filter User
                      </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-body">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label class="control-label">User <span class="required" aria-required="true">*</span></label>
                                      <select class="form-control" name="userId">
                                        <option value="">Select User</option>
                                        <?php
                                        if(isset($userList) && count($userList) > 0){
                                          foreach ($userList as $key => $value){
                                            if($value['id'] == $userId){
                                              $selected="selected";
                                            }else{
                                              $selected="";
                                            }
                                            $Name = $value['FirstName'].' '.$value['LastName']." - (".ucfirst($value['userType']).")";
                                          ?>
                                            <option value="<?php echo $value['id']; ?>" <?php echo $selected; ?>><?php echo $Name; ?></option>
                                          <?php
                                          }
                                        }
                                        ?>
                                      </select>
                                  </div>
                              </div>
                             
                              <div class="col-md-1">
                                  <div class="form-group">
                                      <label style="color: #fff;">Button</label>
                                      <button type="submit" class="form-control btn blue">Go</button>
                                  </div>
                              </div>
                          </div>
                        </div>
                      
                    </div>
                </div>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i>Access List
                        </div>
                    </div>
                    <div class="portlet-body">
                      <div class="row">
                        <?php
                        if($this->session->userdata('userType')=='superadmin'){
                        ?>
                        <div class="col-md-4">
                          <div id="tree_1" class="tree-demo">
                            <?php
                               foreach ($data as $r){
                                  echo  $r;
                                }
                            ?>
                          </div>
                        </div>
                        <?php }else{ ?>
                        <div class="col-md-4">
                          <div id="tree_1" class="tree-demo">
                            <?php
                               foreach ($data as $r){
                                  echo  $r;
                                }
                            ?>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                        
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-1">
                            <input type="submit" name="submit" class="form-control btn blue" value="Save">
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                </form>
                <!-- FORM LISTING END -->
            </div>
        </div>   
  <!-- END PAGE BASE CONTENT -->
</div>
<script type="text/javascript">
$(function(){

    var hiddenUrl = $('#hiddenUrl').val();
    $(".callAjax").on("click", function(){
      var ID = this.id;
      if(ID){
        var url = hiddenUrl+'customeraddress/edit/'+ID;
      }else{
        var url = "";
      }
      $.ajax({
          type    : 'POST',
          url     : url,
          /*data    : {"ID":ID},*/
          dataType  : 'HTML',
          success: function(response){
            $('.modal-content').html(response);
          }
      });
    });

  $("input[name=radio]:radio").change(function (){
      var Checked = jQuery.map($('table input[name=radio]:checked'), function (n, i){
            return n.value;
      }).join(',');
      var unChecked = jQuery.map($('table input[name=radio]:unchecked'), function (n, i){
            return n.value;
      }).join(',');

      var StatusUrl = hiddenUrl+'customeraddress/isprimery/';
      var unChecked = unChecked;
      var lastChecked=Checked;

      $.ajax({
          type    : 'POST',
          url     : StatusUrl,
          data    : {"unChecked":unChecked,"lastChecked":lastChecked},
          dataType  : 'HTML',
          success: function(response){
            //alert(response);
          }
      });
  });

});
</script>