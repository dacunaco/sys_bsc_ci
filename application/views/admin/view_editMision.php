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
                        <form action="<?= base_url()?>admin/editMision" method="post" accept-charset="utf-8">
                            <div class="widget fluid">
                            <div class="whead"><h6>Editar Misión</h6><div class="clear"></div></div>
                            <div class="formRow" style="overflow: hidden;">
                                <div class="grid3"><label>Visión : </label></div>
                                <?php
                                    foreach ($mision as $row_respuesta){?>
                                        <div class="grid9"><input type="text" name="respuesta" required="required" value="<?= $row_respuesta->Mision?>"><input type="hidden" name="id" value="<?= $row_respuesta->IdMision?>"></div>
                                    <?php }
                                ?>
                                
                                <div class="clear"></div>
                            </div>
                            <div class="formRow" >
                                    <div class="grid9" align="right" style="width: 100%"><input type="submit" class="buttonS bGreen" value="Modificar Misión"/></div>
                                    <div class="clear"></div>
                            </div>
                            </div>
                        </form>
                    </td>
                </tr>
               
            </table>
	</div>
    </div>
    <!-- Main content ends --></div>
