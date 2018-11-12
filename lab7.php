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

$s1 = trim(fgets(STDIN));
//s1 = LEQN;
for ($i=0; $i<strlen($s1); $i++)
{
    echo strlen($s1);
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

//    foreach($mas as $key1 => $mas1)
//    {
//        if ($key0 < $key1)
//            $massum[] = $mas0 + $mas1;
//    }
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

fwrite(STDOUT,$res1);
///print_r($res1);
//print_r($massum3);
//print_r($massum);
?>