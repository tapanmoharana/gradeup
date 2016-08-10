<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>ckeditor/samples/css/samples.css">
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#"></a></li>
        <li class="active"><a href="#">Add </a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Add </h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
<!--                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" onclick="javascript:addMaster('<?=site_url($currentModule."/add")?>');" href="#"><span class="btn-label icon fa fa-plus"></span>Create Roles</a></div>                        
                    <div class="visible-xs clearfix form-group-margin"></div>                    -->
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12">&nbsp;</div>
        </div>
        <div class="row ">
            <div class="col-sm-12">
                <div class="panel">
                <div class="panel-heading">
                        <span class="panel-title">Add </span>
                </div>
                <div class="panel-body">
          					<?php echo form_open_multipart('Investors/add');?>
						<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label"> Name</label>
								<div class="col-sm-4">
						<input type="text" class="form-control" id="pname" name="pname" placeholder="" required="">
								</div>
							</div>
							
				
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label"> Type</label>
						<div class="col-sm-4">
							<select class="form-control" name="ptype" id="ptype" required="" onchange="">
							<option value="">--Select--</option>
								 <?php
                                    for($i=0;$i<count($project_type);$i++)
                                    {
                                ?>
                                <option value="<?=$project_type[$i]['id']?>"><?=$project_type[$i]['type']?></option>
                                <?php
                                    }
                                ?>
																
																
																</select>
							</div></div>
							
							
	
						
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Thumb</label>
						<div class="col-sm-9">
						<input type="file" name="thumb" id="thumb">
							</div>	</div>		
							
							
							
					
						
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Image</label>
						<div class="col-sm-9">
						<input type="file" name="oimage" id="oimage">
							</div>	</div>	
							
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Description</label>
						<div class="col-sm-9">
					<textarea name="aboutprj" cols="40" rows="10" id="aboutprj" class="ckeditor" style="visibility: hidden; display: none;"></textarea>
							</div>	</div>	
							
							
					

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-primary">Add </button>
								</div>
							</div>
						</form>
                </div>
            </div>
            </div>    
        </div>
    </div>
</div>

