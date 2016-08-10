<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>ckeditor/samples/css/samples.css">
<script src="<?=base_url('assets/javascripts').'/bootstrap-datepicker.js'?> "></script>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Masters</a></li>
        <li class="active"><a href="#">Add Publication</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Add Publication</h1>
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
                        <span class="panel-title">Publication Details</span>
                </div>
                <div class="panel-body">
                    <div class="table-info">
                        <?php echo form_open_multipart('Publications/submit');?>
                            <table class="table table-bordered">                       
                                <tbody>
                                    <tr>
                                        <td>Type</td>
                                        <td>
                                            <input type="hidden" id="id" name="id" value="" class="form-control" />
                                            <select id="type" name="type" class="form-control"> 
                                                <option value="">--Select Type--</option>
                                                <option value="N">News</option>
                                                <option value="P">Publications</option>
                                            </select>
                                            <span style="color:red;"><?php echo form_error('type');?></span>
                                        </td>
                                    </tr>
                                    <tr id="TrA2">
                                        <td>PDF</td>
                                        <td>
                                            <input type="file" id="attachment2" name="attachment2" class="form-control no-border" /> 
                                            <span style="color:red;" ><?php echo form_error('attachment2');?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Image</td>
                                        <td>
                                            <input type="file" id="attachment" name="attachment" class="form-control no-border" /> 
                                            <span style="color:red;" ><?php echo form_error('attachment');?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td>                                    
                                            <input type="text" id="dt" name="dt" class="form-control input-group" value="<?=isset($_REQUEST['dt'])?$_REQUEST['dt']:''?>" /> 
                                        <span style="color:red;"><?php echo form_error('dt');?></span>
                                        </td>
                                    </tr>                             
                                    <tr>
                                        <td>Name</td>
                                        <td>
                                                <input type="text" id="title" name="title" class="form-control" value="<?=isset($_REQUEST['title'])?$_REQUEST['title']:''?>" /> 
                                            <span style="color:red;"><?php echo form_error('title');?></span>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>Description</td>
                                        <td>                                    
                                            <?php echo form_textarea(array('name' =>'description','id'=>'description','class'=>"ckeditor")); ?>
                                            <span style="color:red;"><?php echo form_error('description');?></span>
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
    if($("#type").val()!="P")
    {
        $("#TrA2").hide();
    }    
    $("#type").change(function()
    {
        var type= $("#type").val();
        
        if(type=="P")
        {
           $("#TrA2").show();
        }
        else
        {
            $("#TrA2").hide();
        }
    });
</script>