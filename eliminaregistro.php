<?php require_once('Connections/web.php'); ?>
<?php
$colname_Recordset1 = "-1";
if (isset($_POST['CorreoElectronico'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_POST['CorreoElectronico'] : addslashes($_POST['CorreoElectronico']);
}
mysql_select_db($database_web, $web);
$query_Recordset1 = sprintf("SELECT * FROM usuario WHERE CorreoElectronico = '%s' ORDER BY CorreoElectronico ASC", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $web) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<form id="form2" name="form2" method="post" action="">
  <label>eliminar correo
  <input type="text" name="textfield" />
  </label>
  <p>
    <label>
    <input type="submit" name="Submit" value="eliminar" />
    </label>
  </p>
  
  <table border="1">
    <tr>
      <td>idUsuario</td>
      <td>NombreUsuario</td>
      <td>CorreoElectronico</td>
      <td>Contrasena</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['idUsuario']; ?></td>
        <td><?php echo $row_Recordset1['NombreUsuario']; ?></td>
        <td><?php echo $row_Recordset1['CorreoElectronico']; ?></td>
        <td><?php echo $row_Recordset1['Contrasena']; ?></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
