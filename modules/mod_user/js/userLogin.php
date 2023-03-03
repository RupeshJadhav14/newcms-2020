<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous">
    </script>

    <!-- ✅ SECOND - load jquery validate ✅ -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
      integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer">
    </script>

    <!-- ✅ THIRD - load additional methods ✅ -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"
      integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    
<?php echo UTIL::loadFileUploadJs(); ?>
<?php echo UTIL::loadEditor(); ?>

<script type="text/javascript">
    

// <?php echo StringManage::createJsObject("pageData", $data); ?>

$(document).ready(function(){
    $(document).ready(function() {
            var user_id = '';
            
            $("#loginFrm").validate({
                    rules: {
                        name:{
                        required :true,
                    },
                    password:{
                        required: true,
                        minlength: 8,
                    }
                },
                messages:{
                    name:{
                        required:"Please Enter User Name",
                    },
                    password:{
                         required: "Please enter phone",
                        minlength: "password must be 8 Charater long",
                    },
                },
            });

            

            
    });


        $(document).ready(function() {
        $("#btnSubmit").click(function(e) {
            e.preventDefault();
            //alert("this");

                var un= $("#username").val();
                var ps= $("#password").val();
                // alert(un);
                // alert(ps);
                $.ajax({
                    type: "POST",
                    url :"<?php echo URI::getURL("mod_user","userLogin"); ?>",
                    data : { username:$("#username").val() ,password:$("#password").val() },
                    success: function(response)
                    {
                        //var jsondata=JSON.parse(response);
                        window.location.href = "http://localhost/newcms-2020/"; 
                        //alert(response);
                    }  
                });
             

           });
        });




            // save
       //  $("#btnSubmit").click(function(event) {
          
       //       event.preventDefault();
       //      //  var ajaxData = $(this).serialize();
       //      // alert(ajaxData);
       //        //alert("this");
       //       $.ajax({
       //      type: "POST",
       //      url: URI::getURL("mod_user","userLogin"),
       //      data: $(this).serialize(),
       //      success: function(response)
       //      {
       //          var jsonData = JSON.parse(response);
  
       //          if (jsonData.success == "1")
       //          {
       //              alert("valid");
       //          }
       //          else
       //          {
       //              alert('Invalid Credentials!');
       //          }
       //     }
       // });
       //      //submitForm(event, $(this));
       //  });

        function submitForm(event, obj)
        {

            event.preventDefault();
            if ($('#loginFrm').valid())
            {
                obj.prop("disabled", true);
                toggleFormLoad("show");
                $('#loginFrm').submit();
            }
        }

});

</script>