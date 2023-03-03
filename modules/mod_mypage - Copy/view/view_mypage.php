<?php
$pageData = $data['data']->records;

//print_r($pageData);exit;
//$path=URI::getLiveTemplatePath();
//echo "This page is comes from mypage";
echo "<pre>";
print_r($pageData);
exit;

 ?>
 
 <div class="container-fluid">
    <div id="content">
        <h1>MyPage : <?php echo $pageData['name']; ?> </h1>
		
		
		
		
        <div class="row">
		
		<?php echo $pageData['description']; ?>
		</div>
				
			
		</div>
		
		
    </div>
</div>