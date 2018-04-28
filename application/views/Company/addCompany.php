<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <form action="<?php echo base_url('company/insertData'); ?>" id="form_addCompany" method="post" enctype="multipart/form-data" class="horizontal-form">
<div class="modal-header blue">
    <button type="button" class="closebtn fa fa-close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> Add Company</h4>
</div>
<div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tabbable-line boxless tabbable-reversed">
            <div class="portlet-body form">
              <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label class="control-label">Company Title <span class="required" aria-required="true">*</span></label>
                          <input type="text" id="Title" name="Title" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Company Logo</label>
                        <input type="file" name="companyImage" id="companyImage" value="" />
                        <div class="img-container">
                          <img id="imagePreview1" style="display: block;" src=""/>
                          <div class="img-overlay"></div>
                          <div class="img-button"><a href="javascript:;" id="logoA"><i class="fa fa-upload"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
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

    $('#companyImage').css('display','none');
    $("#logoA").on('click', function(event) {
      $("#companyImage").trigger('click');
    });

    $("#companyImage").on("change", function(){
        var ext = $('#companyImage').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
            alert('Invalid file!');
        }else{
          var files = !!this.files ? this.files : [];
          if (!files.length || !window.FileReader) return;
          if (/^image/.test( files[0].type)){
              var reader = new FileReader();
              reader.readAsDataURL(files[0]);
              reader.onloadend = function(){
                  $("#imagePreview1").show();
                  $('#imagePreview1').attr('src', this.result);
              }
          }
        }
    });

});
</script>