<?php 
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	 
	class Order
	{
		
	
		function __construct()
		{		
		     
		}
		
		function order_list()
		{	
			// load model
			Load::loadModel("order");
			
			// create model object
			$contactenqObj = new OrderModel();
			//$priceObj = new OrderModel();
			
			// get contact listing
			$contactenqObj->getContactOrderList();

			//price listing
			//$priceObj->getPriceOrderList();
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/order_list.php");
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
						
			// render layout
			Layout::renderLayout();
		}
		

		function order_view_contact()
		{		
			// load model
			Load::loadModel("order");
			
			// create model object
			$contactenqObj = new OrderModel();
 
			// get page record for update
			$contactData = $contactenqObj->getContactEnqData(APP::$curId);
                        
			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/contact_order_view.php",$contactData);			
				
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
 
			// render layout
			Layout::renderLayout($contactData);
		}
		

		function order_delete(){
			Load::loadModel("order");

			$deleteObj= new OrderModel();

			$deleteObj-> deleteOrder();

			echo json_encode(array("result" => "success","title" => "Delete Order","message" => "Order have been deleted successfully"));

			exit();
		}

		//order edit 

		function order_edit() {
        // load model
        Load::loadModel("order");

        // create model object
        $orderObj = new OrderModel();


        // save user record is submitted
        $orderObj->saveOrder(APP::$curId);



        // get user record for update
        $orderData = $orderObj->getOrderAllData(APP::$curId);

//        $userData['country'] = $userObj->getCountry();

        //$viewData = $orderObj->getRoles();

        // include js in footer
        $jsData = Layout::bufferContent(URI::getAbsModulePath() . "/js/order_edit.php", $orderData);

        // create javascript variable for ajax url			
        Layout::addFooter($jsData);

        // render layout
        Layout::renderLayout($orderData);
    }


    	function add_order() {
        // load model
        Load::loadModel("order");

        // create model object
        $orderObj = new OrderModel();


        // save user record is submitted
        $orderObj->saveAddOrder(APP::$curId);

        // include js in footer
        $jsData = Layout::bufferContent(URI::getAbsModulePath() . "/js/add_order.php", $orderData);

        // create javascript variable for ajax url			
        Layout::addFooter($jsData);

        // render layout
        Layout::renderLayout($orderData);
    }



		function order_manager()
		{	
		
			// load model
			Load::loadModel("order");
			
			// create model object
			$contactenqObj = new OrderModel();
 
			// get page record for update
			$contactData = $contactenqObj->getContactEnqData(APP::$curId);
                        
                        
			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/contact_order_view.php",$contactData);			
				
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
 
			// render layout
			Layout::renderLayout();
		}
                
                
                function order()
                {
                    Load::loadModel("order");
                    
                    $contactenqObj = new OrderModel();

                    $contactenqObj->getContactOrderList();

                    $jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/order.php");
                    
                     
                    Layout::renderLayout();
                }

         //this function is for display cart page
        function addToCart(){
        	Load::loadModel("order");
        	//echo "Hello My Name is Rupesh";exit;

        	$addCartObj = new OrderModel();

        	$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/addToCart.php");

			Layout::addFooter($jsData);


        	Layout::renderLayout();
        }

        //this function is for Add Prodcut in a cart 
        function add_cart(){
        	//echo "product added in cart";exit;
        	Load::loadModel("order");
        	
        	$addCartObj1 = new OrderModel();

        	//var_dump($_GET['count'],$_GET['orderid']);exit;
        	
        	$addCartObj1->saveAddCart($_GET['orderid'],$_GET['count']);	

        	Layout::renderLayout();

        }

        function changeqty(){

        	Load::loadModel("order");

        	$chnQtyObj = new OrderModel();
        	//var_dump($_SESSION['cart']);exit;
        	$chnQtyObj->changeQty();

        	Layout::renderLayout();
        }

        function removeCart(){
    	    
    	    //var_dump($_GET['orderid']);exit;
			Load::loadModel("order");
        	
        	$removeCartObj = new OrderModel();

        	$removeCartObj->deleteCart($_GET['orderid']);
        }

        function removeCartFromList(){
        	  Load::loadModel("order");
        	
        	$removeCartObj = new OrderModel();

        	$removeCartObj->deleteCart2($_GET['orderid']);
        }

        function checkOut(){
        	
        	Load::loadModel("order");

        	$checkOutObj = new OrderModel();
            $checkOutObj->insertdata();
        	$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/checkOut.php");

			Layout::addFooter($jsData);

        	Layout::renderLayout();
        }


        function wishList(){
		
			Load::loadModel("order");

			
			$wishListObj = new OrderModel();
			

			$wishListObj->getWishList();
			//echo "rupesh";exit();
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/wishList.php");

			Layout::addFooter($jsData);

			Layout::renderLayout();
		}

		function removeWish(){
			Load::loadModel("order");
			//var_dump($_REQUEST);exit;
			$rWishObj = new OrderModel();

 	       $rWishObj->deleteWish($_REQUEST['orderid'],$_REQUEST['userid']);

		}

        function view_order()
		{

			// load model

			Load::loadModel("order");

			// create model object
			$orderObj = new OrderModel(APP::$curId);
			
			//echo "Rupesh"; exit();
			$data = array("data" => $orderObj);

			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/view_order.php");

        	// create javascript variable for ajax url          
        	Layout::addFooter($jsData);
					// render layout
			Layout::renderLayout($data);
		}


		function add_wish() {
        // load model
		
                
        Load::loadModel("order");

        //var_dump($_REQUEST);
        
        // create model object
        $orderObj = new OrderModel();


        // save wish record is submitted
        $orderObj->saveAddWish($_REQUEST['orderid']);
        
    }



        function delete_file()
		{
			// create image path
			$imagePath = URI::getAbsMediaPath(CFG::$sliderDir."/".$_GET['filename']);
			
			// delete image
			if(file_exists($imagePath) && is_file($imagePath))
				unlink($imagePath);			
				
			// update database if id is passed
			if(APP::$curId != "")
			{
				$arrFields = array("image_name" => "");
				DB::update(CFG::$tblPrefix."order",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}



	}