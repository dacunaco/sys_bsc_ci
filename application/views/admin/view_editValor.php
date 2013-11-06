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
                <li class="current"><a href="<?= base_url()?>admin/vfi">Valores</a></li>
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
                <form action="<?= base_url()?>admin/editarValor" method="post" accept-charset="utf-8">
                    <?php
                        foreach ($valor as $row_valor){?>
                           <div class="formRow">
                                <div class="grid3"><label>Valor : </label></div>
                                <div class="grid9"><input type="text" name="valor" required="required" value="<?= $row_valor->Valor?>"></div>
                                <div class="grid3"><label>Significado : </label></div>
                                <div class="grid9"><input type="text" name="significado" required="required" value="<?= $row_valor->Significado?>"><input type="hidden" name="id" value="<?= $row_valor->IdValor?>"></div>
                            </div>
                            <div class="formRow" >
                                <div class="grid9" align="right" style="width: 100%"><input type="submit" class="buttonS bGreen" value="Modificar valor"/></div>
                                <div class="clear"></div>
                            </div> 
                        <?php }
                    ?>
                    
                </form>
                </tr>
             </table>
            </table>
	</div>
    </div>
    <!-- Main content ends --></div>
