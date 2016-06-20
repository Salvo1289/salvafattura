<?php
require('fpdf.php');
require ('FPDF_table.php');

class PDF extends FPDF
{
// Page header
    function Header()
    {
        // Logo
        $this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Title',1,0,'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

}
//Example//
require_once('fpdf.php');
require_once('FPDF_table.php');

////Creation of the FPDF object
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',12);
$pdf->SetXY(20,30);
//PDF content before table
$pdf->MultiCell(0, 5, 'Zeldabomboniere.it ' . "\n" . 'Via dell industria num.2' . "\n" . '00050 Santa Severe (RM)', 0, 'center');

$pdf->SetXY(140,50);
//PDF content before table
$pdf->MultiCell(0, 5, 'Zeldabomboniere.it ' . "\n" . 'Via dell industria num.2' . "\n" . '00050 Santa Severe (RM)', 0, 'center');

//Creation of the FPDF Table with required methoda
$pdf_table=new FPDF_Table($pdf);
$pdf_table->setTableHeader(array("Quantità","Descrizione","Prezzo"));
$pdf_table->setDefaultCellWidth(50);
$pdf_table->addRow(array("1","Nastro Gros Grein","3,80 euro"));
//Printing
$pdf_table->printTable();
//PDF Content After table
$pdf->Write(14,"Content After Table");
$pdf->Output();
?>