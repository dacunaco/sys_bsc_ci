<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-user-2"></span>MISIÓN</span>
        <div class="clear"></div>
    </div>
	<div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?= base_url()?>">Página Principal</a></li>
                <li><a href="<?= base_url()?>admin/pe">Planeamiento Estratégico</a></li>
                <li class="current"><a href="<?= base_url()?>admin/mision">Misión</a></li>
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
                    <td colspan="2">
                        <form action="<?= base_url()?>admin/newRespuestaMision" method="post" accept-charset="utf-8">
                            <div class="widget fluid">
                            <div class="whead"><h6>Nueva Respuesta</h6><div class="clear"></div></div>
                            <div class="formRow" style="overflow: hidden;">
                                <div class="grid3"><label>Pregunta :    </label></div>
                                <div class="grid9">
                                    <select name="pregunta" required="required">
                                        <option value="">-- SELECCIONA --</option>
                                        <?php 
                                            foreach ($preguntas as $row_select){?>
                                                <option value="<?= $row_select->IdPreguntaMision?>"><?= $row_select->PreguntaMision?></option>
                                            <?php }
                                        ?>
                                    </select>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="formRow" style="overflow: hidden;">
                                <div class="grid3"><label>Respuesta : </label></div>
                                <div class="grid9"><input type="text" name="respuesta" required="required"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" >
                                    <div class="grid9" align="right" style="width: 100%"><input type="submit" class="buttonS bGreen" value="Agregar Respuesta"/></div>
                                    <div class="clear"></div>
                            </div>
                            </div>
                        </form>

                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2" style="border: 1px solid #000;padding: 10px;"><strong>PREGUNTAS PARA FORMULAR LA MISIÓN</strong></td>
                </tr>
                <?php
                    foreach ($preguntas as $row_preguntas){?>
                        <tr>
                            <td style="border: 1px solid #000;padding: 10px;"><strong><?= $row_preguntas->PreguntaMision?></strong></td>
                            <td style="border: 1px solid #000;padding: 10px;"><ol style="margin-left: 10px;">
                                    <?php
                                        $respuestas = $this->Admin_model->getRespuestasMision($row_preguntas->IdPreguntaMision);

                                        foreach ($respuestas as $row_respuestas){?>
                                            
                                    <li><?= $row_respuestas->RespuestaMision?> (<a href="<?= base_url()?>admin/editRespuestaMision?rid=<?= $row_respuestas->IdRespuestaMision?>">Editar</a> - <a href="<?= base_url()?>admin/deleteRespuestaMision?rid=<?= $row_respuestas->IdRespuestaMision?>">Eliminar</a>)</li>
                                            
                                        <?php }
                                    ?>
                            </ol></td>
                        </tr>
                    <?php }
                ?>
                <tr>
                    <td colspan="2" align="center" style="border: 1px solid #000;padding: 10px;"><strong>DECLARACIÓN DE LA MISIÓN</strong></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" >
                        
                        <tr valign="middle">
                            <?php
                        foreach ($mision as $row_vision){?>
                            <td style="border: 1px solid #000;padding: 10px;"><?= $row_vision->Mision?></td>
                            <td align="center"  style="border: 1px solid #000;padding: 10px;"><a href="<?= base_url()?>admin/editarMision?m=<?= $row_vision->IdMision?>">Editar</a></td>
                        <?php }
                            ?>
                        </tr>
                    </td>
                        
                    
                </tr>
                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><a href="<?= base_url()?>admin/vision" style="float: left;margin-left: 25px"><img src="<?= base_url()?>assets/admin/images/back.png" width="24"></a><p style="float: left; margin-top: -10px; margin-left: 5px;">Visión</p></td>
                                    <td><a href="<?= base_url()?>admin/valores" style="float: right;margin-right: 25px"><img src="<?= base_url()?>assets/admin/images/next.png" width="24"></a><p style="float: right; margin-top: -10px; margin-right: 5px;">Valores</p></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
            </table>
            
	</div>
    </div>
    <!-- Main content ends --></div>
