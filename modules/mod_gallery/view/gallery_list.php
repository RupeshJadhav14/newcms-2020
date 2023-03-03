<?php
//restrict direct access to the gallery
defined('DMCCMS') or die('Unauthorized access');
?>
<!--<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box ">
            <div class="title " >
                <h4> <span class="icon16 icomoon-icon-equalizer-2"></span> <span>Gallery List</span></h4>
                <form action="" class="box-form right" >
                    <a class="btn btn-primary applyTooptip" data-title="New Gallery" href="index.php?m=mod_gallery&a=gallery_edit">
                        Add New</a> 
                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="btn btn-default applyTooptip" data-title="Actions"> <span class="icon16 icomoon-icon-cogs"></span> Actions<span class="caret"></span> </a>
                        <ul class="dropdown-menu ">
                            <li><a href="#" data-placement="left" class="applyTooptip" data-title="Active selected gallery" onclick="changeStatus('index.php?m=mod_gallery&a=change_status', '', '1')"><span class="icomoon-icon-checkmark greenColor"></span> Active</a></li>
                            <li><a href="#" data-placement="left" class="applyTooptip" data-title="Inactive selected gallery" onclick="changeStatus('index.php?m=mod_gallery&a=change_status', '', '0')"><span class="icomoon-icon-cancel redColor"></span> Inactive</a></li>
                            <li><a href="#" data-placement="left" class="applyTooptip" data-title="Delete selected gallery" onclick="deleteRecord('index.php?m=mod_gallery&a=delete_gallery', '')"><span class="icomoon-icon-remove redColor"></span> Delete</a></li>
                        </ul>
                    </div>
                </form>
                <a href="#" class="minimize">Minimize</a> 
            </div>
             search box 
            <div class="search-bar">
            <form id="searchForm" >
                    <div class="input-append">
                        <label class="search-label">Search Gallery</label>
                        <input class="low-line-height applyTooptip" id="gallery_name" type="text" name="searchForm[gallery_name]" data-content="Enter gallery name or part of name" data-placement="top" rel="popover" data-title="Search Gallery" data-trigger="focus">
                        <button class="btn btn-primary applyTooptip" type="submit" data-title="Search form">Search</button>
                        <button class="btn btn-default applyTooptip" type="button" onclick="resetForm()" data-title="Reset search form">Reset</button>
                    </div>
                </form>
            </div>
             search box 
            <div id="gridBlock"> 
                <div class="content noPad">
                         loader 
                        <div class="qLoverlay-new"></div>
                        <div class="qLbar-new"></div>
                         loader 
                        <form id="frmGrid">
                            <table class="responsive table table-bordered table-striped" id="checkAll" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <th style="width:5%" ><input type="checkbox" id="masterCh" name="status" value="all" class="styled" /></th>
                                        <th style="width:5%" id="id" class="sort">Id</th>
                                        <th id="name" class="sort">Gallery Name</th>      
                                        <th id="sort_order" class="sort" style="width:10%">Sort Order</th>              
                                        <th style="width:10%" id="status" class="sort">Status</th>
                                        <th style="width:15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="galleryData">
                                </tbody>
                            </table>
                        </form>                                
                </div>
                 <div class="clear"></div>
                     paggin box 
                    <div class="content">
                        <div class="dataTables_paginate paging_full_numbers" id="pagingNo" > </div>
                    </div>
                     paggin box 
            </div>
            <div id="noGrid" class="content hideBlock"> Gallery records not found </div>
        </div>
    </div>
</div>-->



<!----------------------------------------------------------------------- ---------------->


<?php
//restrict direct access to the Gallery
defined('DMCCMS') or die('Unauthorized access');
?>
<section>
    <div class="midTop">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">
                    <div class="topLeft">
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span>Gallery List</span></div>
                        <a href="index.php?m=mod_gallery&a=gallery_edit" class="trans addNew" title="New gallery">New gallery</a>
                    </div>
                    <div class="topRight">
                        <form id="searchForm" >
                            <div class="dropbox bulkDrop">
                                <select title="Please select actions">
                                    <option value="">Actions</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_gallery&a=change_status', '', '1')">Active</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_gallery&a=change_status', '', '0')">Inactive</option>
                                    <option value="" onclick="deleteRecord('index.php?m=mod_gallery&a=delete_gallery', '')">Delete</option>
                                </select>                        	
                            </div>

                            <div class="searchBox">
                                <input type="text" id="gallery_name" name="searchForm[gallery_name]" class="txt" title="Search gallery" placeholder="Search gallery" />
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
                                <div id="name" class="sorting sort"><span>Gallery Name</span></div>
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
                                    <option value="" onclick="changeStatus('index.php?m=mod_gallery&a=change_status', '', '1')">Active</option>
                                    <option value="" onclick="changeStatus('index.php?m=mod_gallery&a=change_status', '', '0')">Inactive</option>
                                    <option value="" onclick="deleteRecord('index.php?m=mod_gallery&a=delete_gallery', '')">Delete</option>
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
    <div id="noGrid" class="content noRecord hideBlock"> Gallery records not found </div>
    <div class="mobiAction" style="display:none;">
        <div class="counterDiv">0</div>
        <a href="#" onclick="changeStatus('index.php?m=mod_gallery&a=change_status', '', '1')" title="Active" class="activeStatus"></a>
        <a href="#" onclick="changeStatus('index.php?m=mod_gallery&a=change_status', '', '0')" title="Inactive" class="inactiveStatus"></a>
        <a href="#" onclick="deleteRecord('index.php?m=mod_gallery&a=delete_gallery', '')" title="Delete" class="delIcon">Delete</a>
        <button class="closeAction" title="Close"></button>
    </div>
</section>