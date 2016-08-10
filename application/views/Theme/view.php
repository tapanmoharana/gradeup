<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/jPages.css">
<script src="<?=base_url('assets/javascripts')?>/jPages.js"></script>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>        
        <li class="active"><a href="#">Themes</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Themes</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
<!--                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="<?=base_url($currentModule."/add")?>"><span class="btn-label icon fa fa-plus"></span>Add Themes</a></div>                        -->
                    <div class="visible-xs clearfix form-group-margin"></div>
                    <form class="pull-right col-xs-12 col-sm-6" action="">
                        <div class="input-group no-margin">
                        </div>
                    </form>
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
                        <span class="panel-title">List</span>
                        <div class="holder"></div>
                </div>
                <div class="panel-body">
                    <div class="table-info">                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                    <th>#</th>
                                    <th>Day</th>
                                    <th>Header Color</th>
                                    <th>Body Color</th>
                                    <th>Footer Color</th>                                    
                                    <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="itemContainer">
                            <?php
                            $j=1;        
                            //echo "<pre>";print_r($theme_details); die;
                            for($i=0;$i<count($theme_details);$i++)
                            {
                                
                            ?>
                            <tr>
                                <td><?=$j?></td>
                                <td><?=$theme_details[$i]['day_id']?></td>
                                <td><div style="background-color: <?=$theme_details[$i]['header_color']?>;height:30px; width:100px;"></div></td>
                                <td><div style="background-color: <?=$theme_details[$i]['body_color']?>;height:30px; width:100px;"></div></td>
                                <td><div style="background-color: <?=$theme_details[$i]['footer_color']?>;height:30px; width:100px;"></div></td>                                
                                <td>
                                    <a href="<?=base_url($currentModule."/edit/".$theme_details[$i]['id'])?>"><i class="fa fa-edit"></i></a>                                                                        
                                    <a href='<?=$theme_details[$i]["status"]=="Y"?"disable/".$theme_details[$i]["id"]:"enable/".$theme_details[$i]["id"]?>'><i class='fa <?=$theme_details[$i]["status"]=="Y"?"fa-ban":"fa-check"?>' title='<?=$theme_details[$i]["status"]=="Y"?"Disable":"Enable"?>'></i></a>
                                </td>
                            </tr>
                            <?php
                            $j++;
                            }
                            ?>                            
                        </tbody>
                    </table>                    
                </div>
                </div>
            </div>
            </div>    
        </div>
    </div>
</div>
<script>
  $("div.holder").jPages
  ({
    containerID : "itemContainer"
  });
</script>
    