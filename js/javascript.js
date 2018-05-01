function chk_lg(){
    if(document.login.username.value == ""){
        alert("Where's your Username Sunshine?");
        document.login.username.value="Username";
        document.login.username.focus();
        document.login.username.className = "Redbox";
        return false;
    }
    if(document.login.pwd.value == ""){
        alert("Where's your Password Sunshine?");
        document.login.pwd.value = "Password";
        document.login.pwd.focus();
        document.login.pwd.className = "Redbox";
        return false;
    }
}
function moveSelected(oSourceSel,oTargetSel)
{
    var arrSelValue = new Array();
    var arrSelText = new Array();
    var arrValueTextRelation = new Array();
    var index = 0;
    for(var i=0; i<oSourceSel.options.length; i++)
    {
        if(oSourceSel.options[i].selected)
        {
            arrSelValue[index] = oSourceSel.options[i].value;
            arrSelText[index] = oSourceSel.options[i].text;
            arrValueTextRelation[arrSelValue[index]] = oSourceSel.options[i];
            index ++;
        }
    }
    for(var i=0; i<arrSelText.length; i++)
    {
        var oOption = document.createElement("option");
        oOption.text = arrSelText[i];
        oOption.value = arrSelValue[i];
        oTargetSel.add(oOption);
        oSourceSel.removeChild(arrValueTextRelation[arrSelValue[i]]);
    }
}

function cupdate()
{
    var len = document.form1.right.length;
    var list = "User List:";
    for (var i = 0; i < len; i++){
        list += document.form1.right[i].text + ",";
    }
    list +="END";
    form1.c_update.value = list;

    var len2 = document.form1.left.length;
    var list2 = "User List:";
    for (var i = 0; i < len2; i++){
        list2 += document.form1.left[i].text + ",";
    }
    list2 +="END";
    form1.c_remove.value = list2;

}