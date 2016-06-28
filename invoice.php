<?php
require_once ('PDF.php');
date_default_timezone_set('europe/rome');
setlocale(LC_ALL, 'ita');
$data = strftime('%m-%d-%Y');
?>
<?php
$nome = $_GET ['nome'];
$indirizzo= $_GET ['indirizzo'];
$città= $_GET ['città'];
$provincia= $_GET ['provincia'];
$cap = $_GET ['cap'];
$piva =$_GET ['piva'];
$fn = $_GET ['fn'];
    if (empty($_GET['nome'])) {
        header('Location: form.php?status=0'); exit;
    } else {
        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetXY(20, 30);

//PDF content prima della tabella
        $pdf->MultiCell(0, 5, 'Zeldabomboniere.it ' . "\n" . 'Via dell industria num.2' . "\n" . '00050 Santa Severe (RM)', 0, 'center');
        $pdf->SetXY(20, 70);
        $pdf->Write(14, "Fattura num: $fn , del $data");

        $pdf->SetXY(140, 50);
        $pdf->MultiCell(0, 5, "$nome" . "\n" . "$indirizzo" . "\n" . "$città" . ", $cap" . ", $provincia". "\n" . "$piva" , 0, 'center');


//Creazione della tabella
        $pdf_table = new FPDF_Table($pdf);
        $pdf_table->setTableHeader(array("Quantità", "Descrizione", "Prezzo"));
        $pdf_table->setDefaultCellWidth(50);
        $pdf_table->addRow(array("1", "$nome", "3,80"));
        $pdf_table->addRow(array("1", "$nome", "3,80"));
        $pdf_table->addRow(array("1", "$nome", "3,80"));
        $pdf_table->addRow(array("1", "$nome", "3,80"));
        $pdf_table->addRow(array("1", "$nome", "3,80"));


//Stampa tabella
        $pdf_table->printTable();
//PDF 
        $pdf->Output();

    }
?>
