<?php
session_start();
include "./chk.php"
?>
<html>
<link href="../css/style.css" rel="stylesheet" />
<body style="background-image:url('../images/top_bg.jpg')">
<body>
<table class="w3-container w3-lobster" width="1003" height="111" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td height="86" colspan="3" rowspan="2">&nbsp;</td>
        <td height="90" align="center"><a href="pub_main.php" target="_parent">Home</a></td>
        <td height="21" align="center"><a href="logout.php" target="_parent">Log-Out</a></td>
        <td height="25" colspan="4" align="center" valign="middle"><b><font color=black>
                    <?php echo date("Y-m-d H:i:s	l") ?> - User: <?php echo $_SESSION[u_name]; ?></font></b></td>
    </tr>
    <tr>
        <td width="55" height="57" align="center" valign="middle">&nbsp;</td>
        <td width="102" align="center" valign="middle">&nbsp;</td>
        <td width="52" align="center" valign="middle">&nbsp;</td>
        <td width="14" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
        <td width="55" height="57">&nbsp;</td>
        <td width="220" align="left" valign="middle"><font color=black>Welcome professor! </font></td>
        <td width="270" align="left" valign="middle"><font color=#ffebcd><?php echo $_SESSION[u_depart]; ?></font></td>

    </tr>
</table>
</body>
</html>