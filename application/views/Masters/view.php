<?php
//echo "<pre>";print_r($slokas_details); die;

?>
<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/jPages.css">
<script src="<?=base_url('assets/javascripts')?>/jPages.js"></script>
<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/select2.css">
<script src="<?=base_url('assets/javascripts')?>/select2.min.js"></script>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>        
        <li class="active"><a href="#">City Master</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;City Master</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="<?=base_url($currentModule."/add_city")?>"><span class="btn-label icon fa fa-plus"></span>Add City</a></div>                        
                    <div class="visible-xs clearfix form-group-margin"></div>
                    <form class="pull-right col-xs-12 col-sm-6" action="">
                        <div class="input-group no-margin">
                            <span style="border:none;background: #fff;background: rgba(0,0,0,.05);" class="input-group-addon"><i class="fa fa-search"></i></span>
                                                        <select id="search_me" name="search_me" style="border:none;background: #fff;background: rgba(0,0,0,.05);" class="form-control no-padding-hr" placeholder="Search...">
                                <option value="">Select Name</option>
                                <?php
                                    for($i=0;$i<count($slokas_details);$i++)
                                    {
                                ?>
                                <option value="<?=$slokas_details[$i]['name']?>"><?=$slokas_details[$i]['name']?></option>
                                <?php
                                    }
                                ?>
                            </select>

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
                        <span class="panel-title">City List</span>
                        <div class="holder"></div>
                </div>
                <div class="panel-body">
                    <div class="table-info">                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                               
                               <th>Options</th>
                            </tr>
                        </thead>
                        <tbody id="itemContainer">
                            <?php
                            $j=1;
                            for($i=0;$i<count($slokas_details);$i++)
                            {
                            ?>
                            <tr <?=$slokas_details[$i]["status"]=="N"?"style='background-color:#FBEFF2'":""?>>
                                <td><?=$j?></td>
                                <td><?=$slokas_details[$i]['name']?></td>
                          
                              <td>
                                    <a href="<?=base_url($currentModule."/edit/".$slokas_details[$i]['id'])?>"><i class="fa fa-edit"></i></a>                                                                        
                                    <a href='<?=$slokas_details[$i]["status"]=="Y"?"disable/".$slokas_details[$i]["id"]:"enable/".$slokas_details[$i]["id"]?>'><i class='fa <?=$slokas_details[$i]["status"]=="Y"?"fa-ban":"fa-check"?>' title='<?=$slokas_details[$i]["status"]=="Y"?"Disable":"Enable"?>'></i></a>
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
   $("#search_me").select2({
      placeholder: "Enter title",
      allowClear: true
    });
    
    $("#search_me").on('change',function()
        {
            var search_val = $(this).val();            
            var url  = "<?=base_url().'Slokas/search/'?>";	
            var data = {title: search_val};		
            $.ajax
            ({
                type: "POST",
                url: url,
                data: data,
                dataType: "html",
                cache: false,
                crossDomain: true,
                success: function(data)
                {                       
                    var array=JSON.parse(data);
                    var str="";                    
                    for(i=0;i<=array.slokas_details.length;i++)
                    {
                        str+='<tr style="display: table-row; opacity: 1;">';
                        str+='<td>'+(i+1)+'</td>';                        
                        str+='<td>'+array.slokas_details[i].title+'</td>';
                        str+='<td>'+array.slokas_details[i].description+'</td>';
                        str+='<td><a href="<?=base_url()?>uploads/slokas/'+array.slokas_details[i].attachment+'" title="Download" target="_blank"><i class="fa fa-download"></i></a></td>';                        
                        str+='<td>';
                        str+='<a href="<?=base_url()?>Slokas/edit/'+array.slokas_details[i].sid+'"><i class="fa fa-edit"></i></a>';
                        str+='<a href="disable/'+array.slokas_details[i].sid+'"><i title="Disable" class="fa fa-ban"></i></a>';
                        str+='</td>';
                        str+='</tr>';
                        $("#itemContainer").html(str);
                    }
                },
                error: function(data)
                {
                    alert("Page Or Folder Not Created..!!");
                }
            });
        });
    
</script>    