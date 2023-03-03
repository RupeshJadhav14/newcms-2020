<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . '/js/jquery.validate.js' ?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery.maskedinput.min-1.4.js" ?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/additional-method.js" ?>"></script>
<?php echo UTIL::loadFileUploadJs(); ?>
<script type="text/javascript">
    $(document).ready(function() {

        <?php echo StringManage::createJsObject("productData", $data); ?>

        $(document).ready(function() {

            // initialize popover
            applyPopover();

            var rules = {
                site_name: "required",
                site_email: {
                    required: true,
                    email: true
                },
                enquiry_emails: {
                    required: true,
                    multipleEmails: true
                },
                google_analytic_code:{pattern:/^ua-\d{4,9}-\d{1,4}$/i}
            };
            var messages = {
                site_name: "Please enter site name",
                site_email: {
                    required: "Please enter site email",
                    email: "Please enter valid email"
                },
                enquiry_emails: {
                    required: "Please enter enquiry email",
                    multipleEmails: "Please enter valid email"
                },
                google_analytic_code:{pattern:'Please enter valid google analytic code'}
            };

            // initialize form validator
            validaeForm("frmConfig", rules, messages);

            // call form fillup function
            fillForm();

            // display message
            <?php Core::displayMessage("actionResult", "Product Update"); ?>

            //$('#txtSitePhone').mask("99 9999 9999", {placeholder: ""});

            jQuery(window).bind('scroll', function() {
                if (jQuery(window).scrollTop() > 32) {
                    jQuery('#menu').addClass('scrollsticky');
                }
                else {
                    jQuery('#menu').removeClass('scrollsticky');
                }
            });

        });

        // save
        $("#btnSave,#btnFooterSave").click(function (event) {
            event.preventDefault();
            submitForm(event, $(this));
        });

        // save and continue edit
        $("#btnEdit,#btnFooterEdit").click(function (event) {
            event.preventDefault();
            $("#hdnEdit").val("1");
            submitForm(event, $(this));
        });

        // submit form
        function submitForm(event, obj)
        {
            obj.prop("disabled", true);
            event.preventDefault();
            toggleFormLoad("show");
            if ($('#frmConfig').valid()){
                $('#frmConfig').submit();
            }
        }

        // fillup form if record is set
        function fillForm()
        {
            if (productData)
            {
                $.each(productData,function(k,v){
                    if (k == 'image_1' || k == 'image_2' || k == 'image_3' || k == 'image_4' || k == 'image_5' || k == 'image_6' || k == 'image_7' || k == 'image_8' || k == 'image_9' || k == 'image_10' || k == 'image_11' || k == 'image_12' || k == 'image_13' || k == 'image_14' || k == 'image_15' ) {
                    } else if(k == 'description') {
                        if (tinyMCE.activeEditor == null){
                            $("#txtDescription").val(v);
                        }else{
                            tinyMCE.get("txtDescription").setContent(v);
                        }
                    } else if(k == 'title_changed'){
                        if(v == 1){
                            $('[name="' + k+'"]').attr("checked",true);
                        }else{
                            $('[name="' + k+'"]').attr("checked",false);
                        }
                    } else{
                        $('[name="' + k+'"]').val(v);
                    }
                });

                // Create main image uploader
                 createUploader("flImage", "fileProgress", "files", displayUploadResult, "<?php echo URI::getURL("mod_admin", "upload_image") ?>", ["JPG", "jpg", "JPEG", "jpeg", "gif", "GIF", "png", "PNG"], "products", "<?php //echo URI::getURL("mod_dropship", "delete_image", "", "path=products") ?>", "", "");

            }
            toggleFormLoad("hide");
        }
        
        function isNumberic(evt)
        {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46 && charCode != 8)
                return false;
            if (charCode == 46)
                return false;
            return true;
        }

    });
    $("#title").keyup(function(){
        $("#title_change").prop('checked',true);
    });

    $(".edit").click(function(){
        $("#files").empty();
        if ($("#"+$(this).data('id')).val() != '') {
            $("#files").append(`<li class="imageBox"><div class="bx_3 thumbMain bx_main"><img class="imgMain" src="${$("#"+$(this).data('id')).val()}"><span class="delete" onclick="deleteImage('${$(this).data('id')}')"></span></div></li>`);
        }
        $(".imgPrt").modal("show");
        $("#imageReplace").val($(this).data('id'));
    });
    $("#saveImage").click(function(){
        var imageid = $("#imageReplace").val();
        var newImage = $(".imgPrt .imgMain").attr('src');
        if (newImage != undefined) {
            $('#'+imageid).val(newImage);
            $('#'+imageid).siblings('img').attr('src',newImage);
            $('#imagec_'+imageid).attr('checked','checked');
        }else{
            $('#'+imageid).val('');
            $('#'+imageid).siblings('img').attr('src','<?php echo URI::getLiveTemplatePath().'/images/img-upload.png'; ?>');
            $('#imagec_'+imageid).attr('checked',false);
        }
    });
    $(".delete").click(function(){
        if (window.confirm("Are you sure want to remove this image?")) { 
            var imageid = $(this).data('id');
            $('#'+imageid).val('');
            $('#'+imageid).siblings('img').attr('src','<?php echo URI::getLiveTemplatePath().'/images/img-upload.png'; ?>');
            $('#imagec_'+imageid).attr('checked',false);
            $(this).parents('li').removeClass('highlight');
        }
    });
</script>