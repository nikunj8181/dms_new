<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i>User Role List
                        </div>
                          <div class="actions">
                            <a class="btn btn-default btn-sm callAjax" href="javascript:void();" data-target="#ajax" data-toggle="modal">
                                <i class="fa fa-plus"></i> Add </a>
                          </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="commonTable">
                            <thead>
                                 <tr>
                                    <th>Role</th>
                                    <th width="15%"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // echo '<pre>';
                                // print_r($data);
                                  foreach ($data as $usertype) {
                                    
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $usertype['Title']; ?></td>
                                        <td> 
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="javascript:void();" id="<?php echo $usertype['id']; ?>" class="callAjax" data-target="#ajax" data-toggle="modal">
                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                    </li>
                                                    <li>
                                                        <a onclick="return confirm('Are you sure want to delete?')" href="<?php echo base_url('userrole/delete/'.$usertype['id']); ?>">
                                                            <i class="fa fa-trash"></i> Delete </a>
                                                    </li>
                                                </ul>
                                            </div> 
                                        </td>
                                        
                                    </tr>
                                 <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
        var url = hiddenUrl+'userrole/edit/'+ID;
      }else{
        var url = hiddenUrl+'userrole/add';
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
  });
</script>