<?php
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
?>


<section>
	
	
	 <div class="midTop">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">
                    <div class="topLeft">
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span>Contact Enquiry List</span></div>
                       <!--<a class="trans addNew" title="New Page" data-title="New Banner" href="index.php?m=mod_enquiry&a=banner_edit" class="trans addNew" title="New Page">
                        Add New</a> -->
                    </div>
                    <div class="topRight custSearchRight">
                        <form id="searchForm" >
                          <!-- <div class="dropbox bulkDrop">
                                <select title="Please select actions">
                                    <option value="">Actions</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_page&a=change_status', '', '1')">Active</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_page&a=change_status', '', '0')">Inactive</option>
                                   <option value="" onclick="deleteRecord('index.php?m=mod_page&a=delete_enquiry', '')">Delete</option>
                                </select>                        	
                            </div>-->
							<div class="cust_searchBox">	
                                <div class="customeSearch">
                                    <input type="text" id="contact" name="searchForm[enquiry_name]" class="txt" title="Search Contact Enquiry" placeholder="Search Contact Enquiry" />
                                    
                                </div>
                                <div class="customeDate">
                                    <input  type="text" name="searchForm[dateFrom]" id="txtDFrom" class="txt " maxlength="85" data-content="Select from date" data-placement="top" rel="popover" data-title="From date" data-trigger="focus" readonly="readonly" title="From date" placeholder="From date">
                                </div>
                                <div class="customeDate">
                                    <input  type="text" name="searchForm[dateTo]" id="txtDTo" class="txt " maxlength="85" data-content="Select to date" data-placement="top" rel="popover" data-title="To date" data-trigger="focus" readonly="readonly" title="To date" placeholder="To date" >
                                </div>
                                 <button class="btn" type="submit" data-title="Search form">Search</button>
                                <!--<button class="trans searchIcon" type="submit" ></button>-->
							</div>
                                <a href="javascript:;" title="Search" class="searchBtn cust_searchBtn">Search</a>
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
                        <table class="custom-table" width="100%">
                            <thead>
                                <tr>
                                    <?php //if(Core::hasAccess(APP::$moduleName, "delete_enquiry")) { ?>
<!--                                    <th class="chekMain">
                                        <div class="chkInn">
                                            <label>
                                                <input type="checkbox" id="masterCh" name="status" value="all" class="checkbox">
                                                <span></span> 
                                            </label>
                                        </div>
                                    </th>-->
                                    <?php //} ?>
                                    <th>#</th>
                                    <th id="id"><span>Id</span></th>
                                    <th id="name" class="sorting sort"><span>Name</span></th>
                                    <th id="email" class="sorting sort"><span>Email</span></th>
                                    <th id="phone" class="sorting sort"><span>Mobile</span></th>
                                    <th id="created_date" class="sorting sort"><span>Enquiry Date</span></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!--
                        <ul class="table mobiHash">
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
                                <div id="name" class="pageName sorting sort sort_both"><span>Name</span></div>
                                <div id="email" class="Email sorting sort sort_both"><span>Email</span></div>
                                <div id="phone" class="Phone sorting sort sort_both"><span>Mobile</span></div>
                                <div id="created_date" class="Enquiry sorting sort sort_both"><span>Enquiry Date</span></div>
                            </li>
                        </ul>
                        -->
                    </form>                                
                    <div class="tableBtm">
                        <div class="leftSelect">
                         <!--  <div class="dropbox bulkDrop">
                                <select title="Please select actions">
                                    <option value="">Actions</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_page&a=change_status', '', '1')">Active</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_page&a=change_status', '', '0')">Inactive</option>
                                    <option value="" onclick="deleteRecord('index.php?m=mod_page&a=delete_enquiry', '')">Delete</option>
                                </select>                         	
                            </div>-->

                            <div class="dropbox numDrop ">
                                <form id="numOfRecordForm" >
                                    <select class="numOfRecord" id="numOfRecord" name="searchForm[numOfRecord]" title="Please select no. pages">
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
    <div id="noGrid" class="content noRecord hideBlock"> Enquiry records not found </div>
    <div class="mobiAction" style="display:none;">
        <div class="counterDiv">0</div>
        <a href="#" onclick="changeStatus('index.php?m=mod_enquiry&a=change_status', '', '1')" title="Active" class="activeStatus"></a>
        <a href="#" onclick="changeStatus('index.php?m=mod_enquiry&a=change_status', '', '0')" title="Inactive" class="inactiveStatus"></a>
        <a href="#" onclick="deleteRecord('index.php?m=mod_enquiry&a=delete_enquiry', '')" title="Delete" class="delIcon">Delete</a>
        <button class="closeAction" title="Close"></button>
    </div>
</section>