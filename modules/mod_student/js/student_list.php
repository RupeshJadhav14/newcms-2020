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
                
                list = list + '<td align="center">' + startIndex + '</td>';
                list = list + '<td align="center">' + data.records[i].id + '</td>';
               
                
                <?php if(Core::hasAccess(APP::$moduleName, "order_view_contact")) { ?>
                list = list + '<a href="index.php?m=mod_order&a=order_view_contact&id=' + data.records[i].id + '"  title="' + data.records[i].name + '">' + data.records[i].name + '</a>';
                <?php } else { ?>
                        list = list + data.records[i].name;
                <?php } ?>
                list = list + '<ul class="optUl">';                  
                
                    
                list = list + '</ul><a class="toggleLink" href="javascript:;"></a></div></td>';
                
                
                list = list + '<td class="customerName alignLeft" data-title="Name:">' + data.records[i].name + '</td>';
                list = list + '<td class="customerName alignLeft" data-title="Email :">' + data.records[i].email + '</td>';

                list = list + '<td class="customerName alignLeft" data-title="Roll_ID :">' + data.records[i].roll_id + '</td>';
                
                list = list + '<td class="customerName alignLeft" data-title="Phone:">' + data.records[i].phone + '</td>';

                
                list = list + '<td align="center" data-title="Order Date:">' + displayDate(data.records[i].created_date) + '</td>';

                var Status= "";
                if(data.records[i].status == 1){
                	 status = "<b style='color: forestgreen'> Active </b>";
                }else if(data.records[i].status == 0){
                	 status = "<b style='color: Red'> Deactive </b>";
                }

                list = list + '<td class="customerName alignLeft" data-title="Status:">' + status + '</td>';

               list = list + '<td class="customerName" align="center"><button style="padding: 7px;background: white;  border: groove;"> <a href="index.php?m=mod_student&a=student_edit&id=' + data.records[i].id + '"  title="' + data.records[i].name + '">Edit</a></button> &nbsp;<button style="padding: 7px;background: white;  border: groove;"> <a href="index.php?m=mod_student&a=student_delete&id=' + data.records[i].id + '"  title="' + data.records[i].name + '"> Delete </a></button> </td>';
                list = list + '</tr>';
                list = list + '<tr id="append-'+data.records[i].id+'" style="display:none" class="appendDiv"></tr>';
                startIndex = startIndex + 1;
            
                
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
	// validateSearchForm = function(){
	// 						if($.trim($("#contact").val()) == "")
	// 						{
	// 						   if($.trim($("#txtDFrom").val()) == "" &&  $.trim($("#txtDTo").val()) == "") {alert("Please enter Product Name, User E-mail , Price or Quantity to search");
	// 						   return false;
    //                             }
	// 						}
							
	// 						return true;
	// 					 }
						 
	// pageData.validateSearch = validateSearchForm;
	
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
	<?php Core::displayMessage("actionResult","success");?>
	
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