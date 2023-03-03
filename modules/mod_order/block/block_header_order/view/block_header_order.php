<?php
	//restrict direct access to the page
defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	//Declare path variable for get live template file
$path=URI::getLiveTemplatePath();

?>

<style type="text/css">

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

/* Style the header links */
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

.header a img{
	background-color: black;
    padding: 8px;
    border-radius: 14%;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

/* Change the background color on mouse-over */
.header a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active/current link*/
/*.header a.active {
  background-color: dodgerblue;
  color: white;
}*/

/* Float the link section to the right */
.header-right {
  float: right;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}

</style>

<div class="header">
  <a href="<?php echo CFG::$livePath; ?>" class="logo"><img src="http://localhost/newcms-2020/templates/admin/images/admin-logo.png" alt="<?php echo CFG::$siteConfig['site_name']; ?>" title="<?php echo CFG::$siteConfig['site_name']; ?>" /></a>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>
</div>