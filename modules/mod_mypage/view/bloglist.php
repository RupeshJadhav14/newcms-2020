<?php
//echo "Blog List";

//echo "<pre>";
//print_r($data);
//exit;
?>
 <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog List</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog List</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

<div class="container-fluid">
    <div id="content">
        <h1>Blog List</h1>

		<div id="target-content">
		Loading Content
			<?php //echo $data['list']['data_html']; ?>
		</div>
	
	</div>
	
	
</div>
<?php

?>
<center>
<div id="paging" align="center">
Loading paging
<?php //echo $data['list']['page_html']; ?>
</div>
</center>

<script>

</script>
<!---
<script>
$(document).ready(function() {
$("#target-content").load("pagination.php?page=1");
    $("#pagination li").live('click',function(e){
	e.preventDefault();
		$("#target-content").html('loading...');
		$("#pagination li").removeClass('active');
		$(this).addClass('active');
        var pageNum = this.id;
        $("#target-content").load("pagination.php?page=" + pageNum);
    });
    });
</script>

-->
<!--
<script>
$(document).ready(function() {
$("#target-content").load("http://localhost/newcms-2020/bloglist/?page=1");
    $("#pagination li").live('click',function(e){
	e.preventDefault();
		$("#target-content").html('loading...');
		$("#pagination li").removeClass('active');
		$(this).addClass('active');
		//alert('AAA');
        var pageNum = this.id;
        $("#target-content").load("http://localhost/newcms-2020/bloglist/?page=" + pageNum);
    });
    });
</script>
-->

<script>

  $(document).ready(function() {

var base_url = '<?php echo CFG::$livePath; ?>';

	 $("#pagination li").live('click',function(e){
	e.preventDefault();
		
		$("#pagination li").removeClass('active');
		$(this).addClass('active');
        var pageNum = this.id;
		url = base_url+"/bloglist/?page="+pageNum+"&ajax_call=1"
        load_page_data(url,pageNum);
    });
	
	
	
	function fill_data()
	{	
	
	//alert('calling ajax on load');
	
	$.ajax({
            type: "POST",
            url: base_url+"/bloglist/?page=1&ajax_call=1",
			cache: false,
            data: $(this).serialize(),
            success : function(response){
				//alert('yes got response');
				var objJSON = JSON.parse(response);
				// alert(objJSON.success);
				  
                if (objJSON.success==1){
                   //alert('working');
				   $("#target-content").html(objJSON.data_html);
				   $("#paging").html(objJSON.page_html);
                } else {
					
					alert('error');
                   
                }
            }
        });
		
		/*
		$.ajax({
            type: "POST",
            url: 'login.php',
            data: $(this).serialize(),
            success: function(response)
            {
				alert('got response');
                var jsonData = JSON.parse(response);
  
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    location.href = 'my_profile.php';
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
	   */
	
	}
	
	function load_page_data(url,pageno)
	{
		//alert(url);
		$.ajax({
            type: "POST",
            url: url,
			cache: false,
            data: $(this).serialize(),
            success : function(response){
				//alert('yes got response');
				var objJSON = JSON.parse(response);
				// alert(objJSON.success);
				  
                if (objJSON.success==1){
                   //alert('working');
				   $("#target-content").html(objJSON.data_html);
				   $("#paging").html(objJSON.page_html);
                } else {
					
					alert('Error');
                   
                }
            }
        });
	
	}
	
	//$("#target-content").load("http://localhost/newcms-2020/bloglist/?page=1");
	fill_data();
	
	
	
  });
  
</script>
