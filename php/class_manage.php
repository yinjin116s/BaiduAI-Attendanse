<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/3/16
 * Time: 13:59
 */
session_start();
include "../connect.php";
?>

<script src="../js/javascript.js"></script>
<link href="../css/style.css" rel="stylesheet">
<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr>
        <td height="33" id="list">Class Management - Attendance / Class configuration
        </td>
        <td colspan="2"  align="center" valign="middle">
            <input type="button" onclick="history.go(-1)" value="Back" />
        </td>
    </tr>
</table>
<!--- 这里需要curl一下 让按钮和文本做个联动-->

<form action="./class_ai.php" method="post" name="classinfo">
    <table width="765" height="40" border="0" cellpadding="0" cellspacing="0" class="big_td">
        <tr>
            <td height="33" id="list">Current Course Status:
                <?php
                error_reporting(0);
                $curl1 = curl_init();

                curl_setopt($curl1, CURLOPT_URL, "$address/db/c_list.php");
                curl_setopt($curl1, CURLOPT_RETURNTRANSFER, 1);
                $post_data1 = array(
                    "args" => "banana",
                    "id"   => "$_GET[id]"
                );
                curl_setopt($curl1, CURLOPT_POSTFIELDS, $post_data1);
                $exec1 = curl_exec($curl1);
                curl_close($curl1);
                $class=floatval($exec1);
                if($class == 0){
                    echo "Not Start Yet";
                }
                elseif ($class == 1){
                    echo "Started";
                }
                else{
                    echo "Unknown";
                }
                ?>
            </td>
            <td colspan="2"  align="center" valign="middle">
                <?php if($class == 1){echo "<a href='../picture/attendence.php?id=$_GET[id]' target=\"mainFrame\">[Click here to start attendance]</a>";}?>
                <input type="hidden" name="id" value="<?php echo $_GET[id]?>">
                <input type="hidden" name="status" value="<?php echo $class?>">
                <input type="submit" value="<?php  if($class==1){echo "Dismiss the Class";}else{echo "Start Class";}?>" />
            </td>
        </tr>
    </table>
</form>

<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr>
        <td height="33" id="list">Class Management - Members
        </td>
    </tr>
</table>
<table width="765" height="350" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr><td align="center" valign="middle">
            <form name="form1" method="post" action="c_update.php">
                <table width="650" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="280" align="center" valign="middle">
                            <SELECT name="left" size="10" multiple style="width:180px; ">
                                <?php
                                error_reporting(0);
                                $curl = curl_init();

                                curl_setopt($curl, CURLOPT_URL, "$address/db/s_list.php");
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                                $post_data = array(
                                    "args" => "manage_null"
                                );
                                curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
                                $exec = curl_exec($curl);
                                curl_close($curl);
                                $exec=str_replace("uid=","<option vaulue=","$exec");
                                $exec=str_replace("name=",">","$exec");
                                $exec=str_replace(";","</option>","$exec");
                                echo $exec;
                                ?>
                            </SELECT>
                        </td>
                        <td width="120" align="center" valign="middle">
                            <a href="#" onClick="moveSelected(document.form1.left,document.form1.right)">Moving User in&gt;&gt;</a><br>
                            <br>
                            <a href="#" onClick="moveSelected(document.form1.right,document.form1.left)">&lt;&lt;Moving User Out</a></td>
                        <td colspan="2" align="center" valign="middle"><select name="right" size="10" multiple style="width:180px; ">
                                <?php
                                error_reporting(0);
                                $curl = curl_init();

                                curl_setopt($curl, CURLOPT_URL, "$address/db/s_list.php");
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                                $post_data = array(
                                       "id" => $_GET[id],
                                    "args" => "manage_class"
                                );
                                curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
                                $exec = curl_exec($curl);
                                curl_close($curl);
                                $exec=str_replace("uid=","<option vaulue=","$exec");
                                $exec=str_replace("name=",">","$exec");
                                $exec=str_replace(";","</option>","$exec");
                                echo $exec;
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td height="30" colspan="4" align="center" valign="middle">
                            <input type="hidden" name="c_update">
                            <input type="hidden" name="c_remove">
                            <input type="hidden" name="id" value="<?php echo $_GET[id]?>">
                            <input type="hidden" name="args" value="new">
                            <input type="submit" value="Submit" onclick ="return cupdate()"/><input type="reset" value="Delete" />	</td>
                    </tr>
                </table>
            </form>
        </td></tr></table>

<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr>
        <td height="33" id="list">Attendance Logs
        </td>
    </tr>
</table>
<table width="765" border="0" cellspacing="0" cellpadding="0" class="big_td">
    <tr>
        <td width="210" height="25" align="center" valign="middle" scope="col">Date</td>
        <td height="25" align="center" valign="middle" scope="col">Code-Explaination</td>
        <td width="150" height="25" align="center" valign="middle" scope="col">Notes</td>
    </tr>
    <?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "$address/db/lclass.php");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $post_data = array(
        "args" => "potato",
        "tid" => "$_GET[id]"
    );
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $exec = curl_exec($curl);
    curl_close($curl);
    $exec=str_replace("[date=","<td height=30 style=\"text-indent: 30px;\">","$exec");
    $exec=str_replace("][code=","<td height=30 style=\"text-indent: 30px;\">","$exec");
    $exec=str_replace("][status=","</td><td>","$exec");
    $exec=str_replace("][end]","</td></tr>","$exec");



    $exec=str_replace("(201)","201 - User login to the site","$exec");
    $exec=str_replace("(221)","221 - User changed the password","$exec");
    $exec=str_replace("(600)","600 - User attempted attend the class without registered","$exec");
    $exec=str_replace("(601)","601 - User attempted attend the class without correct classroom","$exec");
    $exec=str_replace("(602)","602 - User successful attened to the class","$exec");
    $exec=str_replace("(700)","700 - Class is over","$exec");
    $exec=str_replace("(701)","701 - Class begins","$exec");

    echo $exec;
    ?>
</table>