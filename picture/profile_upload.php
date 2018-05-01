<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/25
 * Time: 18:05
 */
session_start();
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
imagepng($im,"./images/students/".$_SESSION[p_tmp].".png");// Save file
imagedestroy($im);
// do something with $im