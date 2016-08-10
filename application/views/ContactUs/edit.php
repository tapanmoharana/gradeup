<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>ckeditor/samples/css/samples.css">
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Masters</a></li>
        <li class="active"><a href="#">Edit Contact Details</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Edit Contact Details</h1>
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
                        <span class="panel-title">Contact Details</span>
                </div>
                <div class="panel-body">
                    <div class="table-info">
                        <?php
                        //echo "<pre>";print_r($contact_details); die;
                        ?>
                        <?php echo form_open_multipart('ContactUs/submit');?>
                            <table class="table table-bordered">                       
                        <tbody>
                            <tr>
                                <td>Latitude</td>
                                <td>
                                    <input type="hidden" id="id" name="id" value="<?=isset($contact_details['cu_id'])?$contact_details['cu_id']:''?>" class="form-control" />
                                    <input type="text" id="lat" name="lat" class="form-control" value="<?=isset($contact_details['lat'])?$contact_details['lat']:''?>" /> 
                                    <span style="color:red;"><?php echo form_error('lat');?></span>
                                </td>
                            </tr>                             
                            <tr>
                                <td>Longitude</td>
                                <td>
                                    <input type="text" id="longt" name="longt" class="form-control" value="<?=isset($contact_details['longt'])?$contact_details['longt']:''?>" /> 
                                    <span style="color:red;"><?php echo form_error('longt');?></span>
                                </td>
                            </tr> 
                            <tr>
                                <td>Address</td>
                                <td>                                    
                                    <?php echo form_textarea(array('name' =>'address','id'=>'address',"value"=>isset($contact_details['address'])?htmlspecialchars_decode($contact_details['address']):'')); ?>
                                    <span style="color:red;"><?php echo form_error('address');?></span>
                                </td>
                            </tr>                                                      
                            <tr>
                                <td colspan="2">
                                    <center>
                                        <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                                        <button class="btn btn-primary" type="button" onclick="window.location='<?=base_url($currentModule."/view")?>'" id="cancel">Cancel</button>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>  
                        </form>
                </div>
                </div>
            </div>
            </div>    
        </div>
    </div>
</div>