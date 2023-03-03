<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<nav role="navigation" id="nav-main" class="okayNav">
    <script type="text/javascript">
        $(document).ready(function() {
            if ($(window).width() > 768) {
                $('.navUl li.hiddenLi').remove();
            }
        });
    </script>

    <?php
    //echo "<pre>";
    // print_r($data); exit;
    $arrMenu = array();
    $mi = 0;
    foreach ($data as $menu) {
        $arrMenu[] = $menu['module_key'];
    }
    $cntMenu = array_count_values($arrMenu);
    //echo "<pre>";print_r($cntMenu); exit;
    ?>


    <ul class="navUl" id="nav-bar-filter" aria-labelledby="menulist">
        <?php
        $oldMenu = "";
        foreach ($data as $key => $val) { //echo "<pre>";print_r($val);exit;
            $class = '';
            $classsub = 
            
            //$relArray=explode(",",$val['related_actions']);
            $class2 = '';
            $class_sub = '';
            if ($val['moduleName'] != $val['admin_menu_label']) {
                $class_sub = "submenuLI";
            }
            
            if (APP::$moduleName == $val['module_key']) {
                $class = 'class="active '.$class_sub.'"';
                
            }
            else {
                $class = 'class="'.$class_sub.'"';
            }
            
            if (isset($_REQUEST['a']) && $_REQUEST['a'] == $val['action']) {
                $class2 = 'class="active"';
            }
            
            
            
            if ($oldMenu != $val['module_key']) {
          if ($oldMenu != "")
            echo "</ul></li>";
          $oldMenu = $val['module_key'];

          if ($val['moduleName'] == $val['admin_menu_label']) {
            $link = 'index.php?m=' . $val['module_key'] . '&a=' . $val['action'];
          } else {
            $link = '#';
          }
          /*if ((int) $cntMenu[$val['module_key']] > 1) {
            echo '<li '.$class.'><a href="' . $link . '" title="' . $val['moduleName'] . '">' . $val['moduleName'] . '</a><ul   class="sub ' . ((APP::$moduleName == $val['module_key']) ? "expand" : "") . '">';
          } else {*/
            echo '<li '.$class.'><a href="' . $link . '" title="' . $val['moduleName'] . '" '.$class2.'> <span class="iconSpan"><img src="' . URI::getLiveTemplatePath() . '/images/' . $val['icon_class'] . '.png" class="fiImg"><img src="' . URI::getLiveTemplatePath() . '/images/' . $val['icon_class'] . '-active.png" class="secImg"></span>' . $val['moduleName'] . '</a><ul start class="sub "  >';
          //}
        }
        if ($val['moduleName'] != $val['admin_menu_label']) {
          echo '<li><a href="index.php?m=' . $val['module_key'] . '&a=' . $val['action'] . '" title="' . $val['admin_menu_label'] . '"' . $class2 . '><span class="iconSpan"><img src="' . URI::getLiveTemplatePath() . '/images/' . $val['icon_class'] . '.png" class="fiImg"><img src="' . URI::getLiveTemplatePath() . '/images/' . $val['icon_class'] . '-active.png" class="secImg"></span>' . $val['admin_menu_label'] . '</a></li>';
        }
        if ($key == (count($data) - 1)) {
          echo '</ul></li>';
        }

           /* if ($val['moduleName'] == $val['admin_menu_label']) {
                $link = 'index.php?m=' . $val['module_key'] . '&a=' . $val['action'];
            } else {
                $link = '#';
            }
            echo '<li><a href="' . $link . '" title="' . $val['moduleName'] . '" ' . $class . '><span class="iconSpan"><img src="' . URI::getLiveTemplatePath() . '/images/' . $val['icon_class'] . '.png" class="fiImg"><img src="' . URI::getLiveTemplatePath() . '/images/' . $val['icon_class'] . '-active.png" class="secImg"></span>' . $val['moduleName'] . '</a></li>';*/
        }
        ?>
        <!--        <li class="hiddenLi">
                    <a href="<?php // echo CFG::$livePath             ?>" title="Visit Website">
                        <span class="iconSpan">
                            <img src="<?php // echo URI::getLiveTemplatePath();             ?>/images/visite-site.png" class="fiImg">
                        </span>
                        <span>Visit Website</span>
                    </a>
                </li>-->
        <!--        <li class="hiddenLi">
                    <a href="index.php?m=mod_seo&a=seo_list" title="SEO Manager">
                        <span class="iconSpan">
                            <img src="<?php // echo URI::getLiveTemplatePath();             ?>/images/seo-manager.png" class="fiImg">
                            <img src="<?php // echo URI::getLiveTemplatePath();             ?>/images/seo-manager-active.png" class="secImg">
                        </span>
                        <span>SEO Manager</span>
                    </a>
                </li>-->
        <!--        <li class="hiddenLi">
                    <a href="index.php?m=mod_config&a=site_config" title="Site Configuration">
                        <span class="iconSpan">
                            <img src="<?php echo URI::getLiveTemplatePath(); ?>/images/configuration.png" class="fiImg">
                            <img src="<?php echo URI::getLiveTemplatePath(); ?>/images/configuration-active.png" class="secImg">
                        </span>
                        <span>Site Configuration</span>
                    </a>
                </li>-->
        <li class="hiddenLi">
            <a href="index.php?m=mod_user&a=update_profile" title="Edit Profile">
                <span class="iconSpan">
                    <img src="<?php echo URI::getLiveTemplatePath(); ?>/images/edit-user.png" class="fiImg">
                    <img src="<?php echo URI::getLiveTemplatePath(); ?>/images/edit-user-active.png" class="secImg">
                </span>
                <span>Edit Profile</span>
            </a>
        </li>
        <li class="hiddenLi">
            <a href="index.php?m=mod_user&a=user_logout" title="Logout">
                <span class="iconSpan">
                    <img src="<?php echo URI::getLiveTemplatePath(); ?>/images/logout-icon.png" class="fiImg">
                </span>
                <span>Logout</span>
            </a>
        </li>  
    </ul>

    <ul id="more-nav">        
        <li><a href="#" class="more-menu">More</a>
            <ul class="subfilter" aaria-labelledby="menulist">               
            </ul>
        </li>    
    </ul>
    <script src="<?php echo URI::getLiveTemplatePath(); ?>/js/admin-menu.js" type="text/javascript"></script>
    <script>
        $(window).load(function() {
            /*admin-toggle menu*/
            $('.more-menu').click(function() {
                $('.more-menu').toggleClass('close-menu');
                $('.subfilter').toggleClass('open-menu');
            });
            /*admin-toggle menu*/
            $('.submenuLI a').click(function() {
                $(this).siblings().slideToggle();
            });
        });
    </script>



</nav><!-- End .heading-->