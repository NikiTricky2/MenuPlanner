<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MenuPlanner</title>
    <!-- import the webpage's stylesheet -->
    <link rel="stylesheet" href="./style.css" />
    <!-- import the webpage's javascript file -->
    <script src="./textboxes.js" defer></script>
</head>

<body>
    <h1>
        Make a menu
    </h1>
    <form action="menuSubmission.php" method="post">
        <p>
            <span class="h3-default"> Title<span style="color:red;">*</span> </span>
            <br />
            <input type="text" placeholder="Enter the title of the menu..." value="MENU" minlength="4" maxlength="100" size="35" name="title" />
        </p>
        <p>
            <span class="h3-default">
        Subtitle
        </span>
            <br />
            <input type="text" placeholder="Enter the subtitle of the menu..." maxlength="150" size="35" name="subtitle" />
        </p>
        <p>
            <span class="h3-default">
                Theme<span style="color:red">*</span>
            </span><br>
            <table>
                <tr>
                    <td><input id="default" type="radio" name="theme" value="0" checked required></td>
                    <td><input id="blue" type="radio" name="theme" value="1"></td>
                    <td><input id="card" type="radio" name="theme" value="2"></td>
                </tr>
                <tr>
                    <td></label><img for="default" src="./images/default.svg" width="50%"></td>
                    <td></label><img for="blue" src="./images/blue.svg" width="50%"></td>
                    <td></label><img for="card" src="./images/card.svg" width="50%"></td>
                </tr>
            </table>
            <br>
        </p>
        <p>
            <h3>
                Items
            </h3>
            <br>
            <input type="button" value="add" onclick="AddTextBox()" class="button" />
            <br>
            <input maxlength="50" name="items[]" type="text" style="font-size:20px;" placeholder="Title" required/><span style="color:red">*</span><br><input name="desc[]" type="text" placeholder="Description" /><br><input name="groups[]" type="text" placeholder="Group"
                required/><span style="color:red">*</span><br><br>
            <input maxlength="50" name="items[]" type="text" style="font-size:20px;" placeholder="Title" required/><span style="color:red">*</span><br><input name="desc[]" type="text" placeholder="Description" /><br><input name="groups[]" type="text" placeholder="Group"
                required/><span style="color:red">*</span><br><br>
            <div id="TextBoxContainer"></div>
            <br>
        </p>
        <input type="submit" class="button" value="Make my menu!" />
    </form>
</body>

</html>
