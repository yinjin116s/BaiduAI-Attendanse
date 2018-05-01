<?php
session_start();
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/20
 * Time: 21:29
 */

require_once './AipFace.php';//Change here for ABSOLUTE ADDRESS!
const APP_ID='BAIDU AI APP_ID';
const API_KEY='BAIDU AI APP_KEY';
const SECRET_KEY='BAIDU AI SECRET_KEY';
$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
/*
 *
 */
?>