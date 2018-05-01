<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/4/13
 * Time: 15:24
 */
session_start();
include "./chk.php"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>CS490 Project</title>
    <link href="../css/style.css" rel="stylesheet" />
    <script src="../js/javascript.js"></script>
</head>
<frameset rows="111,*" cols="*" frameborder="yes" border="0" framespacing="0">
    <frame src="pagetop.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
    <frameset rows="*" cols="300,*" framespacing="0" frameborder="not" border="0">
        <frame src="s_left.php" name="leftFrame" scrolling="auto" noresize="noresize" id="leftFrame" title="leftFrame" />
        <frame src="main.php" name="mainFrame" scrolling="auto" id="mainFrame" title="mainFrame" />
    </frameset>
</frameset>

</html>
