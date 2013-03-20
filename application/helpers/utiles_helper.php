<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function ConsonanteAleatoria($Longitud) {
	$Letras = 'bcdfFgjJlmnNpPqQrstvyzZ';  //23 car
	$s = '';
	for($i=0; $i<$Longitud; $i++)
		$s .= $Letras[rand(0, strlen($Letras)-1)];
	return $s;
}

function VocalAleatoria($Longitud) {
	$Letras = 'aAeEiouU';
	$s = '';
	for($i=0; $i<$Longitud; $i++)
		$s .= $Letras[rand(0, strlen($Letras)-1)];
	return $s;
}

function ClavePronunciable() {
	return ConsonanteAleatoria(1) . VocalAleatoria(1) . ConsonanteAleatoria(1) .
            VocalAleatoria(1) . ConsonanteAleatoria(1) . VocalAleatoria(1) .
            rand(11,99);
}

function FechaLiteral($Fecha, $Formato=2) {
    $dias = array(1=>'Lunes', 2=>'Martes', 3=>'Mi�rcoles', 4=>'Jueves', 5=>'Viernes', 6=>'S�bado', 7=>'Domingo');
    $meses = array(1=>'enero', 2=>'febrero', 3=>'marzo', 4=>'abril', 5=>'mayo', 6=>'junio',
                   7=>'julio', 8=>'agosto', 9=>'septiembre', 10=>'octubre', 11=>'noviembre', 12=>'diciembre');    
    $aux = date_parse($Fecha);
    switch ($Formato) {
        case 1:  // 04/10/10
            return date('d/m/y', $Fecha);
        case 2:  //04/oct/10
            return sprintf('%02d/%s/%02d', $aux['day'], substr($meses[$aux['month']],0,3), $aux['year'] % 100);
        case 3:   //octubre 4, 2010
            return $meses[$aux['month']] . ' '.sprintf('%.2d',$aux['day']).', '.$aux['year'];
        case 4:   // 4 de octubre de 2010
            return $aux['day'].' de ' . $meses[$aux['month']] . ' de '.$aux['year'];
        case 5: 
            return date('d/m/Y', $Fecha);       
        default: 
            return date('d/m/Y', $Fecha);
    }
}

function FechaHoraLiteral($Fecha, $Formato=2) {
    $FechaPHP = strtotime( $Fecha );
    $Hora = date( 'H:i', $FechaPHP );
    $Fecha = FechaLiteral($Fecha, $Formato);
    return $Fecha.' '.$Hora;
}

//recibe la fecha en formato dd/mm/aaaa o dd-mm-aaaa
//y convierte a aaaa-mm-dd
function FechaParaMySQL($Fecha) {
    if( $Fecha!='') {
        $Fecha = strtr($Fecha, '-', '/');  //convierte a dd/mm/aaaa
        $Fecha = implode( '/', array_reverse( explode( '/', $Fecha ) ) ) ;
    }
    return $Fecha;
}

//recibe la fecha en formato aaaa/mm/dd o aaaa-mm-dd
//y convierte a dd/mm/aaaa
function FechaDeMySQL($Fecha) {
    if( $Fecha!='') {
        $Fecha = strtr($Fecha, '-', '/');  //convierte a aaaa/mm/dd
        $Fecha = implode( '/', array_reverse( explode( '/', $Fecha ) ) ) ;
    }
    return $Fecha;
}
    
function Genero($str) {
    if($str=="M")
        return "Masculino";
    else if($str=="F")
        return "Femenino";
}

/* End of file utiles.php */