<?=$this->extend('Layouts/principal')?>

<?=$this->section('titulo')?>
    <?php echo $titulo?>
<?= $this->endSection()?>

<?=$this->section('contenido')?>
    <div class="d-flex">
        <table class="table table-bordered border-primary">
            <tr>
            <th>Nombre</th>
            <?php for($i=1;$i<=16;$i++)
                if($i>10)
                    echo "<th class='col'>0$i/01</th>";
                else echo "<th class='col'>$i/01</th>";
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
                            foreach ($datos as $dato){
                                if($dato->Nombre == $nombre->Nombre){
                                    if($dato->Fecha == ($i<10?"0$i/01":"$i/01")){
                                        if($dato->Tipo == 'FOT'){
                                            if($dato->Estado == 'M/Ent'){
                                                //agregar los ceros correspondientes
                                                $he=substr($dato->Hora,-10,2);
                                                $me=substr($dato->Hora,-7,2);
                                                if((int)$he<12 and substr($dato->Hora,-4,4)=="p.m.")
                                                    $he=strval((int)$he+12);
                                                $he=((int)$he<10?"0$he":$he);
                                                $me=((int)$me<10?"0$me":$me);
                                                array_push($entradas,"$he:$me");
                                            }
                                            elseif ($dato->Estado == 'M/Sal'){
                                                $hs=(substr($dato->Hora,-10,2));
                                                $ms=(substr($dato->Hora,-7,2));
                                                if((int)$hs<12 and substr($dato->Hora,-4,4)=="p.m.")
                                                    $hs=strval(((int)$hs+12));
                                                if((int)$hs==12 and substr($dato->Hora,-4,4)=="a.m.")
                                                    $hs="0";
                                                $hs=((int)$hs<10?"0$hs":"$hs");
                                                $ms=((int)$ms<10?"0$ms":"$ms");
                                                array_push($salidas,"$hs:$ms");
                                            }
                                        } elseif($dato->Tipo == 'Invalido') {
                                            echo "INC";
                                        }
                                    } 
                                }
                            }
                            if(sizeof($entradas) == sizeof($salidas)){
                                foreach (array_combine($entradas, $salidas) as $entrada => $salida) {
                                    $acumh = (int)substr($salida,-6,2)-(int)substr($entrada,-5,2);
                                    $acumm = (int)substr($salida,-2,2)-(int)substr($entrada,-2,2);
                                    if($acumm<0){
                                        --$acumh;
                                        $acumm = 60+$acumm;
                                    }
                                }
                            }
                            echo "$acumh:$acumm   ";
                            echo "</td>";
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
