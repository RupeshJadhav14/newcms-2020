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
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span>Field List</span></div>
                        <a href="index.php?m=mod_field&a=field_edit" class="trans addNew" title="New Field">New Field</a>
                    </div>
                    <div class="topRight">
                        <form id="searchForm" >
                            <div class="dropbox bulkDrop">
                                <select title="Please select actions">
                                    <option value="">Actions</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_field&a=change_status', '', '1')">Active</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_field&a=change_status', '', '0')">Inactive</option>
                                    <option value="" onclick="deleteRecord('index.php?m=mod_field&a=delete_field', '')">Delete</option>
                                </select>                        	
                            </div>

                            <div class="searchBox">
                                <input type="text" id="field" name="searchForm[question]" class="txt" title="Search Field" placeholder="Search Field" />
                                <button class="trans searchIcon" type="submit" ></button>
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
                                <div class="chekMain">
                                    <div class="chkInn">
                                        <label>
                                            <input type="checkbox" id="masterCh" name="status" value="all" class="checkbox" />
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="hashBox">#</div>
                                <div id="question" class="sorting sort"><span>Question</span></div>
                                <div id="sort_order" class="sorting sort"><span>Sort Order</span></div>
                                <div id="status" class="statusBox sorting sort"><span>Status</span></div>
                            </li>
                        </ul>
                    </form>                                
                    <div class="tableBtm">
                        <div class="leftSelect">
                            <div class="dropbox bulkDrop">
                                <select title="Please select actions">
                                    <option value="">Actions</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_field&a=change_status', '', '1')">Active</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_field&a=change_status', '', '0')">Inactive</option>
                                    <option value="" onclick="deleteRecord('index.php?m=mod_field&a=delete_field', '')">Delete</option>
                                </select>                         	
                            </div>

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
    <div id="noGrid" class="content noRecord hideBlock"> Faq records not found </div>
    <div class="mobiAction" style="display:none;">
        <div class="counterDiv">0</div>
        <a href="#" onclick="changeStatus('index.php?m=mod_field&a=change_status', '', '1')" title="Active" class="activeStatus"></a>
        <a href="#" onclick="changeStatus('index.php?m=mod_field&a=change_status', '', '0')" title="Inactive" class="inactiveStatus"></a>
        <a href="#" onclick="deleteRecord('index.php?m=mod_field&a=delete_field', '')" title="Delete" class="delIcon">Delete</a>
        <button class="closeAction" title="Close"></button>
    </div>
</section>