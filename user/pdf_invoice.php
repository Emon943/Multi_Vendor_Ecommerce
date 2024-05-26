<?php
include ('fpdf.php');
include("../db_config.php");
session_start();
$p_id=$_GET['id'];
$pro=mysqli_query($con,"select * from invoice where id=$p_id");
$row_p=mysqli_fetch_array($pro,MYSQLI_ASSOC);

$us=$row_p["user"]; $u_r=mysqli_query($con,"select * from user where id=$us");
$row_u=mysqli_fetch_array($u_r,MYSQLI_ASSOC);  
$user_name=$row_u["name"];

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

		$pdf->Write(4, '                                           Awwazz.com');
		$pdf->Ln(6);

		$pdf->SetFont('Helvetica','B',10);
		$pdf->Write(5, '                                                                                 Customer Invoice');
		$pdf->SetFont('Helvetica','',7);
		$pdf->Ln();
		$pdf->Write(6, 'Invoice.#'.$row_p["id"]."                                                                                                                                                                                                  Date: $p_date");
		$pdf->Ln();
		$pdf->Write(1, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------');
		$pdf->Ln();
		$pdf->Write(1, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------');
		$pdf->Ln(3);
		
		$pdf->SetFont('Helvetica','',10);
		$pdf->Write(5, '                                                                                       Customer Copy');
		$pdf->Ln(9);
		
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Invoice Id                         :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$p_id);
		$pdf->Ln(5);
		
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'User Name                       :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$user_name);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Delivery Address            :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["address"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Mobile                              :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["mobile"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Email                                :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["email"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Extra Details                    :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["comment"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Payment Method             :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["payment"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Total Product                   :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["product"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Total Price                        :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["price"]." BDT");
		$pdf->Ln(10);
		
		
		
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Cell(80,5,'Product Name',1);
		$pdf->Cell(20,5,'Id',1);
		$pdf->Cell(30,5,'Brand',1);
		$pdf->Cell(30,5,'Price(BDT)',1);
		
		$pdf->Ln(5);
		$sum=0;
		$pd=mysqli_query($con,"select product from checkout where invoice=$p_id");
										for($i=0; $i<mysqli_num_rows($pd); $i++){
										$rt_p=mysqli_fetch_array($pd,MYSQLI_ASSOC);
										$pr_id=$rt_p['product'];
										
										$prd=mysqli_query($con,"select * from product where id=$pr_id");	
										$r_p=mysqli_fetch_array($prd,MYSQLI_ASSOC);
										
										$sum=$sum+$r_p["price"];
										
		$pdf->SetFont('Helvetica','',8);
		$pdf->Cell(80,5,$r_p["title"],1);
		$pdf->Cell(20,5,$r_p["id"],1);
		$pdf->Cell(30,5,$r_p["brand"],1);
		$pdf->Cell(30,5,$r_p["price"],1);
		
		$pdf->Ln(5);
		
		
	}
	
	$pdf->SetFont('Helvetica','B',9);
		$pdf->Cell(130,5,'Total Amount',1);
		
		$pdf->Cell(30,5,$sum,1);
		$pdf->Ln(15);
		
		
		
		
		
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(1, '- - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -');
		$pdf->Ln(10);
		$pdf->SetFont('Helvetica','',10);
		$pdf->Write(5, '                                                                                   Office Copy');
		$pdf->Ln(9);
		
				$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Invoice Id                         :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$p_id);
		$pdf->Ln(5);
		
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'User Name                       :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$user_name);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Delivery Address            :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["address"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Mobile                              :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["mobile"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Email                                :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["email"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Extra Details                    :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["comment"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Payment Method             :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["payment"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Total Product                   :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["product"]);
		$pdf->Ln(5);
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Write(4,'Total Price                        :  ');
		$pdf->SetFont('Helvetica','',8);
		$pdf->Write(4,$row_p["price"]." BDT");
		$pdf->Ln(10);
		
		
		
		
		$pdf->SetFont('Helvetica','B',9);
		$pdf->Cell(80,5,'Product Name',1);
		$pdf->Cell(20,5,'Id',1);
		$pdf->Cell(30,5,'Brand',1);
		$pdf->Cell(30,5,'Price(BDT)',1);
		
		$pdf->Ln(5);
		$sum=0;
		$pd=mysqli_query($con,"select product from checkout where invoice=$p_id");
										for($i=0; $i<mysqli_num_rows($pd); $i++){
										$rt_p=mysqli_fetch_array($pd,MYSQLI_ASSOC);
										$pr_id=$rt_p['product'];
										
										$prd=mysqli_query($con,"select * from product where id=$pr_id");	
										$r_p=mysqli_fetch_array($prd,MYSQLI_ASSOC);
										
										$sum=$sum+$r_p["price"];
										
		$pdf->SetFont('Helvetica','',8);
		$pdf->Cell(80,5,$r_p["title"],1);
		$pdf->Cell(20,5,$r_p["id"],1);
		$pdf->Cell(30,5,$r_p["brand"],1);
		$pdf->Cell(30,5,$r_p["price"],1);
		
		$pdf->Ln(5);
		
		
	}
	
	$pdf->SetFont('Helvetica','B',9);
		$pdf->Cell(130,5,'Total Amount',1);
		
		$pdf->Cell(30,5,$sum,1);
		$pdf->Ln(15);
		
		
		
		
		
		
		
		
		
		
		$pdf->Ln(15);
		$pdf->SetFont('Helvetica','',7);
		$pdf->Write(1, '                                                                                             Downloaded at '.$time.' '.$date.' by '.$_SESSION['name'].'');
		$pdf->Ln(3);
		$pdf->Write(1, '                                                                                                        Copyright (c) '.$yy.' by Awwazz.com');
		
$pdf->Output();
		exit;

		
?>