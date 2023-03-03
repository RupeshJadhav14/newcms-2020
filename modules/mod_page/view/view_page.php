<?php

$pageData = $data['data']->records;

//print_r($pageData);exit;
$path=URI::getLiveTemplatePath();
 ?>

<!--<section class="innerBanner">
    <img src="<?php // echo $path."/images/Lighthouse.jpg" ?>">

    <div class="bannerText">
        <div class="bannerTitle"><?php // echo $pageData['name']; ?></div>
        <div class="breadclum">
            <a title="Home"  href="<?php  // echo CFG::$livePath; ?>">Home</a><?php // echo $pageData['name']; ?>
        </div>
    </div>
</section>-->

<?php
$about_us = array('4','5');//11;
$design_con = array('6','7','8','9');
$constructino = array('15','16','17','18');

//$Page_data = Load::loadModel('page','mod_page');
//$Page_data = new PageModel();
//$about_data = $Page_data->getPageById(1);
// $design_data = $Page_data->getPageById(12);
// $const_data = $Page_data->getPageById(13);

$crumb1 = array();
if(in_array(APP::$curId,$about_us))
{
    $crumb1 = array('lastchild' => 0, 'name' => $about_data['name'], 'url' => URI::getURL("mod_page", "view_page",11));
}
if(in_array(APP::$curId,$design_con))
{
    $crumb1 = array('lastchild' => 0, 'name' => $design_data['name'], 'url' => URI::getURL("mod_page", "view_page",12));
}
if(in_array(APP::$curId,$constructino))
{
    $crumb1 = array('lastchild' => 0, 'name' => $const_data['name'], 'url' => URI::getURL("mod_page", "view_page",13));
	//$data['name'] = trim(str_replace("Construction", "", $data['name']));
	$name = explode(" ", $data['name']);
	if(count($name) > 1) {
		array_shift($name);
	}
	$name = implode(" ", $name);
	//echo "<pre>";print_r($name);exit;
	$data['name'] = trim($name);
}


$crumb2 = array('lastchild' => 1, 'name' => $pageData['name'], 'url' => URI::getURL("mod_page", "view_page", APP::$curId));

$mainTitle = $pageData['name'];
$breadCrumb = array($crumb1,$crumb2);
display_banner($breadCrumb, $mainTitle);
?>

<!-- <div>
        <div>Content Start...</div>
        <div><strong>Module:</strong>mod_page
        <strong>View:</strong>view.php
        <strong>file path:</strong><?php // echo CFG::$livePath."/".CFG::$modules."/mod_page/".CFG::$view."/view.php"; ?></div>
</div> -->
<div id="page_content">
<?php echo $pageData['description'];
</div>