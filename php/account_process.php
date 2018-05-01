<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/25
 * Time: 13:46
 */
include "../connect.php";?>
<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "$address/db/account.php");
//curl_setopt($curl, CURLOPT_URL, 'http:s//localhost/PlanB/Middle/pass.php');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$arg=$_POST[args];
if ($arg == "new")
{
    $post_data = array(
        "args"=>"new",
        "username" => $_POST[username],
        "password" => $_POST[password],
        "name" => $_POST[name],
        "role" => $_POST[role]
    );
}
elseif ($arg == "edit")
{
    $post_data = array(
        "args"=>"edit",
        "id"=>$_POST[id],
        "password" => $_POST[password],
        "name" => $_POST[name],
        "role" => $_POST[role]
    );
}
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$exec=curl_exec($curl);
curl_close($curl);
$url="s_manage.php";
echo "<script>alert('Operation Successful!');location='".$url."';</script>";
//echo $exec;

//echo " $_POST[username],$_POST[password],$_POST[name],$_POST[role]";