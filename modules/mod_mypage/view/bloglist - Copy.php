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

		<?php
for ($i = 0;$i < count($data['list']['rows']);$i++) {
?>
		
        <div class="row">
			
			<div class="col-md-3">
			<?php
    // Resize Image
    $photo_url = UTIL::getResizedImageSrc('mypage', $data['list']['rows'][$i]['image_name'], '20', 'default.jpg');
?>
			<img class="img-responsive img-rounded" src="<?php echo $photo_url; ?>">
			<!--
			<img class="img-responsive img-rounded" src="<?php echo CFG::$livePath . '/media/' . CFG::$mypageDir . '/' . $data['list']['rows'][$i]['image_name']; ?>">
			-->
			</div>
			
			
			<div class="col-md-9">
			<div class="title">
				<h3>
				<a href="<?php echo CFG::$livePath . '/' . $data['list']['rows'][$i]['slug']; ?>">
				<?php echo $data['list']['rows'][$i]['name']; ?>
				</a>
				</h3>
			</div>
			
			<div class="desc">
			<?php echo substr($data['list']['rows'][$i]['description'], 0, 300); ?>...
			</div>
			
			<div class="date">
			<b>Updated : <?php echo $data['list']['rows'][$i]['created_date']; ?></b>
			<br><br>
			</div>
			
			
			</div>
				
			
		</div>
		<?php
}
?>
		
			</div>
	
	</div>
	
	
</div>
<?php

?>
<div align="center">
<ul class='pagination text-center' id="pagination">
<?php if(!empty($data['list']['total_pages'])):for($i=1; $i<=$data['list']['total_pages']; $i++):  
			if($i == $data['list']['current_page']):?>
            <li class='active' data-id="<?php echo $i;?>"  id="<?php echo $i;?>"><a href='<?php echo CFG::$livePath; ?>/bloglist/?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
			<?php else:?>
			<li id="<?php echo $i;?>"><a href='<?php echo CFG::$livePath; ?>/bloglist/?page=<?php echo $i;?>'><?php echo $i;?></a></li>
		<?php endif;?>			
<?php endfor;endif;?>  
</div>

<script>

$(document).ready(function() {


	$.ajax({
            type: "POST",
            url: "http://localhost/newcms-2020/bloglist/?page=1",
            dataType: "POST",
            data: {},
            success : function(data){
                if (data.code == "200"){
                    alert("Success: " +data.msg);
                } else {
                    $(".display-error").html("<ul>"+data.msg+"</ul>");
                    $(".display-error").css("display","block");
                }
            }
        });
		

  });

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
<!--
<script>

  $(document).ready(function() {

     $("#target-content").load("http://localhost/newcms-2020/bloglist/?page=1");
		$(".page-link").click(function(){
			var id = $(this).attr("data-id");
			alert(id);
			var select_id = $(this).parent().attr("id");
			$.ajax({
				url: "http://localhost/newcms-2020/bloglist/?page=" + pageNum,
				type: "GET",
				data: {
					page : id
				},
				cache: false,
				success: function(dataResult){
					$("#target-content").html(dataResult);
					$(".pageitem").removeClass("active");
					$("#"+select_id).addClass("active");
					
				}
			});
		});
  });
  
</script>

-->