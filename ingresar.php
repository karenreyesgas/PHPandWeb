<?php require_once('Connections/web.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO usuario (NombreUsuario, CorreoElectronico, Contrasena) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['NombreUsuario'], "text"),
                       GetSQLValueString($_POST['CorreoElectronico'], "text"),
                       GetSQLValueString($_POST['Contrasena'], "text"));

  mysql_select_db($database_web, $web);
  $Result1 = mysql_query($insertSQL, $web) or die(mysql_error());
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo2 {color: #99FF99}
.Estilo3 {color: #CCFFFF}
-->
</style>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo4 {font-size: 9px}
.Estilo5 {font-size: 16px}
-->
</style>
</head>

<body style="color: rgb(0, 0, 0); background-color: rgb(255, 255, 204);" alink="#000099" link="#000099" vlink="#990099">
<table style="text-align: left; width: 100%; height: 15%;" border="0" cellpadding="0" cellspacing="0">

  <tbody>
    <tr>
      <td style="vertical-align: top;"><img src="banner.png" style="width: 100%; height: 100%;" alt=""><br>
      </td>
    </tr>
  </tbody>
</table>

<table style="width: 100%; height: 100%;" border="0">

  <tbody>
    <tr>
      <td style="width: 15%; text-align: center;"><img src="publicidad2.gif" style="width: 100%; height: 100%;" alt=""></td>
      <td style="vertical-align: top; width: 70%;">
      <table style="text-align: left; width: 100%; margin-left: auto; margin-right: auto; height: 5%;" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td style="vertical-align: top; height: 1%; width: 100%;">
            <table style="text-align: left; width: 100%; height: 100%;" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td style="vertical-align: top; width: 25%; height: 2%; background-color: rgb(255, 255, 204);"><div align="center">
                    <p><a href="ingresar.php">Registro</a></p>
                    </div>
                    <p align="center" class="Estilo4"><a href="Comentarios.php" class="Estilo5">Comentarios</a></p></td>
                  <td style="vertical-align: top; width: 5%; height: 100%; text-align: center;"><a href="Politica.html"><img src="logotipo.png" alt="" border="0" style="width: 53px; height: 54px;"></a></td>
                  <td style="vertical-align: middle; height: 100%; width: 20%; text-align: center;"><big><big><span style="font-family: Parisien Night;"><a href="TheGameofKnowledge.html">Acerca de nosotros</a></span><br>

                  </big></big></td>
                  <td style="vertical-align: middle; height: 100%; width: 10%; text-align: center;"><big><big><span style="font-family: Parisien Night;"><a href="App.html">Aplicaci&oacute;n</a></span><br>

                  </big></big></td>
                  <td style="vertical-align: middle; text-align: center;"><big><big><span style="font-family: Parisien Night;">Casos de &eacute;xito</span></big></big><small><br>

                  </small></td>
                  <td style="vertical-align: top; width: 25%; background-color: rgb(255, 255, 204);"><span style="font-family: Parisien Night;"><div align="center"><a href="Comentarios.php"><br>
                  </a></div>
                  </span></td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>
      <table style="text-align: left; width: 100%; height: 90%; background-color: rgb(51, 51, 51);" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td style="vertical-align: top; height: 100%; width: 10%; background-color: rgb(51, 51, 51);"><br>
            </td>
            <td style="vertical-align: top; background-color: rgb(153, 153, 153);">
            <table style="text-align: left; width: 100%; height: 100%; background-color: rgb(51, 51, 51);" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td style="vertical-align: middle; font-family: Parisien Night; height: 50%; width: 50%; text-align: center;"><big><big><big><img src="Crea.png" alt="" width="304" height="121" /><br>
                  </big></big></big></td>
                  <td style="vertical-align: middle; height: 50%; width: 50%; text-align: center;"><br>
                  </form>

<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right"><span class="Estilo2">Nombre usuario:</span></td>
      <td><input type="text" name="NombreUsuario" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><span class="Estilo3">C<span class="Estilo2">orreo Electronico:</span></span></td>
      <td><input type="text" name="CorreoElectronico" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><span class="Estilo2">Contrase&ntilde;a:</span></td>
      <td><input type="password" name="Contrasena" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Aceptar"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2">
</form></td>
                </tr>
                <tr>
                  <td colspan="2" style="vertical-align: middle; height: 50%; width: 50%; color: white; text-align: center;"><big><a href="Login.php"><img src="Iniciar.png" alt="" width="615" height="83" border="0" /></a><br>
                  </big><big><big><big><big><big><big><big><span style="font-family: Parisien Night;"></span></big></big></big></big></big></big></big><br>                  </td>
                  </tr>
              </tbody>
            </table>
</td>
            <td style="vertical-align: top; height: 100%; width: 10%; background-color: rgb(51, 51, 51);"><br>
            </td>
          </tr>
        </tbody>
      </table>
      </td>
      <td style="vertical-align: top; width: 15%;"><img src="publicidad3.gif" style="width: 204px; height: 662px;" alt=""><br>
      </td>
    </tr>
  </tbody>
</table>
<form id="form1" name="form1" method="post" action="">
  <label></label>

<p>&nbsp;</p>
</body>
</html>
