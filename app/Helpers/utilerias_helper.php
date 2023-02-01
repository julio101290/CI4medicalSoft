<?php

function strMenuActivo($strMenu1, $strMenu2) {
    if ($strMenu1 == $strMenu2) {
        $respuesta = 'class="active"';
    } else {
        $respuesta = "";
    }
    return $respuesta;
}

//SI LA VARIABLE ESTA VACIA O NO SETA DECLARADA MANDARA CERO SIEMPRE, ES COMO EL VAL DE VISUAL BASIC 6.0

function esCero($value) {

    if (empty($value)) {
        return "0";
    } else {
        return $value;
    }
}

//FECHA SQL PARA GUARDAR EN BASE DE DATOS

function fechaSQL($fecha) {

    return date("Ymd", strtotime($fecha));
}

// CONVIERTE FECHA MYSQLDATETIME A HTML5
function fechaMySQLADateTimeHTML5($fecha) {

    return date("Y-m-d", strtotime($fecha)) . "T" . date("H:i:s", strtotime($fecha));
}

function agregarMinutos($fecha, $minutos) {


    return date("Y/m/d h:i:s", strtotime($fecha . "+ $minutos minutes"));

    /*
      $fecha1= new DateTime($fecha);
      $fecha1->add(new DateInterval('PT10H30S'));
      return $date->format('Y-m-d H:i:s') . "\n";
     * 
     */
}

//CONVIERTE LA FECHA EN PERIODO
function fechaPeriodo($fecha) {

    return date("Ym", strtotime($fecha));
}

//OBTIENE FECHA ACTUAL
function fechaActual() {

    return date("Y/m/d");
}

//OBTIENE FECHA HORA ACTUAL

function fechaHoraActual() {

    return date("Y-m-d H:i:s ", time());
}

//DIFERENCIA ENTRE MINUTOS
function diferenciaMinutos($fecha_i, $fecha_f) {
    $minutos = (strtotime($fecha_i) - strtotime($fecha_f)) / 60;

    $minutos = abs($minutos);
    $minutos = floor($minutos);

    return $minutos;
}

function strSellar($llave, $password, $cadenaOriginal) {


    $archivoPem = "/tmp/llave.key.pem";
    $comando = "openssl pkcs8 -inform DER -in $llave -passin pass:$password -out $archivoPem";

    exec($comando);
    $sello = "ok";

    //Sellar
    $archivo = openssl_pkey_get_private(file_get_contents($archivoPem));
    $sig = "";
    openssl_sign($cadenaOriginal, $sig, $archivo, OPENSSL_ALGO_SHA256);

    $sello = base64_encode($sig);

    return $sello;
}

//SOLO DIA
function dia($fecha) {

    return date("d", strtotime($fecha));
}

//SOLO MES
function mes($fecha) {

    return date("m", strtotime($fecha));
}

//SOLO AÑO
function año($fecha) {

    return date("Y", strtotime($fecha));
}

//GENERA UUID
function generaUUID() {


    $uuid = service('uuid');
    $uuid4 = $uuid->uuid4();
    $string = $uuid4->toString();
    
    return $string;

}
