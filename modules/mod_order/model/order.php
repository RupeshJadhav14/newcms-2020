<?php /* Contact model class. Contains all attributes and method related to contact.
*/
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	
	class OrderModel
	{				
		
            public $records = array();
		function __construct($id="")
		{
	
		}


        //order edit fetch data query 
    public function getOrderAllData($id) {
        return DB::queryFirstRow("SELECT id,product_name,user_email,img,qty,price,created_date,status,img FROM " . CFG::$tblPrefix . "order where id=%d ", $id);
    }

    public function getWishList(){
        return DB::query("SELECT * FROM " .CFG::$tblPrefix. "wishlist");
        //SELECT orders.ord_no, customer.cust_name FROM orders, customer WHERE orders.customer_id = customer.customer_id; 
    }

        
		 
            public function getContactOrderList() 
            {
                $where = "";
                $whereParam = array();
                $orderBy = "id desc";
                if (isset($_GET['o_type']))
                    $orderBy = $_GET['o_field'] . " " . $_GET['o_type'];

                if (isset($_GET['searchForm']['enquiry_name']) && trim($_GET['searchForm']['enquiry_name']) != "") {
                    $where .= " ((product_name like %ss_name) or (user_email like %ss_email) or (qty like %ss_phone))";
                    $whereParam["name"] = StringManage::processString($_GET['searchForm']['enquiry_name']);
                    $whereParam["email"] = StringManage::processString($_GET['searchForm']['enquiry_name']);
                    $whereParam["phone"] = StringManage::processString($_GET['searchForm']['enquiry_name']);
                }
                                 
//DB::debugMode();

                 $date = "";

                 if(isset($_GET['searchForm']['dateFrom']) && $_GET['searchForm']['dateFrom'] != '' && isset($_GET['searchForm']['dateTo']) && $_GET['searchForm']['dateTo'] != '') {
                    $date = "  date(created_date) between '" . date("Y-m-d", strtotime($_GET['searchForm']['dateFrom'])) . "' and '" . date("Y-m-d", strtotime($_GET['searchForm']['dateTo'])) . "' ";
                 }
                 else if (isset($_GET['searchForm']['dateFrom']) && $_GET['searchForm']['dateFrom'] != '' && $_GET['searchForm']['dateTo'] == '') {
                     $date = " date(created_date) >= '" . date("Y-m-d", strtotime($_GET['searchForm']['dateFrom'])) . "' ";
                 }
                 else if (isset($_GET['searchForm']['dateTo']) && $_GET['searchForm']['dateTo'] != '' && $_GET['searchForm']['dateFrom'] == '') {
                     $date = " date(created_date) <= '" . date("Y-m-d", strtotime($_GET['searchForm']['dateTo'])) . "'";
                 }


                if ($date != "") {
                    if ($where == "") {
                        $where.=$date;
                    } else {
                        $where.=" and " . $date;
                    }
                }

                $price="";
                if(isset($_GET['searchForm']['priceFrom']) && $_GET['searchForm']['priceFrom'] != '' && isset($_GET['searchForm']['priceTo']) && $_GET['searchForm']['priceTo'] != ''){
                    $price = " `price` BETWEEN '".$_GET['searchForm']['priceFrom']."' AND '".$_GET['searchForm']['priceTo']."' ";
                }
                elseif (isset($_GET['searchForm']['priceFrom']) && $_GET['searchForm']['priceFrom'] != '') {
                    $price = " `price` >= '".$_GET['searchForm']['priceFrom']."' ";
                }
                elseif (isset($_GET['searchForm']['priceTo']) && $_GET['searchForm']['priceTo'] != '') {
                    $price =" `price` <= '".$_GET['searchForm']['priceTo']."' ";
                }

                if ($price != "") {
                    if ($where == "") {
                        $where.=$price;
                    } else {
                        $where.=" and " . $price;
                    }
                }
                //if you want to list your fileld then insert feild name in below query
                //DB::debugMode();
                UTIL::doPaging("totalContacts", "id,product_name,user_email,img,qty,price,status,created_date", CFG::$tblPrefix . "order", $where, $whereParam, $orderBy); 
                //die;
            }
                  
                  
		 
                
		
		public function getContactEnqData1($id) {
       // DB::update(CFG::$tblPrefix . "enquiries", array('is_view' => '1'), "id=%d", $id);
        return DB::queryFirstRow("SELECT name,email,phone,created_date FROM " . CFG::$tblPrefix . "order  where id=%d ", $id);
    }
    
                

function check($num) {

        if ($_SESSION['uniqueNum'] == Core::decryptPass($num)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
      function deleteOrder() {
    
                //DB::delete(CFG::$tblPrefix . "order", "id=%d ", $key);
                DB::query("delete from ".CFG::$tblPrefix."order where id=%d",APP::$curId);  
           
    }

    function deleteWish($oi,$ui){
        //var_dump($_REQUEST);
        //exit;
        DB::query("delete  FROM ".CFG::$tblPrefix. "wishlist WHERE `oid` = ".$oi." AND `uid` = ".$ui." ");
         $json = array("response"=> 1 );
                echo json_encode($json);

    }

    function deleteCart($oi){
    
        //var_dump($_GET);
        //echo"rupesh";var_dump(count($_SESSION['cart']['orderid']));exit;
        if(count($_SESSION['cart']['orderid']) == 1){
                unset($_SESSION['cart']);
                //echo "removed";
                $count = count($_SESSION['cart']['orderid']);
                //var_dump($_SESSION['cart']['orderid']);exit;
                $json = array("response" => 1 , "count"=>$count );
                echo json_encode($json);
            }
        else{

                foreach ($_SESSION['cart']['orderid'] as $key => $value) {
                    //var_dump($value);
                    if($key == $_GET['orderid']){ 
                
                    //echo $key."found id ".$value;exit; 
                    unset($_SESSION['cart']['orderid'][$key]);
                    //var_dump($_SESSION['cart']);exit;
                    //var_dump($_SESSION['cart']['orderid']);exit;
                    $count = count($_SESSION['cart']['orderid']);
                    $json1 = array("response" => 1 , "count"=>$count );
                    echo json_encode($json1);
                    }
                }



         //    for($i=0; $i < count($_SESSION['cart']); $i++) {               
         //        echo $_SESSION['cart'][$i];exit;
         //   if($_SESSION['cart'][$i]==$_GET['orderid']){ 
            
         //     //echo "found id ".$_SESSION['cart']['$i']; 
         //     unset($_SESSION['cart'][$i]);

         //       $json1 = array("response" => 1);
         //       echo json_encode($json1);
         //   }

         // }
        }
         

    }

    function deleteCart2($oi){

        if(count($_SESSION['cart']['orderid']) == 1){
                unset($_SESSION['cart']);
                //echo "removed";
                $count = count($_SESSION['cart']['orderid']);
                //var_dump($count);
                $json = array("response"=>1,"count"=>$count);
                
                echo json_encode($json);
        }
        else{
            
            foreach ($_SESSION['cart']['orderid'] as $key => $value) {
                    
                //echo $value;
                if($key == $_REQUEST['orderid']){ 
                
                    //echo $key."found id ".$value;exit; 
                    unset($_SESSION['cart']['orderid'][$key]);
                    $count = count($_SESSION['cart']['orderid']);
                    //var_dump($_SESSION['cart']['orderid']);exit;
                    $json1 = array("response" => 1 , "count"=>$count );
                    
                    echo json_encode($json1);
                    
                    }
                }
            }
        }

    public function saveAddOrder(){
        if($_POST['name'] != ''){
            $arrFields=array("product_name"=>$_POST['name'],"user_email"=>$_POST['uemail'],"qty"=>$_POST['qty'],"price"=>$_POST['price'],"status"=>$_POST['status'],"img"=>$_POST['flImage1']);
            $arrFields['created_date'] = date("Y-m-d H:i:s");

            DB::insert(CFG::$tblPrefix . "order", StringManage::processString($arrFields));

                // get current id
                APP::$curId = DB::insertId();
                UTIL::redirect(URI::getURL(APP::$moduleName,"order_list"));
                $_SESSION["actionResult"] = array("success" => "Order has been Added successfully");
        }
    }
        public function changeQty(){

            $price = $_GET['prc'];
            $qty = $_GET['qty'];
            $oi = $_GET['orderid'];

            
                
                $_SESSION['cart']['orderid'][$oi] = $qty;
                $price = $_GET['prc'];
            $qty = $_GET['qty'];
            $oi = $_GET['orderid'];
                $json = array("qty"=>$qty,"price"=>$price);
                echo json_encode($json);exit;
            
           
        }

        public function saveAddCart($oi,$count){
            // var_dump($_GET['orderid']);

            $pid = $_GET['orderid'];
            // var_dump($_SESSION['cart']);        
            if(empty($_SESSION['cart'])){
                $_SESSION['cart']=array();                
                $pid = $_GET['orderid'];
                $_SESSION['cart']['orderid'][$pid] = array();
                $_SESSION['cart']['orderid'][$pid] = "1";
                $count = count($_SESSION['cart']['orderid']);
                //var_dump($_SESSION['cart']['orderid']);exit;
                $json = array("response" => 1 , "count"=>$count );
                echo json_encode($json);exit;
                //$_SESSION['cart']['orderid'][$pid] = $_GET['orderid'];
                 //var_dump($_SESSION['cart']);exit;
                // $_SESSION['cart'] = $data;
            }
            elseif (array_key_exists($pid,$_SESSION['cart']['orderid'])){
                //echo "Key exists!";
                $json = array("response"=>2);
                echo json_encode($json);exit;
            }
            // if(array_search($_GET['orderid'], array_column($_SESSION['cart']))) {
            //     //echo 'value is in multidim array';
            //     $json = array("response"=>2);
            //     echo json_encode($json);exit;
            // }
            // if(in_array($_GET['orderid'], $_SESSION['cart']['orderid']))
            // { 
            //     $json = array("response"=>2);
            //     echo json_encode($json);exit;
            // }
            else
            {
                $pid = $_GET['orderid'];
                //array_push($_SESSION['cart']['orderid'][$pid], '1');
                $_SESSION['cart']['orderid'][$pid] = "1";
                //var_dump($_SESSION['cart']);
                $count = count($_SESSION['cart']['orderid']);
                //var_dump($_SESSION['cart']['orderid']);exit;
                $json = array("response" => 1 , "count"=>$count );
                echo json_encode($json);exit;
            }
            
            
            
        }

    public function saveAddWish($oi){
            
            //`oid`, `uid`,
            $arrFields=array("oid"=> $oi , "uid"=>$_SESSION['userid']);
            $arrFields['time'] = date("Y-m-d H:i:s");
            //var_dump($arrFields);
            //DB::debugeMode();

            $udi = $_SESSION['userid'];
            $sql = " SELECT * from dtm_wishlist WHERE oid ='$oi' AND uid ='$udi' ";
            $res=DB::query($sql);
            if(count($res)>=1){
                $json = array("response"=>2);
                echo json_encode($json); exit;
            }else if (isset(APP::$curId)) {
                $json = array("response"=>1);
                echo json_encode($json);
            }
            else{
                $json = array("response"=>0);
                echo json_encode($json);
            }
            if($_REQUEST['response'] != 2){
            DB::insert(CFG::$tblPrefix . "wishlist", StringManage::processString($arrFields));
            APP::$curId = DB::insertId();
        }        
    }

        public function insertdata(){
            //var_dump($_GET);
            if(isset($_GET['ccn'])){
                $name = $_GET['name'];
                $email = $_GET['email'];
                $address = $_GET['address'];
                $city = $_GET['city'];
                $state = $_GET['state'];
                $zip = $_GET['zip'];
                $noc = $_GET['noc'];
                $ccn = $_GET['ccn'];
                $exm = $_GET['exm'];
                $exy = $_GET['exy'];
                $cvv = $_GET['cvv'];

                DB::insert('dtm_orderdetails', [
                                'name' =>  $name, 
                                'email' => $email,
                                'address' => $address,
                                'city' => $city,
                                'state' => $state,
                                'postcode' => $zip,
                                'namecard' =>  $noc,
                                'cardnumber' => $ccn,
                                'expmonth' => $exm,
                                'expyear' => $exy,
                                'cvv' => $cvv,
                            ]);
                $order_id = DB::insertId();

          if(isset($_SESSION['cart'])){
            $temp = array();
            foreach($_SESSION['cart']['orderid'] as $key => $val){
            //echo $key;
            $temp[] = $key;
            //$idin = $key;
          }
            $idin = implode(',', $temp);
        }
          else {
                $idin = 0;
           }
            $sql = DB::query("SELECT * FROM dtm_order WHERE id in ($idin)");
            foreach ($sql as $key => $r){

                $pname = $r['product_name'];
                $price = $r['price'];
                $qty = $_SESSION['cart']['orderid'][$r['id']];
                $total = $price * $qty;
                $pid = $r['id'];
                //echo $pid;

                DB::insert('dtm_orderitem', [
                                'orderdetail_id' =>  $order_id, 
                                'product_id' => $pid,
                                'product_name' => $pname,
                                'qty' => $qty,
                                'price' => $price,
                                'total_price' => $total,
                            ]);

            }
        


            }
  }

    public function saveOrder() {
        
            //echo "<pre>";print_r($_POST);exit;
            
            if($_POST['name']!=''){
                //var_dump(URI::getLiveMediaPath($_POST['uploadDir'])."/order/");exit();
                //var_dump( URI::getLiveMediaPath($_POST['uploadDir'])."/");exit();
                //var_dump($_FILES); var_dump($_POST['flImage_hdn']); exit();
            $arrFields = array("product_name" => $_POST['name'],"img"=>$_POST['flImage1'], "user_email" => $_POST['uemail'],"price"=>$_POST['price'] ,"qty" => $_POST['qty']);

            //print_r($arrFields); exit;
            if($arrFields['img'] == ''){
                $arrFields = array("product_name" => $_POST['name'],"user_email" => $_POST['uemail'],"price"=>$_POST['price'] ,"qty" => $_POST['qty']);

            }
                DB::update(CFG::$tblPrefix . "order", StringManage::processString($arrFields), " id=%d ",APP::$curId);

                UTIL::redirect(URI::getURL(APP::$moduleName,"order_list"));
                $_SESSION["actionResult"] = array("success" => "Order has been Updated successfully");
            }              
    }

			
}   