<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
unset($data['update_by'],$data['update_date']);
$shippingCharge = array();
if ($data['bulky_item'] == 'No') {
	$shippingCharge = json_decode(CFG::$siteConfig['dropship_non_bulky_shipping'],true);
}else{
	$shippingCharge = json_decode(CFG::$siteConfig['dropship_bulky_shipping'],true);
}
?>
<style>
	#files .edit{display: none;}
	.thumbMain .edit {position: absolute;right: 0;top: 0;left: inherit;background: #949494;width: 30px;height: 30px;-moz-box-shadow: -2px 2px 2px rgba(1,1,1,0.23);-ms-box-shadow: -2px 2px 2px rgba(1,1,1,0.23);-webkit-box-shadow: -2px 2px 2px rgba(1,1,1,0.23);box-shadow: -2px 2px 2px rgba(1,1,1,0.23);z-index: 10;cursor: pointer;border-radius: 0 0 0 3px;transition: all 0.3s ease-out 0s;-webkit-transition: all 0.3s ease-out 0s;-moz-transition: all 0.3s ease-out 0s;-ms-transition: all 0.3s ease-out 0s;}
	.thumbMain .edit:after { content: "";width: 2px; height: 16px;background: #fff; left: 0; right: 0; top: 0; bottom: 0; margin: auto; }
	.thumbMain .edit:before {content: "";width: 2px;height: 16px;background: #fff;left: 0;right: 0;top: 0;bottom: 0;margin: auto;}

</style>
<section>
	<div  id="formLoad" class="showFormLoad"></div>  
	<div class="midTop">
		<div class="container-fluid">
			<div class="row">
				<div class="fullColumn">
					<div class="topLeft">
						<div class="pageTitle updatePro">
							<?php if ($data['bargains_product'] == 1) {
								echo "Bargains Product Edit";
							}else{
								echo "Market Place Product Edit";
							} ?>
						</div>
					</div>
					<div class="topRight btnRight">
						<ul class="btnUl">
							<li><a href="index.php?m=mod_dropship&a=<?php echo ($data['bargains_product'] == 1)?'product_list':'marketplace_product_list'; ?>" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
							<li><a href="javascript:void(0);" id="btnEdit" class="trans comBtn" title="Save & continue edit">Save & continue edit</a></li>
							<li><a href="javascript:void(0);" id="btnSave" class="trans comBtn" title="Save">Save</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="middlePart ">
		<div class="container-fluid">
			<div class="row">
				<div class="fullColumn">
					<div class="midWhite">
						<div class="tabBox">
							<form class="form-horizontal" id="frmConfig" method="post">
								<input type="hidden" id="hdnEdit" name="hdnEdit" value="0">
								<ul class="tabUl">
									<li data-tab="general" class="trans current" title="General">General</li>
									<li data-tab="images" class="trans" title="Images">Images</li>
									<li data-tab="orders" class="trans" title="Orders List">Orders List</li>
								</ul>
								<div class="tabMain">
									<div class="accMain">General</div>
									<div class="accDiv tabDiv current" id="general">
										<div class="formBox twoCol" >
											<ul class="row">

												<li class="halfLi">
													<span class="labelSpan">Created Date:</span>
													<div class="txtBox">
														<?php echo date('d-m-Y h:i',strtotime($data['created_date'])); ?>
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Dropship SKU:</span>
													<div class="txtBox">
														<?php echo $data['sku'] ?>
														<input type="hidden" name="sku" class="txt disabled" readonly="true">
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Bargains SKU:</span>
													<div class="txtBox">
														<?php if ($data['bargains_product'] == 1) {?>
															<span style="color:red;"><?php echo $data['match']['SKU'];?></span>
														<?php }else{ ?>
															<a style="text-decoration:underline;" title="Visit Bargains Product" href="<?php echo URI::getURL('mod_dropship','product_edit',$data['matchProduct']['id']); ?>" ><?php echo $data['match']['SKU'];?></a>
														<?php } ?>
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Market Place SKU:</span>
													<div class="txtBox">
														<?php if ($data['bargains_product'] == 0) {?>
															<span style="color:red;"><?php echo $data['match']['marketplace_sku'];?></span>
														<?php }else{ ?>
															<a style="text-decoration:underline;" title="Visit Market Place Product	" href="<?php echo URI::getURL('mod_dropship','product_edit',$data['matchProduct']['id']); ?>" ><?php echo $data['match']['marketplace_sku'];?></a>
														<?php } ?>
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Title:</span>
													<div class="txtBox">
														<input type="text" name="title" id="title" class="txt" maxlength="100" title="Please enter title">
													</div>
												</li>
												<li class="halfLi"> 
													<span class="labelSpan">Title Changed:</span>
													<div class="optionBox">
														<div class="chkInn">
															<label>
																<input type="checkbox" id="title_change" class="checkbox" name="title_changed">
																<span></span>
															</label>
														</div>                                                   
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Stock Qty:</span>
													<div class="txtBox">
														<input type="text" name="stock_qty" class="txt disabled" readonly="true" maxlength="100" title="Please enter stock qty">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Dropship Orignal Price:</span>
													<div class="txtBox">
														<input type="text" name="price" class="txt dollarSpan disabled" readonly maxlength="100" title="Please enter price">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Bargains Price:</span>
													<div class="txtBox">
														<?php if ($data['bargains_product'] == 1) {
															$spercentage = CFG::$siteConfig['web_sell_percent'];
														}else{
															$spercentage = CFG::$siteConfig['market_sell_percent'];
														} ?>
														<input type="text" value="<?php echo $data['price']+($data['price']*$spercentage/100) ?>" readonly class="disabled txt dollarSpan" maxlength="100" title="Please enter price">
													</div>
													<small>(Price including <?php echo $spercentage; ?>%)</small>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Dropship Orignal RRP Price:</span>
													<div class="txtBox">
														<input type="text" name="rrpprice" class="txt dollarSpan disabled" readonly maxlength="100" title="Please enter rrpprice">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Bargains RRP Price:</span>
													<div class="txtBox">
														<input type="text" readonly value="<?php echo $data['rrpprice']+($data['rrpprice']*$spercentage/100) ?>" class="txt dollarSpan disabled" maxlength="100" title="Please enter rrpprice">
													</div>
													<small>(Price including <?php echo $spercentage; ?>%)</small>
												</li>
												<li class="fullLi">
													<span class="labelSpan">Description:</span>
													<div class="txtBox">
														<?php echo UTIL::loadTinymce(0, 'txtDescription'); ?>
													</div>
												</li>

												<div><h2>Dropship Original Data</h2> <hr></div>
												<li class="mobiHalf">
													<span class="labelSpan">Category:</span>
													<div class="txtBox">
														<input type="text" name="category" class="txt disabled" readonly="true" maxlength="100" title="Please enter category">
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Dropship VIC:</span>
													<div class="txtBox">
														<input type="text" name="vic" class="txt dollarSpan disabled" maxlength="100" title="Please enter vic">
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Bargains VIC:</span>
													<div class="txtBox">
														<input type="text" class="txt dollarSpan disabled" maxlength="100" value="<?php echo $data['vic']+($data['vic']*$shippingCharge['VIC']['percent']/100) ?>">
													</div>
													<small>(Price Including <?php echo $shippingCharge['VIC']['percent'] ?>%)</small>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Dropship NSW:</span>
													<div class="txtBox">
														<input type="text" name="nsw" class="txt dollarSpan disabled" maxlength="100" title="Please enter nsw">
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Bargains NSW:</span>
													<div class="txtBox">
														<input type="text" class="txt dollarSpan disabled" maxlength="100" value="<?php echo $data['nsw']+($data['nsw']*$shippingCharge['NSW']['percent']/100) ?>">
													</div>
													<small>(Price Including <?php echo $shippingCharge['NSW']['percent'] ?>%)</small>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Dropship SA:</span>
													<div class="txtBox">
														<input type="text" name="sa" class="txt dollarSpan disabled" maxlength="100" title="Please enter sa">
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Bargains SA:</span>
													<div class="txtBox">
														<input type="text" class="txt dollarSpan disabled" maxlength="100" title="Please enter sa"  value="<?php echo $data['sa']+($data['sa']*$shippingCharge['SA']['percent']/100) ?>">
													</div>
													<small>(Price Including <?php echo $shippingCharge['SA']['percent'] ?>%)</small>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Dropship QLD:</span>
													<div class="txtBox">
														<input type="text" name="qld" class="txt dollarSpan disabled" maxlength="100" title="Please enter qld">
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Bargains QLD:</span>
													<div class="txtBox">
														<input type="text" class="txt dollarSpan disabled" maxlength="100" title="Please enter qld"  value="<?php echo $data['qld']+($data['qld']*$shippingCharge['QLD']['percent']/100) ?>">
													</div>
													<small>(Price Including <?php echo $shippingCharge['QLD']['percent'] ?>%)</small>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Dropship TAS:</span>
													<div class="txtBox">
														<input type="text" name="tas" class="txt dollarSpan disabled" maxlength="100" title="Please enter tas">
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Bargains TAS:</span>
													<div class="txtBox">
														<input type="text" class="txt dollarSpan disabled" maxlength="100" title="Please enter tas"  value="<?php echo $data['tas']+($data['tas']*$shippingCharge['TAS']['percent']/100) ?>">
													</div>
													<small>(Price Including <?php echo $shippingCharge['TAS']['percent'] ?>%)</small>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Dropship WA:</span>
													<div class="txtBox">
														<input type="text" name="wa" class="txt dollarSpan disabled" maxlength="100" title="Please enter wa">
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Bargains WA:</span>
													<div class="txtBox">
														<input type="text" class="txt dollarSpan disabled" maxlength="100" title="Please enter wa"  value="<?php echo $data['wa']+($data['wa']*$shippingCharge['WA']['percent']/100) ?>">
													</div>
													<small>(Price Including <?php echo $shippingCharge['WA']['percent'] ?>%)</small>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Dropship NT:</span>
													<div class="txtBox">
														<input type="text" name="nt" class="txt dollarSpan disabled" maxlength="100" title="Please enter nt">
													</div>
												</li>
												<li class="halfLi">
													<span class="labelSpan">Bargains NT:</span>
													<div class="txtBox">
														<input type="text" class="txt dollarSpan disabled" maxlength="100" title="Please enter nt"  value="<?php echo $data['nt']+($data['nt']*$shippingCharge['NT']['percent']/100) ?>">
													</div>
													<small>(Price Including <?php echo $shippingCharge['NT']['percent'] ?>%)</small>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Active:</span>
													<div class="txtBox">
														<input type="hidden" name="active">
														<input type="text" class="txt disabled" value="<?php echo ($data['active'] == 'y')?'Yes':'No'; ?>">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Bulky Item:</span>
													<div class="txtBox">
														<input type="text" name="bulky_item" class="txt disabled" placeholder="Bulky Item">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Discontinued:</span>
													<div class="txtBox">
														<input type="text" name="discontinued"  readonly="true" class="txt disabled" maxlength="100" title="Please enter discontinued">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">EAN Code:</span>
													<div class="txtBox">
														<input type="text" name="ean_code"  readonly="true" class="txt disabled" maxlength="100" title="Please enter ean code">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Brand:</span>
													<div class="txtBox">
														<input type="text" name="brand"  readonly="true" class="txt disabled" maxlength="100" title="Please enter brand">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">MPN:</span>
													<div class="txtBox">
														<input type="text" name="mpn" readonly="true" class="txt disabled" maxlength="100" title="Please enter mpn">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Weight Kg:</span>
													<div class="txtBox">
														<input type="text" name="weight_kg"  readonly="true" class="txt disabled" maxlength="100" title="Please enter weight kg">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Carton Length Cm:</span>
													<div class="txtBox">
														<input type="text" name="carton_length_cm" readonly="true" class="txt disabled" maxlength="100" title="Please enter carton length cm">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Carton Width Cm:</span>
													<div class="txtBox">
														<input type="text" name="carton_width_cm" readonly="true" class="txt disabled" maxlength="100" title="Please enter carton width cm">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Carton Height Cm:</span>
													<div class="txtBox">
														<input type="text" name="carton_height_cm" readonly="true" class="txt disabled" maxlength="100" title="Please enter carton height cm">
													</div>
												</li>
												<li class="mobiHalf">
													<span class="labelSpan">Color:</span>
													<div class="txtBox">
														<input type="text" name="color" class="txt disabled" readonly="true" maxlength="100" title="Please enter color">
													</div>
												</li>
												
											</ul>
										</div>
									</div>

									<div class="accMain">Images</div>
									<div class="accDiv tabDiv" id="images">
										<div class="formBox">   
											<ul class="row">
												<li class="fullLi">
													<span class="labelSpan">Images:</span>
													<div class="txtBox">
														<?php $updated_image = json_decode( $data['image_change'], true); unset($data['image_change']); ?>
														<ul class="img_thumbMain multiImages">	
															<?php foreach ($data as $key => $value){ ?>
																<?php $title = str_replace("_", " ",$key);
																if(explode(' ', $title)[0] != 'image') {
																	continue; 
																} ?>
																<li class="<?php echo isset($updated_image[$key])?'highlight':'';?>">
																	<div class="high_box">
																		<div class="bx_3 thumbMain img_box bx_main imageBox">
																			<div class="chkInn">
																				<label>
																					<input type="checkbox" id="imagec_<?php echo $key; ?>" class="checkbox" name="imagec[<?php echo $key; ?>]" <?php echo isset($updated_image[$key])?'checked="checked"':'';?>>
																					<span></span>
																				</label>
																			</div>

																			<img src="<?php echo ($value)?$value:URI::getLiveTemplatePath().'/images/img-upload.png'; ?>" class="imgMain">
																			<input type="hidden" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo $value ?>">
																			<span class="edit" data-id="<?php echo $key; ?>"><i class="fa fa-pencil" style="width:30px;height:30px;"></i></span>
																			<span class="delete del_img" data-id="<?php echo $key; ?>"><i class="fa fa-trash"  ></i></span>
																		</div>
																		<p class="img_name"><?php echo $title; ?></p>
																		<div>
																		</li>
																	<?php } ?>
																</ul>
															</div>
														</li>
													</ul>
												</div>
											</div>

											<div class="accMain">Orders List</div>
											<div class="accDiv tabDiv" id="orders">
												<?php if (!empty($data['orderData'])){ ?>
													<ul class="table">
														<li class="topLi">
															<div class="hashBox">#</div>
															<div class="sorting sort"><span>Order ID</span></div>
															<div class="sorting sort"><span>Dropship SKU</span></div>
															<div class="sorting sort"><span><?php echo ($data['bargains_product'] == 1)?'Bargains':'Market Place' ?> SKU</span></div>
															<div class="sorting sort"><span>Stock Qty</span></div>
															<div class="sorting sort"><span>Created Date</span></div>
														</li>
														<?php foreach ($data['orderData'] as $key => $value){ ?>
															<li class="odd">
																<div class="hashBox"><?php echo $key+1; ?></div>
																<div class="pageName"><?php echo $value['serial_number'] ?></div>
																<div class="alignLeft" data-title="Dropship:"><?php echo $value['dropship_sku']; ?></div>
																<div class="alignLeft" data-title="<?php echo ($data['bargains_product'] == 1)?'Bargains':'Market Place' ?>:"><?php echo $value['sku'] ?></div>
																<div class="alignLeft" data-title="Stock Qty:"><?php echo $value['qty'] ?></div>
																<div class="alignLeft" data-title="Created Date:"><?php echo date('d-m-Y h:i:s a',strtotime($value['created_date'])); ?></div>
															</li>
														<?php } ?>
													</ul>
												<?php }else{ ?>
													<div id="noGrid" class="content noRecord">Orders records not found</div>
												<?php } ?>
											</div>

										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="topRight btmBtn">
							<ul class="btnUl">
								<li><a href="index.php?m=mod_dropship&a=product_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
								<li><a href="javascript:void(0);" id="btnEdit" class="trans comBtn" title="Save & continue edit">Save & continue edit</a></li>
								<li><a href="javascript:void(0);" id="btnSave" class="trans comBtn" title="Save">Save</a></li>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</section>

		<div class="imgPrt modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add / Edit Image</h4>
					</div>
					<div class="modal-body">
						<div class="uploader_section uploadImgDiv">
							<span class="labelSpan">Image:</span>
							<div class="img_upMain">
								<ul class="img_thumbMain singleImgUp" id="files"></ul>
								<div class="uploaderMain singleDiv">
									<div class="fileProgress"></div>
									<div class="setofferImgBtnDiv">
										<input type="file" name="flImage" id="flImage" class="up-Btn required" data-required="1" title="Offer Image required">
									</div>
									<!-- <input type="hidden" id="hdnImg" name="flImage"> -->
									<div class="upload_text">Allowed Extensions: jpg, gif, png</div>
									<input type="hidden" id="imageReplace" value="">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer" style="padding-top: 20px;">
						<button type="button" class="backBtn btn trans" data-dismiss="modal">Close</button>
						<!-- <button type="button" class="btn trans" id="removeImage" data-dismiss="modal">Remove Image</button> -->
						<button type="button" class="btn trans" id="saveImage" data-dismiss="modal">Save Image</button>
					</div>
				</div>
			</div>
		</div>