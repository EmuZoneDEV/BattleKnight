<?php 
include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=strip_tags($_GET["town"]);
 $_SESSION["user"]=user($_SESSION["user"][0]);
 $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) {header('Location: login.php'); die();}
 $buildings=buildings($_SESSION["user"][10]);
 if ($_SESSION["user"][11]) $alliance=alliance_all($_SESSION["user"][11]);
 if ((isset($alliance))&&(!$alliance[0][0])) {a_quit($_SESSION["user"][0]); $_SESSION["user"][11]=0;}

 $data=explode("-", $town[8]); $res=explode("-", $town[10]); $prod=explode("-", $town[9]); $lim=explode("-", $town[11]);
}
else {header('Location: login.php'); die();}
?>
<head>
<title><?php echo $title." - ".$lang['news']; ?></title>
</head>
<body class="q_body" onLoad="inittabs();">
<center>
Vote for us every 24 hours.
<hr>
<script src=http://wos.lv/v.php?11710></script>
<hr>
</center>
</td>
</tr>
</table>
</div>