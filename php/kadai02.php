<?php
$head=<<<HEADEOF
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="description" content="このページは演習04のページです。">
<meta name="keyword" content="演算子">
<title>Columbine Simulator</title>
<link rel="stylesheet" href="../base.css">
</head>
HEADEOF;
echo $head;
echo '<body>';
echo '<h2>コーラムバイン ステータス計算</h2>';
$hp_mag   = $_POST['feature'] == "hp"   ?15.5 :13.5;
$atk_mag  = $_POST['feature'] == "atk"  ? 3.8 : 3.2;
$matk_mag = $_POST['feature'] == "matk" ? 3.8 : 3.2;
$def_mag  = $_POST['feature'] == "def"  ? 3.5 : 3.0;
$mdef_mag = $_POST['feature'] == "mdef" ? 3.5 : 3.0;
$spd_mag  = $_POST['feature'] == "spd"  ? 4.0 : 3.5;
$cri_mag  = $_POST['feature'] == "cri"  ?0.19 :0.15;

$hp_helmet = 387;
$atk_weapon = 108;
$matk_weapon= 108;
$def_armer = 93;
$def_shield= 0;
$mdef_armer= 0;
$mdef_shield=62;
$spd_shose = 62;
$spd_shield =34;
$spd_helmet =31;
$cri_weapon = 3.1;


$vit = ($_POST['vit_point'] + $_POST['vit_juwel'] + $_POST['vit_canning']);
$str = ($_POST['str_point'] + $_POST['str_juwel'] + $_POST['str_canning']);
$int = ($_POST['int_point'] + $_POST['int_juwel'] + $_POST['int_canning']);
$end = ($_POST['end_point'] + $_POST['end_juwel'] + $_POST['end_canning']);
$agi = ($_POST['agi_point'] + $_POST['agi_juwel'] + $_POST['agi_canning']);

$hp   =200 + ($vit * $hp_mag   + $hp_helmet);
$atk  = 10 + ($str * $atk_mag  + $atk_weapon);
$matk = 10 + ($int * $matk_mag + $matk_weapon);
$def  = 10 + ($end * $def_mag  + $def_armer + $def_shield);
$mdef = 10 + ($end * $mdef_mag + $mdef_armer + $mdef_shield);
$spd  = 10 + ($agi * $spd_mag  + $spd_shose + $spd_shield + $spd_helmet);
$cri  = 1.0+ ($agi * $cri_mag  + $cri_weapon);

if($_POST['element'] == "fire"){
  $atk *= 1.16;
}elseif($_POST['element'] == "water"){
  $hp *= 1.24;
}elseif($_POST['element'] == "soil"){
  $def *= 1.4;
  $mdef*= 1.4;
}elseif($_POST['element'] == "wind"){
  $spd *= 1.16;
}elseif($_POST['element'] == "moon"){
  $matk *= 1.16;
}else{
  echo '※属性が選択されていません。';
}
echo '<p>hp  :'.floor($hp);
echo '<p>atk :'.floor($atk);
echo '<p>matk:'.floor($matk);
echo '<p>def :'.floor($def);
echo '<p>mdef:'.floor($mdef);
echo '<p>spd :'.floor($spd);
echo '<p>cri :'.$cri;
echo '</body>';
echo '</html>';
?>
