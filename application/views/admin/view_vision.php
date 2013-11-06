<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-user-2"></span>VISIÓN</span>
        <div class="clear"></div>
    </div>
	<div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?= base_url()?>">Página Principal</a></li>
                <li><a href="<?= base_url()?>admin/pe">Planeamiento Estratégico</a></li>
                <li class="current"><a href="<?= base_url()?>admin/vision">Visión</a></li>
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
                        <form action="<?= base_url()?>admin/newRespuesta" method="post" accept-charset="utf-8">
                            <div class="widget fluid">
                            <div class="whead"><h6>Nueva Respuesta</h6><div class="clear"></div></div>
                            <div class="formRow" style="overflow: hidden;">
                                <div class="grid3"><label>Pregunta :    </label></div>
                                <div class="grid9">
                                    <select name="pregunta" required="required">
                                        <option value="">-- SELECCIONA --</option>
                                        <?php 
                                            foreach ($preguntas as $row_select){?>
                                                <option value="<?= $row_select->IdPreguntaVision?>"><?= $row_select->PreguntaVision?></option>
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
                    <td width="50%">
                        <form action="<?= base_url()?>admin/newOFuturas" method="post" accept-charset="utf-8">
                            <div class="widget fluid">
                            <div class="whead"><h6>Nueva Oportunidad Futura</h6><div class="clear"></div></div>
                            <div class="formRow" style="overflow: hidden;">
                                <div class="grid3"><label>Oportunidad Futura : </label></div>
                                <div class="grid9"><input type="text" name="ofutura" required="required"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" >
                                    <div class="grid9" align="right" style="width: 100%"><input type="submit" class="buttonS bGreen" value="Agregar Oportunidad Futura"/></div>
                                    <div class="clear"></div>
                            </div>
                            </div>
                        </form>
                        <div style="height: 25px;"></div>
                    </td>
                    <td width="50%">
                        <form action="<?= base_url()?>admin/newAFuturas" method="post" accept-charset="utf-8">
                            <div class="widget fluid">
                            <div class="whead"><h6>Nueva Amenaza Futura</h6><div class="clear"></div></div>
                            <div class="formRow" style="overflow: hidden;">
                                <div class="grid3"><label>Amenaza Futura : </label></div>
                                <div class="grid9"><input type="text" name="afutura" required="required"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" >
                                    <div class="grid9" align="right" style="width: 100%"><input type="submit" class="buttonS bGreen" value="Agregar Amenaza Futura"/></div>
                                    <div class="clear"></div>
                            </div>
                            </div>
                        </form>
                        <div style="height: 25px;"></div>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2" style="border: 1px solid #000;padding: 10px;"><strong>PREGUNTAS PARA FORMULAR LA VISIÓN</strong></td>
                </tr>
                <?php
                    foreach ($preguntas as $row_preguntas){?>
                        <tr>
                            <td style="border: 1px solid #000;padding: 10px;"><strong><?= $row_preguntas->PreguntaVision?></strong></td>
                            <td style="border: 1px solid #000;padding: 10px;"><ol style="margin-left: 10px;">
                                    <?php
                                        $respuestas = $this->Admin_model->getRespuestasVision($row_preguntas->IdPreguntaVision);

                                        foreach ($respuestas as $row_respuestas){?>
                                            
                                    <li><?= $row_respuestas->RespuestaVision?> (<a href="<?= base_url()?>admin/editRespuesta?rid=<?= $row_respuestas->IdRespuestaVision?>">Editar</a> - <a href="<?= base_url()?>admin/deleteRespuesta?rid=<?= $row_respuestas->IdRespuestaVision?>">Eliminar</a>)</li>
                                            
                                        <?php }
                                    ?>
                            </ol></td>
                        </tr>
                    <?php }
                ?>
                <tr>
                    <td colspan="2" align="center" style="border: 1px solid #000;padding: 10px;"><strong>DECLARACIÓN DE LA VISIÓN</strong></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" >
                        
                        <tr valign="middle">
                            <?php
                        foreach ($vision as $row_vision){?>
                            <td style="border: 1px solid #000;padding: 10px;"><?= $row_vision->Vision?></td>
                            <td align="center"  style="border: 1px solid #000;padding: 10px;"><a href="<?= base_url()?>admin/editarVision?v=<?= $row_vision->IdVision?>">Editar</a></td>
                        <?php }
                            ?>
                        </tr>
                    </td>
                        
                    
                </tr>
            </table>
            <table width="100%" cellspacing="0" cellpadding="10" border="0" style="margin-top: 25px;">
                <tr>
                    <td width="40%">
                        <table width="100%" border="1" style="border: 1px solid #000;padding: 10px;">
                            <tr><td colspan="2" align="center" style="border: 1px solid #000;padding: 10px;"><strong>OPORTUNIDADES FUTURAS</strong></td></tr>
                            <?php 
                                foreach ($ofuturas as $row_ofuturas){?>
                            <tr>
                                <td style="border: 1px solid #000;padding: 10px;"><?= $row_ofuturas->oportunidadfutura?></td>
                                <td align="center" style="border: 1px solid #000;padding: 10px;"><a href="<?= base_url()?>admin/editOportunidadFutura?ofid=<?= $row_ofuturas->Idoportunidadfutura?>">Editar</a> - <a href="<?= base_url()?>admin/deleteOportunidadFutura?ofid=<?= $row_ofuturas->Idoportunidadfutura?>">Eliminar</a></td>
                            </tr>
                                <?php }
                            ?>
                        </table>
                    </td>
                    <td width="40%">
                        <table width="100%" border="1" style="border: 1px solid #000;padding: 10px;">
                            <tr><td colspan="2" align="center" style="border: 1px solid #000;padding: 10px;"><strong>AMENAZAS FUTURAS</strong></td></tr>
                            <?php 
                                foreach ($afuturas as $row_afuturas){?>
                            <tr>
                                <td style="border: 1px solid #000;padding: 10px;"><?= $row_afuturas->amenazafutura?></td>
                                <td align="center" style="border: 1px solid #000;padding: 10px;"><a href="<?= base_url()?>admin/editAmenazaFutura?afid=<?= $row_afuturas->Idamenazafutura?>">Editar</a> - <a href="<?= base_url()?>admin/deleteAmenazaFutura?afid=<?= $row_afuturas->Idamenazafutura?>">Eliminar</a></td>
                            </tr>
                                <?php }
                            ?>
                        </table>
                    </td>
                </tr>
                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><a href="<?= base_url()?>admin/proceso" style="float: left;margin-left: 25px"><img src="<?= base_url()?>assets/admin/images/back.png" width="24"></a><p style="float: left; margin-top: -10px; margin-left: 5px;">Visión del Futuro II</p></td>
                                    <td><a href="<?= base_url()?>admin/mision" style="float: right;margin-right: 25px"><img src="<?= base_url()?>assets/admin/images/next.png" width="24"></a><p style="float: right; margin-top: -10px; margin-right: 5px;">Misión</p></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
            </table>
	</div>
    </div>
    <!-- Main content ends --></div>
