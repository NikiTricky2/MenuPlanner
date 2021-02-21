<?php
function session_valid_id($session_id)
{
    return preg_match('/^[-,a-zA-Z0-9]{1,128}$/', $session_id) > 0;
}

if (!session_valid_id($_COOKIE["PHPSESSID"])) {
    die("Something happend. Please try and go back to the menu maker.");
}

require_once $_SERVER['DOCUMENT_ROOT'].'/MenuPlanner/includes/dbh.inc.php';

$categories = array();
$i = 0;

foreach ($_POST["groups"] as $group) {
    if(!array_key_exists($group, $categories)) {
        $categories[$group] = $i;
        $i++;
    }
}


$menuItems = [];

for ($i = 0; $i <= count($_POST["items"])-1; $i++) {
    array_push($menuItems, array("name" => $_POST["items"][$i], "desc" => $_POST["desc"][$i], "cat" => $_POST["groups"][$i]));
}

$data = array("theme" => $_POST["theme"], "title" => $_POST["title"], "subtitle" => $_POST["subtitle"], "categories" => $categories, "menuItems" => $menuItems);

function in_db($key) {
    global $conn, $data;
    $i = 1;
    $sql="INSERT INTO `menus`(`id`, `json_data`) VALUES ('$key', \"". $conn -> real_escape_string(json_encode($data))."\");";
    $result = mysqli_query($conn, $sql) or $i = 0; 
    return $i == 0;   
}

$key = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
while (in_db($key) == true) {
    $key = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
}

header('Location: ./menu?id='.$key, true, 303);
die();