<?php
header("Refresh: 10; url=index.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Результат зняття готівки</title>
</head>
<body>
<?php
if(filter_input(INPUT_POST, 'suma') != null){
    $suma=filter_input(INPUT_POST, 'suma');
    echo "Сума: $suma<br>";
    if($suma<0){
        echo "Видача неможлива: сума менша 0<br>";
        echo "Введіть іншу суму через 10 секунд";
        die;
    }
    if($suma==0){
        echo "Видача неможлива: сума нульова<br>";
        echo "Введіть іншу суму через 10 секунд";
die;
    }
    $arr=array(5000, 1000, 500, 100);
    $kol=array(200, 0, 5, 20);
    $rez=array();
    $gros=$arr[0]*$kol[0]+$arr[1]*$kol[1]+$arr[2]*$kol[2]+$arr[3]*$kol[3];
    if($suma>$gros){
        echo "Видача неможлива: в банкоматі не достатньо коштів<br>";
        echo "Введіть іншу суму через 10 секунд";
        die;
    }
    if($suma%100!=0){
        echo "Видача неможлива: сума не кратна 100<br>";
        echo "Введіть іншу суму через 10 секунд";
    }
    else{
        $n=0;
        for($i=0; $i<=$kol[0]; $i++){
            for($j=0; $j<=$kol[1]; $j++){
                for($k=0; $k<=$kol[2]; $k++){
                    for($t=0; $t<=$kol[3]; $t++){
                        $sumak=$arr[0]*$i+$arr[1]*$j+$arr[2]*$k+$arr[3]*$t;
                        if($suma==$sumak){
                            $n++;
                                if ($n==1){
                                    $min=$i+$j+$k+$t;
                                    $rez[0]=$i;
                                    $rez[1]=$j;
                                    $rez[2]=$k;
                                    $rez[3]=$t;
                                }
                                $s=$i+$j+$k+$t;
                                if($s<$min){
                                    $min=$s;
                                    $rez[0]=$i;
                                    $rez[1]=$j;
                                    $rez[2]=$k;
                                    $rez[3]=$t;
                                }
                        }
                        else{
                        }
                    }
                }
            }
        }
        if($n==0){
            echo "Видача неможлива: недостатньо купюр<br>";
            echo "Введіть іншу суму через 10 секунд";
            die;
        }
        else{
            echo "Видача можлива, число купюр:<br>";
            if($rez[0]!=0){
                echo $arr[0]."x".$rez[0]." ";
            }
            if($rez[1]!=0){
                echo $arr[1]."x".$rez[1]." ";
            }
            if($rez[2]!=0){
                echo $arr[2]."x".$rez[2]." ";
            }
            if($rez[3]!=0){
                echo $arr[3]."x".$rez[3];
            }
        }
    }
}
else{
    echo "Видача неможлива: не введена сума";
}
?>
</body>
</html>