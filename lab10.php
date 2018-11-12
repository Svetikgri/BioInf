<?php


$RNK['G']=57;
$RNK['A']=71;
$RNK['S']=87;
$RNK['P']=97;
$RNK['V']=99;
$RNK['T']=101;
$RNK['C']=103;
$RNK['I']=113;
$RNK['L']=113;
$RNK['N']=114;
$RNK['D']=115;
$RNK['K']=128;
$RNK['Q']=128;
$RNK['E']=129;
$RNK['M']=131;
$RNK['H']=137;
$RNK['F']=147;
$RNK['R']=156;
$RNK['Y']=163;
$RNK['W']=186;

/*$s2[]=0;
$s2[]=99;
$s2[]=113;
$s2[]=114;
$s2[]=128;
$s2[]=227;
$s2[]=257;
$s2[]=299;
$s2[]=355;
$s2[]=356;
$s2[]=370;
$s2[]=371;
$s2[]=484;*/


$s1 = trim(fgets(STDIN));//var_dump($s1);
//$s1 = 'NQEL';

$s3 = fgets(STDIN);//var_dump($s3);
$s2 = explode(' ',$s3);//перевод в массив из строки
//var_dump($s2);



for ($i=0; $i<strlen($s1); $i++)
{
    $pos =  substr($s1, $i, 1);
    $mas[] = $RNK[trim($pos)];
}
foreach ($mas as $key => $mas0)
{
    $k = $key + 1;
    if ($mas[$k]) {
        $massum[] = $mas0 + $mas[$k];
    }
    else {
        $massum[] = $mas0 + $mas[0];
    }
}
foreach ($mas as $key => $mas0)
{

    if ($mas[$key + 1] && $mas[$key + 2]) {
        $massum3[] = $mas0 + $mas[$key + 1] + $mas[$key + 2];
    }
    elseif ($mas[$key + 1] && !$mas[$key + 2]){
        $massum3[] = $mas0 + $mas[$key + 1] + $mas[0];
    }
    elseif (!$mas[$key + 1] && !$mas[$key + 2])
    {
        $massum3[] = $mas0 + $mas[0] + $mas[1];
    }
    $mas4[0] += $mas0;

}
$mas5[0] = 0;

$res = array_merge($mas5, $mas, $massum, $massum3, $mas4);
sort($res);
$res1 = implode(' ', $res);
// print_r($res1);
$sum = 0;
foreach ($res as $key => $ress)
{
    if (in_array($ress, $s2)) {
        $sum++;
    }
}
$sum1 = (string)$sum;
fwrite(STDOUT,$sum1);

?>