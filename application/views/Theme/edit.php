<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>ckeditor/samples/css/samples.css">
<script src="<?=base_url('assets/javascripts').'/bootstrap-datepicker.js'?> "></script>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Masters</a></li>
        <li class="active"><a href="#">Edit Theme</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Edit Theme</h1>
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
                        <span class="panel-title">Theme Details</span>
                </div>
                <div class="panel-body">
                    <div class="table-info">
                        <?php
                       // print_r($theme_details); die;
                        
                        ?>
                        <?php echo form_open_multipart('Theme/submit');?>
                            <table class="table table-bordered">                       
                        <tbody>
                            <tr>
                                <td>Header Color</td>
                                <td>
                                    <input type="hidden" id="id" name="id" value="<?=isset($theme_details['id'])?$theme_details['id']:''?>" class="form-control" />
                                    <input type="text" id="header" name="header" class="form-control" value="<?=isset($theme_details['header_color'])?$theme_details['header_color']:''?>" /> 
                                    <span style="color:red;"><?php echo form_error('header');?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Body Color</td>
                                <td>
                                    <input type="text" id="body" name="body" class="form-control" value="<?=isset($theme_details['body_color'])?$theme_details['body_color']:''?>" /> 
                                    <span style="color:red;"><?php echo form_error('body');?></span>
                                </td>
                            </tr>  
                            <tr>
                                <td>Footer Color</td>
                                <td>
                                    <input type="text" id="footer" name="footer" class="form-control" value="<?=isset($theme_details['footer_color'])?$theme_details['footer_color']:''?>" /> 
                                    <span style="color:red;"><?php echo form_error('footer');?></span>
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
<script>
    $('.input-group').datepicker( {format: 'yyyy-mm-dd'});    
    if($("#type").val()!="A")
    {
        $("#YrTr").hide();
    }    
    $("#type").change(function()
    {
        var type= $("#type").val();
        
        if(type=="A")
        {
           $("#YrTr").show();
        }
        else
        {
            $("#YrTr").hide();
        }
    });
</script>