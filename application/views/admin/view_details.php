<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-user-2"></span>VISION DEL FUTURO I</span>
        <div class="clear"></div>
    </div>
	<div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?= base_url()?>">Página Principal</a></li>
                <li><a href="<?= base_url()?>admin/pe">Planeamiento Estratégico</a></li>
                <li class="current"><a href="<?= base_url()?>admin/vfi">Visión del Futuro I</a></li>
            </ul>
        </div>
        <div class="breadLinks">
            
             <div class="clear"></div>
        </div>
    </div>

    <!-- Main content -->
    <div class="wrapper">
        <div class="cnt" style="padding-top: 15px;">
            <table width="100%" cellspacing="0" cellpadding="10" border="0" style="border-collapse: collapse; border: 1px solid #000;padding: 10px !important;">
            <tr>
                <td width="50%" align="center" style="border: 1px solid #000;padding: 10px;"><a href="<?= base_url()?>admin/vfi">Principal</a></td>
                <td width="50%" align="center" style="border: 1px solid #000"><a href="<?= base_url()?>admin/proceso">Proceso</a></td>
            </tr>
            <?php
                if(isset($mensaje)){
                    if($opcion == 1){?>
                        <tr>
                            <td width="90%" colspan="2" style="border: 1px solid #000;padding: 10px;">
                                <div class="message" style="border: 1px solid #006600;background: #99ff99; color: #006600; width: 98%;margin: 0 auto;padding: 5px;margin-top: 5px;">
                                    <?= $mensaje?>
                                </div>
                            </td>
                        </tr>
                    <?php }else if($opcion == 0){?>
                            <tr>
                                <td width="90%" colspan="2" style="border: 1px solid #000;padding: 10px;">
                                    <div class="message" style="border: 1px solid #990000;background:  #ff9999; color: #990000; width: 98%;margin: 0 auto;padding: 5px;margin-top: 5px;">
                                        <?= $mensaje?>
                                    </div>
                                </td>
                            </tr>
                    <?php }
                }else{ if(validation_errors() != ""){?>
                        <tr>
                            <td width="90%" colspan="2" style="border: 1px solid #000;padding: 10px;">
                                <div class="message" style="border: 1px solid #990000;background:  #ff9999; color: #990000; width: 98%;margin: 0 auto;padding: 5px;margin-top: 5px;">
                                    <?= validation_errors()?>
                                </div>
                            </td>
                        </tr>
                <?php }}
            ?>
            <tr>
                <td colspan="2" align="center" style="border: 1px solid #000;padding: 10px;">DETALLES DE INTERSECCION ENTRE ( <strong><?php foreach ($entorno as $row): echo $row->entorno; endforeach;?></strong> - <strong><?php foreach ($tendencia as $row): echo $row->tendencia; endforeach;?></strong> )</td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="border: 1px solid #000;padding: 10px;">
                    <table width="95%" cellspacing="0" cellpadding="5" border="1" style="border-collapse: collapse;padding: 10px;" >
                        <tr>
                            <td width="5%" align="center" style="border: 1px solid #000;padding: 10px;"><strong>N°</strong></td>
                            <td align="center" style="border: 1px solid #000;padding: 10px;"><strong>Detalle</strong></td>
                            <td width="20%" align="center" style="border: 1px solid #000;padding: 10px;"><strong>Acciones</strong></td>
                        </tr>
                        <?php
                            $i = 1;
                            foreach ($detalles as $row){?>
                                <tr>
                                    <td align="center" style="border: 1px solid #000;padding: 10px;"><?= $i?></td>
                                    <td style="border: 1px solid #000;padding: 10px;"><?= $row->detallevision?></td>
                                    <td align="center" style="border: 1px solid #000;padding: 10px;"><a href="<?= base_url()?>admin/editDetailById?did=<?=$row->iddetallevision?>&eid=<?=$row->identorno?>&tid=<?=$row->idtendencia?>">Editar</a> - <a href="<?= base_url()?>admin/deleteDetailById?did=<?=$row->iddetallevision?>&eid=<?=$row->identorno?>&tid=<?=$row->idtendencia?>">Eliminar</a></td>
                                </tr>
                            <?php $i++;}
                        ?>
                    </table>
                </td>
            </tr>
        </table>
	</div>
    </div>
    <!-- Main content ends --></div>
