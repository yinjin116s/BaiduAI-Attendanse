<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/4/5
 * Time: 18:38
 */
?>
<link href="../css/style.css" rel="stylesheet" />
<script src="../js/javascript.js"></script>
<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr>
        <td height="33"id="list">Create New Course
</td>
    </tr>
</table>
<form action="./class_update.php" method="post" name="form1">
    <table width="500" height="180" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">MOTD：</td>
            <td height="25" align="left" valign="middle" scope="col">I am so handsome. HELLYEAH!</td>
        </tr>
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">Course Title：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <input type="text" name="title" value="New Course 101" /></td>
        </tr>
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">Note：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <textarea name="notes" cols="20" rows="4">Write Description Here.</textarea></td>
        </tr>

        <tr>
            <td colspan="2" height="30" align="center" valign="middle">
                <input type="hidden" name="args" value="class">
                <input type="submit" value="Submit" />
                <input type="reset" value="Undo" />
            </td>
        </tr>
    </table>
</form>
