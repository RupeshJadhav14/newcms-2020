<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery.paging.min.js" ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var displayPages = function(data, startIndex) {

            // console.log(data);
            var list = "";
            var qList = "";
            var sta = "";
			var path = "";
            for (i = 0; i < data.records.length; i++)
            {
				
				//alert(data.records[i].image_name);
				path = "<?php echo CFG::$livePath.'/media/'.CFG::$mypageDir; ?>/"+data.records[i].image_name;
				
				
				
                list = list + '<tr>';
                list = list + '<td class="chekMain" align="center"><div class="chkInn"><label><input type="checkbox" id="status' + data.records[i].id + '" name="status[' + data.records[i].id + ']" value="' + data.records[i].status + '" class="checkbox" /><span></span></label></div></td>';
                list = list + '<td class="hide-mobile" align="center">' + startIndex + '</td>';
                list = list + '<td class="hide-mobile" align="center"><img style="width:50px;height:50px;" src=' + path + '></td>';
				list = list + '<td class="pageName"><a href="index.php?m=mod_mypage&a=mypage_edit&id=' + data.records[i].id + '"  title="' + data.records[i].name + '">' + data.records[i].name + '</a><ul class="optUl"><li><a href="index.php?m=mod_mypage&a=mypage_edit&id=' + data.records[i].id + '" title="Edit">Edit</a></li>';
              list = list + '<li><a href="#" onclick="return changeStatus(\'index.php?m=mod_mypage&a=change_status\',' + data.records[i].id + ',\'\')" title="Change Status">Change Status</a></li><li class="delLi"><a href="#" onclick="deleteRecord(\'index.php?m=mod_mypage&a=delete_mypage\',' + data.records[i].id + ')" title="Delete">Delete</a></li>';
               //  list = list + '<li><a href="javascript:;" onclick="quickEdit(' + data.records[i].id + ')" title="Quick Edit">Quick Edit</a></li><li class=""><a target="_blank" href="<?php echo CFG::$livePath; ?>/' + data.records[i].slug + '" onclick="" title="View">View</a></li>';
                list = list + '</ul><a class="toggleLink" href="javascript:;"></a></td>';
                list = list + '<td class="" data-title="Sort Order:" align="center"><input class="text-center sortTxt" type="text" maxlength="3" id="sort_order' + data.records[i].sort_order + '" name="sort_order[' + data.records[i].id + ']" value="' + data.records[i].sort_order + '" onblur="if(this.value!=' + data.records[i].sort_order + '){changeSortOrder(\'index.php?m=mod_mypage&a=save_sortorder\',this.value,' + data.records[i].id + ');}if(this.value.length == 0){this.value=len;}" onkeypress=\'return isNumberic(event);\' /></td>';
             list = list + '<td class="statusBox" data-title="Status:" align="center"><span class="conSpan">' + displayStatus(data.records[i].status) + '</span></td>';
                list = list + '</tr>';



                /*Ratan Desai (04/07/17)
                 * Implementing Quick Save Functionality
                 */

                list = list + '<tr class="quickId"><td colspan="3">';

//                qList = '';
//                qList = qList + '<ul>';
//                qList = qList + '<li><span for="txtTitle" class="labelSpan">Name:</span><div class="txtBox"><input type="text" name="name" id="txtTitle" class="txt required" maxlength="100" title="Page Name" value="' + data.records[i].name + '" data-orgName="' + data.records[i].name + '"></div><li>';
//                qList = qList + '<li><span for="txtSlug" class="labelSpan">Slug:</span><div class="txtBox"><input type="text" name="slug" maxlength="100" id="txtSlug" class="txt" title="Page Slug" value="' + data.records[i].slug + '" data-orgSlug="' + data.records[i].slug + '"></div><li>';
//                qList = qList + '<li><a href="javascript:;" id="btnQuickCancel" class="trans comBtn" title="Cancel" onclick="quickEdit(' + data.records[i].id + ')">Cancel</a><li>';
//                qList = qList + '<li><a href="javascript:;" id="btnQuickSave" class="trans comBtn" title="Save" onclick="quickSave(' + data.records[i].id + ')">Save</a><li>';
//                qList = qList + '</ul>';
                
                qList = '';
                qList = qList + '<div id="quickID' + data.records[i].id + '"><ul >';
                qList = qList + '<li><label><span for="txtTitle" class="labelSpan">Name:</span><div class="txtBox"><input type="text" name="name" id="txtTitle" class="txt required" maxlength="100" title="Page Name" value="' + data.records[i].name + '" data-orgName="' + data.records[i].name + '"></div></label> <label><span for="txtSlug" class="labelSpan">Slug:</span><div class="txtBox"><input type="text" name="slug" maxlength="100" id="txtSlug" class="txt" title="Page Slug" value="' + data.records[i].slug + '" data-orgSlug="' + data.records[i].slug + '"></div></label></li>';
                qList = qList + '<li><label class="btnCancel"><a href="javascript:;" id="btnQuickCancel" class="trans comBtn" title="Cancel" onclick="quickEdit(' + data.records[i].id + ')">Cancel</a></label><label class="btnSave"><a href="javascript:;" id="btnQuickSave" class="trans comBtn" title="Save" onclick="quickSave(' + data.records[i].id + ')">Save</a></label></li>';
                qList = qList + '</ul></div>';
                list = list + qList;
                list = list + '</td></tr>';
   
                /*
                 * End of Quick Save
                 */




                startIndex = startIndex + 1;
            }
            $(".tableData").html('');
            $(".tableData").append(list);
            bindListingClick();
        }

        pageData.url = '<?php echo URI::getURL(APP::$moduleName, APP::$actionName) ?>';
        //alert(pageData.url);
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
        validateSearchForm = function() {
            if ($.trim($("#mypage_name").val()) == "")
            {
                alert("Please enter mypage name");
                return false;
            }
            return true;
        }

        pageData.validateSearch = validateSearchForm;



        resetForm = function()
        {
            $("#page_name").val("");

            pageData.searchField = "";
            pageData.noOfRecords = totalPages;
            doPaging();
        }

        // display message			
<?php Core::displayMessage("actionResult", "Page Save"); ?>

        // initialize tooltip	
        applyTooltip();

        // initialize popover
        applyPopover();

        // restore value of search form
        function restoreSearchForm()
        {
            if (oldPageState && oldPageState.searchData)
            {
                $("#page_name").val(oldPageState.searchData.searchForm.page_name);
                $(".numOfRecord").val(oldPageState.searchData.searchForm.numOfRecord);
            }
        }
        restoreSearchForm();

    });

//    function quickEdit(idEdit)
//    {
//
//        if ($('#quickID' + idEdit).is(':visible')) {
//            $('#quickID' + idEdit).hide();
//            resetEdit(idEdit);
//        } else {
//            $('#quickID' + idEdit).show();
//        }
//    }
    function quickEdit(idEdit)
    {
				
  //  $("#quickID" + idEdit).toggleClass('quickActive');
	

  $("#quickID" + idEdit).slideToggle("slow");

//        if ($('#quickID' + idEdit).is(':visible')) {
//            $('#quickID' + idEdit).hide();
//            resetEdit(idEdit);
//        } else {
//            $('#quickID' + idEdit).show();
//        }
    }
    function resetEdit(idEdit)
    {
        $('#quickID' + idEdit).find('#txtTitle').val($('#quickID' + idEdit).find('#txtTitle').attr('data-orgName'));
        $('#quickID' + idEdit).find('#txtSlug').val($('#quickID' + idEdit).find('#txtSlug').attr('data-orgSlug'));
    }


    function quickSave(idEdit)
    {
        var fields = {};
        fields["name"] = $('#quickID' + idEdit).find('#txtTitle').val();
        fields["slug"] = $('#quickID' + idEdit).find('#txtSlug').val();
        var ajaxPath = '<?php echo CFG::$livePath.'/page.php' ?>';
        sendAjaxSave(idEdit,fields,'<?php echo CFG::$tblPrefix.'page' ?>',ajaxPath);
    }

</script>