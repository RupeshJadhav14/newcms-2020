<?php

/* Page model class. Contains all attributes and method related to page.
 */
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>	
<?php /* Category List */ ?>


<style>
    page_links
 {
  font-family: arial, verdana;
  font-size: 12px;
  border:1px #000000 solid;
  padding: 6px;
  margin: 3px;
  background-color: #cccccc;
  text-decoration: none;
 }
 #page_a_link
 {
  font-family: arial, verdana;
  font-size: 12px;
  border:1px #000000 solid;
  color: #ff0000;
  background-color: #cccccc;
  padding: 6px;
  margin: 3px;
  text-decoration: none;
 }
    </style>

<div class="container">
<div class="row">
    
    <div class="breadcrumbs" style="font-size: 30px"><a href="<?php echo CFG::$livePath; ?>">Home</a><span>--><a href="http://localhost/newcms2016/category-list">Category</a></span></div>

<div id="categories" style="width:100%;float:left">	
	
    <?php 
        $perpage = 3;
        if(isset($_GET["page"])){
        $page = intval($_GET["page"]);
        }
        else {
        $page = 1;
        }
        
                    $calc = $perpage * $page;
                    $start = $calc - $perpage; 
                    
                   $result = DB::query("SELECT id,name,image,slug FROM ".CFG::$tblPrefix."category");
                   $total = array_slice($result,$start,$perpage);
                    
                  foreach($total as $category)
                  {
                   $rows = count($total);
                   
                  
        ?>	
		<div id="records" class="records">
		<div class="col-md-4" style="float:left;font-size:17px;width:33%">
		<?php
                  if($rows){
             
                          
                    $i = 0;
                   ?>
                <ul>
		<a href="<?php echo URI::getURL('mod_category','product_listing',$category['id']); ?>" title="<?php echo $category['id']; ?>">
		<li><?php echo $category['name']; ?></li>
		<li><img src="<?php echo UTIL::getResizedImageSrc(CFG::$categoryDir,$category['image'], "small", "no-image.jpg"); ?>">
		</li>
		</a>
                </ul>
                  <?php }  ?>
                </div>
		</div>	
	<?php		
                  }
	?>
    
   
<table width="400" cellspacing="2" cellpadding="2" align="center">
<tbody>
<tr>
<td align="center">

<?php

if(isset($page))

{
 foreach($data['categoryRecords'] as $records)
	{
$result = $data['categoryRecords'];

$rows = count($result);

}
if($rows)

{

//$rs = mysqli_fetch_assoc($result);

$total = $rows;


}

$totalPages = ceil($total / $perpage);

if($page <=1 ){

echo "<span id='page_links' style='font-weight: bold;'>Prev</span>";

}

else

{

$j = $page - 1;

echo "<span><a id='page_a_link' href='category-list?page=$j'>< Prev</a></span>";

}

for($i=1; $i <= $totalPages; $i++)

{

if($i<>$page)

{
    

echo "<span><a id='page_a_link' href='category-list?page=$i'>$i</a></span>";

}

else

{

echo "<span id='page_links' style='font-weight: bold;'>$i</span>";

}

}

if($page == $totalPages )

{

echo "<span id='page_links' style='font-weight: bold;'>Next ></span>";

}

else

{

$j = $page + 1;

echo "<span><a id='page_a_link' href='category-list?page=$j'>Next</a></span>";

}

}

?></td>
<td></td>
</tr>
</tbody>
</table>

</body>
</html>
</div>
</div></div>	