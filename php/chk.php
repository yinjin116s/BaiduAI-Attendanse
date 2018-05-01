<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/3/13
 * Time: 17:59
 */
session_start();
if(!isset($_SESSION[u_name]))
    echo "<script>alert('Invalid Access');location='../index.html';</script>";
if($_SERVER['HTTP_REFERER'] == "")
    echo "<script>alert('Invalid Access');window.close();</script>";
?>

