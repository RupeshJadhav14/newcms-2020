
 <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $data["list"]["name"]; ?></h2>
          <ol>
            <li><a href="<?php echo $url; ?>">Home</a></li>
            <li><?php echo $data["list"]["name"]; ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
	
	
<div class="container-fluid">
   <div id="content">
      <h1>MyPage : <?php echo $data["list"]["name"]; ?> </h1>
      <br>
      Updated On : <?php echo UTIL::dateDisplay($data["list"]["created_date"]); ?>
      <br>
      <br>
      <br>
      <div class="row">
         <?php $url = UTIL::getResizedImageSrc(
            "mypage",
            $data["list"]["image_name"],
            "50",
            "new.jpg"
            ); ?>
         <!--
            <img class="img-responsive img-rounded" src="<?php echo CFG::$livePath ."/media/" . CFG::$mypageDir . "/" .$data["list"]["image_name"]; ?>">
            -->
         <img class="img-responsive img-rounded" src="<?php echo $url; ?>">
      </div>
      <div class="row">
         <br>
         <?php echo $data["list"]["description"]; ?>
         <br>
      </div>
      <div class="row">
         <br>
         <form id="frmComment" name="frmComment" action="index.php?m=mod_comment&a=comment_front_add" onsubmit="return submitCommentForm()" method="post">
            <input type="hidden" id="form_url" name="form_url" value="index.php?m=mod_comment&a=comment_front_add">	
            <input type="hidden" id="lang_id" name="lang_id" value="">
            <input type="hidden" name="status" id="status" value="1" />
            <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $data[
               "list"
               ]["id"]; ?>" />
            <input type="hidden" name="blog_slug" id="blog_slug" value="<?php echo $data[
               "list"
               ]["slug"]; ?>" />
            <ul class="row">
               <li class="">
                  <span for="txtTitle" class="labelSpan star">Customer Name:</span>
                  <div class="txtBox">
                     <input type="text" name="title" id="txtTitle" class="txt required" maxlength="100" title="Comment Name">
                  </div>
               </li>
               <li>
                  <span for="txaDescription" class="labelSpan star">Description:</span>
                  <div class="txtBox">
                     <textarea class="txt required" name="shortDesc" id="txaDescription" title="Description"></textarea>
                  </div>
               </li>
               <li class="">
                  <div class="txtBox">
                     <input type="submit" name="submit" value="Add Comment" id="txtTitle" class="txt required" maxlength="100" title="Comment Name">
                  </div>
               </li>
            </ul>
         </form>
         <br>
      </div>
      <!--- Loading comment --->
      <div class=" comment row">
         <br>
         <?php // Loading Comments From DB
            for ($i = 0; $i < count($data["comment"]); $i++) {
                echo "<b>" . $data["comment"][$i]["customer_name"] . "</b><br>";
                echo "<p>" . $data["comment"][$i]["description"] . "</p><br><br>";
            } ?>
         <br>
      </div>
   </div>
</div>
</div>