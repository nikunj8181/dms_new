<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*echo "<pre>";
print_r($data);
echo "</pre>";*/
?>
<style type="text/css">
.doc{width: 100%;height: 550px;}
</style>
<div class="modal-header blue">
    <button type="button" class="closebtn fa fa-close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> <?php echo @$data['docTitle']; ?></h4>
</div>
<div class="modal-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label"><b>Description:</b></label>
          <p><?php echo @$data['docDescription']; ?></p>
        </div>  
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tabbable-line boxless tabbable-reversed">
          <div class="portlet-body form">
            <iframe class="doc" src="https://docs.google.com/gview?url=<?php echo base_url('uploads/userdocs/').$data['docName']; ?>&embedded=true"></iframe>
            <?php
            /*echo "<pre>";
            print_r($data);
            echo "</pre>";*/
            ?>
          </div>        
        </div>
      </div>
    </div> 
</div>
<div class="modal-footer">
  <button type="button" class="btn default" data-dismiss="modal">Close</button>
</div>
