<?php 
$link = "";
if(isset($_GET["url"])) $arr =  explode("/", filter_var(trim($_GET["url"], "")));
if(isset($arr[0])) $link = ""; // (controller)
if(isset($arr[0]) && isset($arr[1])) $link = "../"; //(controller and action)
if(isset($arr[0]) && isset($arr[1]) && isset($arr[2])) $link = "../../"; // (contro & action & para[1])
if(isset($arr[0]) && isset($arr[1]) && isset($arr[2]) && isset($arr[3])) $link = "../../../"; 
if(isset($arr[0]) && isset($arr[1]) && isset($arr[2]) && isset($arr[3]) && isset($arr[4])) $link = "../../../../"; 
// print_r($arr);
// echo "<br>"."0".$arr[0]."<br>";
// echo "1".$arr[1]."<br>";
// echo "2".$arr[2]."<br>";
// echo $arr[3]."<br>";