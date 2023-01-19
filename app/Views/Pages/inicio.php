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
                            foreach ($datos as $dato){
                                if($dato->Nombre == $nombre->Nombre){
                                    if($dato->Fecha == ($i<10?"0$i/01":"$i/01")){
                                        if($dato->Tipo == 'FOT'){
                                            if($dato->Estado == 'M/Ent')
                                                array_push($entradas,$dato->Hora);
                                            else
                                                array_push($salidas,$dato->Hora);
                                            if(sizeof($salidas)>0 and sizeof($entradas)>0){
                                                
                                                $he=substr($entradas[0],-10,2);
                                                $me=substr($entradas[0],-7,2);
                                                
                                                $hs=substr($salidas[0],-10,2);
                                                $ms=substr($salidas[0],-7,2);
                                                echo "Entrada $he:$me";
                                                echo "Salida $hs:$me";
                                                //$rest = substr("abcdef", -3, 1); // devuelve "d"
                                            }
                                        } elseif($dato->Tipo == 'Invalido') {
                                            echo "INC";
                                        }
                                    } 
                                }
                            }
                            echo "</td>";
                        }
                    echo "</tr>";
            if(++$e == 10)
                break;
            }
            ?>
        </tr>
        
        
        </table>
    </div>
<?= $this->endSection()?>
