<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/25
 * Time: 16:14
 */
session_start();
include "../connect.php";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "$address/db/account.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$post_data = array(
    "args"=>"view",
    "id" => $_GET[id]
);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$exec = curl_exec($curl);
curl_close($curl);
$data = json_decode($exec,true);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "$address/db/account.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$post_data = array(
    "args"=>"pic_check",
    "id" => $data['user']
);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$exec = curl_exec($curl);
curl_close($curl);
?>
<link href="../css/style.css" rel="stylesheet" />
<script src="../js/javascript.js"></script>
<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr>
        <td height="33"id="list">Account Editing
        </td>
    </tr>
</table>
<form action="./account_process.php" method="post" name="form1">
    <table width="500" height="180" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">MOTD：</td>
            <td height="25" align="left" valign="middle" scope="col">I am so handsome</td>
        </tr>
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">Username：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <?php echo $data['user']; ?></td>
            <td width="100" height="25" align="right" valign="middle" scope="col">Password：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <input type="password" name="password" value="<?php echo $data['password']; ?>" /></td>
        </tr>
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">Name：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <input type="text" name="name" value="<?php echo $data['name']; ?>" /></td>
        </tr>
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">Image status：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <?php
                    if ($exec == 1){
                        $_SESSION[p_tmp] = $data['user'];
                        $_SESSION[p_tmp_2] = $data['name'];
                        echo "<input type=\"button\" onclick=\"window.location.href='../picture/profile_upload.html';\" value=\"Uploaded - Upload More Profile Picture\" ></strong>";
                    }elseif ($exec == 0) {
                        $_SESSION[p_tmp] = $data['user'];
                        $_SESSION[p_tmp_2] = $data['name'];
                        //echo " <a href='../picture/profile_upload.html' target=\"mainFrame\">Click here to Upload the photo</a>";
                        echo "<input type=\"button\" onclick=\"window.location.href='../picture/profile_upload.html';\" value=\"Upload Profile Picture\" ></strong>";

                    }else{
                        echo " Unknown";
                    }
                ?>
            </td>
        </tr>
        <!--Role-->
        <tr>
            <td height="30" align="right" valign="middle">Roles：</td>
            <td height="30" align="left" valign="middle">
                <select name="role">
                    <?php
                    /*<?php echo $data['name']; ?>
                        <option value="1">Professor</option>
                        <option value="0" selected="selected">Student</option>
                    */
                        if ($data['role'] == '0'){
                            echo "<option value=\"1\">Professor</option>
                        <option value=\"0\" selected=\"selected\">Student</option>";
                        }
                        else{
                            echo "<option value=\"1\"  selected=\"selected\">Professor</option>
                        <option value=\"0\">Student</option>";
                        }

                    ?>

                </select>
            </td>
        </tr>


        <tr>
            <td colspan="2" height="30" align="center" valign="middle">
                <input type="hidden" name="args" value="edit">
                <input type="hidden" name="id" value="<?php echo $_GET[id]?>">
                <input type="submit" value="Submit" />
                <input type="reset" value="Undo" />
            </td>
        </tr>
    </table>
</form>
