<?php
require "fpdf.php";
include("../bins/connections.php");

class myPDF extends FPDF{
    function header(){
        // $this->Image('logo.png',10,6);
        $this->SetFont('Arial','',14);
        $this->Cell(200,5,'Aklan College/Aklan Catholic College',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',22);
        $this->Cell(195,10,'75th Diamond Jubilee Homecoming',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',14);
        $this->Cell(195,10,'Theme: "Championing Catholic Education for God and Country"',0,0,'C');
        $this->Ln(5);
        $this->SetFont('Times','',12);
        $this->Cell(195,10,'Remembering the Past, Celebrating the Present, Embracing the Future',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        
        $this->Cell(190,10,'REGISTRATION FORM',1,0,'C');
        $this->Ln();
        $this->SetFont('Times','B',9);
        $this->Cell(190,6,'CONTACT INFORMATION',1,0,'L');
        $this->Ln();
        $this->SetFont('Times','',8);
        $this->Cell(63.34,6,'Last Name: ',1,0,'L');
        $this->Cell(63.34,6,'First Name: ',1,0,'L');
        $this->Cell(63.34,6,'Middle Name: ',1,0,'L');
        $this->Ln();
        $this->Cell(140,6,'Home Address: ',1,0,'L');
        $this->Cell(20,6,'Sex: ',1,0,'L');
        $this->Cell(30,6,'Civil Status: ',1,0,'L');
        $this->Ln();
        $this->Cell(190,6,'Graduated here',1,0,'L');
        $this->Ln();
        $this->Cell(63.34,6,'Office Telephone No.: ',1,0,'L');
        $this->Cell(40,6,'Mobile No.: ',1,0,'L');
        $this->Cell(86.68,6,'Alumni Chapter Membership: ',1,0,'L');
        $this->Ln();
        $this->Cell(190,6,'Email Address: ',1,0,'L');
        $this->Ln();
        $this->SetFont('Times','B',9);
        $this->Cell(190,6,'REGISTRATION FEE PAYMENT: ',1,0,'L');
        $this->Ln();
        $this->SetFont('Times','',8);
        $this->Cell(190,6,'REGISTRATION FEE per Person = Php 1,000.00 or US$20 ',1,0,'L');
        $this->Ln();
        $this->Cell(190,6,'Please reserve number of persons ',1,0,'L');
        $this->Ln();
        $this->Cell(190,6,'T-Shirt Size(s): ',1,0,'L');
        $this->Ln();
        $this->Cell(190,6,'Please reserve pc(s) ',1,0,'L');
        $this->Ln();
        $this->SetFont('Times','B',9);
        $this->Cell(190,6,'DIAMOND JUBILEE SOUVENIR PROGRAM ',1,0,'L');
        $this->Ln();
        $this->SetFont('Times','',8);
        $this->Cell(190,6,'Souvenir here',1,0,'L');
        $this->Ln();
        $this->SetFont('Times','B',9);
        $this->Cell(190,6,'TOTAL AMOUNT DEPOSITED/PAID:',1,0,'L');
        $this->Ln();
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable($connections);
// $pdf->viewTable($connections);
$pdf->Output("I","Aklan Catholic College Registration Fee");

?>