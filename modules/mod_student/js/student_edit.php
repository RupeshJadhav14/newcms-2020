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

    <!-- ✅ FOURTH - load your JS script ✅ -->
    <script src="index.js"></script>
<?php echo UTIL::loadFileUploadJs(); ?>
<?php echo UTIL::loadEditor(); ?>

<script type="text/javascript">
	

<?php echo StringManage::createJsObject("pageData", $data); ?>

$(document).ready(function(){
    $(document).ready(function() {
            var user_id = '';
            if (pageData)    // fill form data if passed
            {
                user_id = pageData.id;
            }


            $("#frmStudent").validate({
                    rules: {
                        name:{
                        required :true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    roll_id:{
                        required: true,
                    },
                    phone:{
                        required: true,
                        minlength: 10,
                    }
                },
                messages:{
                    name:{
                        required:"Please Enter Student Name",
                    },
                    email: {
                        required: "Please enter email",
                        email: "Please enter valid email",
                    },
                    roll_id:{
                        required:"Please Enter Roll No",
                    },
                    phone:{
                         required: "Please enter phone",
                        minlength: "Phone must be 10 digits long",
                    }
                }
            })

            // initialize form validator
            //validaeForm("frmOrder", rules, messages);

            // load editor
            //  loadEditor("txaDescription");

            // initialize popover
            applyPopover();

            fillForm();
    });
            // save
        $("#btnSave").click(function(event) {
            event.preventDefault();
            submitForm(event, $(this));
        });

        function submitForm(event, obj)
        {

            event.preventDefault();
            if ($('#frmStudent').valid())
            {
                obj.prop("disabled", true);
                toggleFormLoad("show");
                $('#frmStudent').submit();
            }
        }

});

function fillForm()
    {

        if (pageData)    // fill form data if passed
        {
            $("#txtName").val(pageData.name);
            $("#txtEmail").val(pageData.email);
            $("#txtRId").val(pageData.roll_id);
            $("#txtPhone").val(pageData.phone);
        }        
    }
</script>