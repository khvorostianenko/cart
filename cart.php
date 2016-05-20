<meta charset="utf-8">
<style>
        body {
        font-family: "Courier New";
    }
</style>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 18.05.2016
 * Time: 19:20
 */
    $summa = 0;
    $count=1;

    $numb0 = '#';
    $numb1 = $count;
    $numb2 = ++$count;
    $numb3 = ++$count;
    $numb4 = ++$count;
    $numb5 = ++$count;
    $numb6 = ++$count;
    $numb7 = ++$count;



    $tovar0 = 'Item';
    $tovar1 = 'IPhone';
    $tovar2 = 'fmModule';
    $tovar3 = 'packet';
    $tovar4 = 'Samsumg';
    $tovar5 = 'calculator';
    $tovar6 = 'MS-Office';
    $tovar7 = 'Nokia';

    $cost0 = 'Price';
    $cost1 = 25500;
    $cost2 = 1500;
    $cost3 = 15;
    $cost4 = 20000;
    $cost5 = 1500;
    $cost6 = 15;
    $cost7 = 10000;

    $count0='Quantity';
    $count1=1;
    $count2=10;
    $count3=15;
    $count4=2;
    $count5=3;
    $count6=4;
    $count7=5;

    $sum0='Summa';
    
    $aval0 = 'Availability';
    $aval1 = false;
    $aval2 = true;
    $aval3 = true;
    $aval4 = false;
    $aval5 = false;
    $aval6 = true;
    $aval7 = false;

    $summa = $cost1*$count1 + $cost2*$count2 + $cost3*$count3 + $cost4*$count4 + $cost5*$count5 + $cost6*$count6 + $cost7*$count7;

    /*Считаем максимальную длину нашей таблицы - перебирем длины строк нашей таблицы
      Правило:
        а) Символ '|' начинает строку, заканчивает строку и разделяет столбцы
        б) СПРАВА и СЛЕВА от каждой перемененной присутствует минимум один знак '_'
        в) если не хватает длины ячейки добираем символами '_'
      Таким образом кроме длин самих переменных необходимо учесть |___1____|_ _|_ _|_ _|_ _|_ _|_ _| = 17 символа (переменная $Dobavka)
    */
    $col1 = $col2 = $col3 = $col4 = $col5 = $col6 = 1;
    for($i=0;$i<=7;$i++)
        {
            $Dobavka=17;
            $forNumber='numb'.$i;
            $forTovar='tovar'.$i;
            $forCount='count'.$i;
            $forCost='cost'.$i;
            $forSumm='sum'.$i;
            if ($i>0){
                $$forSumm=$$forCount*$$forCost;
            }
            $forAval='aval'.$i;
            if ($i>0){
              if($$forAval===true)
                    $$forAval='in_stock';
                else
                    $$forAval='wait_for_a_week';}
            if (strlen($$forNumber)>$col1){
                $col1 = strlen($$forNumber);
                }
            if (strlen($$forTovar)>$col2)
                $col2 = strlen($$forTovar);
            if (strlen($$forCount)>$col3)
                $col3 = strlen($$forCount);
            if (strlen($$forCost)>$col4)
                $col4 = strlen($$forCost);
            if (strlen($$forSumm)>$col5)
                $col5 = strlen($$forSumm);
            if (strlen($$forAval)>$col6)
                $col6 = strlen($$forAval);
            $length = (int)$col1 + (int)$col2 + (int)$col3 + (int)$col4 + (int)$col5 + (int)$col6 + $Dobavka;

        }
    $firstLine='';
    $firstLine = str_pad($firstLine, $length, "_", STR_PAD_RIGHT);
    $colLine = '|';


/*Ячейка таблицы формируется посредством функции str_pad (с учетом патформы)*/
if (php_sapi_name()=='cli')
            {
        $Perenos=PHP_EOL;
        $Probel=' ';
            }
    else {
        $Perenos='<br>';
        $Probel='&nbsp;';
        }
echo $Perenos.$Perenos;
echo $Probel.$firstLine.$Perenos;
for ($i=0;$i<=7;$i++)
{
    $stroka = '';
    $forNumber='numb'.$i;
    $forTovar='tovar'.$i;
    $forCount='count'.$i;
    $forCost='cost'.$i;
    $forSumm='sum'.$i;
    if ($i>0){
        $$forSumm=$$forCount*$$forCost;
    }
    $forAval='aval'.$i;

    switch(strlen($$forNumber)<$col1)
    {
        case true:
            $$forNumber='_'.str_pad($$forNumber, $col1, "_", STR_PAD_BOTH).'_';
            break;
        case false:
            $$forNumber='_'.$$forNumber.'_';
    }
    switch(strlen($$forTovar)<$col2)
    {
        case true:
            $$forTovar='_'.str_pad($$forTovar, $col2, "_", STR_PAD_BOTH).'_';
            break;
        case false:
            $$forTovar='_'.$$forTovar.'_';
    }
    switch(strlen($$forCount)<$col3)
    {
        case true:
            $$forCount='_'.str_pad($$forCount, $col3, "_", STR_PAD_BOTH).'_';
            break;
        case false:
            $$forCount='_'.$$forCount.'_';
    }
    switch(strlen($$forCost)<$col4)
    {
        case true:
            $$forCost='_'.str_pad($$forCost, $col4, "_", STR_PAD_BOTH).'_';
            break;
        case false:
            $$forCost='_'.$$forCost.'_';
    }
    switch(strlen($$forSumm)<$col5)
    {
        case true:
            $$forSumm='_'.str_pad($$forSumm, $col5, "_", STR_PAD_BOTH).'_';
            break;
        case false:
            $$forSumm='_'.$$forSumm.'_';
    }
    switch(strlen($$forAval)<$col6)
    {
        case true:
            $$forAval='_'.str_pad($$forAval, $col6, "_", STR_PAD_BOTH).'_';
            break;
        case false:
            $$forAval='_'.$$forAval.'_';
    }
    $stroka = $colLine.$$forNumber.
        $colLine.$$forTovar.
        $colLine.$$forCount.
        $colLine.$$forCost.
        $colLine.$$forSumm.
        $colLine.$$forAval.$colLine.$Perenos
    ;
    echo $stroka;
}


$stroka=$colLine.str_pad('Total amount', $length-$col6-3, "_", STR_PAD_BOTH).$colLine.str_pad($summa, $col6+2, "_", STR_PAD_BOTH).$colLine;
echo $stroka.$Perenos.$Perenos;


?>
</body>