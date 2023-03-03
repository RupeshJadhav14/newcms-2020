<?php 
//restrict direct access to the page
defined( 'DMCCMS' ) or die( 'Unauthorized access' );

class DropshipModel
{
	public function getDropshipProductList()
	{
		$orderBy = "`dropship-skus-with-neto-new-skus`.SKU DESC";
		if (isset($_GET['o_type']))
			$orderBy = $_GET['o_field'] . " " . $_GET['o_type'];
		$where = "1";
		$whereParam = array();
		$where .= " and sku_list.bargains_product = 1";
		$whereParam["bargains_product"] = StringManage::processString($_GET['searchForm']['product_type']);
		
		if(isset($_GET['searchForm']['status']) && trim($_GET['searchForm']['status'])!="")
		{
			$where .= " and sku_list.active = %s_active";
			$whereParam["active"] = StringManage::processString($_GET['searchForm']['status']);
		}

		if(isset($_GET['searchForm']['fromDate']) && trim($_GET['searchForm']['fromDate'])!="")
		{
			$where .= " and date(sku_list.created_date) >= %s_created_date";
			$whereParam["created_date"] = StringManage::processString(date('Y-m-d',strtotime($_GET['searchForm']['fromDate'])));
		}
		if(isset($_GET['searchForm']['toDate']) && trim($_GET['searchForm']['toDate'])!="")
		{
			$where .= " and date(sku_list.created_date) <= %s_created_date";
			$whereParam["created_date"] = StringManage::processString(date('Y-m-d',strtotime($_GET['searchForm']['toDate'])));
		}

		if(isset($_GET['searchForm']['search']) && trim($_GET['searchForm']['search'])!="" && trim($_GET['searchForm']['product_type'])=="")
		{
			$where .= " and (sku_list.sku = %s_sku OR title like %ss_sku OR `dropship-skus-with-neto-new-skus`.SKU like %ss_sku)";
			$whereParam["sku"] = StringManage::processString($_GET['searchForm']['search']);
		}else if(isset($_GET['searchForm']['search']) && trim($_GET['searchForm']['search'])!="" && trim($_GET['searchForm']['product_type'])=="1"){
			$where .= " and (sku_list.sku = %s_sku OR title like %ss_sku OR `dropship-skus-with-neto-new-skus`.SKU like %ss_sku)";
			$whereParam["sku"] = StringManage::processString($_GET['searchForm']['search']);
		}else if(isset($_GET['searchForm']['search']) && trim($_GET['searchForm']['search'])!="" && trim($_GET['searchForm']['product_type'])=="0"){
			$where .= " and (sku_list.sku = %s_sku OR title like %ss_sku OR marketplace_sku like %ss_sku)";
			$whereParam["sku"] = StringManage::processString($_GET['searchForm']['search']);
		}

		$join = " inner join `dropship-skus-with-neto-new-skus` on `dropship-skus-with-neto-new-skus`.`original` = `sku_list`.`sku` ";

		UTIL::doPaging("totalProduct", "sku_list.*,`dropship-skus-with-neto-new-skus`.marketplace_sku,`dropship-skus-with-neto-new-skus`.`SKU` as bargains_SKU", "sku_list".$join, $where, $whereParam, $orderBy);
	}

	public function getMarketplaceProductList()
	{
		$orderBy = "`dropship-skus-with-neto-new-skus`.SKU DESC";
		if (isset($_GET['o_type']))
			$orderBy = $_GET['o_field'] . " " . $_GET['o_type'];
		$where = "1";
		$whereParam = array();
		$where .= " and sku_list.bargains_product = 0";
		$whereParam["bargains_product"] = StringManage::processString($_GET['searchForm']['product_type']);
		
		if(isset($_GET['searchForm']['status']) && trim($_GET['searchForm']['status'])!="")
		{
			$where .= " and sku_list.active = %s_active";
			$whereParam["active"] = StringManage::processString($_GET['searchForm']['status']);
		}

		if(isset($_GET['searchForm']['fromDate']) && trim($_GET['searchForm']['fromDate'])!="")
		{
			$where .= " and date(sku_list.created_date) >= %s_created_date";
			$whereParam["created_date"] = StringManage::processString(date('Y-m-d',strtotime($_GET['searchForm']['fromDate'])));
		}
		if(isset($_GET['searchForm']['toDate']) && trim($_GET['searchForm']['toDate'])!="")
		{
			$where .= " and date(sku_list.created_date) <= %s_created_date";
			$whereParam["created_date"] = StringManage::processString(date('Y-m-d',strtotime($_GET['searchForm']['toDate'])));
		}

		if(isset($_GET['searchForm']['search']) && trim($_GET['searchForm']['search'])!="" && trim($_GET['searchForm']['product_type'])=="")
		{
			$where .= " and (sku_list.sku = %s_sku OR title like %ss_sku OR marketplace_sku like %ss_sku)";
			$whereParam["sku"] = StringManage::processString($_GET['searchForm']['search']);
		}else if(isset($_GET['searchForm']['search']) && trim($_GET['searchForm']['search'])!="" && trim($_GET['searchForm']['product_type'])=="1"){
			$where .= " and (sku_list.sku = %s_sku OR title like %ss_sku OR `dropship-skus-with-neto-new-skus`.SKU like %ss_sku)";
			$whereParam["sku"] = StringManage::processString($_GET['searchForm']['search']);
		}else if(isset($_GET['searchForm']['search']) && trim($_GET['searchForm']['search'])!="" && trim($_GET['searchForm']['product_type'])=="0"){
			$where .= " and (sku_list.sku = %s_sku OR title like %ss_sku OR marketplace_sku like %ss_sku)";
			$whereParam["sku"] = StringManage::processString($_GET['searchForm']['search']);
		}

		$join = " inner join `dropship-skus-with-neto-new-skus` on `dropship-skus-with-neto-new-skus`.`original` = `sku_list`.`sku` ";

		UTIL::doPaging("totalProduct", "sku_list.*,`dropship-skus-with-neto-new-skus`.marketplace_sku,`dropship-skus-with-neto-new-skus`.`SKU` as bargains_SKU", "sku_list".$join, $where, $whereParam, $orderBy);
	}

	public function getDropshipProductData()
	{
		$data = DB::queryFirstRow('SELECT * FROM sku_list WHERE id = %s',APP::$curId);
		$data['matchProduct'] = DB::queryFirstRow('SELECT id FROM sku_list where id != %d and sku = %s',APP::$curId,$data['sku']);
		$data['match'] = DB::queryFirstRow('SELECT * FROM `dropship-skus-with-neto-new-skus` where original = %s',$data['sku']);
		return $data;
	}

	public function saveProductData()
	{
		LOG::$log_type = PRODUCT_UPDATE;
		LOG::$old_data = $this->getDropshipProductData($_POST['sku']);
		$set['category'] = $_POST['category'];
		if ($_POST['title_changed'] == 'on') {
			$set['title'] = $_POST['title'];
			$set['title_changed'] = '1';
		}else{
			$set['title_changed'] = '0';
		}
		$set['stock_qty'] = $_POST['stock_qty'];
		$set['status'] = $_POST['status'];
		$set['price'] = $_POST['price'];
		$set['rrpprice'] = $_POST['rrpprice'];
		$set['vic'] = $_POST['vic'];
		$set['nsw'] = $_POST['nsw'];
		$set['sa'] = $_POST['sa'];
		$set['qld'] = $_POST['qld'];
		$set['tas'] = $_POST['tas'];
		$set['wa'] = $_POST['wa'];
		$set['nt'] = $_POST['nt'];
		$set['bulky_item'] = $_POST['bulky_item'];
		$set['discontinued'] = $_POST['discontinued'];
		$set['ean_code'] = $_POST['ean_code'];
		$set['brand'] = $_POST['brand'];
		$set['mpn'] = $_POST['mpn'];
		$set['weight_kg'] = $_POST['weight_kg'];
		$set['carton_length_cm'] = $_POST['carton_length_cm'];
		$set['carton_width_cm'] = $_POST['carton_width_cm'];
		$set['carton_height_cm'] = $_POST['carton_height_cm'];
		$set['color'] = $_POST['color'];
		$set['description'] = $_POST['txaDescription'];
		$set['image_url'] = $_POST['image_url'];
		$set['image_1'] = $_POST['image_1'];
		$set['image_2'] = $_POST['image_2'];
		$set['image_3'] = $_POST['image_3'];
		$set['image_4'] = $_POST['image_4'];
		$set['image_5'] = $_POST['image_5'];
		$set['image_6'] = $_POST['image_6'];
		$set['image_7'] = $_POST['image_7'];
		$set['image_8'] = $_POST['image_8'];
		$set['image_9'] = $_POST['image_9'];
		$set['image_10'] = $_POST['image_10'];
		$set['image_11'] = $_POST['image_11'];
		$set['image_12'] = $_POST['image_12'];
		$set['image_13'] = $_POST['image_13'];
		$set['image_14'] = $_POST['image_14'];
		$set['image_15'] = $_POST['image_15'];
		$set['update_by'] = CORE::getUserdata('id');
		$set['update_date'] = date('Y-m-d h:i:s');

		$imagechange = array();
		foreach ($_POST['imagec'] as $key => $value) {
			$imagechange[$key] = $key;
		}
		$set['image_change'] = json_encode( $imagechange );
		
		DB::update('sku_list', $set, "id=%d", APP::$curId);

		LOG::$new_data = $set;
		LOG::save_log();

		if ($_POST['hdnEdit'] == 1){
			UTIL::redirect(URI::getURL(APP::$moduleName, "product_edit", APP::$curId));
		}else{
			UTIL::redirect(URI::getURL(APP::$moduleName, "product_list"));
		}
	}
	public function getOrderListData($data)
	{
		return DB::query('SELECT * FROM order_list where dropship_sku = %s and bargains_product = %d order by id desc limit 0,20',$data['sku'],$data['bargains_product']);
	}
}