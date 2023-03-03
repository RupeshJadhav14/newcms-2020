<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo URI::getLiveTemplatePath(); ?>/plugins/flot/excanvas.min.js"></script><![endif]-->
<?php /*?><link href="<?php echo URI::getLiveTemplatePath()."/css/datepicker.css"?>" rel="stylesheet" type="text/css" /><?php */?>
<script language="javascript" type="text/javascript" src="<?php echo URI::getLiveTemplatePath(); ?>/plugins/flot/jquery.flot.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URI::getLiveTemplatePath(); ?>/plugins/flot/jquery.flot.pie.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo URI::getLiveTemplatePath(); ?>/plugins/flot/jquery.flot.tooltip_0.4.4.js"></script>


<script id="source" type="text/javascript">
    $(document).ready(function() {
		
		chartFunction();
				
	
	
     
        
        var  d = [];
         
         

        function displayGraph(graphType)
        {
            
        //alert(graphType);
            $("#displayProcess").css("display", "");

            $.ajax({
                "url": "index.php?m=mod_admin&a=dashboard&type=" + graphType,
                "success": function(data) {
                 
                    var arrDates = jQuery.parseJSON(data);

                    for (i = 0; i < arrDates.length; i++){
                        var startTime = new Date(arrDates[i].enqDate).getTime();
                         var temp = {day: startTime,value:arrDates[i].cntEnq};
                        d.push(temp);
                   }
                   
                   morris.setData(d);
                   

                    $("#graphTitle").html(graphType + " Enquiries");

                    $("#displayProcess").css("display", "none");
                }
            });
   }
   


        $("#showGraphdata").change(function() {
            // displayGraph($(this).attr("data-graph"));
            d = [];
            displayGraph($(this).val());
        });

        displayGraph("All Enquiries");
        
                   var morris =  Morris.Line({
	  // ID of the element in which to draw the chart.
           
	  element: 'allEnqchart',
	  // Chart data records -- each entry in this array corresponds to a point on
	  // the chart.
	  data: d,
	  // The name of the data record attribute that contains x-values.
	  xkey: 'day',
	  xLabelFormat: function (x) { 
              var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sept", "Octr", "Nov", "Dec"];
              var date = new Date(x).getDate();
//              console.log(date);
              
              var month = new Date(x).getMonth();
            return monthNames[month] + " " + date; },
	  // A list of names of data record attributes that contain y-values.
	  ykeys: ['value'],
	  // Labels for the ykeys -- will be displayed when you hover over the
	  // chart.
          
          hoverCallback: function (index, options, content, row) {
              
          var getdate = new Date(row.day);
          var strdate = getdate.toLocaleDateString("en-US"); 
  return " Date: " + getdate.getDate() + '/' + (getdate.getMonth() + 1) + '/' +  getdate.getFullYear() +  "<br/>No. of Enquiries: " + row.value;
},
	  labels: '',
                  
         resize: true
    });
      

        // initialize tooltip	
        applyTooltip();

        
  
      
               
       

      

/////////////////////////////////// unread enquiry data ///////////////////////////////////////////////
         <?php echo StringManage::createJsObject("unreadData",$data);?>	     
        //console.log(unreadData);
        var htmlli='';
         for(j=0;j<unreadData.ddData.length;j++)
        {
           // htmlli+='<li><a href="#"  class="showUnreadData applyTooptip" data-placement="left" data-title="'+unreadData[j].type+' Enquiries" data-graph="'+unreadData[j].type+'" ><span class="icomoon-icon-graph greenColor"></span>'+unreadData[j].type+' Enquiries</a></li>';
            htmlli += '<option value="'+unreadData.ddData[j].type+'">'+unreadData.ddData[j].type+'</option>';
        }
        $('#unreadUlData').append(htmlli);
        
        function displayUnreadData(graphType)
        { //alert(graphType);
         //alert(finalDate);
         
            $.ajax({
                "url": "index.php?m=mod_admin&a=dashboard&unreadtype=" + graphType,
                "success": function(data) {
                    var recentDataArr = jQuery.parseJSON(data);
                    //console.log(piechartData);
                    if (recentDataArr.length > 0)
                     {
                         var listrecent = "";
                         var startIndex=1;
                         var linkUnreadType='';
                   for(i=0;i<recentDataArr.length;i++)
								{
                                                                    
                                                                
									 var odd = (i % 2 == 0) ? "" : " class='odd' ";
                                                                        listrecent = listrecent + '<li ' + odd + '>';
                                                                        if(recentDataArr.datatype=='Contact')
                                                                            {
                                                                                linkUnreadType='index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + recentDataArr[i].id;
                                                                            }  else {linkUnreadType='';}
                                                                        listrecent = listrecent + '<div class="hashBox">' + startIndex + '</div>';
                                                                        listrecent = listrecent + '<div>' + recentDataArr[i].id + '</div>';
                                                                        listrecent = listrecent + '<div><a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + recentDataArr[i].id + '&loc=dash"  title="' + recentDataArr[i].name + '">' + recentDataArr[i].name + '</a></div>';
                                                                        listrecent = listrecent + '<div><a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + recentDataArr[i].id + '&loc=dash"  title="' + recentDataArr[i].email + '">' + recentDataArr[i].email + '</a></div>';
                                                                        listrecent = listrecent + '<div><a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + recentDataArr[i].id + '&loc=dash"  title="' + recentDataArr[i].phone + '">' + recentDataArr[i].phone + '</a></div>';
                                                                        listrecent = listrecent + '<div>' + displayDate(recentDataArr[i].created_date) + '</div>';                                                                                                                                                                                                                                                                                                                                                         
                                                                        
                                                                        
									listrecent = listrecent + '</li>';
									startIndex = startIndex + 1;
								}
								
                } 
                 $(".tableu").find("li:not(.topLi)").remove();
            $(".tableu").append(listrecent);
            bindListingClick();
                }
            });

        }
        displayUnreadData('All');
         $("#unreadUlData").change(function() {
            displayUnreadData($(this).val());
        });
/////////////////////////////////// unread enquiry data ///////////////////////////////////////////////        
/////////////////////////////////// recent enquiry data ///////////////////////////////////////////////
         <?php echo StringManage::createJsObject("recentData",$data);?>	     
        //console.log(unreadData);
        var htmlrecentli='';
         for(j=0;j<recentData.ddData.length;j++)
        {
           // htmlli+='<li><a href="#"  class="showUnreadData applyTooptip" data-placement="left" data-title="'+unreadData[j].type+' Enquiries" data-graph="'+unreadData[j].type+'" ><span class="icomoon-icon-graph greenColor"></span>'+unreadData[j].type+' Enquiries</a></li>';
            htmlrecentli += '<option value="'+recentData.ddData[j].type+'">'+recentData.ddData[j].type+'</option>';
        }
        $('#recentUlData').append(htmlrecentli);
        

  function displayRecentData(graphType)
   { //alert(graphType);
         //alert(finalDate);
            $.ajax({
                "url": "index.php?m=mod_admin&a=dashboard&recenttype=" + graphType,
                "success": function(data) {
                    var recentDataArr = jQuery.parseJSON(data);
                    //console.log(recentDataArr);
                    if (recentDataArr.length > 0)
                     {
                         var listrecent = "";
                         var startIndexrecent=1;
                         var linkRecentType='';
                   for(i=0;i<recentDataArr.length;i++)
								{
                                                                    
                                                                        var odd = (i % 2 == 0) ? "" : " class='odd' ";
                                                                							
									//var cname=recentDataArr[i].name;
                                                                        listrecent = listrecent + '<li ' + odd + '>';
                                                                        if(recentDataArr[i].datatype=='Contact')
                                                                            {
                                                                                
                                                                                linkRecentType='index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + recentDataArr[i].id;
                                                                                
                                                                            }            else {linkRecentType='';}
                                                                           
									listrecent = listrecent + '<div class="hashBox">' + startIndexrecent + '</div>';
                                                                        listrecent = listrecent + '<div>' + recentDataArr[i].id + '</div>';
                                                                        listrecent = listrecent + '<div><a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + recentDataArr[i].id + '&loc=dash"  title="' + recentDataArr[i].name + '">' + recentDataArr[i].name + '</a></div>';
                                                                        listrecent = listrecent + '<div><a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + recentDataArr[i].id + '&loc=dash"  title="' + recentDataArr[i].email + '">' + recentDataArr[i].email + '</a></div>';
                                                                        listrecent = listrecent + '<div><a href="index.php?m=mod_enquiry&a=enquiry_view_contact&id=' + recentDataArr[i].id + '&loc=dash"  title="' + recentDataArr[i].phone + '">' + recentDataArr[i].phone + '</a></div>';
                                                                        listrecent = listrecent + '<div>' + displayDate(recentDataArr[i].created_date) + '</div>';                                                                                                                                                                                                                                                                                                                                                         
                                                                        
                                                                        
									listrecent = listrecent + '</li>';
									startIndexrecent = startIndexrecent + 1;
								}
								
                }
//                else{
//                listpopular = listpopular + "<tr>";
//                listpopular = listpopular + '<td colspan="6">Recent enquiry records not found</td>';
//            }
            
//                $("#recentData").html(listrecent);
                 $(".tabler").find("li:not(.topLi)").remove();
            $(".tabler").append(listrecent);
            bindListingClick();
                }
            });

        }      
        displayRecentData('All');
         $("#recentUlData").change(function() {
         
            displayRecentData($(this).val());
        });
/////////////////////////////////// unread enquiry data ///////////////////////////////////////////////        


    });
</script>
<script type="text/javascript">

function chartFunction(){
	 Morris.Line({
	  // ID of the element in which to draw the chart.
	  element: 'myfirstchart',
	  // Chart data records -- each entry in this array corresponds to a point on
	  // the chart.
	  data: [
//		{ year: '2008', value: 20 },
//		{ year: '2009', value: 10 },
//		{ year: '2010', value: 5 },
//		{ year: '2011', value: 5 },
//		{ year: '2012', value: 20 }
	  ],
          
          
	  // The name of the data record attribute that contains x-values.
	  xkey: 'year',
	  // A list of names of data record attributes that contain y-values.
	  ykeys: ['value'],
	  // Labels for the ykeys -- will be displayed when you hover over the
	  // chart.
	  labels: ['Value'],
	  resize: true
	});
}
</script>