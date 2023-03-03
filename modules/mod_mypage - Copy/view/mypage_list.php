<?php
//restrict direct access to the Page
defined('DMCCMS') or die('Unauthorized access');
?>
<section>
    <div class="midTop">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">
                    <div class="topLeft">
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span>MyPage List</span></div>
                        <a href="index.php?m=mod_mypage&a=mypage_edit" class="trans addNew" title="New page">New Mypage</a>
                    </div>
                    <div class="topRight">
                        <form id="searchForm" >
                            <div class="searchBox">
                                <input type="text" id="mypage_name" name="searchForm[page_name]" class="txt" title="Search page" placeholder="Search page" />
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
    <div class="tableBox noSpaceDesg" id="gridBlock">
        <div class="container-fluid">
            <!-- loader -->
            <div class="qLoverlay-new"></div>
            <div class="qLbar-new"></div>
            <!-- loader -->
            <div class="row">
                <div class="fullColumn">
                    <form id="frmGrid">
                     
                        <table class="custom-table" width="100%">
                            <thead class="hide-mobile">
                              <tr>
                                <th class="chekMain"> <div class="chkInn">
                                    <label>
                                      <input type="checkbox" id="masterCh" name="status" value="all" class="checkbox">
                                      <span></span> </label>
                                  </div>
                                </th>
                                <th>#</th>
								<th id="Image" class="sorting sort "><span>Image</span></th>
                                <th id="name" class="sorting sort "><span>Page Name</span></th>
                                <th id="sort_order" class="sorting sort "><span>Sort Order</span></th>
                               <th id="status" class="sorting sort sort_both"><span>Status</span></th>
                              </tr>
                            </thead>
                            <tbody class="tableData">
                            </tbody>
                          </table>

                    </form>                                
                    <div class="tableBtm">
                        <div class="leftSelect">
                           <div class="dropbox bulkDrop">
                                <select title="Please select actions">
                                    <option value="">Actions</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_mypage&a=change_status', '', '1')">Active</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_mypage&a=change_status', '', '0')">Inactive</option>
                                    <option value="" onclick="deleteRecord('index.php?m=mod_mypage&a=delete_mypage', '')">Delete</option>
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
    <div id="noGrid" class="content noRecord hideBlock"> Page records not found </div>
<!--    <div class="mobiAction" style="display:none;">
        <div class="counterDiv">0</div>
        <a href="#" onclick="changeStatus('index.php?m=mod_page&a=change_status', '', '1')" title="Active" class="activeStatus"></a>
        <a href="#" onclick="changeStatus('index.php?m=mod_page&a=change_status', '', '0')" title="Inactive" class="inactiveStatus"></a>
        <a href="#" onclick="deleteRecord('index.php?m=mod_page&a=delete_page', '')" title="Delete" class="delIcon">Delete</a>
        <button class="closeAction" title="Close"></button>
    </div>-->
</section>