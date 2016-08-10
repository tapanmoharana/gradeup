<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/jPages.css">
<script src="<?=base_url('assets/javascripts')?>/jPages.js"></script>
<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/select2.css">
<script src="<?=base_url('assets/javascripts')?>/select2.min.js"></script>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>        
        <li class="active"><a href="#">Achievements</a></li>
    </ul>
	<?php
	//var_dump($achievement_details);
	?>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Achievements</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="<?=base_url($currentModule."/add")?>"><span class="btn-label icon fa fa-plus"></span>Add Achievement</a></div>                        
                    <div class="visible-xs clearfix form-group-margin"></div>
                    <form class="pull-right col-xs-12 col-sm-6" action="">
                        <div class="input-group no-margin">
                        	<span style="border:none;background: #fff;background: rgba(0,0,0,.05);" class="input-group-addon"><i class="fa fa-search"></i></span>
                            <select id="search_me" name="search_me" style="border:none;background: #fff;background: rgba(0,0,0,.05);" class="form-control no-padding-hr" placeholder="Search...">
                                <option value="">Select Title</option>
                                <?php
                                    for($i=0;$i<count($achievement_details);$i++)
                                    {
                                ?>
                                <option value="<?=$achievement_details[$i]['achievement_name']?>"><?=$achievement_details[$i]['achievement_name']?></option>
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
                        <span class="panel-title">List</span>
                        <div class="holder"></div>
                </div>
                <div class="panel-body">
                    <div class="table-info">                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                    <th>#</th>
                                    <th>Img</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="itemContainer">
                            <?php
                            $j=1;                            
                            for($i=0;$i<count($achievement_details);$i++)
                            {
                                
                            ?>
                            <tr <?=$achievement_details[$i]["status"]=="N"?"style='background-color:#FBEFF2'":""?>>
                                <td><?=$j?></td>
                                <?php
                                    $type=$achievement_details[$i]['type'];
                                    $type_name="";
                                    switch($type)
                                    {
                                        case "1":
                                            $type="Achievements/";
                                            $type_name="Achievements";
                                        break;  
                                        case "2":
                                            $type="Testiminials";
                                            $type_name="Testiminials";
                                        break;
                                        case "3":
                                            $type="Key Members";
                                            $type_name="Key Members";
                                        break;
										 case "4":
                                            $type="News and Events";
                                            $type_name="News and Events";
                                        break;
										 case "5":
                                            $type="Awards";
                                            $type_name="Awards";
                                        break;
										 case "6":
                                            $type="About Us";
                                            $type_name="About Us";
                                        break;
										 case "7":
                                            $type="IMS Policy";
                                            $type_name="IMS Policy";
                                        break;
										 case "8":
                                            $type="Vision";
                                            $type_name="Vision";
                                        break;
										 case "9":
                                            $type="Mission";
                                            $type_name="Mission";
                                        break;
										 case "10":
                                            $type="Philosopy";
                                            $type_name="Philosopy";
                                        break;
										 case "11":
                                            $type="Journey of success";
                                            $type_name="Journey of success";
                                        break;
										 
                                    }
                                ?>
                                <td><img src="<?="../uploads/content_type/".$achievement_details[$i]['achievement_image']?>" height="50px" width="50px" /></td>
                                <td><?=$type_name?></td>                                
                                <td><?=$achievement_details[$i]['achievement_name']?></td>
                                <td><?=($achievement_details[$i]['achievement_description'])?></td>
                                <td><?=$achievement_details[$i]['upload_date']?></td>
                                <td>
                                    <a href="<?=base_url($currentModule."/edit/".$achievement_details[$i]['achi_id'])?>"><i class="fa fa-edit"></i></a>                                                                        
                                    <a href='<?=$achievement_details[$i]["status"]=="Y"?"disable/".$achievement_details[$i]["achi_id"]:"enable/".$achievement_details[$i]["achi_id"]?>'><i class='fa <?=$achievement_details[$i]["status"]=="Y"?"fa-ban":"fa-check"?>' title='<?=$achievement_details[$i]["status"]=="Y"?"Disable":"Enable"?>'></i></a>
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
            var url  = "<?=base_url().'Achievement/search/'?>";	
            var data = {title: search_val};		
            var type="";
            var type_name="";
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
                    for(i=0;i<=array.achievement_details.length;i++)
                    {
                        str+='<tr style="display: table-row; opacity: 1;">';
                        str+='<td>'+(i+1)+'</td>';                        
                        switch(array.achievement_details[i].type)
                        {
                            case "H":
                                type="honors/";
                                type_name="Honors/Certificates";
                            break;  
                            case "L":
                                type="letter_appreciation/";
                                type_name="Letter of appreciations";
                            break;
                            case "A":
                                type="yearwise/";
                                type_name="Achievement Year wise";
                            break;
                        }
                        str+='<td><img src="../uploads/achievements/'+type+array.achievement_details[i].achievement_image+'" width="50px" height="50px"  </td>';
                        str+='<td>'+type_name+'</td>';
                        str+='<td>'+array.achievement_details[i].achievement_name+'</td>';
                        str+='<td>'+array.achievement_details[i].achievement_description+'</td>';
                        str+='<td>'+array.achievement_details[i].upload_date+'</td>';
                        str+='<td>';
                        str+='<a href="<?=base_url()?>admin_panel/Achievements/edit/'+array.achievement_details[i].achi_id+'"><i class="fa fa-edit"></i></a>';
                        str+='<a href="disable/'+array.achievement_details[i].achi_id+'"><i title="Disable" class="fa fa-ban"></i></a>';
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
    