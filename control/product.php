<?php
include ('fpdf.php');
include("../db_config.php");
session_start();
$p_id=$_GET['id'];
$pro=mysqli_query($con,"select * from product where id=$p_id");
$row_p=mysqli_fetch_array($pro,MYSQLI_ASSOC);

$us=$row_p["user"]; $u_r=mysqli_query($con,"select * from user where id=$us");
$row_u=mysqli_fetch_array($u_r,MYSQLI_ASSOC);  
$company=$row_u["company"];
$user_name=$row_u["name"];
$join=$row_u["date"];
$user_mobile=$row_u["mobile"];
$user_email=$row_u["email"];

$t=time();
$sec=$t%60;
$tmin=$t/60;
$min=$tmin%60;
$thour=$tmin/60;
$hour=($thour%24)+6;

if($hour>12){
		$h=$hour-12;
		$typ="pm";
		}
else{
$h=$hour;
$typ="am";
}
$time=$h.":".$min.$typ;
$yy=date('Y');
$date=date('d')."-".date('m')."-".date('Y');

$p_date=$row_p["date"];

$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->Ln(8);
		$pdf->SetFont('Helvetica','B',18);
		$pdf->Image('../images/icon.jpg');
		$pdf->Write(4, '                                           Awwazz.com');
		$pdf->Ln(6);

		$pdf->SetFont('Helvetica','B',10);
		$pdf->Write(5, '                                                                                 Product Report');
		$pdf->SetFont('Helvetica','',7);
		$pdf->Ln();
		$pdf->Write(6, 'Product Id.- '.$row_p["id"]."                                                                                                                                                                                                  Date: $p_date");
		$pdf->Ln();
		$pdf->Write(1, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------');
		$pdf->Ln();
		$pdf->Write(1, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------');
		$pdf->Ln(3);
		
		$pdf->SetFont('Helvetica','',10);
		$pdf->Write(5, '                                                                              Vendor Information');
		$pdf->Ln(9);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Vendor                            :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$company);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'User                                :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$user_name);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Joined on Awwazz        :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$join);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Contact Info                   :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$user_mobile." | ".$user_email);
		$pdf->Ln(15);
		
		
		
		
		
		
		$pdf->Write(1, '- - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -');
		$pdf->Ln(10);
		$pdf->SetFont('Helvetica','',10);
		$pdf->Write(5, '                                                                              Product Information');
		$pdf->Ln(9);
		
		
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Product ID                     :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["id"]);
		$pdf->Ln(5);
		
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Product Title                 :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["title"]);
		$pdf->Ln(5);
		
		
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Brand                            :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["brand"]);
		$pdf->Ln(6);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,"Unit Price                      :  ");
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["price"]." BDT");
		$pdf->Ln(6);

		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,"Upload Date                  :  ");
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["date"]);
		$pdf->Ln(6);
		
		
		
		
		
		
		
		
		$pdf->Ln(15);
		$pdf->SetFont('Helvetica','',7);
		$pdf->Write(1, '                                                                                             Downloaded at '.$time.' '.$date.' by '.$_SESSION['name'].'');
		$pdf->Ln(3);
		$pdf->Write(1, '                                                                                                        Copyright (c) '.$yy.' by Awwazz.com');
		
$pdf->Output();
		exit;

		
?>