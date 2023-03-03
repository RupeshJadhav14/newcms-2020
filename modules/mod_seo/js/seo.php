<link href="<?php echo URI::getLiveTemplatePath();?>/plugins/pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/plugins/pnotify/jquery.pnotify.min.js"?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/jquery.paging.min.js"?>"></script>
<script type="text/javascript">	
	$(document).ready(function(){	
	var displayPages = function(data,startIndex){ 																									
//									var list = "";
//									var change_status="";
//									var delete_page="";
//									for(i=0;i<data.records.length;i++)
//									{										
//										list = list + "<tr>";
//										list = list + '<td>' + startIndex + '</td><td>' + data.records[i].id + '</td><td style="text-align:left;cursor:pointer" onclick="javascript:location.href=\'index.php?m=mod_seo&a=page_edit&id=' + data.records[i].id + '\'">' + data.records[i].name + '</td><td style="text-align:left;cursor:pointer" onclick="javascript:location.href=\'index.php?m=mod_seo&a=page_edit&id=' + data.records[i].id + '\'">' + data.records[i].slug + '</td><td><div class="controls center"><a href="index.php?m=mod_seo&a=page_edit&id=' + data.records[i].id + '" title="Edit Page" data-title="Edit Page" class="applyTooptip" ><span class="icon12 icomoon-icon-pencil-2" ></span></a></div></td>'
//										list = list + "</tr>";
//										startIndex = startIndex + 1;
//									}
//									$("#pageData").html(list);									
//									applyTooltip();
    var list = "";
            for (i = 0; i < data.records.length; i++)
            {
                var odd = (i % 2 == 0) ? "" : " class='odd' ";
                list = list + '<li ' + odd + '>';
                list = list + '<div class="hashBox">' + startIndex + '</div>';
                list = list + '<div class="pageName"><a href="index.php?m=mod_seo&a=page_edit&id=' + data.records[i].id + '"  title="' + data.records[i].name + '">' + data.records[i].name + '</a><ul class="optUl"><li><a href="index.php?m=mod_seo&a=page_edit&id=' + data.records[i].id + '" title="Edit">Edit</a></li></ul><a class="toggleLink" href="javascript:;"></a></div>';
                list = list + '<div class="alignLeft" data-title="Slug:"><span class="conSpan">' + data.records[i].slug + '</span></div>';
                list = list + '</li>';
                startIndex = startIndex + 1;
            }
            $(".table").find("li:not(.topLi)").remove();
            $(".table").append(list);
            bindListingClick();

            }
                                   
                                   
				   
	pageData.url = '<?php echo URI::getURL(APP::$moduleName,APP::$actionName)?>';
	pageData.noOfRecords = totalPages;
	pageData.pagingBlock = '#pagingNo';
	pageData.callbackFun = displayPages;
	pageData.perPage = $('.numOfRecord').val();
        if (oldPageState && oldPageState.searchData != undefined && oldPageState.searchData.searchForm.numOfRecord != undefined)
        {
            pageData.perPage = oldPageState.searchData.searchForm.numOfRecord;
        }
	
	// do paging	
	createDataGrid();
	
	// initialize sorting
	sortData();	
	
	// create function for validating search form
	validateSearchForm = function(){
							if($.trim($("#seo_name").val()) == "")
							{
								alert("Please enter page name");
								return false;
							}
							return true;
						 }
						 
	pageData.validateSearch = validateSearchForm;
	
	resetForm = function()
				{
					$("#seo_name").val("");
					pageData.searchField = "";
					pageData.noOfRecords = totalPages;
					doPaging();
				}
	
	// display message			
	<?php Core::displayMessage("actionResult","Page Save");?>
	
	// initialize tooltip	
	applyTooltip();
	
	// initialize popover
	applyPopover();	
	
	// restore value of search form
	function restoreSearchForm()
	{
		if(oldPageState && oldPageState.searchData)
		{
			$("#seo_name").val(oldPageState.searchData.searchForm.seo_name);
                        $(".numOfRecord").val(oldPageState.searchData.searchForm.numOfRecord);
		}
	}
	restoreSearchForm();
			
	});
	
</script>