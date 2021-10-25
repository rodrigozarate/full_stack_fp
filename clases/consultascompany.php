<?php
class consultaCompany {
		
	function listarCompany($conexion) {
		$stmt = $conexion->prepare("SELECT id_company, nombre_company, nit_company, telefono_company, email_company FROM company WHERE '1'");
		$stmt->execute();
		$stmt->bind_result($id_company, $nombre_company, $nit_company, $telefono_company, $email_company);
		$datosCompany = array();
		while($stmt->fetch()){
		$datosCompany[]=array($id_company, $nombre_company, $nit_company, $telefono_company, $email_company);
			}
		return $datosCompany;
		$stmt->close();
		}
		
		
		function consultarCompany($q_company,$conexion) {
		$stmt = $conexion->prepare("SELECT nombre_company, nit_company, telefono_company, email_company FROM company WHERE id_company = ?");
		$stmt->bind_param('i', $q_company);
		$stmt->execute();
		$stmt->bind_result($nombre_company, $nit_company, $telefono_company, $email_company);
		$stmt->fetch();
		$datosCompany = array($nombre_company, $nit_company, $telefono_company, $email_company);
		return $datosCompany;
		$stmt->close();
		
		}
		
		function editarCompany($nombre_company, $nit_company, $telefono_company, $email_company, $q_company, $conexion) {
		
		$stmt = $conexion->prepare("UPDATE company SET nombre_company = ?, nit_company = ?, telefono_company = ?, email_company = ? WHERE id_company = ?");
		
		$stmt->bind_param('ssssi', $nombre_company, $nit_company, $telefono_company, $email_company, $q_company);
		
		$stmt->execute();
	
		return $stmt;
		$stmt->close();
		
		}
			
			// crear usuario
		
		function crearCompany($nombre_company, $nit_company, $telefono_company, $email_company, $conexion) {
			
		$stmt = $conexion->prepare("INSERT INTO company(nombre_company, nit_company, telefono_company, email_company) VALUES (?,?,?,?)");
		
		$stmt->bind_param('ssss', $nombre_company, $nit_company, $telefono_company, $email_company);
		
		$stmt->execute();
	
		return $stmt;
		
		$stmt->close();
		
		}
		
		
	}
?>