<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/3/13
 * Time: 19:28
 */
//
    include "../connect.php";?>
<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "$address/db/class.php");
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
if($arg == "edit")
{
    $post_data = array(
        "args"=> $arg,
        "cid" => $_POST[cid],
        "c_name" => $_POST[c_name],
        "note" => $_POST[notes]
    );
}
if($arg == "class")
{
    $post_data = array(
        "args"=> $arg,
        "c_name" => $_POST[title],
        "note" => $_POST[notes]
    );
}
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$exec=curl_exec($curl);
curl_close($curl);
$url="c_manage.php";
echo "<script>alert('Operation Successful!');location='".$url."';</script>";
//echo $exec;

//echo " $_POST[username],$_POST[password],$_POST[name],$_POST[role]";