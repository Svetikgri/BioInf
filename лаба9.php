<?php

	$smass = "57 71 87 97 99 101 103 113 114 115 128 129 131 137 147 156 163 186";
	$mass[] = [ 57, 71, 87, 97, 99, 101, 103, 113, 114, 115, 128, 129, 131, 137, 147, 156, 163, 186 ];
	$j = $k = $p = 0; 
	//getline(cin, s);
    $s = fgets(STDIN); //var_dump($s);
	$k = Prob($s);//var_dump($k);//считает пробелы
	//int *spectr;
	//spectr = new int[k + 1];
	$k1 = $k + 1;//кол-во элементов в исходной
//var_dump(strlen($s));
	for ($i = 0; $i < strlen($s); $i++)
	{
		$s1 = "";
		$m = 0;
		while (($s[$i] != ' ') && ($i < strlen($s)))
		{
			$s1 .= $s[$i];///!!!!!!!!//исх строка без пробелов
			$i++;
		}
		//$m = atoi($s1.c_str()); // atoi преобразует строку string в целое значение типа int.
        $m = (int)($s1);//строка число
        /*А у тебя есть строка записанная в стринге:
std::string str="привет мир";
И тебе нужно передать эту строку в твою функцию:
Foo(str); //нельзя. функция не умеет работать со стрингами
но так как функция не умеет работать со стрингами, а только с указателями, то единственный способ сделать это - функция c_str()
Foo(str.c_str() ); //можно. */
		$spectr[$p] = $m;//var_dump($spectr);//получили Массив исходный
		$p++;
	}
	//
	 

	for ($i2 = 2; $i2 < strlen($s); $i2++)
	{
		$s1 = "";
		while(($s[$i2] != ' ') && ($i2 < strlen($s)))
		{
			$s1 .= $s[$i2];///!!!
			$i2++;
		}//var_dump($smass);
		//$k = $smass.find($s1);///!
        
        $k = strpos($smass, $s1);
       // echo $k."///";

/*// Заметьте, что используется ===.  Использование == не даст верного 
// результата, так как 'a' в нулевой позиции.
if ($pos === false) {
    echo "Строка '$findme' не найдена в строке '$mystring1'";
} else {
    echo "Строка '$findme' найдена в строке '$mystring1'";
    echo " в позиции $pos";
}*/
       if ($pos === false) {}
        else
		{
           // var_dump($s1)."***";
			$s2 .= $s1.' ';//!!!//строка с пробелами без нуля исходная
            //var_dump($s2);exit;
        }
	}
	$k = Prob($s2);
	$p = 0;

	//int *sp;
	//sp = new int[k];
	for ($i = 0; $i < strlen($s2); $i++)
	{
		$s1 = "";
		$m = 0;
		while (($s2[$i] != ' ') && ($i < strlen($s2)))
		{
			$s1 .= $s2[$i];///!!!!!
			$i++;
		}
		//$m = atoi($s1.c_str());//!!!
        $m = (int)($s1);
		$sp[$p] = $m;//var_dump($sp);// получили исходный массив без 0
		$p++;
	}
	///////
	//vector<string> SS, REZ, REZ2;
	$s4 = $s5 = $s6 = $s7 = $s9 = ""; 
	$sum = $R = 0;
	$j = 0;
	while ($j < strlen($s2) - 1) //строка с пробелами без нуля исходная
	{
		$h = $K = 0;
		while ($s2[$j] != ' ')
		{
			$s4.= $s2[$j];///!!!
            
			$j++;
		}//var_dump($s4);
		//SS.clear();//Удаляет все элементы из контейнера. 
        unset($SS);
		//SS.push_back($s4); // Добавление элемента в конец вектора
        $SS[]= $s4;///!!!
		//REZ.clear();
        unset($REZ);        
		$REZ = Rasshir($SS, $sp, $k, $spectr, $k1);
        var_dump($REZ);echo"+++";
		while (Summa($REZ[$R]) != $spectr[$k1 - 1])
		{ 
			$REZ = Rasshir($REZ, $sp, $k, $spectr, $k1);exit;
			for ($i = 0; i < strlen($REZ); $i++)
            {
                fwrite(STDOUT,$REZ[$i]."-res"); 
                //cout << REZ[i] << endl;
		//	cout << endl;
            }
				
		}
		$j++;
		$s4 = "";
	}
/*	//sort(REZ2.begin(), REZ2.end());
var_dump($REZ2);exit;
    sort($REZ2);
	//auto last = unique(REZ2.begin(), REZ2.end());
	//REZ2.erase(last, REZ2.end());

	for ($i2 = 0; $i2 < strlen($REZ2); $i2++)
	{
		//cout << REZ2[i] << endl;
	}
	//////


	$hh;
	for ($i3 = 0; $i3 < strlen($REZ2); $i3++)
	{
		$hh = $hh + Result($REZ2[$i3], $spectr, $k1);//!!!!
	}

	//cout << hh;
*/
//--------------------------------

function Prob($str)
{//var_dump($str);
	 $a1 = $a2 = 0;
	while ($a1 < strlen($str))
	{
		if ($str[$a1] == ' ')
		{
			$a2++;
			$a1++;
		}
		else
			$a1++;
	}
	return $a2;
}
//-----------------------------/--------
function ProbT($str)
{
	 $a1 = $a2 = 0;
	while ($a1 < strlen($str))
	{
		if ($str[$a1] == '-')
		{
			$a2++;
			$a1++;
		}
		else
			$a1++;
	}
	return $a2;
}
//-------------------------------------------
function Proverka($m, $spectr, $raz) 
{
	for ($i = 0; $i < $raz; $i++)
	{
		if ($spectr[$i] == $m)
		{
			return 1;
			break;
		}
	}
	return 0;
}
//--------------------------------------------------
function Summa($str)//превращает в число
{ var_dump($str); echo "***";
	$i = $sum = 0;
	while ($i < strlen($str))
	{
		$s5 = "";
		while (($str[$i] != '-') && ($i < strlen($str)))
		{
			$s5 .= $str[$i];///!!!!!!!1
			$i++;
		}
		//$sum += atoi($s5.c_str());//!!!
        $sum = (int)($s5);
		$i++;
	}
	return $sum;//число
}
//--------------------------------------------------------
function Rasshir($SS, $sp, $raz, $spectr, $raz1)
{
	//vector<string> SS1, REZ;
	$i = $sum = 0;
	while ($i < count($SS))
	{
		/////////SS1.clear();
		//SS1.push_back(SS[i]);
        $SS1[$i] = $SS[$i];
		$s5 = "";
		$s5 .= $SS1[$i];/////!!!!!!
        //var_dump($s5);
		$sum = Summa($s5);
		$m = 0;
		for ($j = 0; $j < $raz; $j++)//raz число пробелов
		{
			$m = $sum + $sp[$j];///!!!!!!!!!!
           // var_dump($m);exit;
          // echo  Proverka($m, $spectr, $raz1); exit;
			if (Proverka($m, $spectr, $raz1) == 1)
			{
				$s7 = "";
				$ch = (string)$sp[$j];//???? Функция-член to_string преобразует объект типа bitset в объект-строку типа basic_string.
				$s7 = $s5.'-'.$ch;//!!!!!!!!!!
				//REZ.push_back(s7);
                $REZ[] = $s7;/////???????
			}
		}
		$i++;
	}//var_dump($REZ);
	return $REZ;
}
//-------------------------------------------------
function Vkl($sum, $raz, $spectr, $raz1)
{
	//int *spectr1;
	//spectr1 = new int[raz1];
	for ($i = 0; $i < $raz1; $i++)
	{
		$spectr1[$i] = $spectr[$i];
	}
	$spectr1[0] = -1;
	$spectr1[$raz1 - 1] = -1;
	for ($i = 0; $i < $raz; $i++)
	{
		$k = 0;
		for ($j = 0; $j < $raz1; $j++)
		{
			if ($sum[$i] == $spectr1[$j])
			{
				$spectr1[$j] = -1;
				$k = 1;
				break;
			}
		}
		if($k == 0)
		{
			return false;
			break;
		}
	}
	return true;
}
//----------------------------------------------
function Result($ch, $spectr, $raz1)
{
	$i = $p = 0; 
	//vector<int> sum;
	$h = "";
	$k = ProbT($ch);
	//int *sp;
	//sp = new int[k + 1];

	while ($i < strlen($ch))
	{
		$s1 = "";
		$m = 0;
		while (($ch[$i] != '-') && ($i < strlen($ch)))
		{
			$s1 .= $ch[$i];
			$i++;
		}
		//$m = atoi($s1.c_str());///!!!!!!!!!!!
         $m = (int)($s1);
		$i++;
		$sp[$p] = $m;
		$p++;
	}
	$t = 2; $tt = $summa = 0;
	while ($t < $k + 1)
	{
		for ($i2 = 0; $i2 < k + 1; $i2++)
		{
			$summa .= $sp[$i];
			$tt++;
			if ($tt == $t)
			{
				//$sum.push_back(summa);
                $sum = $summa;
				$summa = 0;
				$i2 = $i2 - $t + 1;
				$tt = 0;
			}
		}
		$summa = 0;
		$t++;
		$tt = 0;
	}
	if (Vkl($sum, strlen($sum), $spectr, $raz1) == true)
		$h = $h.$ch.' ';///!!!!
	return $h;
}


?>