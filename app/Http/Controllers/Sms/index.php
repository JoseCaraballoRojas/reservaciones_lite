<?

//Libreria para el manejo de Pyxter
require_once('pyxter.php');

//Telefono destino
$e_TELEFONO = '?';

//SMS
$e_SMS = '?';

try 
{
  $m_RESPUESTA = pyxter_enviar($e_TELEFONO, $e_SMS);
}
catch(Exception $o_EXCEPTION)
{
  echo($o_EXCEPTION->getMessage());
}

echo($m_RESPUESTA['ESTADO']);
?>