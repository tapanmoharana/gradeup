<?php

//print_r($roles_details); die;
?>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Masters</a></li>
        <li class="active"><a href="#">Edit Roles</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Roles Master</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" onclick="javascript:addMaster('<?=site_url($currentModule."/add")?>');" href="#"><span class="btn-label icon fa fa-plus"></span>Create Roles</a></div>                        
                    <div class="visible-xs clearfix form-group-margin"></div>                    
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
                        <span class="panel-title">Roles Details</span>
                </div>
                <div class="panel-body">
                    <div class="table-info">
                        <form class="panel form-horizontal" action="<?=base_url($currentModule)?>/submit" method="POST">
                            <table class="table table-bordered">                       
                        <tbody>
                            <tr>
                                <td>Roles Name</td>
                                <td>
                                    <input type="hidden" id="id" name="id" class="form-control" value="<?php echo isset($roles_details['roles_id'])?$roles_details['roles_id']:''; ?>" />
                                    <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($roles_details['roles_name'])?$roles_details['roles_name']:''; ?>" /> 
                                <span style="color:red;"><?php echo form_error('name');?></span>
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