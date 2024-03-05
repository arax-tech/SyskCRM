<?php
    ob_start ("ob_gzhandler");
    header("Content-type: text/css; charset: UTF-8");
    header("Cache-Control: must-revalidate");
    $offset = 60 * 60 ;
    $ExpStr = "Expires: " .
    gmdate("D, d M Y H:i:s",
    time() + $offset) . " GMT";
    header($ExpStr);
?>


<?php
    error_reporting(0);
    $setting = DB::table('settings')->where('id', 1)->first();
    dd($setting->light_color)
?>



