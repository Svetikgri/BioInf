<?php
$s1 = fgets(STDIN);//var_dump($s1);
//$res = fgets(STDIN);
//$s1 = "AAAACCCGGT";
$res = '';//������
for ($i = strlen($s1); $i >= 0; $i--)
{
    $copys1 = $s1;
    $temp = substr($copys1, $i, 1);
    if ($temp == 'A')
        $res .= 'T';
    elseif ($temp == 'T')
        $res .= 'A';
    elseif ($temp == 'C')
        $res .= 'G';
    elseif ($temp == 'G')
        $res .= 'C';



}
fwrite(STDOUT,$res);
//echo $res;


?>



