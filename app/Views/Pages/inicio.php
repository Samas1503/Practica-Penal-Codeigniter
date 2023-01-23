<?=$this->extend('Layouts/principal')?>

<?=$this->section('titulo')?>
    <?php echo $titulo?>
<?= $this->endSection()?>

<?=$this->section('contenido')?>
    <div class="d-flex align-items-center justify-content-center">
        <table class="table table-bordered border-primary">
            <tr>
            <th>Nombre</th>
            <?php for($i=1;$i<=16;$i++){
                echo "<th class='col'>";
                echo $i<10?"0$i":"$i";
                echo "/01</th>";
            }
            echo "<th class='col'>Departamento</th>";
            ?>
        </tr>

        <?php ?>
        <tr>
            <?php $e=0;
                foreach ($nombres as $nombre){
                    echo "<tr><th>$nombre->Nombre</th>";
                        for($i=1;$i<=16;$i++){
                            echo "<td>";
                            $entradas = [];
                            $salidas = [];
                            $acumh=0;
                            $acumm=0;
                            $band = false;
                            foreach ($datos as $dato){
                                if($dato->Nombre == $nombre->Nombre){
                                    if($dato->Fecha == ($i<10?"0$i/01":"$i/01")){
                                        if($dato->Tipo == 'FOT'){
                                            if($dato->Estado == 'M/Ent'){
                                                //agregar los ceros correspondientes
                                                $he=substr($dato->Hora,-8,2);
                                                $me=substr($dato->Hora,-5,2);
                                                if((int)$he<12 and substr($dato->Hora,-2,2)=="pm")
                                                    $he=strval((int)$he+12);
                                                $he=((int)$he<10?"0".(int)$he:$he);
                                                $me=((int)$me<10?"0".(int)$me:$me);
                                                array_push($entradas,"$he:$me");
                                            }
                                            elseif ($dato->Estado == 'M/Sal'){
                                                $hs=(substr($dato->Hora,-8,2));
                                                $ms=(substr($dato->Hora,-5,2));
                                                if((int)$hs<12 and substr($dato->Hora,-2,2)=="pm")
                                                    $hs=strval(((int)$hs+12));
                                                if((int)$hs==12 and substr($dato->Hora,-2,2)=="am")
                                                    $hs="0";
                                                $hs=((int)$hs<10?"0".(int)$hs:"$hs");
                                                $ms=((int)$ms<10?"0".(int)$ms:"$ms");
                                                array_push($salidas,"$hs:$ms");
                                            }
                                            $band = true;
                                        } elseif($dato->Tipo == 'Invalido') {
                                            echo $band==false?"INC":"";
                                            $band = true;
                                        }
                                    }
                                }
                            }
                            if(sizeof($entradas) == sizeof($salidas)){
                                foreach (array_combine($entradas, $salidas) as $entrada => $salida) {
                                    $acumh = (int)substr($salida,-5,2)-(int)substr($entrada,-5,2);
                                    $acumm = (int)substr($salida,-2,2)-(int)substr($entrada,-2,2);
                                    if($acumm<0){
                                        --$acumh;
                                        $acumm = 60+$acumm; 
                                    }
                                }
                            }
                    while ($acumh != 0 and $acumm != 0) {
                        echo $acumh > 0 ? ($acumh < 10 ? "0$acumh" : $acumh) . ($acumm < 10 ? ":0$acumm" : ":$acumm")." hs" : "";
                        $acumh = 0;
                        $acumm = 0;
                    }

                            echo "</td>";
                        }
                foreach($departamentos as $dpto){
                    if ($dpto->Nombre == $nombre->Nombre) {
                        echo "<td> $dpto->Dpto </td>";
                        break;
                    }
                }
                echo "</tr>";
            if(++$e == 7000)
                break;
            }
            ?>
        </tr>
        
        
        </table>
    </div>
<?= $this->endSection()?>
