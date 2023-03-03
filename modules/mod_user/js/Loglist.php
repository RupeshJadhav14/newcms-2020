<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery.paging.min.js" ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var displayPages = function(data, startIndex) {

            // console.log(data);
            var list = "";
            var sta = "";
            for (i = 0; i < data.records.length; i++)
            {
                var odd = (i % 2 == 0) ? "" : " class='odd' ";
                list = list + '<li ' + odd + '>';
                list = list + '<div class="hashBox">' + startIndex + '</div>';
                list = list + '<div class="pageName">';
                list = list + '<a href="index.php?m=mod_user&a=log_view&id=' + data.records[i].id + '"  title="' + data.records[i].user_name + '">' + data.records[i].user_name + '</a>';
                list = list + '<ul class="optUl">';

                list = list + '<li><a href="index.php?m=mod_user&a=log_view&id=' + data.records[i].id + '" title="View">View</a></li>';
                list = list + '</ul><a class="toggleLink" href="javascript:;"></a></div>';
                list = list + '<div class="alignLeft" data-title="Log Type:">' + data.records[i].user_type + '</div>';
                list = list + '<div class="alignLeft" data-title="Log Type:">' + data.records[i].log_type + '</div>';
                list = list + '<div class="alignLeft" data-title="created_date:">' + displayDate(data.records[i].created_date) + '</div>';

                list = list + '</li>';
                startIndex = startIndex + 1;
            }
            $(".table").find("li:not(.topLi)").remove();
            $(".table").append(list);
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

        validateSearchForm = function() {


            if ($("#search").val() == "")
            {
                alert("Please enter username or log type for search");
                return false;
            }
            return true;
        }

        pageData.validateSearch = validateSearchForm;

        resetForm = function()
        {
            $("#search").val("");
            pageData.searchField = "";
            pageData.noOfRecords = totalPages;
            doPaging();
        }

        // restore value of search form
        function restoreSearchForm()
        {
            if (oldPageState && oldPageState.searchData)
            {
                $("#search").val(oldPageState.searchData.searchForm.search);
                $(".numOfRecord").val(oldPageState.searchData.searchForm.numOfRecord);
            }
        }
        restoreSearchForm();

    });

</script>