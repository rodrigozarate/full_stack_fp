<?php
echo "<div id=\"brand\" class=\"my-brand\">";
echo "<h3>";
$my_company = new consultaCompany;
        $cual_company = $my_company->consultarCompany($_SESSION['company_usuario'],$conexion);
echo $cual_company[0];
echo "</h3>";
echo "</div>";
?>