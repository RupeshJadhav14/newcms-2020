<?php

//echo "Blog List";



//echo "<pre>";
//print_r($data);




?>


<div class="container-fluid">
    <div id="content">
        <h1>Blog List</h1>
		
		
		<?php
		for($i=0;$i<count($data['list']);$i++)
		{
		?>
		
        <div class="row">
			
			<div class="col-md-3">
			<img class="img-responsive img-rounded" src="<?php echo CFG::$livePath.'/media/'.CFG::$mypageDir.'/'.$data['list'][$i]['image_name']; ?>">
			</div>
			
			
			<div class="col-md-9">
			<div class="title">
				<h3>
				<a href="<?php echo CFG::$livePath.'/'.$data['list'][$i]['slug']; ?>">
				<?php echo $data['list'][$i]['name']; ?>
				</a>
				</h3>
			</div>
			
			<div class="desc">
			<?php echo substr($data['list'][$i]['description'],0,300); ?>...
			</div>
			
			<div class="date">
			<b>Updated : <?php echo $data['list'][$i]['created_date']; ?></b>
			<br><br>
			</div>
			
			
			</div>
				
			
		</div>
		<?php
		}
		
		?>
		
    </div>
</div>