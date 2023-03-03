<?php 
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	 
	class Student
	{
		
	
		function __construct()
		{		
		     
		}
		
		function student_list()
		{	
			// load model
			Load::loadModel("student");
			
			// create model object
			$contactenqObj = new StudentModel();
			//$priceObj = new OrderModel();
			
			// get contact listing
			$contactenqObj->getStudentList();

			//price listing
			//$priceObj->getPriceOrderList();
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/student_list.php");
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
						
			// render layout
			Layout::renderLayout();
		}

		//delete Student
		function student_delete(){
			Load::loadModel("student");

			$deleteObj= new StudentModel();

			$deleteObj-> deleteStudent();

			echo json_encode(array("result" => "success","title" => "Delete Student","message" => "Student Record has been deleted successfully"));

			exit();
		}

		//order edit 

		function student_edit() {
        // load model
        Load::loadModel("student");

        // create model object
        $studentObj = new StudentModel();


        // save user record is submitted
        $studentObj->saveStudent(APP::$curId);



        // get user record for update
        $studentData = $studentObj->getStudentAllData(APP::$curId);

//        $userData['country'] = $userObj->getCountry();

        //$viewData = $orderObj->getRoles();

        // include js in footer
        $jsData = Layout::bufferContent(URI::getAbsModulePath() . "/js/student_edit.php", $studentData);

        // create javascript variable for ajax url			
        Layout::addFooter($jsData);

        // render layout
        Layout::renderLayout($studentData);
    }


    	function add_student() {
        // load model
        Load::loadModel("student");

        // create model object
        $studentObj = new StudentModel();


        // save user record is submitted
        $studentObj->saveAddStudent(APP::$curId);

        // include js in footer
        $jsData = Layout::bufferContent(URI::getAbsModulePath() . "/js/add_student.php", $studentData);

        // create javascript variable for ajax url			
        Layout::addFooter($jsData);

        // render layout
        Layout::renderLayout($studentData);
    }



}
?>