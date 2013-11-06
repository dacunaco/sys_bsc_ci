<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang=es>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="<?= base_url()?>assets/login/images/icono.png" type="image/x-icon" />	
		<title>..:: Instituto Superior Tecnológico Nor Oriental de la Selva ::.. - Login</title>	
		<script type="text/javascript" src="<?= base_url()?>assets/login/js/jquery.js"></script>		
		<script type="text/javascript" src="<?= base_url()?>assets/login/js/functions.ajax.js"></script>
		<!--[if gte IE 9]>
		  <style type="text/css">
			.gradient {
			   filter: none;
			}
		  </style>
		<![endif]-->
                <link href="<?= base_url()?>assets/login/css/styles.css" type="text/css" media="screen" rel="stylesheet" />		<style type="text/css">
		img, div { behavior: url(iepngfix.htc) }
		</style>
	</head>
	<body id="login">
		<img class="background-image" src="<?= base_url()?>assets/login/images/bg.png">
		<div id="wrappertop"></div>
			<div id="wrapper">
					<div id="alertBoxes"></div>
					<div id="content">
						<div id="header">
							<h1><a href="<?= base_url()?>"><img src="<?= base_url()?>assets/login/images/logo.png" style="margin-top: -15px !important;"></a></h1>
						</div>
						<div id="darkbanner" class="banner320">
							<h2>Acceso al Sistema</h2>
						</div>
						<div id="darkbannerwrap">
						</div>
						<?= form_open();?>
						<fieldset class="form">
                                                    <p>
								<label for="user_name">Usuario:</label>
                                                                <?= form_input(array('name' => 'login_username','id' => 'login_username','placeholder' => 'Ingrese usuario'));?>
							</p>
							<p>
								<label for="user_password">Contraseña:</label>
                                                                <?= form_password(array('name' => 'login_userpass', 'id' => 'login_userpass','placeholder' => 'Ingrese contraseña'));?>
							</p>
                                                        <?= form_button(array('class' => 'positive', 'id' => 'login_userbttn', 'content' => img(base_url().'assets/login/images/key.png')."Acceder", 'alt' => 'Announcement'))?>
                                                        &nbsp;<span class="timer" id="timer"></span>
                            						</fieldset>
                                                <?= form_close();?>
						<div id="wrapperbottom_branding" style="background: #00a85a; padding-top:2px;"><div id="wrapperbottom_branding_text" style="background: #00a85a;color: #fff;">Instituto Supeior Tecnológico <a href="" style='text-decoration:none;color: #fff;'>Nor Oriental de la Selva</a>. <a href="" style='text-decoration:none; color: #fff;'> - Área de Planificación y Dirección.</a></div></div>
					</div>
					
				</div>   


</body>
</html>
