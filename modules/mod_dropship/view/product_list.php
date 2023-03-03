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
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span>Dropship Product List</span></div>
                    </div>
                    <div class="topRight riCatMain ipadShowSrc">
                        <?php /* ?>
                        <div class="dropbox bulkDrop">
                            <select title="Please select actions">
                                <option value="">Actions</option>
                                <option value="" onclick="changeStatus('index.php?m=mod_user&a=change_status', '', '1')">Active</option>
                                <option value="" onclick="changeStatus('index.php?m=mod_user&a=change_status', '', '0')">Inactive</option>
                            </select>                        	
                        </div>
                        <?php */ ?>

                        <form id="searchForm">
                            <div class="cust_searchBox searchBox">
                                <div class="customeSearch">
                                 <input type="text" class="txt" name="searchForm[fromDate]" id="fromDate" placeholder="From Date"> 
                             </div>
                             <div class="customeSearch">
                                 <input type="text" class="txt" name="searchForm[toDate]" id="toDate" placeholder="To Date">
                             </div>
                            <div class="customeSearch">
                                <select name="searchForm[status]" id="status" title="Please select Status">
                                    <option value="">Select Status</option>
                                    <option value="y">Active</option>
                                    <option value="n">In-Active</option>
                                </select>
                            </div>  
                            <div class="customeSearch">
                                <input type="text" id="search" name="searchForm[search]" class="txt" title="Search by sku, title" placeholder="Search by sku, title" value=""/>
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
                                <!-- <div class="chekMain">
                                    <div class="chkInn">
                                        <label>
                                            <input type="checkbox" id="masterCh" name="status" value="all" class="checkbox" />
                                            <span></span>
                                        </label>
                                    </div>
                                </div> -->
                                <div class="hashBox">#</div>
                                <div class="sorting"><span>Image</span></div>
                                <div id="sku_list.sku" class="sorting sort"><span>Dropship SKU</span></div>
                                <div id="bargains_SKU" class="sorting sort"><span>Bargains SKU</span></div>
                                <div id="title" class="sorting sort"><span>Title</span></div>
                                <div id="stock_qty" class="sorting sort"><span>Stock Qty</span></div>
                                <div id="price" class="sorting sort"><span>Price</span></div>
                                <div id="rrpprice" class="sorting sort"><span>RRP Price</span></div>
                                <div id="active" class="sorting sort"><span>Status</span></div>
                                <div id="created_date" class="sorting sort"><span>Created Date</span></div>
                            </li>
                        </ul>
                    </form>                                
                    <div class="tableBtm">
                        <div class="leftSelect">
                            <?php /* ?>
                            <div class="dropbox bulkDrop">
                                <select title="Please select actions">
                                    <option value="">Actions</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_user&a=change_status', '', '1')">Active</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_user&a=change_status', '', '0')">Inactive</option>
                                </select>                         	
                            </div>
                            <?php */ ?>

                            <div class="dropbox numDrop ">
                                <form id="numOfRecordForm" >
                                    <select class="numOfRecord" name="searchForm[numOfRecord]" title="Please select no. pages">
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
    <div id="noGrid" class="content noRecord hideBlock">Product records not found</div>
    <?php /* ?>
    <div class="mobiAction" style="display:none;">
        <div class="counterDiv">0</div>
        <a href="#" onclick="changeStatus('index.php?m=mod_user&a=change_status', '', '1')" title="Active" class="activeStatus"></a>
        <a href="#" onclick="changeStatus('index.php?m=mod_user&a=change_status', '', '0')" title="Inactive" class="inactiveStatus"></a>
        <button class="closeAction" title="Close"></button>
    </div>
    <?php */ ?>
</section>