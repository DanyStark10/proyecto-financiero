<?php

require ('../fpdf/fpdf.php');

include_once "../model/db.php";
session_start();
$usuario = $_SESSION['username'];
$rol = $_SESSION['rol'];
$escuela = $_SESSION['escuela'];
$Year = date("Y");
//echo $_POST["txtPeriodo"];
if ($_POST["txtPeriodo"] != '4'){
        if($rol == '1'){
                if(empty($_POST["txtID"]) ){
                        header('Location: ../reporte.php?mensaje=falta');
                        exit();
                }else{
                        $id = $_POST["txtID"];
                }
        }else{
                if(empty($_POST["txtPeriodo"]) ){
                        header('Location: ../reporte.php?mensaje=falta');
                        exit();
                }else{
                        $id = $_GET['escuela'];
                }
                
        }
}


if($_POST["txtPeriodo"] == '1'){
        $inicio = $Year . "-01-01";
        $fin = $Year . "-06-30";
        $periodo = "Enero a Jrnio";
}else if($_POST["txtPeriodo"] == '2'){
        $inicio = $Year . "-07-01";
        $fin = $Year . "-12-31";
        $periodo = "Julio a Diciembre";
}else if($_POST["txtPeriodo"] == '3'){
        header('Location: periodo.php?escuela='.$id);
        exit();
}else if($_POST["txtPeriodo"] == '4'){
        if(empty($_POST["txtInicio"]) || empty($_POST["txtFinal"])){
                header('Location: periodo.php?mensaje=falta');
                exit();
        }else{
                $id = $_POST["txtEscuela"];
                $inicio = $_POST["txtInicio"];
                $fin = $_POST["txtFinal"];
                $periodo = "De " . $inicio . " a " . $fin;
        }
}
//[$id]
//Datos de la escuela
$sentencia = $bd -> query("select * from escuela where id_escuela = '$id'");
$sentencia->execute();
$escuela = $sentencia->fetchall(PDO::FETCH_ASSOC);
//echo 'hola';
class PDF extends FPDF
{

}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Image('logo.png',15,8,60);
$pdf->setXY(80,15);
$pdf->Cell(120,6,utf8_decode('GOBIERNO DEL ESTADO DE SINALOA'),0,1,'C',0);
$pdf->SetX(80);
$pdf->Cell(120,6,utf8_decode('SECRETARÍA DE EDUCACIÓN PUBLICA Y CULTURA'),0,1,'C',0);
$pdf->SetX(80);
$pdf->Cell(120,6,utf8_decode('DIRECCIÓN DE VINCULACIÓN SOCIAL'),0,1,'C',0);
$pdf->SetX(80);
$pdf->Cell(120,3,' ',0,1,'C',0);
$pdf->SetX(25);
$pdf->Cell(165,8,utf8_decode('COORDINACIÓN ESTATAL DE UNIDADES DE ATENCIÓN A PADRES DE FAMILIA'),0,1,'C',0);
$pdf->SetX(25);
$pdf->Cell(165,6,utf8_decode('SEGUNDO Informe Financiero de las Asociaciones de Padres de Familia'),0,1,'C',0);
$pdf->SetX(25);
$pdf->Cell(165,6,utf8_decode('Ciclo escolar 2021 - 2022'),0,1,'C',0);
$pdf->SetX(25);
$pdf->Cell(165,2,utf8_decode(' '),0,1,'C',0);
$pdf->SetX(25);
$pdf->Cell(80,8,utf8_decode('Nombre: '.  $escuela[0]['nombre']),1,0,'L',0);
$pdf->Cell(40,8,utf8_decode('Clave: ' . $escuela[0]['clave']),1,0,'L',0);
$pdf->Cell(45,8,utf8_decode('Turno: ' . $escuela[0]['tipo_turno']),1,1,'L',0);
$pdf->SetX(25);
$pdf->Cell(35,8,utf8_decode('Zona: ' . $escuela[0]['zona']),1,0,'L',0);
$pdf->Cell(35,8,utf8_decode('Sector: ' . $escuela[0]['sector']),1,0,'L',0);
$pdf->Cell(95,8,utf8_decode('Domicilio: ' . $escuela[0]['domicilio']),1,1,'L',0);
$pdf->SetX(25);
$pdf->Cell(70,8,utf8_decode('Localidad: '. $escuela[0]['localidad']),1,0,'L',0);
$pdf->Cell(95,8,utf8_decode('Teléfono: ' . $escuela[0]['telefono']),1,1,'L',0);
$pdf->SetX(25);
$pdf->Cell(70,8,utf8_decode('No. de Padre de Familia: ' . $escuela[0]['cant_padres']),1,0,'L',0);
$pdf->Cell(95,8,utf8_decode('Cuota de Padres de Familia: $' . $escuela[0]['cuota_padres']),1,1,'R',0);
$pdf->SetX(25);
$pdf->Cell(70,8,utf8_decode('Total de Alumnos: '. $escuela[0]['cant_alumnos']),1,0,'L',0);
$pdf->Cell(95,8,utf8_decode('Total de Grupos: ' . $escuela[0]['cant_grupos']),1,1,'R',0);
$pdf->SetX(25);
$pdf->Cell(165,4,utf8_decode(' '),0,1,'C',0);
$pdf->SetX(25);

//Ingresos Económicos

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from ingresos where id_tipo_ingreso = '1' and id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$ingreso1 = $sentencia->fetchall(PDO::FETCH_ASSOC);
//echo 'hola';
$pdf->Cell(165,6,utf8_decode('A. INGRESOS ECONÓMICOS'),1,1,'L',0);
$pdf->SetX(25);
$pdf->Cell(120,6,utf8_decode('TOTAL DE INGRESOS PRIMER PERIODO'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode('0.00'),1,1,'R',0);
$pdf->SetX(25);
$pdf->Cell(120,6,utf8_decode('a) Por aportaciones de A.P.F. hechas de ' . $periodo),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode($ingreso1[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from ingresos where id_tipo_ingreso = '2' and id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$ingreso2 = $sentencia->fetchall(PDO::FETCH_ASSOC);

$pdf->Cell(120,6,utf8_decode('b) Por actividades realizadas.'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode($ingreso2[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from ingresos where id_tipo_ingreso = '3' and id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$ingreso3 = $sentencia->fetchall(PDO::FETCH_ASSOC);

$pdf->Cell(165,6,utf8_decode('c) Otros ingresos (especifique):'),1,1,'L',0);
$pdf->SetX(25);
$pdf->Cell(20,6,utf8_decode(' '),1,0,'L',0);
$pdf->Cell(100,6,utf8_decode('--'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode($ingreso3[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from ingresos where id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$totalIngreso = $sentencia->fetchall(PDO::FETCH_ASSOC);
$activo = floatval($totalIngreso[0]['cantidad']);
$pdf->Cell(120,8,utf8_decode('TOTAL DE INGRESOS:'),1,0,'R',0);
$pdf->Cell(5,8,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,8,utf8_decode($totalIngreso[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);
$pdf->Cell(165,4,utf8_decode(' '),0,1,'C',0);
$pdf->SetX(25);

//  Egresos Registrados

$pdf->Cell(165,6,utf8_decode('B. EGRESOS REGISTRADOS'),1,1,'L',0);
$pdf->SetX(25);
$pdf->Cell(120,6,utf8_decode('TOTAL DE EGRESOS PRIMER PERIODO'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode('0.00'),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from egresos where id_tipo_egreso = '1' and id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$egreso1 = $sentencia->fetchall(PDO::FETCH_ASSOC);

$pdf->Cell(120,6,utf8_decode('a) Construcción de aulas y anexos escolares'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode($egreso1[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from egresos where id_tipo_egreso = '2' and id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$egreso2 = $sentencia->fetchall(PDO::FETCH_ASSOC);

$pdf->Cell(120,6,utf8_decode('b) Reparación y mnetenimiento de edificios y anexos'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode($egreso2[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from egresos where id_tipo_egreso = '3' and id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$egreso3 = $sentencia->fetchall(PDO::FETCH_ASSOC);

$pdf->Cell(120,6,utf8_decode('c) Adquisición de mobiliario y equipo'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode($egreso3[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from egresos where id_tipo_egreso = '4' and id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$egreso4 = $sentencia->fetchall(PDO::FETCH_ASSOC);
//
$pdf->Cell(120,6,utf8_decode('d) Reparación y mantenimiento de mobiliario y equipo'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode($egreso4[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from egresos where id_tipo_egreso = '5' and id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$egreso5 = $sentencia->fetchall(PDO::FETCH_ASSOC);

$pdf->Cell(120,6,utf8_decode('e) Papelería, artículos escolares y material deportivo'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode($egreso5[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from egresos where id_tipo_egreso = '6' and id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$egreso6 = $sentencia->fetchall(PDO::FETCH_ASSOC);

$pdf->Cell(120,6,utf8_decode('f) Viajes por comisión'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode($egreso6[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from egresos where id_tipo_egreso = '7' and id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$egreso7 = $sentencia->fetchall(PDO::FETCH_ASSOC);

$pdf->Cell(120,6,utf8_decode('g) Otros'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode($egreso7[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);

$sentencia = $bd -> query("SELECT SUM(monto) as cantidad from egresos where id_escuela = '$id' and fecha BETWEEN '$inicio' AND '$fin';");
$sentencia->execute();
$totalEgreso = $sentencia->fetchall(PDO::FETCH_ASSOC);
$pasivo = floatval($totalEgreso[0]['cantidad']);

$pdf->Cell(120,8,utf8_decode('TOTAL DE EGRESOS:'),1,0,'R',0);
$pdf->Cell(5,8,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,8,utf8_decode($totalEgreso[0]['cantidad']),1,1,'R',0);
$pdf->SetX(25);
$pdf->Cell(165,4,utf8_decode(' '),0,1,'C',0);
$pdf->SetX(25);

$saldo = $activo - $pasivo;

$pdf->Cell(120,8,utf8_decode('SALDO:'),1,0,'R',0);
$pdf->Cell(5,8,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,8,utf8_decode($saldo),1,1,'R',0);
$pdf->SetX(25);
$pdf->Cell(165,4,utf8_decode(' '),0,1,'C',0);
$pdf->SetX(25);

$pdf->Output();
?>