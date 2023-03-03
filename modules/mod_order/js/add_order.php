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

var rules = {
                name: "required",    
                uemail: {
                    required: true,
                    email: true,
                },
                name: {
                    required: true,
                },
                status:{
                    required:true,
                    maxlength: 1,
                },
                qty:{
                    required:true,
                },
                price:{
                        required:true,
                },
                img: {
                    required: true,
                }
            };

            // degine validation message
            var messages = {
                uemail: {
                    required: "Please enter email",
                    email: "Please enter valid email",
                },
                name: {
                    required: "Please enter Product Name",
                },
                status: {
                    required: "Please Enter Status Value",
                    maxlength: "Status only contain 1 character",
                },
                qty:{
                    required:"Please Enter Quantity",
                },
                price:{
                        required:"Please Enter Price",
                },
                img:{
                    required:"Please Upload Image",
                }
            };

            // initialize form validator
            validaeForm("frmOrder", rules, messages);


            
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
            if ($('#frmOrder').valid())
            {
                obj.prop("disabled", true);
                toggleFormLoad("show");
                $('#frmOrder').submit();
            }
        }

});

function fillForm()
    {

        createUploader("flImage", "fileProgress", "files", displayUploadResult, "<?php echo URI::getURL("mod_admin", "upload_image") ?>", ["jpg", "gif", "png","jpeg", "JPG", "PNG", "GIF" ,"JPEG"], "<?php echo CFG::$sliderDir; ?>", "<?php echo URI::getURL("mod_order", "delete_file") ?>", (pageData ? [{"name": pageData.img, "title": pageData.img, "alt": pageData.img}] : ""), ((pageData) ? pageData.id : ""));


        if (pageData)    // fill form data if passed
        {
            $("#txtPrdName").val(pageData.product_name);
            $("#txtEmail").val(pageData.user_email);
            $("#txtQty").val(pageData.qty);
            $("#filImage").val(pageData.img);

        }

        
    }
</script>