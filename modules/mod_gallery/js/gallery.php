<!--<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/jquery.paging.min.js"?>"></script>
<script type="text/javascript">	
	$(document).ready(function(){	
	var displayGallerys = function(data,startIndex){ 																									
									var list = "";
									for(i=0;i<data.records.length;i++)
									{	
										list = list + "<tr>";
										list = list + '<td>' + startIndex + '</td><td class="chChildren"><input type="checkbox" id="status' + data.records[i].id + '" name="status[' + data.records[i].id + ']" value="' + data.records[i].status + '" class="styled" /></td><td>' + data.records[i].id + '</td><td style="text-align:left;cursor:pointer" onclick="javascript:location.href=\'index.php?m=mod_gallery&a=gallery_edit&id=' + data.records[i].id + '\'">' + data.records[i].name + '</td><td><input class="text-center inner-page-checkbox" type="text" maxlength="4"  id="sort_order'+data.records[i].sort_order+'" name="sort_order['+data.records[i].id+']" value="'+data.records[i].sort_order+'" onblur="if(this.value!='+data.records[i].sort_order+'){changeSortOrder(\'index.php?m=mod_gallery&a=save_sortorder\',this.value,'+data.records[i].id+');}if(this.value.length==0){this.value='+data.records[i].sort_order+';}" onkeypress=\'return isNumberic(event);\' /></td><td>' + displayStatus(data.records[i].status) + '</td><td><div class="controls center"><a href="index.php?m=mod_gallery&a=gallery_edit&id=' + data.records[i].id + '" title="Edit Gallery" data-title="Edit Gallery" class="applyTooptip" ><span class="icon12 icomoon-icon-pencil-2" ></span></a><a href="#" title="Change Status" data-title="Change Status" class="applyTooptip" onclick="return changeStatus(\'index.php?m=mod_gallery&a=change_status\',' + data.records[i].id + ',\'\')"><span class="icon12 icomoon-icon-tab-2 greenColor"></span></a><a href="#" title="Delete Gallery" data-title="Delete Gallery" class="applyTooptip" onclick="deleteRecord(\'index.php?m=mod_gallery&a=delete_gallery\',' + data.records[i].id + ')"><span class="icon12 icomoon-icon-remove redColor"></span></a></div></td>'
										list = list + "</tr>";
										startIndex = startIndex + 1;
									}
									$("#galleryData").html(list);									
									applyTooltip();										                                                                         
				   }
				   
	pageData.url = '<?php echo URI::getURL(APP::$moduleName,APP::$actionName)?>';
	pageData.noOfRecords = totalGallerys;
	pageData.pagingBlock = '#pagingNo';
	pageData.callbackFun = displayGallerys;
	pageData.perPage = 10;
	
	// do paging	
	createDataGrid();
	
	// initialize sorting
	sortData();	
	
	// create function for validating search form
	validateSearchForm = function(){
							if($.trim($("#gallery_name").val()) == "")
							{
								alert("Please enter gallery name");
								return false;
							}
							return true;
						 }
						 
	pageData.validateSearch = validateSearchForm;
	
	resetForm = function()
				{
					$("#gallery_name").val("");
					pageData.searchField = "";
					pageData.noOfRecords = totalGallerys;
					doPaging();
				}
	
	// display message			
	<?php Core::displayMessage("actionResult","Gallery Save");?>
	
	// initialize tooltip	
	applyTooltip();
	
	// initialize popover
	applyPopover();	
	
	// restore value of search form
	function restoreSearchForm()
	{
		if(oldPageState && oldPageState.searchData)
		{
			$("#gallery_name").val(oldPageState.searchData.searchForm.gallery_name);
		}
	}
	restoreSearchForm();
        
});
	
</script>-->



<!------------------------------------------------------- ------------------------>

<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery.paging.min.js" ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var displayPages = function(data, startIndex) {
            var list = "";
            for (i = 0; i < data.records.length; i++)
            {
                var odd = (i % 2 == 0) ? "" : " class='odd' ";
                list = list + '<li ' + odd + '>';
                list = list + '<div class="chekMain"><div class="chkInn"><label><input type="checkbox" id="status' + data.records[i].id + '" name="status[' + data.records[i].id + ']" value="' + data.records[i].status + '" class="checkbox" /><span></span></label></div></div>';
                list = list + '<div class="hashBox">' + startIndex + '</div>';
                list = list + '<div class="pageName"><a href="index.php?m=mod_gallery&a=gallery_edit&id=' + data.records[i].id + '"  title="' + data.records[i].name + '">' + data.records[i].name + '</a><ul class="optUl"><li><a href="index.php?m=mod_gallery&a=gallery_edit&id=' + data.records[i].id + '" title="Edit">Edit</a></li><li><a href="#" onclick="return changeStatus(\'index.php?m=mod_gallery&a=change_status\',' + data.records[i].id + ',\'\')" title="Change Status">Change Status</a></li><li class="delLi"><a href="#" onclick="deleteRecord(\'index.php?m=mod_gallery&a=delete_gallery\',' + data.records[i].id + ')" title="Delete">Delete</a></li></ul><a class="toggleLink" href="javascript:;"></a></div>';
                list = list + '<div><input class="text-center inner-page-checkbox" type="text" maxlength="4" id="sort_order'+data.records[i].sort_order+'" name="sort_order['+data.records[i].id+']" value="'+data.records[i].sort_order+'" onblur="if(this.value!='+data.records[i].sort_order+'){changeSortOrder(\'index.php?m=mod_gallery&a=save_sortorder\',this.value,'+data.records[i].id+');}if(this.value.length==0){this.value='+data.records[i].sort_order+';}" onkeypress=\'return isNumberic(event);\' /></div>';
                list = list + '<div class="statusBox" data-title="Status:"><span class="conSpan">' + displayStatus(data.records[i].status) + '</span></div>';
                list = list + '</li>';
                startIndex = startIndex + 1;
            }
            $(".table").find("li:not(.topLi)").remove();
            $(".table").append(list);
            bindListingClick();
        }

        pageData.url = '<?php echo URI::getURL(APP::$moduleName, APP::$actionName) ?>';
        pageData.noOfRecords = totalGallerys;
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
        validateSearchForm = function() {
            if ($.trim($("#gallery_name").val()) == "")
            {
                alert("Please enter gallery name");
                return false;
            }
            return true;
        }

        pageData.validateSearch = validateSearchForm;

        resetForm = function()
        {
            $("#gallery_name").val("");
            console.log(pageData)
            pageData.searchField = "";
            pageData.noOfRecords = totalGallerys;
            doPaging();
        }

        // display message			
<?php Core::displayMessage("actionResult", "Gallery Save"); ?>

        // initialize tooltip	
        applyTooltip();

        // initialize popover
        applyPopover();

        // restore value of search form
        function restoreSearchForm()
        {
            if (oldPageState && oldPageState.searchData)
            {
                $("#gallery_name").val(oldPageState.searchData.searchForm.gallery_name);
                $(".numOfRecord").val(oldPageState.searchData.searchForm.numOfRecord);
            }
        }
        restoreSearchForm();

    });

</script>