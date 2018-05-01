<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/25
 * Time: 19:51
 */
session_start();
include "baiduai.php";
include "../connect.php";

$groupId = "group1";
$image = file_get_contents('./images/tmp/'.$_SESSION[u_name].'.png');
// 调用人脸识别
$exec = $client->identifyUser($groupId, $image);

/*ERROR SAMPLE Array ( [error_code] => 216402 [error_msg] => face not found [log_id] => 2256110051040602 ) 1
 *CORRECT OUTPUT
 *
 *
    Array ( [result] => Array ( [0] => Array ( [uid] => student [scores] => Array ( [0] => 91.758689880371 ) [group_id] => group1 [user_info] => Billy Bob ) ) [result_num] => 1 [log_id] =>        2277656836040602 ) 1
END
 */

/*
Debug Functions
echo "</br>";
echo print_r($exec);
echo "</br>";
echo "END";
 */

$shit = false;
$poop = floatval($exec['error_code']);
if ($poop > 0)
{
    $shit=true;
    $error=$exec['error_msg'];
}
if($shit==false) {
    $points = floatval($exec['result']['0']['scores']['0']);
    $name = $exec['result']['0']['user_info'];
    if ($points >= 80) {//Communicate in Here

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "$address/db/baiduai.php");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $post_data = array(
        "args" => "aicheck",
        "name" => "$name"
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        $exec = curl_exec($curl);
        $class=floatval($exec);

        if($class != 0) {
            $curl1 = curl_init();
            curl_setopt($curl1, CURLOPT_URL, "$address/db/c_list.php");
            curl_setopt($curl1, CURLOPT_RETURNTRANSFER, 1);
            $post_data1 = array(
                "args" => "banana",
                "id" => "$class"
            );
            curl_setopt($curl1, CURLOPT_POSTFIELDS, $post_data1);
            $exec1 = curl_exec($curl1);
            curl_close($curl1);
            $status = floatval($exec1);
            if($status == 1)
            {
                if($class == $_GET[id]){

                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, "$address/db/log.php");
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    $post_data = array(
                        "args" => "success",
                        "user" => $name,
                        "code" => 602,
                        "target" => $class
                    );
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
                    $exec = curl_exec($curl);
                    curl_close($curl);

                    echo "<script>alert('Welcome to the class $name !');history.go(-1);</script>";
                }else{
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, "$address/db/log.php");
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    $post_data = array(
                        "args" => "failure",
                        "user" => $name,
                        "code" => 601,
                        "class" => $class,
                        "target" => $_GET[id]
                    );
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
                    $exec = curl_exec($curl);
                    curl_close($curl);

                    echo "<script>alert('Hello $name ! But your class is not correct for now. Are you sure you\'re in the right class?');history.go(-1);</script>";
                }

            }
            else
            {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "$address/db/log.php");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $post_data = array(
                    "args" => "failure",
                    "user" => $name,
                    "code" => 601,
                    "class" => $class,
                    "target" => $class
                );
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
                $exec = curl_exec($curl);
                curl_close($curl);

                echo "<script>alert('Hello $name ! But your class does not allow you to sign in right now. Are you sure you\'re in the right class?');history.go(-1);</script>";
            }
        }else{
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "$address/db/log.php");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $post_data = array(
                "args" => "failure2",
                "user" => $name,
                "code" => 600,
                "target" => $class
            );
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
            $exec = curl_exec($curl);
            curl_close($curl);

            echo "<script>alert('Hello $name ! You aren\'t in any class yet.');history.go(-1);</script>";
        }
        //echo $exec;
    } else {
        echo "<script>alert('Error: We can\'t find your face in our database.');history.go(-1);</script>";
    }
    exec("rm ./images/tmp/'.$_SESSION[u_name].'.png");
}
else{
    echo "<script>alert('Baidu AI SERVER Error code:$poop - $error, Please retry.');history.go(-1);</script>";
}
?>