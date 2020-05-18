<?php
// ------------------------------------ VALIDA SESION ---------------------------

session_start();

if($_SESSION['autentico']!="yes"){	
	header("Location: inicio.php");
	exit();
}
else{
	$folio=$_SESSION['folio'];

	if($folio=="1"){
		if($_SESSION['id']==2){
			header("Location: sesion.php");
		}
		else{
			header("Location: sesion_admin.php");
		} 
	}

}

// -------------------------------------------------------------------------
require 'html2pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

//la línea siguimete muestra los parámetros para el tipo de hoja
//$pdf = new Html2Pdf('P','A4','es','true','UTF-8');
$pdf = new Html2Pdf();

// RECOGE EL CONTENIDO DE LA PAGINA DONDE SE FABRICA EL TICKET
ob_start();
require_once 'ticket_pagina.php';
$html=ob_get_clean();
$pdf->writeHTML($html);
$pdf->output('TICKET DE COMPRA.pdf');

?>