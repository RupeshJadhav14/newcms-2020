<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery.paging.min.js" ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('body').on('.data-api');
        var displayBanners = function(data, startIndex) {
		
			var list = "";
            var title = "";

<?php

if (count(Banner::$action) > 0) {
    $action_json = json_encode(Banner::$action);
    ?>
               
				
    <?php
}
?>
console.log(data);
            for (i = 0; i < data.records.length; i++)
            {
                
		var odd = (i % 2 == 0) ? "" : " class='odd' ";
		list = list + '<li ' + odd + '>';
                var status_link = '';
                
                if(data.records[i].status != '' && data.records[i].status != null && data.records[i].status != undefined)
                {
		//status_link = '<li><a href="#" onclick="return changeStatus(\'index.php?m=mod_banner&a=change_status\',' + data.records[i].id + ',\'\')" title="Change Status">Change Status</a></li>'		  
                }
                list = list + "<tr>";
				//list = list + '<div class="chekMain"><div class="chkInn"><label><input type="checkbox" id="status' + data.records[i].id + '" name="status[' + data.records[i].id + ']" value="' + data.records[i].status + '" class="checkbox" /><span></span></label></div></div>';
				list = list + '<div class="hashBox">' + startIndex + '</div>';
				list = list + '<div class="pageName"><a href="index.php?m=mod_banner&a=banner_edit&id=' + data.records[i].id + '"  title="' + data.records[i].name + '">' + data.records[i].name + '</a><ul class="optUl"><li><a href="index.php?m=mod_banner&a=banner_edit&id=' + data.records[i].id + '" title="Edit">Edit</a></li>'+status_link+'</ul><a class="toggleLink" href="javascript:;"></a></div>';
                                list = list + '<div class="pageName">'+data.records[i].slug+'</div>';
	
                 list = list + '<div class="statusBox" data-title="Status:"><span class="conSpan">' + displayStatus(data.records[i].status) + '</span></div>';
                list = list + "</tr>";
				
                startIndex = startIndex + 1;
            }
		$(".table").find("li:not(.topLi)").remove();
		$(".table").append(list);
		bindListingClick();	


			
        }

        pageData.url = '<?php echo URI::getURL(APP::$moduleName, APP::$actionName) ?>';
        pageData.noOfRecords = totalBanners;
        pageData.pagingBlock = '#pagingNo';
        pageData.callbackFun = displayBanners;
        pageData.perPage = 10;

        // do paging	
        createDataGrid();

        // initialize sorting
        sortData();

        // create function for validating search form
        validateSearchForm = function() {
            if ($.trim($("#banner_name").val()) == "")
            {
                alert("Please enter page name or slug");
                return false;
            }
            return true;
        }

        pageData.validateSearch = validateSearchForm;

        resetForm = function()
        {
            $("#banner_name").val("");
            pageData.searchField = "";
            pageData.noOfRecords = totalBanners;
            doPaging();
        }
        // display message			
<?php Core::displayMessage("actionResult", "Banner Save"); ?>

        // initialize tooltip	
        applyTooltip();

        // initialize popover
        applyPopover();

        // restore value of search form
        function restoreSearchForm()
        {
            if (oldPageState && oldPageState.searchData)
            {
                $("#banner_name").val(oldPageState.searchData.searchForm.banner_name);
            }
        }


        restoreSearchForm();

    });


</script>