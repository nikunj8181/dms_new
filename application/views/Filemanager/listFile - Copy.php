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

        <?php if($this->session->flashdata('err')){ ?>
        <div class="alert alert-danger">
          <?php echo $this->session->flashdata('err'); ?>
        </div>
        <?php } ?>

        <!--Start Modal-->
          <div class="modal fade bs-modal-md" id="ajax" role="basic" aria-hidden="true">
              <div class="modal-dialog modal-md">
                  <div class="modal-content newFile">
                      <div class="modal-body">
                          <img src="../assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                          <span> &nbsp;&nbsp;Loading... </span>
                      </div>
                  </div>
              </div>
          </div>

          <div class="modal fade" id="viewFile" role="basic" aria-hidden="true">
              <div class="modal-dialog modal-full">
                  <div class="modal-content viewFile">
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
                    <i class="fa fa-files-o"></i>Reports
                </div>
                <div class="actions">
                  <?php 
                  if($access['newFile']==1){ ?>
                    <a class="btn btn-default btn-sm callAjax" href="javascript:void();" data-target="#ajax" data-toggle="modal"><i class="fa fa-plus"></i> Upload New Report </a>
                  <?php } ?>

                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="commonTable">
                    <thead>
                        <tr>
                            <th> Title </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($OwnfileData)){
                            foreach ($OwnfileData as $file){
                        ?>
                        <tr>
                            <td> <?php echo $file['docTitle']; ?> </td>
                            <td> 
                                <?php if($file['editFile']==1){ ?>
                                <a href="javascript:;" title="Edit" class="btn dark btn-sm btn-outline sbold uppercase"><i class="fa fa-pencil"></i></a>
                                <?php } ?>
                                <?php if($file['viewFile']==1){ ?>
                                <a href="javascript:;" title="View" class="btn dark btn-sm btn-outline sbold uppercase viewFileAjax" id="<?php echo $file['id']; ?>" data-target="#viewFile" data-toggle="modal"><i class="fa fa-eye"></i></a>
                                <?php } ?>

                                <?php if($access['removeFile']==1){ ?>
                                <a href="<?php echo base_url('filemanager/delete/'.$file['id']); ?>" title="Delete" class="btn dark btn-sm btn-outline sbold uppercase" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
                                <?php } ?>

                                <?php if($file['printFile']==1){ ?>
                                <a href="javascript:;" title="Print" class="btn dark btn-sm btn-outline sbold uppercase"><i class="fa fa-print"></i></a>
                                <?php } ?>

                                <?php if($file['dwnFile']==1){ ?>
                                <a href="javascript:;" title="Download" class="btn dark btn-sm btn-outline sbold uppercase"><i class="fa fa-download"></i></a>
                                <?php } ?>
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
      var url = hiddenUrl+'filemanager/add';
      $.ajax({
          type    : 'POST',
          url     : url,
          /*data    : {"ID":ID},*/
          dataType  : 'HTML',
          success: function(response){
            $('.modal-content.newFile').html(response);
          }
      });
    });

    $(".viewFileAjax").on("click", function(){
      var ID = this.id;
      if(ID){
        var url = hiddenUrl+'filemanager/view/'+ID;
      }
      $.ajax({
          type    : 'POST',
          url     : url,
          /*data    : {"ID":ID},*/
          dataType  : 'HTML',
          success: function(response){
            $('.modal-content.viewFile').html(response);
          }
      });
    });

  });
</script>
<!-- <a href="javascript:void();"  class="callAjax" >
<i class="fa fa-pencil"></i> Edit </a> -->