<?php
//echo "<pre>";print_r($images_details); die;
?>
<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/jPages.css">
<script src="<?=base_url('assets/javascripts')?>/jPages.js"></script>
<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/select2.css">
<script src="<?=base_url('assets/javascripts')?>/select2.min.js"></script>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>        
        <li class="active"><a href="#">Image Gallery</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Image Gallery</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="<?=base_url($currentModule."/add")?>"><span class="btn-label icon fa fa-plus"></span>Add Image</a></div>                        
                    <div class="visible-xs clearfix form-group-margin"></div>
                    <form class="pull-right col-xs-12 col-sm-6" action="">
                        <div class="input-group no-margin">
                            <span style="border:none;background: #fff;background: rgba(0,0,0,.05);" class="input-group-addon"><i class="fa fa-search"></i></span>
                            <select id="search_me" name="search_me" style="border:none;background: #fff;background: rgba(0,0,0,.05);" class="form-control no-padding-hr" placeholder="Search...">
                                <option value="">Select Title</option>
                                <?php
                                    for($i=0;$i<count($images_details);$i++)
                                    {
                                ?>
                                <option value="<?=$images_details[$i]['title']?>"><?=$images_details[$i]['title']?></option>
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="itemContainer">
                            <?php
                            $j=1;                            
                            for($i=0;$i<count($images_details);$i++)
                            {
                                
                            ?>
                            <tr <?=$images_details[$i]["status"]=="N"?"style='background-color:#FBEFF2'":""?>>
                                <td><?=$j?></td>
                                <td><img src="<?="../uploads/gallary/images/".$images_details[$i]['attachment']?>" height="50px" width="50px" /></td>
                                <td><?=$images_details[$i]['title']?></td>
                                <td><?=$images_details[$i]['description']?></td>
                                <td><?=$images_details[$i]['upload_date']?></td>
                                <td>
                                    <a href="<?=base_url($currentModule."/edit/".$images_details[$i]['gid'])?>"><i class="fa fa-edit"></i></a>                                                                        
                                    <a href='<?=$images_details[$i]["status"]=="Y"?"disable/".$images_details[$i]["gid"]:"enable/".$images_details[$i]["gid"]?>'><i class='fa <?=$images_details[$i]["status"]=="Y"?"fa-ban":"fa-check"?>' title='<?=$images_details[$i]["status"]=="Y"?"Disable":"Enable"?>'></i></a>
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
            var url  = "<?=base_url().'ImgGallery/search/'?>";	
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
                    for(i=0;i<=array.img_details.length;i++)
                    {
                        str+='<tr style="display: table-row; opacity: 1;">';
                        str+='<td>'+(i+1)+'</td>';
                        str+='<td><img src="../uploads/gallary/images/'+array.img_details[i].attachment+'" width="50px" height="50px"  </td>';
                        str+='<td>'+array.img_details[i].title+'</td>';
                        str+='<td>'+array.img_details[i].description+'</td>';
                        str+='<td>'+array.img_details[i].upload_date+'</td>';
                        str+='<td>';
                        str+='<a href="<?=base_url()?>ImgGallery/edit/'+array.img_details[i].gid+'"><i class="fa fa-edit"></i></a>';
                        str+='<a href="disable/'+array.img_details[i].gid+'"><i title="Disable" class="fa fa-ban"></i></a>';
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