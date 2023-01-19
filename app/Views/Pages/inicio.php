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
                            foreach ($datos as $dato){
                                if($dato->Nombre == $nombre->Nombre){
                                    if($dato->Fecha == ($i<10?"0$i/01":"$i/01")){
                                        if($dato->Tipo == 'FOT'){
                                            
                                            
                                            





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
