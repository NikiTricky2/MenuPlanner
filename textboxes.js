function GetDynamicTextBox(value) {
    return '<input maxlength="50" name = "items[]" type="text" value="' + value + '" style="font-size:20px;" placeholder="Title"  required/><span style="color:red">*</span><input type="button" value="Remove" onclick = "RemoveTextBox(this)" class="neon-blue button"/><br><input name = "desc[]" type="text" placeholder="Description"/><br><input name = "groups[]" type="text" placeholder="Group" required/><span style="color:red">*</span><br><br>';
}

function AddTextBox() {
    var container_div = document.getElementById('TextBoxContainer');
    var count = container_div.getElementsByTagName('div').length;
    if (count + 2 == 50) {
        alert("Limit is 50 items!")
        return
    }
    var div = document.createElement('DIV');
    div.innerHTML = GetDynamicTextBox("");
    document.getElementById("TextBoxContainer").appendChild(div);
}

function RemoveTextBox(div) {
    document.getElementById("TextBoxContainer").removeChild(div.parentNode);
}
