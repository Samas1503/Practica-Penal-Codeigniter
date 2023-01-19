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
                echo "<th class='col'>0$i/01</th>";
            ?>
        </tr>
        <?php $e=0;
            foreach ($nombres as $nombre):?>
                <tr>
                    <th><?=$nombre->Nombre?></th>
                    <?php
                    for($i=1;$i<=16;$i++)
                        foreach ($datos as $dato)
                            if($dato->Nombre == $nombre->Nombre){
                                if($dato->Fecha == "0$i/01")
                                    echo "<td>$dato->Hora</td>";
                                break;
                            }
                    ?>
                </tr>
            <?php
            if(++$e == 1000)
                break;
            endforeach;?>
        </table>
        <?php $i = 1;
            for($i;$i<16;$i++):?>
        <table class="table table-bordered border-primary">
            
        </table>
        <?php endfor;?>
    </div>
<?= $this->endSection()?>
