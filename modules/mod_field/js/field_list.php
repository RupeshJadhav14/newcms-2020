

<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery.paging.min.js" ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var displayPages = function(data, startIndex) {
            
       // console.log(data);
            var list = "";
            
            for (i = 0; i < data.records.length; i++)
            {
                
                    
                var odd = (i % 2 == 0) ? "" : " class='odd' ";
                list = list + '<li ' + odd + '>';
                list = list + '<div class="chekMain"><div class="chkInn"><label><input type="checkbox" id="status' + data.records[i].id + '" name="status[' + data.records[i].id + ']" value="' + data.records[i].status + '" class="checkbox" /><span></span></label></div></div>';
                list = list + '<div class="hashBox">' + startIndex + '</div>';
                list = list + '<div class="pageName"><a href="index.php?m=mod_faq&a=faq_edit&id=' + data.records[i].id + '"  title="' + data.records[i].question + '">' + data.records[i].question + '</a><ul class="optUl"><li><a href="index.php?m=mod_faq&a=faq_edit&id=' + data.records[i].id + '" title="Edit">Edit</a></li><li><a href="#" onclick="return changeStatus(\'index.php?m=mod_faq&a=change_status\',' + data.records[i].id + ',\'\')" title="Change Status">Change Status</a></li><li class="delLi"><a href="#" onclick="deleteRecord(\'index.php?m=mod_faq&a=delete_faq\',' + data.records[i].id + ')" title="Delete">Delete</a></li></ul><a class="toggleLink" href="javascript:;"></a></div>';
                list = list + '<div><input class="text-center sortTxt" type="text" maxlength="3" id="sort_order'+data.records[i].sort_order+'" name="sort_order['+data.records[i].id+']" value="'+data.records[i].sort_order+'" onblur="if(this.value!='+data.records[i].sort_order+'){changeSortOrder(\'index.php?m=mod_faq&a=save_sortorder\',this.value,'+data.records[i].id+');}if(this.value.length==0){this.value='+data.records[i].sort_order+';}" onkeypress=\'return isNumberic(event);\' /></div>';
                list = list + '<div class="statusBox"  data-title="Status:"><span class="conSpan">' + displayStatus(data.records[i].status) + '</span></div>';
                list = list + '</li>';
                startIndex = startIndex + 1;
            }
            $(".table").find("li:not(.topLi)").remove();
            $(".table").append(list);
            bindListingClick();
        }

        pageData.url = '<?php echo URI::getURL(APP::$moduleName, APP::$actionName) ?>';
		//alert(pageData.url);
        pageData.noOfRecords = totalFaqs;
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
            if ($.trim($("#faq").val()) == "")
            {
                alert("Please enter question");
                return false;
            }
            return true;
        }

        pageData.validateSearch = validateSearchForm;

        resetForm = function()
        {
            $("#faq").val("");
            
            pageData.searchField = "";
            pageData.noOfRecords = totalFaqs;
            doPaging();
        }

        // display message			
<?php // Core::displayMessage("actionResult", "Page Save"); ?>

        // initialize tooltip	
        applyTooltip();

        // initialize popover
        applyPopover();

        // restore value of search form
        function restoreSearchForm()
        {
            if (oldPageState && oldPageState.searchData)
            {
                $("#faq").val(oldPageState.searchData.searchForm.faq);
                $(".numOfRecord").val(oldPageState.searchData.searchForm.numOfRecord);
            }
        }
        restoreSearchForm();

    });

</script>