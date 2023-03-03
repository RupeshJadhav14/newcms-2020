<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<?php /*?><link href="<?php echo URI::getLiveTemplatePath()."/css/datepicker.css"?>" rel="stylesheet" type="text/css" /><?php */?>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/jquery.paging.min.js"?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/datepicker.js"?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery-ui.custom.js" ?>"></script>

<script type="text/javascript">	
	$(document).ready(function(){	
	 $("#txtDFrom").datepicker({ dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true, buttonImage: "<?php echo URI::getLiveTemplatePath()."/images/calender2.png";?>",buttonImageOnly: true,showOn: "both",onClose: function( selectedDate ) {
				$( "#txtDTo" ).datepicker( "option", "minDate", selectedDate );
			}});
                    
                        $("#txtDTo").datepicker({ dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true, buttonImage: "<?php echo URI::getLiveTemplatePath()."/images/calender2.png";?>",buttonImageOnly: true,showOn: "both",onClose: function( selectedDate ) {
				//$( "#txtDFrom" ).datepicker( "option", "maxDate", selectedDate );
			}});
	var displayContacts = function(data,startIndex){ 
        var list = "";
        var bg="";
        for(i=0;i<data.records.length;i++)
        {
                var odd = (i % 2 == 0) ? "" : " class='odd' ";
                list = list + '<tr class=" ' + odd + '">';
                <?php //if(Core::hasAccess(APP::$moduleName, "delete_user")) { ?>
                //list = list + '<td align="center"><div class="chkInn"><label><input type="checkbox" id="status' + data.records[i].id + '" name="status[' + data.records[i].id + ']" value="' + data.records[i].active + '" class="checkbox" data-update="' + data.records[i].updated_date + '" data-id="' + data.records[i].id + '" /><span></span></label></div></td>';
                <?php //} ?>
                list = list + '<td align="center">' + startIndex + '</td>';
                list = list + '<td align="center">' + data.records[i].id + '</td>';
                list = list + '<td><div class="pageName alignLeft">';
                
                <?php if(Core::hasAccess(APP::$moduleName, "enquiry_view_contact")) { ?>
                list = list + '<a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + data.records[i].id + '"  title="' + data.records[i].name + '">' + data.records[i].name + '</a>';
                <?php } else { ?>
                        list = list + data.records[i].name;
                <?php } ?>
                list = list + '<ul class="optUl">';                  
                <?php //if(Core::hasAccess(APP::$moduleName, "user_edit")) { ?>
				//list = list + '<li><a href="index.php?m=mod_user&a=user_edit&id=' + data.records[i].id + '" title="Edit">Edit</a></li>';
                <?php //} ?>
                
                <?php //if(Core::hasAccess(APP::$moduleName, "change_status")) { ?>
                    //list = list + '<li><a href="javascript:;" onclick="return changeStatus(\'index.php?m=mod_user&a=change_status\',' + data.records[i].id + ',\'\')" title="Change Status">Change Status</a></li>';
                <?php //} ?>
                    
                <?php //if(Core::hasAccess(APP::$moduleName, "delete_user")) { ?>
				//list = list + '<li class="delLi"><a href="#" onclick="deleteRecord(\'index.php?m=mod_user&a=delete_user\',' + data.records[i].id + ',\'\')" title="Delete">Delete</a></li>';
                <?php //} ?>
                    
                list = list + '</ul><a class="toggleLink" href="javascript:;"></a></div></td>';
                
                
                list = list + '<td class="customerName alignLeft" data-title="Email:">' + data.records[i].email + '</td>';
                list = list + '<td class="customerName alignLeft" data-title="Mobile:">' + data.records[i].phone + '</td>';
                //list = list + '<td align="center" data-title="Status:"><span class="conSpan">' + displayStatus(data.records[i].active) + '</span></td>';
                list = list + '<td align="center" data-title="Enquiry Date:">' + displayDate(data.records[i].created_date) + '</td>';
                
                list = list + '</tr>';
                list = list + '<tr id="append-'+data.records[i].id+'" style="display:none" class="appendDiv"></tr>';
                startIndex = startIndex + 1;
            
                /*var odd = (i % 2 == 0) ? "" : " class='odd' ";
                var style = "";
                list = list + '<li ' + odd + ' style="'+style+'">';
                //list = list + '<div class="chekMain"><div class="chkInn"><label><input type="checkbox" id="status' + data.records[i].id + '" name="status[' + data.records[i].id + ']" value="' + data.records[i].status + '" class="checkbox" /><span></span></label></div></div>';
                list = list + '<div class="hashBox">' + startIndex + '</div>';
                list = list + '<div class="pageName"><a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + data.records[i].id + '"  title="' + data.records[i].name + '">' + data.records[i].name + '</a><ul class="optUl"><li><a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + data.records[i].id + '" title="View">View</a></li></ul><a class="toggleLink" href="javascript:;"></a></div>';
                list = list + '<div class="Email" data-title="Email"><a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + data.records[i].id + '"  title="' + data.records[i].email + '">' + data.records[i].email+ '</a></div>';
                list = list + '<div class="Mobile" data-title="Mobile"><a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + data.records[i].id + '"  title="' + data.records[i].phone + '">' + data.records[i].phone+ '</a></div>';
                list = list + '<div class="Enquiry" data-title="Enquiry">' + displayDate(data.records[i].created_date)+ '</div>';
                list = list + '</li >';
                startIndex = startIndex + 1;
                */
            }
                //$(".table").find("li:not(.topLi)").remove();
                //$(".table").append(list);
                $(".custom-table tbody").find("tr").remove();
                $(".custom-table tbody").append(list);
                
                bindListingClick();							
	}
				   
	pageData.url = '<?php echo URI::getURL(APP::$moduleName,APP::$actionName)?>';
	pageData.noOfRecords = totalContacts;
	pageData.pagingBlock = '#pagingNo';
	pageData.callbackFun = displayContacts;
	pageData.perPage = 10;
	
	// do paging	
	createDataGrid();
	
	// initialize sorting
	sortData();	
	
	// create function for validating search form
	validateSearchForm = function(){
							if($.trim($("#contact").val()) == "")
							{
																		
															   if($.trim($("#txtDFrom").val()) == "" &&  $.trim($("#txtDTo").val()) == "")
                                                                 {							
                                                                    alert("Please enter name, email or phone number to search");
                                                                    return false;
                                                                 }
							}
							
							return true;
						 }
						 
	pageData.validateSearch = validateSearchForm;
	
	resetForm = function()
				{
					$("#contact").val("");
					pageData.searchField = "";
					pageData.noOfRecords = totalContacts;
                                       //  $("#txtDFrom").val("");
                                       // $("#txtDTo").val("");
					doPaging();
				}
	// display message			
	<?php Core::displayMessage("actionResult","Contact Save");?>
	
	// initialize tooltip	
	applyTooltip();
	
	// initialize popover
	applyPopover();	
	
	// restore value of search form
	function restoreSearchForm()
	{
		if(oldPageState && oldPageState.searchData)
		{
			$("#contact").val(oldPageState.searchData.searchForm.enquiry_name);
                        $("#numOfRecord").val(oldPageState.searchData.searchForm.numOfRecord);
                        $("#txtDFrom").val(oldPageState.searchData.searchForm.dateFrom);
                          $("#txtDTo").val(oldPageState.searchData.searchForm.dateTo);
		}
	}
	restoreSearchForm();
			
	});
	
	
</script>