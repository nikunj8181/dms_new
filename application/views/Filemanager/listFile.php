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
<div class="row">
<div class="col-md-12 text-right">
<?php 
                  if($access['newFile']==1){ ?>
                    <a class="btn btn-default btn-sm callAjax" href="javascript:void();" data-target="#ajax" data-toggle="modal"><i class="fa fa-plus"></i> Upload New Report </a>
                  <?php } ?>
</div>
</div>

        <?php if(!empty($OwnfileData)){ ?>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-files-o"></i>Own Reports
                </div>
                <div class="actions">
                  

                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="commonTable">
                    <thead>
                        <tr>
                            <th> Title </th>
                            <th> Category </th>
                            <th> File Name </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($OwnfileData as $file){
                        ?>
                        <tr>
                            <td> <?php echo $file['docTitle']; ?> </td>
                            <td> <?php echo $file['CategoryTitle']; ?> </td>
                            <td> <?php echo $file['docName']; ?> </td>
                            <td> 
                                <a href="javascript:;" title="Edit" class="btn dark btn-sm btn-outline sbold uppercase callAjax" id="<?php echo $file['id']; ?>" data-target="#ajax" data-toggle="modal"><i class="fa fa-pencil"></i></a>

                                <a href="javascript:;" title="View" class="btn dark btn-sm btn-outline sbold uppercase viewFileAjax" id="<?php echo $file['id']; ?>" data-target="#viewFile" data-toggle="modal"><i class="fa fa-eye"></i></a>

                                <a href="<?php echo base_url('filemanager/delete/'.$file['id']); ?>" title="Delete" class="btn dark btn-sm btn-outline sbold uppercase" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>
        <?php if(!empty($SharefileData)){ ?>
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-files-o"></i>Shared Reports
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="commonTable">
                    <thead>
                        <tr>
                            <th> Title </th>
                            <th> Shared By </th>
                            <th> Category </th>
                            <th> File Name </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          foreach ($SharefileData as $sFile){
                            /*echo "<pre>";
                            print_r($sFile);
                            echo "</pre>";*/
                            $sEdit=$sView=$sPrint=$sDownload="";
                            if($sFile['editFile']==0){
                              $sEdit="disabled";
                            }

                            if($sFile['viewFile']==0){
                              $sView="disabled";
                            }

                            if($sFile['dwnFile']==0){
                              $sPrint="disabled";
                            }

                            if($sFile['dwnFile']==0){
                              $sDownload="disabled";
                            }
                        ?>
                        <tr>
                            <td> <?php echo $sFile['docTitle']; ?> </td>

                            <td> <?php echo $sFile['FirstName']." ".$sFile['LastName']; ?> </td>
                            <td> <?php echo $sFile['CategoryTitle']; ?> </td>

                            <td> <?php echo $sFile['docName']; ?> </td>
                            <td> 
                                <button title="Edit" class="btn dark btn-sm btn-outline sbold uppercase callAjax" id="<?php echo $sFile['id']; ?>" data-target="#ajax" data-toggle="modal" <?php echo $sEdit; ?>><i class="fa fa-pencil"></i></button>

                                <button title="View" class="btn dark btn-sm btn-outline sbold uppercase viewFileAjax" id="<?php echo $sFile['id']; ?>" data-target="#viewFile" data-toggle="modal" <?php echo $sView; ?>><i class="fa fa-eye"></i></button>

                                <button title="Download" class="btn dark btn-sm btn-outline sbold uppercase PrintFile" id="<?php echo $sFile['id']; ?>" <?php echo $sPrint; ?>><i class="fa fa-print"></i></button>

                                <button title="Download" class="btn dark btn-sm btn-outline sbold uppercase DownloadFile" id="<?php echo $sFile['id']; ?>" <?php echo $sDownload; ?>><i class="fa fa-download"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>
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
        var url = hiddenUrl+'filemanager/edit/'+ID;
      }else{
        var url = hiddenUrl+'filemanager/add';
      }
      
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

    $(".DownloadFile").on("click", function(){
      var ID = this.id;
      if(ID){
        var url = hiddenUrl+'filemanager/download/'+ID;
        window.location.href = url+'/'+ID;
      }
      return false;
    });

    $(".PrintFile").on("click", function(){
      var ID = this.id;
      var url = hiddenUrl+'filemanager/printFile/';
      $.ajax({
          type    : 'POST',
          url     : url,
          /*data    : {"ID":ID},*/
          dataType  : 'HTML',
          success: function(response){
            alert(response);
          }
      });
    });

  });
</script>
<!-- <a href="javascript:void();"  class="callAjax" >
<i class="fa fa-pencil"></i> Edit </a> -->