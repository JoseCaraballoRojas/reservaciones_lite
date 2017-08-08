<?php
//Libreria para el manejo de SOAP
require_once('nusoap.php');

//Funciones auxiliares
require_once('tool.php');

/**
 * Funcion que solicita el envio de un mensaje SMS
 *
 * @param double e_TELEFONO: Destino del mensaje
 * @param double e_SMS: Texto del mensaje
 *
 * @return array: Arreglo con los valores resultantes del envio
 */
function pyxter_enviar($e_TELEFONO, $e_SMS)
{
  $e_TIMEOUT = 200;

  $e_TIEMPO_INICIAL = time();

  $e_TRANSACCION = pyxter_solicitar_envio($e_TELEFONO, $e_SMS);

  do
  {
    sleep(1);

    $m_RESPUESTA = pyxter_consultar_envio($e_TRANSACCION);

    if($m_RESPUESTA['ESTADO'] == 'CANCELADO' || $m_RESPUESTA['ESTADO'] == 'FALLIDO')
    {
      throw new Exception($m_RESPUESTA['DETALLES']);
    }

    $e_TIEMPO_TRANSCURRIDO = time() - $e_TIEMPO_INICIAL;
  }
  while($m_RESPUESTA['ESTADO'] != 'ENVIADO' && $e_TIEMPO_TRANSCURRIDO < $e_TIMEOUT);

  if($m_RESPUESTA['ESTADO'] != 'ENVIADO')
  {
    throw new Exception("Timeout");
  }

  return $m_RESPUESTA;
}

/**
 * Funcion que solicita el envio
 *
 * @param double e_TELEFONO: Telefono a recargar
 * @param double e_SMS: Mensaje a enviar
 *
 * @return string: Transaccion enviada
 */
function pyxter_solicitar_envio($e_TELEFONO, $e_SMS)
{
  //URL asignado por el proveedor
  $e_URL = '?';

  //Instancia asignada por el proveedor
  $e_INSTANCIA = '?';

  //Id de entidad asignado por el proveedor
  $e_ENTIDAD_ID = '?';

  //Usuario de la entidad asignado por el proveedor
  $e_ENTIDAD_USUARIO = '?';

  //Contraseña de la entidad asignado por el proveedor
  $e_ENTIDAD_CONTRASENA = '?';

  //Numero de usuario asignado por el proveedor
  $e_USUARIO_NUMERO = '?';

  //Nip del usuario asignado por el proveedor
  $e_USUARIO_NIP = '?';

  //Bolsa asignada por el proveedor
  $e_BOLSA = '?';

  //Timeout para el soap
  $e_TIMEOUT = 60;

  $e_TRANSACCION = 'EXT' . str_pad($e_ENTIDAD_ID, 3, '0', STR_PAD_LEFT) . date('YmdHis') . get_random_string(10);

  $o_WEBSERVICE = new nusoap_client($e_URL, false, false, false, false, false, 0, $e_TIMEOUT);

  //Se preparan los parametros a enviar
  $m_PARAMS_WEBSERVICE = array
  (
    'instancia' => $e_INSTANCIA,
    'entidad' => json_encode(array('USUARIO' => $e_ENTIDAD_USUARIO, 'CONTRASENA' => $e_ENTIDAD_CONTRASENA)),
    'usuario' => json_encode(array('TIPO_USUARIO' => 'PYXTER', 'NUMERO' => $e_USUARIO_NUMERO, 'NIP' => $e_USUARIO_NIP)),
    'transaccion' => $e_TRANSACCION,
    'nodo' => $e_USUARIO_NUMERO,
    'bolsa' => $e_BOLSA,
    'destino' => $e_TELEFONO,
    'sms' => $e_SMS
  );

  $o_WEBSERVICE->call('envio_solicitar', $m_PARAMS_WEBSERVICE);

  //Se evalua si hubo errores
  if($o_WEBSERVICE->fault)
  {
    throw new Exception("{$o_WEBSERVICE->faultcode}, {$o_WEBSERVICE->faultstring}");
  }
  elseif($o_WEBSERVICE->error_str)
  {
    throw new Exception("{$o_WEBSERVICE->error_str}, {$o_WEBSERVICE->responseData}");
  }

  return $e_TRANSACCION;
}

/**
 * Funcion que revisa el estado de la solicitud
 *
 * @param string e_TRANSACCION: Identificador de la solicitud
 *
 * @return array: Estado de la solicitud
 */
function pyxter_consultar_envio($e_TRANSACCION)
{
  //URL asignado por el proveedor
  $e_URL = '?';

  //Instancia asignada por el proveedor
  $e_INSTANCIA = '?';

  //Usuario de la entidad asignado por el proveedor
  $e_ENTIDAD_USUARIO = '?';

  //Contraseña de la entidad asignado por el proveedor
  $e_ENTIDAD_CONTRASENA = '?';

  //Numero de usuario asignado por el proveedor
  $e_USUARIO_NUMERO = '?';

  //Nip del usuario asignado por el proveedor
  $e_USUARIO_NIP = '?';

  //Timeout para el soap
  $e_TIMEOUT = 60;

  $o_WEBSERVICE = new nusoap_client($e_URL, false, false, false, false, false, 0, $e_TIMEOUT);

  //Se preparan los parametros a enviar
  $m_PARAMS_WEBSERVICE = array
  (
    'instancia' => $e_INSTANCIA,
    'entidad' => json_encode(array('USUARIO' => $e_ENTIDAD_USUARIO, 'CONTRASENA' => $e_ENTIDAD_CONTRASENA)),
    'usuario' => json_encode(array('TIPO_USUARIO' => 'PYXTER', 'NUMERO' => $e_USUARIO_NUMERO, 'NIP' => $e_USUARIO_NIP)),
    'transaccion' => $e_TRANSACCION,
    'nodo' => $e_USUARIO_NUMERO
  );

  $m_RETURN = $o_WEBSERVICE->call('consultar_envio', $m_PARAMS_WEBSERVICE);

  return $m_RETURN;
}
?>
