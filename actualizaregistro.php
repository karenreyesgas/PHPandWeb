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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE usuario SET idUsuario=%s, CorreoElectronico=%s, Contrasena=%s WHERE NombreUsuario=%s",
                       GetSQLValueString($_POST['idUsuario'], "int"),
                       GetSQLValueString($_POST['CorreoElectronico'], "text"),
                       GetSQLValueString($_POST['Contrasena'], "text"),
                       GetSQLValueString($_POST['NombreUsuario'], "text"));

  mysql_select_db($database_web, $web);
  $Result1 = mysql_query($updateSQL, $web) or die(mysql_error());
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_web, $web);
$query_Recordset1 = "SELECT * FROM comentarios";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $web) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label>nombre</label>
    <input type="text" name="textfield" />
  </p>
  <p>
    <label>
    <input type="submit" name="Submit" value="Enviar" />
    </label>
  </p>
</form>
<table border="1">
  <tr>
    <td width="609">&nbsp;
      <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
        <table align="center">
          <tr valign="baseline">
            <td nowrap align="right">IdUsuario:</td>
            <td><input type="text" name="idUsuario" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">NombreUsuario:</td>
            <td><?php echo $row_Recordset1['NombreUsuario']; ?></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">CorreoElectronico:</td>
            <td><input type="text" name="CorreoElectronico" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">Contrasena:</td>
            <td><input type="text" name="Contrasena" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td><input type="submit" value="Actualizar registro"></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form2">
        <input type="hidden" name="NombreUsuario" value="<?php echo $row_Recordset1['NombreUsuario']; ?>">
      </form>
    <p>&nbsp;</p></td>
  </tr>
  <?php do { ?>
    <tr>
      <td height="23">&nbsp;</td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
