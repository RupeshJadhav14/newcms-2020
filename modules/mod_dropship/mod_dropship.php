<?php 
//restrict direct access to the page
defined( 'DMCCMS' ) or die( 'Unauthorized access' );

class Dropship
{
	public function product_list()
	{
		Load::loadModel("dropship");
		$dropshipObj = new DropshipModel();
		$dropshipObj->getDropshipProductList();
		$jsData = Layout::bufferContent(URI::getAbsModulePath() . "/js/product_list.php");
		Layout::addFooter($jsData);
		Layout::renderLayout();
	}

	public function marketplace_product_list()
	{
		Load::loadModel("dropship");
		$dropshipObj = new DropshipModel();
		$dropshipObj->getMarketplaceProductList();
		$jsData = Layout::bufferContent(URI::getAbsModulePath() . "/js/market_product_list.php");
		Layout::addFooter($jsData);
		Layout::renderLayout();
	}

	public function product_edit()
	{
		Load::loadModel("dropship");
		$dropshipObj = new DropshipModel();
		$data = '';
		if (isset($_POST['title']) && !empty($_POST['title'])) {
			$dropshipObj->saveProductData();
		}
		if (isset($_GET['id'])) {
			$data = $dropshipObj->getDropshipProductData($_GET['id']);
			$data['orderData'] = $dropshipObj->getOrderListData($data);
		}
		$jsData = Layout::bufferContent(URI::getAbsModulePath() . "/js/product_edit.php",$data);
		Layout::addFooter($jsData);
		Layout::renderLayout($data);
	}

	public function delete_image()
	{
        // delete image                    
		UTIL::unlinkFile($_GET['filename'],URI::getAbsMediaPath($_GET['path']));

        // update database if id is passed
		// if(APP::$curId != "")
		// {
		// 	$record = DB::queryFirstRow("SELECT ".$_GET['field_name']." FROM ".CFG::$tblPrefix."".$_GET['table']." where id=%d",APP::$curId);                                                
		// 	$arrFields = array($_GET['field_name'] => json_encode(UTIL::removeFileFromArray(json_decode($record[$_GET['field_name']]),$_GET['filename'])));
		// 	DB::update(CFG::$tblPrefix."".$_GET['table'],$arrFields," id=%d ",APP::$curId);
		// }
		echo json_encode(array("result" => "success"));
		exit;
	}
}