<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <?php
		header('Content-type: text/html; charset=utf-8');
        //------------------------
        //header("Expires: Mon, 20 Mar 1998 12:01:00 GMT");
        //header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        //header("Cache-Control: no-store, no-cache, must-revalidate");
        //header("Cache-Control: post-check=0, pre-check=0", false);
        //header("Pragma: no-cache");
        //------------------------

		echo "<title>Cegit Web</title>";
		
		echo "<link rel='stylesheet' href='".base_url()."css/screen.css' type='text/css' media='screen, projection'/>";
		echo "<link rel='stylesheet' href='".base_url()."css/print.css' type='text/css' media='print'/>";
		echo "<!--[if IE]>";
		echo "  <link rel='stylesheet' href='".base_url()."css/ie.css' type='text/css' media='screen, projection'/>";
		echo "<![endif]-->";
		echo "<link rel='stylesheet' href='".base_url()."css/style.css' type='text/css' media='screen, projection'/>";
		echo "<link href='" . base_url() . "css/cwcalendar.css' rel='stylesheet' type='text/css' />";
		
		echo "<script type='text/javascript' src='".base_url()."js/calendar.js'></script>";        
		echo "<script type='text/javascript' src='".base_url()."js/jquery.js'></script>"; 
        echo "<link rel='stylesheet' href='".base_url()."css/stylemenu.css' type='text/css' media='screen, projection'/>";		
		echo "<script type='text/javascript' language='javascript' src='".base_url()."js/jquery.dropdownPlain.js'></script>";
		echo "<!--[if IE 7]>
				<link rel='stylesheet' type='text/css' href='".base_url()."css/iemenu.css' media='screen' />
			<![endif]-->";	
		echo "<script type='text/javascript' src='".base_url()."js/jquery.validate.js'></script>";
        ?>
    </head>
    <body>        
		<div class="container">
		<?php                            
            date_default_timezone_set('America/La_Paz');
			$this->load->view('vista_cabezera');
            if(! isset($VistaMenu) || $VistaMenu)
                $this->load->view('vista_menu_prueba');
			$this->load->view($VistaPrincipal);
			$this->load->view('vista_pie');
        ?>
		</div>
    </body>
</html>