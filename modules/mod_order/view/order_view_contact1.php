<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="box">
      <div class="title">
        <h4> <span class="icon16 icomoon-icon-equalizer-2"></span> <span>Order details</span> </h4>
      </div>
     <div>
                <div class="content snd-top-button">
     
          <!--<button type="button" class="btn "><span class="icon24 icomoon-icon-pencil"></span></button>--> 
          <!--  <a href="#" class="btn pd10 applyTooptip" data-title="Save" id="btnSave"><span class="icon16 icon-pencil"></span></a>
		  <a href="#" class="btn pd10 applyTooptip" data-title="Save & Continue Edit" id="btnEdit"><span class="icon16 icon-edit"></span></a>-->
          
          <div>
                <ul class="shortcuts scroll" id="menu" >
                    <li class="topBtns"><a href="index.php?m=mod_order&a=order_list" class="btn btn-warning applyTooptip" data-title="Back to enquiry list" id="btnSave" >Back to list</a></li>
               </ul>
          </div>
         
     
      </div>
     
      <div class="content ">
        <form class="form-horizontal" id="frmContact" method="post">
          <input type="hidden" name="edit" id="hdnEdit" value="0" />
          <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab">Enquiry</a></li>
          </ul>
          <div class="tab-content">
     	   <div id="sectionName">
            <div class="tab-pane active" id="general">
              <div class="form-row row-fluid" >
                <div class="span12">
                  <div class="row-fluid">
                    <label for="Name" class="form-label span2">Name:</label>
                    <label class="form-label1 span2 infoLabel" id="Name"></label>
                  </div>
                </div>
              </div>
            </div>
           </div>
           
           <div id="sectionEmail"> 
            <div class="tab-pane active" id="general">
              <div class="form-row row-fluid" >
                <div class="span12">
                  <div class="row-fluid">
                    <label for="Email" class="form-label span2">Email Address:</label>
                    <label class="form-label1 span2  infoLabel" id="Email"></label>
                  </div>
                </div>
              </div>
            </div>
           </div>
             
           <div id="sectionMobile">
            <div class="tab-pane active" id="general">
              <div class="form-row row-fluid" >
                <div class="span12">
                  <div class="row-fluid">
                    <label for="Mobile" class="form-label span2">Mobile:</label>
                    <label class="form-label1 span2  infoLabel" id="Mobile"></label>
                  </div>
                </div>
              </div>
            </div>
           </div>
              
          <div id="sectionLocation"> 
            <div class="tab-pane active" id="general">
              <div class="form-row row-fluid" >
                <div class="span12">
                  <div class="row-fluid">
                    <label for="Location" class="form-label span2">Location:</label>
                    <label class="form-label1 span2  infoLabel" id="Location"></label>
                  </div>
                </div>
              </div>
            </div>
           </div>
             
           <div id="sectionEnquiryType">
            <div class="tab-pane active" id="general">
              <div class="form-row row-fluid" >
                <div class="span12">
                  <div class="row-fluid">
                    <label for="EnquiryType" class="form-label span2">Enquiry Type:</label>
                    <label class="form-label1 span2  infoLabel" id="EnquiryType"></label>
                  </div>
                </div>
              </div>
            </div>
           </div>   
           <div id="sectionMessage">
            <div class="tab-pane active" id="general">
              <div class="form-row row-fluid" >
                <div class="span12">
                  <div class="row-fluid">
                    <label for="Message" class="form-label span2">Message:</label>
 
                   <span class="form-label1 span2  infoLabel" id="Message" ></span>
                  </div>
                </div>
              </div>
            </div>
           </div>
            <div class="tab-pane active" id="general">
              <div class="form-row row-fluid" >
                <div class="span12">
                  <div class="row-fluid">
                    <label for="Message" class="form-label span2">Enquiry Date:</label>
                    <label class="form-label1 span2  infoLabel" id="EnquiryDate"></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
          </div>
    </div>
  </div>
</div>