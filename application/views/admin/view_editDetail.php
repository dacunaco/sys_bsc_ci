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
                <tr>
                    <td width="50%" align="center" style="border: 1px solid #000;padding: 10px;"><a href="<?= base_url()?>admin/vfi">Principal</a></td>
                    <td width="50%" align="center" style="border: 1px solid #000"><a href="<?= base_url()?>admin/proceso">Proceso</a></td>
                </tr>
                <?php
                    if(isset($mensaje)){
                        if($opcion == 1){?>
                            <tr>
                                <td width="90%" colspan="2">
                                    <div class="message" style="border: 1px solid #006600;background: #99ff99; color: #006600; width: 98%;margin: 0 auto;padding: 5px;margin-top: 5px;">
                                        <?= $mensaje?>
                                    </div>
                                </td>
                            </tr>
                        <?php }else if($opcion == 0){?>
                                <tr>
                                    <td width="90%" colspan="2">
                                        <div class="message" style="border: 1px solid #990000;background:  #ff9999; color: #990000; width: 98%;margin: 0 auto;padding: 5px;margin-top: 5px;">
                                            <?= $mensaje?>
                                        </div>
                                    </td>
                                </tr>
                        <?php }
                    }else{ if(validation_errors() != ""){?>
                            <tr>
                                <td width="90%" colspan="2">
                                    <div class="message" style="border: 1px solid #990000;background:  #ff9999; color: #990000; width: 98%;margin: 0 auto;padding: 5px;margin-top: 5px;">
                                        <?= validation_errors()?>
                                    </div>
                                </td>
                            </tr>
                    <?php }}
                ?>
                <tr>
                    <td colspan="2">
                        <?= form_open(base_url().'admin/editDetail')?>
                        <div class="formRow">
                            <div class="grid3"><?= form_label('Detalle : ')?></div>
                            <div class="grid9"><?php 
                                foreach ($detalle as $row){
                                    echo form_input('detalle', $row->detallevision);
                                }
                                ?></div>
                            <?= form_hidden('id',$id)?>
                            <?= form_hidden('entorno',$entorno)?>
                            <?= form_hidden('tendencia',$tendencia)?>
                            <div class="formRow" >
                                    <div class="grid9" align="right" style="width: 100%"><input type="submit" class="buttonS bGreen" value="Modificar"/></div>
                                    <div class="clear"></div>
                            </div>
                        </div>
                        <?= form_close()?>
                    </td>
                </tr>
            </table>
	</div>
    </div>
    <!-- Main content ends --></div>
