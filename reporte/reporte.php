<?php
require('../fpdf/fpdf.php');

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
$pdf->Cell(80,8,utf8_decode('Escuela: Profr. Manuel Romero Camacho'),1,0,'L',0);
$pdf->Cell(40,8,utf8_decode('Clave: 25DPR1821R'),1,0,'L',0);
$pdf->Cell(45,8,utf8_decode('Turno: Tiempo matutino'),1,1,'L',0);
$pdf->SetX(25);
$pdf->Cell(35,8,utf8_decode('Zona: 018'),1,0,'L',0);
$pdf->Cell(35,8,utf8_decode('Sector: I'),1,0,'L',0);
$pdf->Cell(95,8,utf8_decode('Domicilio: Infornavit Bachomo'),1,1,'L',0);
$pdf->SetX(25);
$pdf->Cell(70,8,utf8_decode('Localidad: Los Mochis, Sinaloa'),1,0,'L',0);
$pdf->Cell(95,8,utf8_decode('Teléfono:'),1,1,'L',0);
$pdf->SetX(25);
$pdf->Cell(70,8,utf8_decode('No. de Padre de Familia: 150'),1,0,'L',0);
$pdf->Cell(95,8,utf8_decode('Cuota de Padres de Familia: $1,000.00'),1,1,'R',0);
$pdf->SetX(25);
$pdf->Cell(70,8,utf8_decode('Total de Alumnos: 190'),1,0,'L',0);
$pdf->Cell(95,8,utf8_decode('Total de Grupos: 6'),1,1,'R',0);
$pdf->SetX(25);
$pdf->Cell(165,4,utf8_decode(' '),0,1,'C',0);
$pdf->SetX(25);
$pdf->Cell(165,6,utf8_decode('A. INGRESOS ECONÓMICOS'),1,1,'L',0);
$pdf->SetX(25);
$pdf->Cell(120,6,utf8_decode('TOTAL DE INGRESOS PRIMER PERIODO'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode('0.00'),1,1,'R',0);
$pdf->SetX(25);
$pdf->Cell(120,6,utf8_decode('a) Por aportaciones de A.P.F. hechas de Junio a Diciembre'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode('100,000.00'),1,1,'R',0);
$pdf->SetX(25);
$pdf->Cell(120,6,utf8_decode('b) Por actividades realizadas.'),1,0,'L',0);
$pdf->Cell(5,6,utf8_decode('$'),1,0,'L',0);
$pdf->Cell(40,6,utf8_decode('15,000.00'),1,1,'R',0);
$pdf->SetX(25);

$pdf->Output();
?>