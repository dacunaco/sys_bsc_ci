<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-user-2"></span>VALORES</span>
        <div class="clear"></div>
    </div>
	<div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li><a href="<?= base_url()?>">Página Principal</a></li>
                <li><a href="<?= base_url()?>admin/pe">Planeamiento Estratégico</a></li>
                <li class="current"><a href="<?= base_url()?>admin/valores">Valores</a></li>
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
                <form action="<?= base_url()?>admin/newValor" method="post" accept-charset="utf-8">
                    <div class="formRow">
                        <div class="grid3"><label>Valor : </label></div>
                        <div class="grid9"><input type="text" name="valor" required="required"></div>
                        <div class="grid3"><label>Significado : </label></div>
                        <div class="grid9"><input type="text" name="significado" required="required"></div>
                    </div>
                    <div class="formRow" >
                        <div class="grid9" align="right" style="width: 100%"><input type="submit" class="buttonS bGreen" value="Agregar valor"/></div>
                        <div class="clear"></div>
                    </div>
                </form>
                </tr>
                <tr>
                    <td align="center" style="border: 1px solid #000;padding: 10px;"><strong>VISIÓN</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border: 1px solid #000;padding: 10px;">
                        <?php
                            foreach ($vision as $row_vision){
                                echo $row_vision->Vision;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border: 1px solid #000;padding: 10px;"><strong>MISIÓN</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border: 1px solid #000;padding: 10px;">
                        <?php
                            foreach ($mision as $row_mision){
                                echo $row_mision->Mision;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;padding: 10px;">
                        <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border: 1px solid;">
                            <tr>
                                <td align="center" style="border: 1px solid #000;padding: 10px;"><strong>Valor</strong></td>
                                <td align="center" style="border: 1px solid #000;padding: 10px;"><strong>Significado</strong></td>
                                <td align="center" style="border: 1px solid #000;padding: 10px;"><strong>Acciones</strong></td>
                            </tr>
                            <?php
                                foreach ($valores as $row_valores){?>
                                    <tr>
                                        <td style="border: 1px solid #000;padding: 10px;"><?= $row_valores->Valor?></td>
                                        <td style="border: 1px solid #000;padding: 10px;"><?= $row_valores->Significado?></td>
                                        <td style="border: 1px solid #000;padding: 10px;">
                                            <a href="<?= base_url()?>admin/editValor?vid=<?= $row_valores->IdValor?>">Editar</a> - <a href="<?= base_url()?>admin/deleteValor?vid=<?= $row_valores->IdValor?>">Eliminar</a>
                                        </td>
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
                                    <td colspan="2"><a href="<?= base_url()?>admin/mision" style="float: left;margin-left: 25px"><img src="<?= base_url()?>assets/admin/images/back.png" width="24"></a><p style="float: left; margin-top: -10px; margin-left: 5px;">Misión</p></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
            </table>
	</div>
    </div>
    <!-- Main content ends --></div>
