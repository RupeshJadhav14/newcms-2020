<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . '/js/jquery.validate.js' ?>"></script>
<!--<script type="text/javascript" src="<?php //echo URI::getLiveTemplatePath() . "/plugins/tiny_mce/tiny_mce.js" ?>"></script>-->

<?php $path = URI::getLiveTemplatePath(); ?>
<?php echo UTIL::loadFileUploadJs(); ?>
<?php echo UTIL::loadEditor(); ?>
<script type="text/javascript">
<?php echo StringManage::createJsObject("pageData", $data); ?>

    $(document).ready(function() {

        $(document).ready(function() {
			
		
		
		 tinymce.init({
    	selector: '#txaDescription',
    	browser_spellcheck: true,
    	plugins: "image imagetools advlist autosave save preview table code media wordcount autoresize link anchor charmap print searchreplace",
    	images_upload_url: 'index.php?app=admin&module=ajax&act=tinymce_upload&csrfKey=',
    	file_picker_types: 'image',
    	images_upload_base_path: '',
    	images_upload_credentials: true,
    	relative_urls : false,
        remove_script_host : false,
        convert_urls : false,
    });

            // load editor
            
//            tinymce.init({
//  selector:'#txaDescription',
//  menubar:false,
//  plugins: [
//        "advlist autolink lists link image charmap print preview anchor",
//        "searchreplace visualblocks code fullscreen",
//        "insertdatetime media table contextmenu paste textcolor"
//    ],
// 
//   toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | forecolor backcolor",
//    
//    setup : function(editor) {
//
//            editor.on('PostProcess', function(ed) {
//                // we are cleaning empty paragraphs
//                ed.content = ed.content.replace(/(<p>&nbsp;<\/p>)/gi,'<br />');
//            });
//
//        },
//    
//    file_browser_callback:function(field, url, type, win) {
//        
//    
//        tinyMCE.activeEditor.windowManager.open({
//            file: '<?php //echo $path; ?>/js/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
//            title: 'KCFinder',
//            width: 700,
//            height: 500,
//            inline: true,
//            close_previous: false,
//            
//        }, {
//            window: win,
//            input: field
//        });
//        return false;
//    }
//    
//});

				    applyPopover();
					var rules = {
							name: {required: true},
							cmbCategory: {required: true},
							txaDescription:{required: true}
							
					};
						//hdnImg: {required: true}
					
					var messages = {
						name: {required:"Please enter page name"},
						cmbCategory: {required:"Please select category"},
						txaDescription:{required:"Please enter description"}
						
						//hdnImg: "Please select slider image"
					};

					// initialize form validator
					validaeForm("frmMyPage", rules, messages);
					validaeForm("frmMyPage");


							
				
				
					


            // call form fillup function
            fillForm();

            // display message
<?php Core::displayMessage("actionResult", "Page Save"); ?>

            //apply tool tip
            applyTooltip();
			
			
			$('.editTab a').click(function() {
                $('.editTab a').removeClass('activeLink')
				$(this).addClass('activeLink')
            });
			


        });

         // save
        $("#btnSave,#btnFooterSave").click(function(event) {
            event.preventDefault();
            submitForm(event, $(this));
        });

        // save and continue edit
        $("#btnEdit,#btnFooterEdit").click(function(event) {
            event.preventDefault();
            $("#hdnEdit").val("1");
            submitForm(event, $(this));
        });
        
              /* #@author : Harshal Solanki @Date : 15-08-2016 @Changes : Add Tabing Code */

//        $("#btnSave,#btnEdit,#btnFooterEdit,#btnFooterSave").click(function(event) {
//            var lastp;
//            var flag = true;
//            $('.tabUl li').each(function() {
//                $(this).trigger("click");
//                if ($(".error").is(':visible')) {
//                    if (flag)
//                    {
//                        lastp = $(this);
//                        flag = false;
//                    }
//                    $(this).css("border", "1px solid red");
//                }
//                else
//                {
//                    $(this).css("border", "none");
//                }
//            });
//            lastp.trigger("click");
//
//        });
        // submit form
        function submitForm(event, obj)
        {
            tinyMCE.triggerSave();
            event.preventDefault();
            if ($('#frmMyPage').valid())
            {
                obj.prop("disabled", true);
                toggleFormLoad("show");
                $('#frmMyPage').submit();
            }
        }
		/*
		function submitCommentForm()
        {
			alert('Hello');
            //event.preventDefault();
            if ($('#frmComment').valid())
            {
                $('#frmComment').submit();
            }
        }*/
		
		

    });
    
//    $("#html-editor").click(function(){
//                    var uploderId = $('.mceu_opner').find('.mce-i-image').parent('button').parent('div').attr('id');
//                    $('#'+uploderId).trigger('click');
//    });

    // fillup form if record is set
    function fillForm()
    {
        // Create main image uploader
        createUploader("flImage", "fileProgress", "files", displayUploadResult, "<?php echo URI::getURL("mod_admin", "upload_image") ?>", ["JPG","jpg","JPEG","jpeg", "gif","GIF", "png","PNG", "pdf","PDF"], "<?php echo CFG::$mypageDir; ?>", "<?php echo URI::getURL("mod_mypage", "delete_file") ?>", (pageData ? [{"name": pageData.image_name, "title": pageData.image_title, "alt": pageData.image_alt}] : ""), ((pageData) ? pageData.id : ""));

        // Create additional image uploader
       // createUploader("image2", "fileProgress2", "files2", displayUploadResult, "<?php echo URI::getURL("mod_admin", "upload_image") ?>", ["JPG","jpg", "gif","GIF", "png","PNG","JPEG","jpeg"], "<?php echo CFG::$pageGalleryDir; ?>", "<?php echo URI::getURL("mod_mypage", "delete_gallery") ?>", ((pageData && pageData.gallery_image != "") ? jQuery.parseJSON(pageData.gallery_image) : ""), ((pageData) ? pageData.id : ""));
        
//        createUploader("image2", "fileProgress2", "files2", displayUploadResult, "<?php //echo URI::getURL("mod_admin", "upload_image") ?>", ["JPG","jpg", "gif","GIF", "png","PNG"], "<?php //echo CFG::$pageGalleryDir; ?>", "<?php //echo URI::getURL("mod_page", "delete_gallery") ?>", (pageData ? [{"name": pageData.image2, "title": pageData.image_title, "alt": pageData.image_alt}] : ""), ((pageData) ? pageData.id : ""));

        if (pageData)    // fill form data if passed
        {
            
            $("#txtSlug").val(pageData.slug);
            //$('#btnView,#btnFooterView').attr('href','<?php //echo CFG::$livePath; ?>/'+pageData.slug);
            
            $("#txtTitle").val(pageData.name);
			
			$("#cmbCategory").val(pageData.category_id);
            
			//alert(pageData.name);

            // check tinyMCE is initialized or not
            if (tinyMCE.activeEditor == null)
                $("#txaDescription").val(pageData.description);
            else
                tinyMCE.get("txaDescription").setContent(pageData.description);

            $("#txtSortOrder").val(pageData.sort_order);
            $("#txtMetaTitle").val(pageData.meta_title);
            $("#txaMetaDescription").val(pageData.meta_description);
            $("#txaMetakeyword").val(pageData.meta_keyword);

            if (pageData.status == 1)
            {
                $("#chkStatus").attr("checked", "checked");
                $("#checkAct").html("Active");
            }
            else if (pageData.status == 0)
            {
                $("#chkStatus").removeAttr("checked");
                $("#checkAct").html("Inactive");
            }

        }

        toggleFormLoad("hide"); // hide form load div
    }
    
    function previewPage(){
        window.open('<?php echo CFG::$livePath; ?>/'+pageData.slug, '_blank');
    }



</script>