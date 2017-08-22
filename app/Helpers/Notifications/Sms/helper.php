<?php
//app/Helpers/Notifications/Sms/helper.php

function enviarSms($telefono='', $mensaje='')
{
    //Libreria para el manejo de Pyxter
    require_once('pyxter.php');

    //Telefono destino
    $e_TELEFONO = $telefono;

    //SMS
    $e_SMS = $mensaje;
    //dd($e_TELEFONO);
    try
    {
      $m_RESPUESTA = pyxter_enviar($e_TELEFONO, $e_SMS);

    }
    catch(Exception $o_EXCEPTION)
    {
      $excepcion = $o_EXCEPTION->getMessage();
      return  $excepcion;

    }
    $respuesta = $m_RESPUESTA['ESTADO'];
    return $respuesta;

}

  ?>
