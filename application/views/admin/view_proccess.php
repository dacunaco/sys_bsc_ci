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
            <table width="100%" cellspacing="0" cellpadding="10" border="0" style="border-collapse: collapse; border: 1px solid #000;">
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
            <?= form_open(base_url().'admin/addDetailMatriz');?>
            <tr>
                <td width="50%" align="center" style="border: 1px solid #000;padding: 10px;">
                    <?php
                        $entornos = array();
                        $entornos[""] = "-- SELECCIONE --";
                        foreach ($entorno as $row){
                            $entornos[$row->identorno] = $row->entorno;
                        }
                        echo form_label('Entorno : ');
                        echo form_dropdown('entornos', $entornos,'','style="width: 170px;" required="required"');
                    ?>
                </td>
                <td width="50%" align="center" style="border: 1px solid #000;padding: 10px;">
                    <?php
                        $tendencias = array();
                        $tendencias[""] = "-- SELECCIONE --";
                        foreach ($tendencia as $row){
                            $tendencias[$row->idtendencia] = $row->tendencia;
                        }
                        echo form_label('Tendencia : ');
                        echo form_dropdown('tendencias', $tendencias,'','style="width: 170px;"');
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="border: 1px solid #000;padding: 10px;">
                    <div class="formRow" >
                        <div class="grid3"><?= form_label('Detalle : ');?></div>
                        <div class="grid9"><?= form_input('detalle');?></div>
                    </div>
                    <div class="formRow" >
                                    <div class="grid9"><input type="submit" class="buttonS bGreen" value="Agregar Detalle"/></div>
                                    <div class="clear"></div>
                            </div>
                </td>
            </tr>
            <?= form_close();?>
            <tr>
                <td colspan="2" align="center" style="border: 1px solid #000;padding: 10px;">
                    <table width="100%" cellspacing="0" cellpadding="10" border="2" align="center" >
                        <?php
                            if(count($detalle) == 0){?>
                                <tr>
                                    <td colspan="2" align="center">No se encontró ningún detalle para mostrar</td>
                                </tr>
                            <?php }else{
                        ?>
                        <tr>
                            <td style="border: 1px solid #000;padding: 10px;"><strong>VISION/DETALLE</strong></td>
                            <?php
                                foreach ($entorno as $row){?>
                                    <td align="center" style="border: 1px solid #000;padding: 10px;"><strong><?= $row->entorno?></strong></td>
                                <?php }
                            ?>
                        </tr>
                        <?php
                            $i = 0;
                            $aux = array();
                            $aux2 = array();
                            error_reporting(0);
                            foreach ($tendencia as $row){?>
                                <tr>
                                    <td style="border: 1px solid #000;padding: 10px;"><strong><?= $row->tendencia?></strong></td>
                                    <?php
                                    foreach ($entorno as $row2){
                                        foreach ($detalle as $row3){
                                            if($row3->identorno == $row2->identorno && $row3->idtendencia == $row->idtendencia){
                                                $aux[$i] = $row3->detallevision;
                                                $aux2[$i] = $row3->iddetallevision;
                                                $i++;
                                            }
                                        }?>
                                        <td align="center" style="border: 1px solid #000;padding: 10px;">
                                            <?php 
                                                if(count($aux) == 0){
                                                    echo "Vacío";
                                                }else{
                                                    for($f=0;$f<count($aux);$f++){
                                                        echo $aux[$f]." ( <a href='".  base_url()."admin/editDetailById?did=".$aux2[$f]."&eid=".$row2->identorno."&tid=".$row->idtendencia."'><img src='".  base_url()."assets/admin/images/check.png' width='16'></a> - <a href='".  base_url()."admin/deleteDetailById?did=".$aux2[$f]."&eid=".$row2->identorno."&tid=".$row->idtendencia."'><img src='".  base_url()."assets/admin/images/delete.png' width='16'></a> )<br />";
                                                    }
                                                }
                                            ?>
                                        </td>
                                    <?php unset($aux);$i = 0;}
                                    ?>
                                </tr>
                            <?php }}
                        ?>
                                
                    </table>
                </td>
            </tr>
            <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><a href="<?= base_url()?>admin/vfi" style="float: left;margin-left: 25px"><img src="<?= base_url()?>assets/admin/images/back.png" width="24"></a><p style="float: left; margin-top: -10px; margin-left: 5px;">Visión del Futuro I</p></td>
                                    <td><a href="<?= base_url()?>admin/vision" style="float: right;margin-right: 25px"><img src="<?= base_url()?>assets/admin/images/next.png" width="24"></a><p style="float: right; margin-top: -10px; margin-right: 5px;">Visión</p></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
        </table>
	</div>
    </div>
    <!-- Main content ends --></div>
