<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/20
 * Time: 21:46
 */

session_start();
include "baiduai.php";
//$str = file_get_contents("php://input");
//file_put_contents("upload.jpg",  pack("H*", $str));
//var_dump($_POST['image']);

if ($_POST['type'] == "pixel") {
    $im = imagecreatetruecolor(320, 240);

    foreach (explode("|", $_POST['image']) as $y => $csv) {
        foreach (explode(";", $csv) as $x => $color) {
            imagesetpixel($im, $x, $y, $color);
        }
    }
} else {
    // input is in format: data:image/png;base64,...
    $im = imagecreatefrompng($_POST['image']);
}
//imagepng($im,"./images/circle".time().".png");// Save file
//$_SESSION[u_name];
imagepng($im,"./images/tmp/".$_SESSION[u_name].".png");// Save file
imagedestroy($im);
// do something with $im
?>