<?php

//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');

class BlockSlider {

    /**
     * variables for assigning image direcotry in media folder and storing path so that can accessible in all views of this module and blocks
     *
     * @author Kushan Antani <kushan.datatechmedia@gmail.com>
     */
    public static $sliderImageDir = "slider";
    public static $sliderImagePath = "";

    /**
     * constructor of class Slider Model. do initialisation
     *
     * @author Kushan Antani <kushan.datatechmedia@gmail.com>
     */
    function __construct() {
        BlockSlider::$sliderImagePath = CFG::$livePath . "/" . CFG::$mediaDir . "/" . BlockSlider::$sliderImageDir . "/";
    }

    public function process() {

        $orderBy = "sort_order desc";
        $data = array();
        $data = DB::query("SELECT * FROM " . CFG::$tblPrefix . "slider where status='1' and is_deleted='0' order by " . $orderBy . "");
        return $data;
    }

}