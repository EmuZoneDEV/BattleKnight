<?php include "include/antet.php"; include "include/func.php";

if (isset($_SESSION["user"][0], $_GET["town"]))
{
 $_GET["town"]=clean($_GET["town"]);
 check_r($_GET["town"]);
 $town=town($_GET["town"]); if ($town[1]!=$_SESSION["user"][0]) {header('Location: login.php'); die();}
 $faction=faction($_SESSION["user"][10]); $r=$faction[3];
 $buildings=buildings($_SESSION["user"][10]);
 $c_status=get_con($_GET["town"]);
 
 $data=explode("-", $town[8]); $res=explode("-", $town[10]); $prod=explode("-", $town[9]); $lim=explode("-", $town[11]); $out=explode("-", $buildings[14][5]);
}
else {header('Location: login.php'); die();}
?>
<html>
<?php echo "<link rel='stylesheet' type='text/css' href='".$imgs.$fimgs."default.css'>"; ?>
<script src="js/func.js" type="text/javascript"></script>
<head>
<title><?php echo $title." - ".$buildings[14][2]; ?></title>
</head>

<body class="q_body">

<div align="center">
		<td class="td_content" style='height: 200'>
        <?  echo"<img src='".$imgs.$fimgs."b14.gif' width='75' height='100'><br />";
 echo"<table width='650'><tr><td> ".$buildings[14][8]."</td></tr></table>";?>
<?php
if ($data[14])
{
 if (!$c_status[14])
		if ($data[14]<39)
		{
			$dur=explode("-", $buildings[14][6]); $upk=explode("-", $buildings[14][7]); $cost=explode("-", $buildings[14][4]); $dur[$data[14]]=explode(":", $dur[$data[14]]);
			if (!(($res[0]>=$cost[0]*$mcost)&&($res[1]>=$cost[1]*$mcost)&&($res[2]>=$cost[2]*$mcost)&&($res[3]>=$cost[3]*$mcost)&&($res[4]>=$cost[4]*$mcost)))
			echo "<b>".$lang['upgrade']." ".$buildings[14][2]." ".$lang['toLevel']." ".($data[14]+1)."</b>";
			else
			echo "<a class='q_link' target='_parent' href='build.php?town=".$town[0]."&b=".$buildings[14][0]."&subB=-1'>".$lang['upgrade']." ".$buildings[14][2]." ".$lang['toLevel']." ".($data[14]+1)."</a>";
			$tag=$tag."<br />".$lang['cost'].": <img src='".$imgs.$fimgs."00.gif' title='".$lang['crop']."'>".floor($cost[0]*$mcost)." <img src='".$imgs.$fimgs."01.gif' title='".$lang['lumber']."'>".floor($cost[1]*$mcost)." <img src='".$imgs.$fimgs."02.gif' title='".$lang['stone']."'>".floor($cost[2]*$mcost)." <img src='".$imgs.$fimgs."03.gif' title='".$lang['iron']."'>".floor($cost[3]*$mcost)." <img src='".$imgs.$fimgs."04.gif' title='".$lang['gold']."'>".floor($cost[4]*$mcost)."<br />".$lang['duration'].":&nbsp;".($dur[$data[14]][1])."".$lang['minutes']."<br />".$lang['upkeep'].": ".$upk[$data[14]]."<br />".$lang['expOffence'].": ".$out[$data[14]];
			echo $tag;
			if ($town[12]+$town[3]+$upk[$data[14]]>$lim[3]) label("<br />".$lang['noHouses']);
			if (!(($res[0]>=$cost[0]*$mcost)&&($res[1]>=$cost[1]*$mcost)&&($res[2]>=$cost[2]*$mcost)&&($res[3]>=$cost[3]*$mcost)&&($res[4]>=$cost[4]*$mcost))) label("<br />".$lang['noResources']);
			echo "<br />------------------------------------------<br /><br /><br /><br /><br /><br /><br />";
		}
		else echo "<br /><br /><br /><br /><br /><br />".$lang['buildingMaxLvl']."<br /><br /><br /><br /><br /><br /><br /><br />";
 else echo "<br /><br /><br /><br /><br /><br />".$lang['beingUpgraded']."<br /><br /><br /><br /><br /><br /><br /><br />";
}
else echo "<br /><br /><br /><br /><br /><br />".$lang['constrBuilding']."<br /><br /><br /><br /><br /><br /><br /><br />";
?></p>
          </td>
</div>

</body>

</html>