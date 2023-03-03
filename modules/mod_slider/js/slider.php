
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery.paging.min.js" ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var displayPages = function(data, startIndex) {
            var list = "";
            for (i = 0; i < data.records.length; i++)
            {
//                var odd = (i % 2 == 0) ? "" : " class='odd' ";
//                list = list + '<li ' + odd + '>';
//                list = list + '<div class="chekMain"><div class="chkInn"><label><input type="checkbox" id="status' + data.records[i].id + '" name="status[' + data.records[i].id + ']" value="' + data.records[i].status + '" class="checkbox" /><span></span></label></div></div>';
//                list = list + '<div class="hashBox">' + startIndex + '</div>';
//                list = list + '<div class="pageName"><a href="index.php?m=mod_slider&a=slider_edit&id=' + data.records[i].id + '"  title="' + data.records[i].title + '">' + data.records[i].title + '</a><ul class="optUl"><li><a href="index.php?m=mod_slider&a=slider_edit&id=' + data.records[i].id + '" title="Edit">Edit</a></li><li><a href="#" onclick="return changeStatus(\'index.php?m=mod_slider&a=change_status\',' + data.records[i].id + ',\'\')" title="Change Status">Change Status</a></li><li class="delLi"><a href="#" onclick="deleteRecord(\'index.php?m=mod_slider&a=delete_slider\',' + data.records[i].id + ')" title="Delete">Delete</a></li></ul><a class="toggleLink" href="javascript:;"></a></div>';
//                 list = list + '<div><input class="text-center sortTxt" type="text" maxlength="3" id="sort_order'+data.records[i].sort_order+'" name="sort_order['+data.records[i].id+']" value="'+data.records[i].sort_order+'" onblur="if(this.value!='+data.records[i].sort_order+'){changeSortOrder(\'index.php?m=mod_slider&a=save_sortorder\',this.value,'+data.records[i].id+');}if(this.value.length==0){this.value='+data.records[i].sort_order+';}" onkeypress=\'return isNumberic(event);\' /></div>';
//                list = list + '<div class="statusBox" data-title="Status:"><span class="conSpan">' + displayStatus(data.records[i].status) + '</span></div>';
//                list = list + '</li>';
                
                list = list + '<tr>';
                list = list + '<td class="chekMain" align="center"><div class="chkInn"><label><input type="checkbox" id="status' + data.records[i].id + '" name="status[' + data.records[i].id + ']" value="' + data.records[i].status + '" class="checkbox" /><span></span></label></div></td>';
                list = list + '<td class="hide-mobile" align="center">' + startIndex + '</td>';
                list = list + '<td class="pageName"><a href="index.php?m=mod_slider&a=slider_edit&id=' + data.records[i].id + '"  title="' + data.records[i].title + '">' + data.records[i].title + '</a><ul class="optUl"><li><a href="index.php?m=mod_slider&a=slider_edit&id=' + data.records[i].id + '" title="Edit">Edit</a></li><li><a href="#" onclick="return changeStatus(\'index.php?m=mod_slider&a=change_status\',' + data.records[i].id + ',\'\')" title="Change Status">Change Status</a></li><li class="delLi"><a href="#" onclick="deleteRecord(\'index.php?m=mod_slider&a=delete_slider\',' + data.records[i].id + ')" title="Delete">Delete</a></li></ul><a class="toggleLink" href="javascript:;"></a></td>';

                //list = list + '<td class="" data-title="Image:" align="center"><img src="../media/slider/'+data.records[i].image_name+ ' " alt="Stickman" width="24" height="39"> </td>';


                 list = list + '<td class="" data-title="Sort Order:" align="center"><input class="text-center sortTxt" type="text" maxlength="3" id="sort_order'+data.records[i].sort_order+'" name="sort_order['+data.records[i].id+']" value="'+data.records[i].sort_order+'" onblur="if(this.value!='+data.records[i].sort_order+'){changeSortOrder(\'index.php?m=mod_slider&a=save_sortorder\',this.value,'+data.records[i].id+');}if(this.value.length==0){this.value='+data.records[i].sort_order+';}" onkeypress=\'return isNumberic(event);\' /></td>';
                list = list + '<td class="statusBox" data-title="Status:" align="center"><span class="conSpan">' + displayStatus(data.records[i].status) + '</span></td>';
                list = list + '</tr>';
                startIndex = startIndex + 1;
            }
           $(".tableData").html('');
            $(".tableData").append(list);
            bindListingClick();
        }

        pageData.url = '<?php echo URI::getURL(APP::$moduleName, APP::$actionName) ?>';
        pageData.noOfRecords = totalSliders;
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
            if ($.trim($("#slider_name").val()) == "")
            {
                alert("Please enter slider name");
                return false;
            }
            return true;
        }

        pageData.validateSearch = validateSearchForm;

        resetForm = function()
        {
            $("#slider_name").val("");
            console.log(pageData)
            pageData.searchField = "";
            pageData.noOfRecords = totalSliders;
            doPaging();
        }

        // display message			
<?php Core::displayMessage("actionResult", "Slider Save"); ?>

        // initialize tooltip	
        applyTooltip();

        // initialize popover
        applyPopover();

        // restore value of search form
        function restoreSearchForm()
        {
            if (oldPageState && oldPageState.searchData)
            {
                $("#slider_name").val(oldPageState.searchData.searchForm.slider_name);
                $(".numOfRecord").val(oldPageState.searchData.searchForm.numOfRecord);
            }
        }
        restoreSearchForm();

    });

</script>