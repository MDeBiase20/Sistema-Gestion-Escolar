<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).

$id_pago = $_GET['id'];
$id_estudiante = $_GET['id_estudiante'];

include('../../app/config.php');
include('../../app/controllers/configuraciones/institucion/listado_instituciones.php');
include('../../app/controllers/estudiantes/datos_estudiantes.php');
include('../../app/controllers/pagos/datos_pagos_estudiantes.php');
require_once('../../public/TCPDF-main/tcpdf.php');

//Trayendo datos de la institución
foreach ($instituciones as $institucione) {
    $nombre_institucion = $institucione['nombre_institucion'];
    $direccion = $institucione['direccion'];
    $telefono = $institucione['telefono'];
    $celular = $institucione['celular'];
    $correo = $institucione['correo'];
    $logo = $institucione['logo'];
}
//Trayendo datos de la institución

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(210,297), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor(APP_NAME);
$pdf->setTitle(APP_NAME);
$pdf->setSubject(APP_NAME);
$pdf->setKeywords(APP_NAME);

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(10, 3, 10);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);//esto sirve para sacar la cabecera

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('Times', '', 11, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

//Código QR
$style= array(
    'border' =>0,
    'vpadding'=>0,
    'hpadding'=>0,
    'fgcolor'=>array(0,0,0),
    'bgcolor'=>false,
    'module_width'=>1,
    'module_height'=>1
);

//$QR = "ESTE CONTRATO ES VERIFICADO POR EL SISTEMA '.$nombre_institucion.'";
//$pdf->write2DBarcode($QR, 'QRCODE,L', 176, 10, 30, 30, $style);

// Set some content to print
$html = '

<table border="0">
    <tr>
        <td width="200px"></td>
        
    </tr>

    <tr>
        <td>
            <b>'.$nombre_institucion.'</b> <br>
            <small>'.$direccion.'</small> <br>
            <small>'.$telefono.' | '.$celular.'</small> <br>
            <small>'.$correo.'</small>
        </td>
        <td style="text-align:left"> <h2> <u><b> RECIBO DE CAJA </b></u> </h2> </td>
        
    </tr>
</table>

<p style="text-align:justify"> 

<table >
    <tr>
        <td style="text-align:center">Estudiante: <br><br><br>
            Firma: _________________________<br><br><br>
            Fecha: _________________________
        </td>

        <td style="text-align:center">Institución: <br><br><br>
            Firma: _________________________ <br><br><br>
            Fecha: _________________________    
        </td>

    </tr>
</table>

<br><br><br><br>

Fecha de Emisión: '.$dia_actual.' de '.$mes_actual.' de '.$year_actual.'</p>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('comprobante-'.$nombres.'-'.$apellido.' .pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
