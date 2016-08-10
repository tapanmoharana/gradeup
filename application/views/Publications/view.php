<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/jPages.css">
<script src="<?=base_url('assets/javascripts')?>/jPages.js"></script>
<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/select2.css">
<script src="<?=base_url('assets/javascripts')?>/select2.min.js"></script>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>        
        <li class="active"><a href="#">Publications </a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Publications</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="<?=base_url($currentModule."/add")?>"><span class="btn-label icon fa fa-plus"></span>Add Publications</a></div>                        
                    <div class="visible-xs clearfix form-group-margin"></div>
                    <form class="pull-right col-xs-12 col-sm-6" action="">
                        <div class="input-group no-margin">
                            <span style="border:none;background: #fff;background: rgba(0,0,0,.05);" class="input-group-addon"><i class="fa fa-search"></i></span>
                            <select id="search_me" name="search_me" style="border:none;background: #fff;background: rgba(0,0,0,.05);" class="form-control no-padding-hr" placeholder="Search...">
                                <option value="">Select Title</option>
                                <?php
                                    for($i=0;$i<count($publications_details);$i++)
                                    {
                                ?>
                                <option value="<?=$publications_details[$i]['title']?>"><?=$publications_details[$i]['title']?></option>
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
                                <th>Type</th>                                    
                                <th>Title</th>                                
                                <th>Description</th>
                                <th>PDF</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="itemContainer">
                            <?php
                            $j=1;                            
                          //  print_r($publications_details); die;
                            for($i=0;$i<count($publications_details);$i++)
                            {                                
                            ?>
                            <tr <?=$publications_details[$i]["status"]=="N"?"style='background-color:#FBEFF2'":""?>>
                                <td><?=$j?></td>
                                <?php $type=$publications_details[$i]['type']=="N"?"news":"publications"; ?>
                                <td><img src="<?=base_url('uploads/publications')."/".$type."/".$publications_details[$i]['attachment']?>" height="50px" width="50px" /></td>                                                                
                                <td><?=ucfirst($type)?></td>
                                
                                <td><?=$publications_details[$i]['title']?></td>
                                <td><?=$publications_details[$i]['description']?></td>
                                <td>
                                    <?php if($type=="publications" && $publications_details[$i]['pdf_attachment']!=NULL) { ?>
                                    <a target="_blank" href="<?=base_url('uploads/publications/publications/pdf/')."/".$publications_details[$i]['pdf_attachment']?>"><i class="fa fa-download"></i></a>
                                    <?php } else { echo "--";}
                                    ?>
                                </td>
                                <td>
                                    <a href="<?=base_url($currentModule."/edit/".$publications_details[$i]['pub_id'])?>"><i class="fa fa-edit"></i></a>                                                                        
                                    <a href='<?=$publications_details[$i]["status"]=="Y"?"disable/".$publications_details[$i]["pub_id"]:"enable/".$publications_details[$i]["pub_id"]?>'><i class='fa <?=$publications_details[$i]["status"]=="Y"?"fa-ban":"fa-check"?>' title='<?=$publications_details[$i]["status"]=="Y"?"Disable":"Enable"?>'></i></a>
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
            var url  = "<?=base_url().'Publications/search/'?>";	
            var type="";
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
                    for(i=0;i<=array.publications_details.length;i++)
                    {
                        str+='<tr style="display: table-row; opacity: 1;">';
                        str+='<td>'+(i+1)+'</td>';
                        
                        switch(array.publications_details[i].type)
                        {
                            case "N":
                                type="news";
                            break; 
                            case "P":
                                type="publications";
                            break; 
                            
                        }
                        str+='<td><img src="../uploads/publications/'+type+'/'+array.publications_details[i].attachment+'" width="50px" height="50px"  </td>';
                        str+='<td>'+ type.charAt(0).toUpperCase() + type.slice(1).toLowerCase();+'</td>';
                        str+='<td>'+array.publications_details[i].title+'</td>';
                        str+='<td>'+array.publications_details[i].description+'</td>';                                           
                        if(array.publications_details[i].pdf_attachment!=null && array.publications_details[i].pdf_attachment!="" )
                        {                            
                            str+='<td><a target="_blank" href="../uploads/publications/publications/pdf/'+array.publications_details[i].pdf_attachment+'"><i class="fa fa-download"></a></td>';                        
                        }
                        else
                        {
                            str+='<td>--</td>';                        
                        }                       
                        str+='<td>';
                        str+='<a href="<?=base_url()?>admin_panel/Publications/edit/'+array.publications_details[i].pub_id+'"><i class="fa fa-edit"></i></a>';
                        str+='<a href="disable/'+array.publications_details[i].pub_id+'"><i title="Disable" class="fa fa-ban"></i></a>';
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