<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="box">
      <div class="title">
        <h4> <span class="icon16 icomoon-icon-equalizer-2"></span> <span>Order List</span>
         
        </h4>
        
        <!--<a href="#" class="minimize">Minimize</a>--> 
      </div>
      
      <!-- search box -->
      <div class="search-bar">
        <form id="searchForm">
          <div class="input-append">
          	
                      
            
          	<label class="search-label">Search Order Detail </label>
            <input class="low-line-height applyTooptip" id="contact" type="text" name="searchForm[contact]" data-content="Enter name, email or phone no to search" data-placement="top" rel="popover" data-title="Search Order Details" data-trigger="focus">
                      
                     
           <label class="date-to">Date From:</label>
                 <input class="low-line-height applyTooptip"  type="text" name="searchForm[dateFrom]" id="txtDFrom" class="text" maxlength="85" data-content="Select to date" data-placement="top" rel="popover" data-title="From date" data-trigger="focus" readonly="readonly" >
				 
				 
                <label class="date-from">Date To:</label>
                <input class="low-line-height applyTooptip"  type="text" name="searchForm[dateTo]" id="txtDTo" class="text" maxlength="85" data-content="Select from date" data-placement="top" rel="popover" data-title="To date" data-trigger="focus" readonly="readonly" >
            
                 
          
                      
            
            <button class="btn btn-primary applyTooptip" type="submit" data-title="Search form">Search</button>
           <button class="btn btn-default applyTooptip" type="button" onclick="resetForm()" data-title="Reset search form">Reset</button>
            
          </div>
        </form>
      </div>
      <!-- search box -->
           <div id="gridBlock">
      <div class="content noPad">
      		<!-- loader -->
        <div class="qLoverlay-new"></div>
        <div class="qLbar-new"></div>
        <!-- loader -->
		  <form id="frmGrid">
        <table class="responsive table table-bordered" id="checkAll" width="100%">
          <thead>
            <tr>
              <th style="width:3%">#</th>
              <th style="width:5%" id="id" class="sort">Id</th>
              <th style="width:15%" id="first_name" class="sort">Product Name</th>
              <th id="email" class="sort">User Email</th>
              <th id="phone">Quantity</th>
              <th id="phone">Status</th>
              <th id="enquiry_date" class="sort">Order Date</th>
              <th style="width:7%">Actions</th>
            </tr>
          </thead>
          <tbody id="contactData">
          </tbody>
        </table>
           </form>
      </div>
      
      <!-- paggin box -->
      <div class="content">
        <div class="dataTables_paginate paging_full_numbers" id="pagingNo"> </div>
      </div>
      <!-- paggin box -->
       </div>
      
      <div id="noGrid" class="content hideBlock" >
        Order records not found
      </div> 
      
    </div>
  </div>
</div>
