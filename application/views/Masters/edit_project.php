<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>ckeditor/samples/css/samples.css">
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Masters</a></li>
        <li class="active"><a href="#">Edit Projects</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Edit Project</h1>
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
		<?php
	//	var_dump($project_details);
//exit(0);
?>
        <div class="row ">
            <div class="col-sm-12">
                <div class="panel">
                <div class="panel-heading">
                        <span class="panel-title">Edit Project</span>
                </div>
                <div class="panel-body">
          					<?php echo form_open_multipart('Masters/add_project');?>
						<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Project Name</label>
								<div class="col-sm-4">
						<input type="text" class="form-control" id="pname" name="pname" value="<?php echo $project_details[0]['project_name']; ?>" placeholder="" required="">
								</div>
							</div>
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Project City</label>
						<div class="col-sm-4">
							<select class="form-control" name="pcity" id="pcity" required="" onchange="">
								<option value="">--Select--</option>
								    <?php
                                    for($i=0;$i<count($project_city);$i++)
                                    {
                                ?>
                                <option value="<?=$project_city[$i]['id']?>" <?php if($project_city[$i]['id']==$project_details[0]['project_city']){echo "selected" ;}  ?>><?=$project_city[$i]['name']?></option>
                                <?php
                                    }
                                ?>
																</select></div>
							</div>
							
							<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Project location</label>
						<div class="col-sm-4">
							<select class="form-control" name="plocation" id="plocation" required="" onchange="">
										<option value="">--Select--</option>
									<?php
                                    for($i=0;$i<count($project_location);$i++)
                                    {
                                ?>
                                <option value="<?=$project_location[$i]['id']?>" <?php if($project_location[$i]['id']==$project_details[0]['project_location']){echo "selected" ;}  ?>><?=$project_location[$i]['location_name']?></option>
                                <?php
                                    }
                                ?>
																
																
																</select>
							</div>	</div>
							
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Project Type</label>
						<div class="col-sm-4">
							<select class="form-control" name="ptype" id="ptype" required="" onchange="">
							<option value="">--Select--</option>
								 <?php
                                    for($i=0;$i<count($project_type);$i++)
                                    {
                                ?>
                                <option value="<?=$project_type[$i]['id']?>" <?php if($project_type[$i]['id']==$project_details[0]['project_type']){echo "selected" ;}  ?>><?=$project_type[$i]['name']?></option>
                                <?php
                                    }
                                ?>
																
																
																</select>
							</div></div>
							
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Project Status</label>
						<div class="col-sm-4">
							<select class="form-control" name="pstatus" id="pstatus" required="" onchange="">
								<option value="">--Select--</option>
							 <?php
                                    for($i=0;$i<count($project_status);$i++)
                                    {
                                ?>
                                <option value="<?=$project_status[$i]['id']?>" <?php if($project_status[$i]['id']==$project_details[0]['project_status']){echo "selected" ;}  ?>><?=$project_status[$i]['name']?></option>
                                <?php
                                    }
                                ?>
																
																
																</select>
							</div>		</div>
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-12 control-label">Project Unit Details</label>
						
						
							</div>
							
					<div id="maind9" style="display:none;">	

						<div class="second col-sm-12"><div class="col-sm-4">
							<select class="form-control" name="punitname[]" id="" required="" onchange="">
									<option value="" selected="">Select Unit Type</option>
									 <?php
                                    for($i=0;$i<count($project_units);$i++)
                                    {
                                ?>
                                <option value="<?=$project_units[$i]['id']?>" ><?=$project_units[$i]['unit_type']?></option>
                                <?php
                                    }
                                ?>	</select>						
							</div>
							
	<div class="col-sm-4">
							<input type="text" class="form-control" value="" id="punitarea[]" name="punitarea[]" placeholder="Enter Area" required="">
							</div>	
							

								<a href="#" class="remove_field col-sm-12">Remove</a>
							</div>
					</div>
						
							
							<div class="form-group input_fields_wrap">
    <button class="add_field_button btn btn-primary">Add Project Units</button><div>

    <div id="maind">
	<?php
		var_dump($project_punits);
	  for($j=0;$j<count($project_punits);$j++)
	  {
	?>
	<div class="second col-sm-12"><div class="col-sm-4">
							<select class="form-control" name="punitname[]" id="" required="" onchange="">
									<option value="" selected="">Select Unit Type</option>
									 <?php
                                    for($i=0;$i<count($project_units);$i++)
                                    {
                                ?>
                                <option value="<?=$project_units[$i]['id']?>" <?php if($project_units[$i]['id']==$project_punits[$j]['unit_id']){echo "selected";} ?>><?=$project_units[$i]['unit_type']?></option>
                                <?php
                                    }
                                ?>	</select>						
							</div>
							
	<div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $project_punits[$j]['unit_area'];  ?>" id="punitarea[]" name="punitarea[]" placeholder="Enter Area" required="">
							</div>	
							

								<a href="#" class="remove_field col-sm-12">Remove</a>
							</div>
						
							
							<?php
	  }
							?>
							
							</div></div>

</div>

		<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Project Amenities</label>
						<div class="col-sm-9">
							 <?php
					$amarray = $project_pamenties[0];
				//	var_dump($amarray);
                                    for($i=0;$i<count($project_amenities);$i++)
                                    {
                                ?>
									<label class="checkbox-inline">
					<input type="checkbox" id="inlineCheckbox1" name="prjamen[]" <?php if(in_array($project_amenities[$i]['id'],$amarray)){echo "checked";} ?>  value="<?php echo $project_amenities[$i]['id'];  ?>"><?=$project_amenities[$i]['name']?>
				</label>
                                <?php
                                    }
                                ?>
						
						
				
							</div>	</div>
							
							
							<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap1"); //Fields wrapper
    var add_button      = $(".add_field_button1"); //Add button ID
   var tcon = $('#maind').html();
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-12"><input class="col-sm-6" type="text" name="pimagetitle[]" id="pimagetitle" placeholder="Project Image Name"><input type="file" class="col-sm-6" name="pimage[]" id="pimage"><a href="#" class="col-sm-12 remove_field2">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field2", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});





$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_field_button2"); //Add button ID
   var tcon = $('#maind2').html();
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-12"><input class="col-sm-6" type="text" name="fplanname[]" id="fplanname" placeholder="Project Image Name"><input class="col-sm-6"  type="file" name="fplanimage[]" id="fplanimage"><a href="#" class="col-sm-12 remove_field3">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field3", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});





</script>
							
							
							
							
							
							
							
							
				<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Project Images</label>
						<div class="col-sm-9">
						
						<div class="input_fields_wrap1">
    <button class="add_field_button1 btn btn-primary">Add Project Images</button>
   <!-- <div class="col-sm-12">
	
	<input class="col-sm-6" type="text" name="pimagetitle[]" id="pimagetitle" placeholder="Project Image Name"><input class="col-sm-6"  type="file" name="pimage[]" id="pimage">
	
	</div>-->
	<?php
	
	//var_dump($project_pimages);
	  for($i=0;$i<count($project_pimages);$i++)
                                    {
                                ?>
	<div class="col-sm-12">
	<input class="col-sm-6" type="text" name="pimagetitle[]" id="pimagetitle" value="<?php echo $project_pimages[$i]['title'];  ?>" placeholder="Project Image Name">
	<input type="file" class="col-sm-6" name="pimage[]" id="pimage"> <?php echo $project_pimages[$i]['image'];  ?><a href="#" class="col-sm-12 remove_field2">Remove</a></div>
<?php
									}
?>
	
	
	
	</div>
						
						
							</div>	</div>				
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Virtual Tour</label>
						<div class="col-sm-9">
						<input type="file" name="pvtour" id="pvtour"><?php echo $project_details[0]['virtual_tour']; ?>
							</div>	</div>		
							
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Project Floor Plan</label>
						<div class="col-sm-9">
						
						<div class="input_fields_wrap2">
    <button class="add_field_button2 btn btn-primary">Add Floor Plan Images</button>
	
		<?php
	
	//var_dump($project_pfplan);
	  for($i=0;$i<count($project_pfplan);$i++)
                                    {
                                ?>
    <div class="col-sm-12"><input class="col-sm-6" type="text" name="fplanname[]" id="fplanname" value="<?php echo $project_pfplan[$i]['title'];  ?>" placeholder=" Image Title"><input class="col-sm-6"  type="file" name="fplanimage[]" id="fpanimage"><?php echo $project_pfplan[$i]['title'];  ?><a href="#" class="col-sm-12 remove_field3">Remove</a></div>

<?php
									}
?>

						
						</div>

							</div>	</div>		
							
							
							
							
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Contact Us</label>
						<div class="col-sm-9">
					<textarea name="pcontactus" cols="40" rows="10" id="pcontactus" class="ckeditor" style="visibility: hidden; display: none;">
					<?php echo $project_details[0]['contact_us']; ?>
					</textarea>
							</div>	</div>	
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">location Map</label>
						<div class="col-sm-9">
						<input type="file" name="plocmap" id="plocmap"><?php echo $project_details[0]['location_map']; ?>
							</div>	</div>	
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Layout Plan</label>
						<div class="col-sm-9">
						<input type="file" name="plplan" id="plplan"><?php echo $project_details[0]['layout_plan']; ?>
							</div>	</div>	
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">About Project</label>
						<div class="col-sm-9">
					<textarea name="aboutprj" cols="40" rows="10" id="aboutprj" class="ckeditor" style="visibility: hidden; display: none;">
						<?php echo $project_details[0]['about_project']; ?>
					</textarea>
							</div>	</div>	
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Project Specification </label>
						<div class="col-sm-9">
					<textarea name="projspec" cols="40" rows="10" id="projspec" class="ckeditor" style="visibility: hidden; display: none;">
						<?php echo $project_details[0]['project_specification']; ?>
					</textarea>
							</div>	</div>	
							
							
							
							
							
								<div class="form-group simple">
								<label for="total_marks" class="col-sm-3 control-label">Brochure</label>
						<div class="col-sm-9">
					<input type="file" name="pbrochure" id="pbrochure"><?php echo $project_details[0]['project_brochure']; ?>
							</div>	</div>	
					
				

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-primary">Add Project</button>
								</div>
							</div>
						</form>
                </div>
            </div>
            </div>    
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".second"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   var tcon = $('#maind9').html();
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append(tcon); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>