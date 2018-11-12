<?php

$RNK['AAA']='K';
$RNK['AAC']='N';
$RNK['AAG']='K';
$RNK['AAU']='N';
$RNK['ACA']='T';
$RNK['ACC']='T';
$RNK['ACG']='T';
$RNK['ACU']='T';
$RNK['AGA']='R';
$RNK['AGC']='S';
$RNK['AGG']='R';
$RNK['AGU']='S';
$RNK['AUA']='I';
$RNK['AUC']='I';
$RNK['AUG']='M';
$RNK['AUU']='I';
$RNK['CAA']='Q';
$RNK['CAC']='H';
$RNK['CAG']='Q';
$RNK['CAU']='H';
$RNK['CCA']='P';
$RNK['CCC']='P';
$RNK['CCG']='P';
$RNK['CCU']='P';
$RNK['CGA']='R';
$RNK['CGC']='R';
$RNK['CGG']='R';
$RNK['CGU']='R';
$RNK['CUA']='L';
$RNK['CUC']='L';
$RNK['CUG']='L';
$RNK['CUU']='L';
$RNK['GAA']='E';
$RNK['GAC']='D';
$RNK['GAG']='E';
$RNK['GAU']='D';
$RNK['GCA']='A';
$RNK['GCC']='A';
$RNK['GCG']='A';
$RNK['GCU']='A';
$RNK['GGA']='G';
$RNK['GGC']='G';
$RNK['GGG']='G';
$RNK['GGU']='G';
$RNK['GUA']='V';
$RNK['GUC']='V';
$RNK['GUG']='V';
$RNK['GUU']='V';
$RNK['UAA']='';
$RNK['UAC']='Y';
$RNK['UAG']='';
$RNK['UAU']='Y';
$RNK['UCA']='S';
$RNK['UCC']='S';
$RNK['UCG']='S';
$RNK['UCU']='S';
$RNK['UGA']='';
$RNK['UGC']='C';
$RNK['UGG']='W';
$RNK['UGU']='C';
$RNK['UUA']='L';
$RNK['UUC']='F';
$RNK['UUG']='L';
$RNK['UUU']='F';

$s1 = fgets(STDIN); //var_dump($s1);
//$s1 = 'ATGGCCATGGCCCCCAGAACTGAGATCAATAGTACCCGTATTAACGGGTGA';
$s2 = fgets(STDIN);// var_dump($s2);
//$s2 = 'MA';
for ($i=0; $i<strlen($s2); $i++)
{
    foreach ($RNK as $key => $rnks)
    {
        if ($rnks == substr($s2, $i,1))
        {
            $tyu = TU_UT($key);
            $temp[$i][] =  $tyu;
            $temprev[$i][] = replace($tyu);
        }
    }
}//var_dump($temp);
//$temprevnew = array_reverse($temprev); var_dump($temprevnew); echo "///";
//var_dump($temprev);
foreach ($temp as $key => $temps )
{
    $com[$key] = array_merge($temp[$key], $temprev[$key]);
}
foreach ($com[0] as $m => $com0s)
{
    foreach ($com[1] as $com1s)
    {
        if ($m ==0)
            $res[] = $com0s . $com1s;
        else $res[] = $com1s . $com0s;
    }
}
foreach ($res as $ress )
{
    find($ress,$s1);
    //if ($rescount > 0)


}
//print_r($res);
//echo '---';
//print_r($temp);
//print_r($temprev);

function TU_UT($s3)
{
    $res = '';
    for ($i = 0; $i < strlen($s3); $i++)
    {
        $copys3 = $s3;
        $pos = substr($copys3, $i,1);
        if ($pos == 'U')
            $res .= 'T';
        else $res .= $pos;
    }
    return $res;
}
function replace($s4)
{
    for ($i = strlen($s4); $i >= 0; $i--)
    {
        $copys4 = $s4;
        $temp = substr($copys4, $i, 1);
        if ($temp == 'A')
            $res .= 'T';
        elseif ($temp == 'T')
            $res .= 'A';
        elseif ($temp == 'C')
            $res .= 'G';
        elseif ($temp == 'G')
            $res .= 'C';
    }
    return $res;
}

function find($s1, $s2)
{
    $count = 0;

    $ras = strlen($s2)-strlen($s1)+1;

    for ($i=0; $i<$ras; $i++)
    {
        $pos = substr($s2, $i,strlen($s1));
        if($pos == trim($s1)){
            //print_r($s1); 
            fwrite(STDOUT,$s1.' ');
        }
    }
    // return (int)$count;


}









?>