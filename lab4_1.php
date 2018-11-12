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

//$s1 = fgets(STDIN);
$s1 = "AUGGCCAUGGCGCCCAGAACUGAGAUCAAUAGUACCCGUAUUAACGGGUGA";
for ($i=0; $i<(strlen($s1)/3);$i++)
{ //echo $i;
    $pos = substr($s1, $i*3,3); //var_dump($pos);echo "-+-";
    $res .= $RNK[$pos] ; //var_dump($res);echo "---";
    // if($pos == trim($s2)){
    //     $res[i] = RNK;//echo $pos;echo "++++";
    // }

}
fwrite(STDOUT,$res);
// var_dump($res);
?>



