<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<section>
    <div class="midTop">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">
                    <div class="topLeft">
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span>Log List</span></div>
                    </div>
                    <div class="topRight riCatMain ipadShowSrc">

                        <form id="searchForm">
                            <div class="cust_searchBox searchBox">
                                
                                <div class="customeSearch">
                                    <input type="text" id="search" name="searchForm[search]" class="txt" title="Search by username or log type" placeholder="Search by username or log type" value=""/>
                                </div>
                                <button data-title="Search form" type="submit" title="Search" class="btn searchIcon1">Search</button>
                            </div>
                            <a href="javascript:;" title="Search" class="searchBtn">Search</a>
                            <input type="reset" value="Reset" title="Reset" class="trans resetBtn" onclick="resetForm()">
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tableBox" id="gridBlock">
        <div class="container-fluid">
            <!-- loader -->
            <div class="qLoverlay-new"></div>
            <div class="qLbar-new"></div>
            <!-- loader -->
            <div class="row">
                <div class="fullColumn">
                    <form id="frmGrid">
                        <ul class="table">
                            <li class="topLi">
                                <div class="hashBox">#</div>
                                <div id="user_name" class="sorting sort"><span>Username</span></div>
                                <div id="user_type" class="sorting sort"><span>User Type</span></div>
                                <div id="log_type" class="sorting sort"><span>Log Type</span></div>
                                <div id="created_date" class="sorting sort"><span>Created Date</span></div>
                            </li>
                        </ul>
                    </form>                                
                    <div class="tableBtm">
                        <div class="leftSelect">

                            <div class="dropbox numDrop ">
                                <form id="numOfRecordForm" >
                                    <select class="numOfRecord" name="searchForm[numOfRecord]" title="Please select no. pages">
                                        <!--<option value="">No. Pages</option>-->
                                        <option value="10" selected='selected'>10 per page</option>
                                        <option value="20">20 per page</option>
                                        <option value="30">30 per page</option>
                                    </select>                        	
                                </form>
                            </div>

                        </div>
                        <div class="content pagination">
                            <div id="pagingNo" class="recordCount"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="noGrid" class="content noRecord hideBlock">Log not found</div>
</section>