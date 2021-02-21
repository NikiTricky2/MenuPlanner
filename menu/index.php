<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/MenuPlanner/includes/dbh.inc.php';

function escape_string($st) {
    global $conn;
    return $conn -> real_escape_string($st);
}

$data = array();
$sql = "SELECT * FROM `menus` WHERE id=".$_GET["id"].";";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data = json_decode($row["json_data"], true);
    }
}

if (count($data) == 0) {
    header('Location: ../menuNotFound.html', true, 303);
}

if ($data["theme"] == 0) {
    $theme = 'base_menu';
}else if ($data["theme"] == 1) {
    $theme = 'blue_theme';
}else if ($data["theme"] == 2) {
    $theme = 'card_theme';
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["title"]; ?> - MenuPlanner</title>
    <link rel="stylesheet" href="../themes/base_menu.css">
    <link rel="stylesheet" href="../themes/<?php echo $theme; ?>.css">
</head>
<body>
    <h1><?php echo $data["title"]; ?></h1>
    <p><?php echo $data["subtitle"]; ?></p>
    <br>

    <?php
        foreach ($data["categories"] as $category => $placement) {
            echo "<h2>".$category."</h2><div id=\"".$placement."_category\"></div><br></br>";
        }

        foreach ($data["menuItems"] as $item) {
            echo "<script>document.getElementById(\"".$data["categories"][$item["cat"]]."_category\").innerHTML += \"<h3 class='heading'>".escape_string($item["name"])."</h3><span class='desc'>".escape_string($item["desc"])."</span>\"</script>";
        }
    ?>
</body>
</html>