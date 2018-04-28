<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-fixed-main-content">
  <!-- BEGIN PAGE BASE CONTENT -->

  <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="col-md-12">
        <?php if($this->session->flashdata('message')){ ?>
        <div class="alert alert-success">
          <?php echo $this->session->flashdata('message'); ?>
        </div>
        <?php } ?>

        <!--Start Modal-->
            <div class="modal fade bs-modal-md" id="ajax" role="basic" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="../assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                            <span> &nbsp;&nbsp;Loading... </span>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End modal -->
        
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>User List
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
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> User Type </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($data)){
                            foreach ($data as $user){
                        ?>
                        <tr>
                            <td> <?php echo $user['FirstName'].' '.$user['LastName']; ?> </td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['phone']; ?></td>
                            <td><?php echo $user['userType']; ?> </td>
                            <td> 
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="javascript:void();" id="<?php echo $user['id']; ?>" class="callAjax" data-target="#ajax" data-toggle="modal">
                                                <i class="fa fa-pencil"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a onclick="return confirm('Are you sure want to delete?')" href="<?php echo base_url('user/delete/'.$user['id']); ?>">
                                                <i class="fa fa-trash"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div> 
                            </td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
            <!-- END EXAMPLE TABLE PORTLET-->
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
        var url = hiddenUrl+'user/edit/'+ID;
      }else{
        var url = hiddenUrl+'user/add';
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