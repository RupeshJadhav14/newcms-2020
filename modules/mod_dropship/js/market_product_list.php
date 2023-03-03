<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery.paging.min.js" ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$( function() {
			var from = $( "#fromDate" )
			.datepicker({
				dateFormat: "dd-mm-yy",
				changeMonth: true
			})
			.on( "change", function() {
				to.datepicker( "option", "minDate", getDate( this ) );
			}),
			to = $( "#toDate" ).datepicker({
				dateFormat: "dd-mm-yy",
				changeMonth: true
			})
			.on( "change", function() {
				from.datepicker( "option", "maxDate", getDate( this ) );
			});

			function getDate( element ) {
				var date;
				var dateFormat = "dd-mm-yy";
				try {
					date = $.datepicker.parseDate( dateFormat, element.value );
				} catch( error ) {
					date = null;
				}

				return date;
			}
		});
		
		var displayPages = function(data, startIndex) {
			var list = "";
			var sta = "";
			for (i = 0; i < data.records.length; i++)
			{
				var odd = (i % 2 == 0) ? "" : " class='odd' ";
				list += `<li ${odd}>`;
				// list = list + '<div class="chekMain"><div class="chkInn"><label><input type="checkbox" id="status' + data.records[i].sku + '" name="status[' + data.records[i].sku + ']" value="' + data.records[i].active + '" class="checkbox" data-update="' + data.records[i].update_date + '" data-id="' + data.records[i].id + '" /><span></span></label></div></div>';
				list += `<div class="hashBox">${startIndex}</div>`;
				list += `<div class="alignLeft" data-title="Title:"><img src="${data.records[i].image_1}" style="height:50px;"></div>`;
				list += `<div class="pageName">`;
				list += `<a href="index.php?m=mod_dropship&a=product_edit&id=${data.records[i].id}"  title="${data.records[i].id}">${data.records[i].sku}</a>`;
				list += `<ul class="optUl">`;
				list += `<li><a href="index.php?m=mod_dropship&a=product_edit&id=${data.records[i].id}" title="Edit">Edit</a></li>`;
				list += `</ul></div>`;
				list += `<div class="alignLeft" data-title="Market Place:">${(data.records[i].bargains_product == 0)?data.records[i].marketplace_sku:'-'}</div>`;
				list += `<div class="alignLeft" data-title="Title:">${data.records[i].title}</div>`;
				list += `<div class="alignLeft" data-title="Stock Qty:">${data.records[i].stock_qty}</div>`;
				if (data.records[i].bargains_product == 1) {
					price = parseFloat(data.records[i].price) + parseFloat(data.records[i].price * <?php echo CFG::$siteConfig['web_sell_percent']/100; ?>);
					rrpprice = parseFloat(data.records[i].rrpprice) + parseFloat(data.records[i].rrpprice * <?php echo CFG::$siteConfig['web_sell_percent']/100; ?>);
				}else{
					price = parseFloat(data.records[i].price) + parseFloat(data.records[i].price * <?php echo CFG::$siteConfig['market_sell_percent']/100; ?>);
					rrpprice = parseFloat(data.records[i].rrpprice) + parseFloat(data.records[i].rrpprice * <?php echo CFG::$siteConfig['market_sell_percent']/100; ?>);
				}
				list += `<div class="customerName" data-title="Price:">$${price.toFixed(2)}</div>`;
				list += `<div class="customerName" data-title="RRP Price:">${(rrpprice)?'$'+rrpprice.toFixed(2):''}</div>`;
				if (data.records[i].active == 'n') {
					data.records[i].active = 0;
				}else{
					data.records[i].active = 1;
				}
				list += `<div class="statusBox" data-title="Active:">${displayStatus(data.records[i].active)}</div>`;
				list += `<div class="statusBox" data-title="Created Date:">${displayDate(data.records[i].created_date)}</div>`;
				// list = list + '<div class="statusBox"  data-title="Status:"><span class="conSpan">' + displayStatus(data.records[i].active) + '</span></div>';
				list += `</li>`;
				startIndex = startIndex + 1;
			}
			$(".table").find("li:not(.topLi)").remove();
			$(".table").append(list);
			bindListingClick();
		}

		pageData.url = '<?php echo URI::getURL(APP::$moduleName, APP::$actionName) ?>';
		//alert(pageData.url);
		pageData.noOfRecords = totalProduct;
		pageData.pagingBlock = '#pagingNo';
		pageData.callbackFun = displayPages;
		pageData.perPage = $('.numOfRecord').val();
		if (oldPageState && oldPageState.searchData != undefined && oldPageState.searchData.searchForm.numOfRecord != undefined)
		{
			pageData.perPage = oldPageState.searchData.searchForm.numOfRecord;
		}

		// do paging	
		createDataGrid();

		// initialize sorting
		sortData();

		validateSearchForm = function() {
			if ($("#search").val() == "" && $("#status").val() == '' && $("#product_type").val() == '' && $('#fromDate').val() == '' && $('#toDate').val() == '') {
				alert("Please enter sku, title for search");
				return false;
			}
			return true;
		}

		pageData.validateSearch = validateSearchForm;

		resetForm = function()
		{
			$("#search").val("");
			pageData.searchField = "";
			pageData.noOfRecords = totalProduct;
			doPaging();
		}

		// display message			
		<?php Core::displayMessage("actionResult", "Product Update"); ?>


		// restore value of search form
		function restoreSearchForm()
		{
			if (oldPageState && oldPageState.searchData)
			{
				$("#search").val(oldPageState.searchData.searchForm.search);
				$("#status").val(oldPageState.searchData.searchForm.status);
				$("#product_type").val(oldPageState.searchData.searchForm.product_type);
				$("#fromDate").val(oldPageState.searchData.searchForm.fromDate);
				$("#toDate").val(oldPageState.searchData.searchForm.toDate);
				$(".numOfRecord").val(oldPageState.searchData.searchForm.numOfRecord);
			}
		}
		restoreSearchForm();

	});

</script>