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
					<td width="50%" valign="top" align="center">
						<table width="90%" cellspacing="0" cellpadding="5" border="0" align="center">
							<tr>
								<td width="100%">
									<?= form_open('admin/entorno')?>
									<div class="formRow">
										<div class="grid3"><?= form_label('Entorno : ')?></div>
										<div class="grid9"><div class="grid9"><?= form_input('entorno')?></div></div>
										<div class="clear"></div>
									</div>
									<div class="formRow" >
										<div class="grid9" align="right" style="width: 100%"><input type="submit" class="buttonS bGreen" value="Registrar"/></div>
										<div class="clear"></div>
									</div>
									<?= form_close()?>
								</div>
								</td>
							</tr>
						</table>
						<table class="tDefault checkAll tMedia" width="90%" cellspacing="0" cellpadding="5" border="1" style="border-collapse: collapse; border: 1px solid #000" align="center">
                                                    <thead>
                                                                <tr>
                                                                    <td>N°</td>
                                                                    <td class="sortCol"><div>Descripción<span></span></div></td>
                                                                    <td>Acciones</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
							<?php
								if(count($entorno) == 0){?>
									<tr>
										<td align="center" colspan="3" ><strong>No se encontró ningún entorno registrado.</strong></td>
									</tr>
								<?php }else{
										$i = 1;
										foreach ($entorno as $row_entorno){?>
											<tr>
												<td align="center" width="24"><?= $i?></td>
												<td><?= $row_entorno->entorno?></td>
												<td align="center" width="120"><a href="<?= base_url()?>admin/edit_entorno?eid=<?= $row_entorno->identorno?>"><img src="<?=  base_url()?>assets/admin/images/check.png" width="24"></a> - <a href="<?= base_url()?>admin/delete_entorno?eid=<?= $row_entorno->identorno?>"><img src="<?=  base_url()?>assets/admin/images/delete.png" width="24"></a></td>
											</tr>
										<?php $i++;}
								}
							?>
                                                            </tbody>
						</table>
					</td>
					<td width="50%" valign="top" align="center">
						<table width="90%" cellspacing="0" cellpadding="5" border="0" align="center">
							<tr>
								<td width="100%">
									<?= form_open('admin/tendencia')?>
									<div class="formRow">
										<div class="grid3"><?= form_label('Tendencia : ')?></div>
										<div class="grid9"><div class="grid9"><?= form_input('tendencia')?></div></div>
										<div class="clear"></div>
									</div>
									<div class="formRow" >
										<div class="grid9" align="right" style="width: 100%"><input type="submit" class="buttonS bGreen" value="Registrar"/></div>
										<div class="clear"></div>
									</div>
									<?= form_close()?>
								</div>
								</td>
							</tr>
						</table>
							<table class="tDefault checkAll tMedia" width="90%" cellspacing="0" cellpadding="5" border="1" style="border-collapse: collapse; border: 1px solid #000" align="center">
                                                            <thead>
                                                                <tr>
                                                                    <td>N°</td>
                                                                    <td class="sortCol"><div>Descripción<span></span></div></td>
                                                                    <td>Acciones</td>
                                                                </tr>
                                                            </thead>
								<?php
									if(count($tendencia) == 0){?>
										<tr>
											<td align="center" colspan="3"><strong>No se encontró ninguna tendencia registrada.</strong></td>
										</tr>
									<?php }else{
											$i = 1;
											foreach ($tendencia as $row_tendencia){?>
												<tr>
													<td align="center" width="24"><?= $i?></td>
													<td><?= $row_tendencia->tendencia?></td>
													<td align="center" width="120"><a href="<?= base_url()?>admin/edit_tendencia?tid=<?= $row_tendencia->idtendencia?>"><img src="<?=  base_url()?>assets/admin/images/check.png" width="24"></a> - <a href="<?= base_url()?>admin/delete_tendencia?tid=<?= $row_tendencia->idtendencia?>"><img src="<?=  base_url()?>assets/admin/images/delete.png" width="24"></a></td>
												</tr>
											<?php $i++;}
									}
								?>
							</table>
					</td>
				</tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><a href="<?= base_url()?>admin/proceso" style="float: right;margin-right: 25px"><img src="<?= base_url()?>assets/admin/images/next.png" width="24"></a><p style="float: right; margin-top: -10px; margin-right: 5px;">Visión del Futuro II</p></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
			</table>
		</div>
    </div>
    <!-- Main content ends --></div>
