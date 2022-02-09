<?php
session_start();
require "fpdf.php";
include("../bins/connections.php");


if(isset($_SESSION["username"])){

    $session_user = $_SESSION["username"];
    $check_account_type = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
    $get_account_type = mysqli_fetch_assoc($check_account_type);
    $account_type = $get_account_type["account_type"];


    $user_id_no = $get_account_type["id_no"];
    
    if($account_type != 2){
    
        header('Location: ../../forbidden');

    }
}


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
    function headerTable($connections){

        $session_user = $_SESSION["username"];
        $query_info = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
        $profile_info = mysqli_fetch_assoc($query_info);
        
        $first_name = $profile_info["first_name"];
        $last_name = $profile_info["last_name"];
        $middle_name = $profile_info["middle_name"];
        $address = $profile_info["home_address"];
        $sex = $profile_info["sex"];
        $civil_status = $profile_info["civil_status"];
        $office_telephone = $profile_info["office_telephone"];
        $mobile_number = $profile_info["mobile_number"];
        $alumni_chapter_membership = $profile_info["alumni_chapter_membership"];
        $email_address = $profile_info["email_address"];
        
        $elementary_graduate = $profile_info["elementary_graduate"];
        $highschool_graduate = $profile_info["highschool_graduate"];
        $college_graduate = $profile_info["college_graduate"];
        $graduate_graduate = $profile_info["graduate_graduate"];
        $college_degree = $profile_info["college_degree"];
        $graduate_degree = $profile_info["graduate_degree"];
        
        $small = $_SESSION["sw"];
        $medium = $_SESSION["mw"];
        $large = $_SESSION["lw"];
        $xl = $_SESSION["xlw"];
        $xxl = $_SESSION["xxlw"];
        $spw = $_SESSION["spw"];
        $totalAmountWalk = $_SESSION["totalAmountWalk"];

        $pcs = $small + $medium + $large + $xl + $xxl;
        
        // $civil_status = $profile_info["civil_status"];

        $this->SetFont('Times','B',12);
        
        $this->Cell(190,10,'REGISTRATION FORM',1,0,'C');
        $this->Ln();
        $this->SetFont('Times','B',9);
        $this->Cell(190,6,'CONTACT INFORMATION',1,0,'L');
        $this->Ln();
        $this->SetFont('Times','',8);
        $this->Cell(63.34,6,'Last Name: '.$last_name,1,0,'L');
        $this->Cell(63.34,6,'First Name: '.$first_name,1,0,'L');
        $this->Cell(63.34,6,'Middle Name: '.$middle_name,1,0,'L');
        $this->Ln();
        $this->Cell(140,6,'Home Address: '.$address,1,0,'L');
        $this->Cell(20,6,'Sex: '.$sex,1,0,'L');
        $this->Cell(30,6,'Civil Status: '.$civil_status,1,0,'L');
        $this->Ln();
        if($elementary_graduate != ""){
            $this->Cell(190,6,'Graduated: Elementary - ' . $elementary_graduate,1,0,'L');
        }
        if($highschool_graduate != ""){
            $this->Cell(190,6,'Graduated: High School - ' . $highschool_graduate,1,0,'L');
        }
        if($college_graduate != ""){
            $this->Cell(190,6,'Graduated: College - ' . $college_graduate . ' || Course: ' . $college_degree,1,0,'L');
        }
        if($graduate_graduate != ""){
            $this->Cell(190,6,'Graduated: Graduate School - ' . $graduate_graduate . ' || Course: ' . $graduate_degree,1,0,'L');
        }
        $this->Ln();
        $this->Cell(63.34,6,'Office Telephone No.: '.$office_telephone,1,0,'L');
        $this->Cell(40,6,'Mobile No.: '.$mobile_number,1,0,'L');
        $this->Cell(86.68,6,'Alumni Chapter Membership: '.$alumni_chapter_membership,1,0,'L');
        $this->Ln();
        $this->Cell(190,6,'Email Address: '.$email_address,1,0,'L');
        $this->Ln();
        $this->SetFont('Times','B',9);
        $this->Cell(190,6,'REGISTRATION FEE PAYMENT: ',1,0,'L');
        $this->Ln();
        $this->SetFont('Times','',8);
        $this->Cell(190,6,'REGISTRATION FEE per Person = Php 1,000.00 or US$20 ',1,0,'L');
        $this->Ln();
        $this->Cell(190,6,'Please reserve (' . $_SESSION["res"] . ') number of persons ',1,0,'L');
        $this->Ln();
        $this->Cell(190,6,'T-Shirt Size(s): Small: '. $small . ', Medium: ' . $medium . ', Large: ' . $large . ', Extra Large: ' . $xl . ', Double Extra Large: ' . $xxl ,1,0,'L');
        $this->Ln();
        $this->Cell(190,6,'Please reserve ' . $pcs . ' pc(s) ',1,0,'L');
        $this->Ln();
        $this->SetFont('Times','B',9);
        $this->Cell(190,6,'DIAMOND JUBILEE SOUVENIR PROGRAM ',1,0,'L');
        $this->Ln();
        $this->SetFont('Times','',8);
        if(isset($_SESSION["spw"])){
            $this->Cell(190,6,$spw,1,0,'L');
        }else{
            $this->Cell(190,6,'None',1,0,'L');
        }
        $this->Ln();
        $this->SetFont('Times','B',9);
        $this->Cell(190,6,'TOTAL AMOUNT DEPOSITED/PAID: Php' . number_format($totalAmountWalk),1,0,'L');
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