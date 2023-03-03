<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<!--
<div class="row ">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="title">
                <h4> <span class="icon16 icomoon-icon-equalizer-2"></span> <span>SEO Page List</span>          
                </h4>
                <a href="#" class="minimize">Minimize</a> 
            </div>

             search box 

            <div class="search-bar">
                <form id="searchForm" >
                    <div class="input-append">
                        <label class="search-label">Search SEO Page</label>
                        <input class="low-line-height applyTooptip" id="page_name" type="text" name="searchForm[page_name]" data-content="Enter page name or part of name" data-placement="top" rel="popover" data-title="Search Page" data-trigger="focus">
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
                                    <th style="width:5%" id="id" class="sort">Id</th>
                                    <th id="name" class="sort">Page Name</th>
                                    <th id="name" class="sort">Slug</th>    
                                    <th style="width:15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="pageData">
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
            <div id="noGrid" class="content hideBlock"> SEO page records not found </div>
        </div>
    </div>
</div>-->



<!----------------------------------------------------------------------- ---------------->

<section>
    <div class="midTop">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">
                    <div class="topLeft">
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span>Seo Page List</span></div>
                    </div>
                    <div class="topRight">
                        <form id="searchForm" >

                            <div class="searchBox">
                                <input type="text" id="seo_name" name="searchForm[seo_name]" class="txt" title="Search seo" placeholder="Search seo page" />
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
                                <div class="hashBox">#</div>
                                <div id="name" class="sorting sort"><span>Page Name</span></div>
                                <div id="name" class="sorting sort"><span>Slug</span></div>
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
    <div id="noGrid" class="content noRecord hideBlock"> SEO records not found </div>
</section>