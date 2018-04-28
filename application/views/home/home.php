<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="page-fixed-main-content">
        <?php if($this->session->flashdata('message')){ ?>
            <div class="alert alert-success">
              <?php echo $this->session->flashdata('message'); ?>
            </div>
            <?php } ?>
		<!-- BEGIN PAGE BASE CONTENT -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption">							
							<span class="caption-subject font-green-sharp sbold">Eazy Communication Portal</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE BASE CONTENT -->
    </div>
            