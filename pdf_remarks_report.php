<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */



// check if logged in
session_start();
include "includes/_permissions.php"; 
include 'database.php';
include 'functions/query.func.php';

if (isset($_GET['frm_date']) && isset($_GET['to_date']) && isset($_GET['faci_status'])):

	$frm_date 		= strtotime($_GET['frm_date']);
	$to_date 		= strtotime($_GET['to_date']);
	$faci_status 	= $_GET['faci_status'];

	$frm_date=$timestamp = strtotime('19-05-2016');
	$to_date=time();
	$faci_status=1;

	$sql = "SELECT * FROM faci_status WHERE date_of_update BETWEEN '$frm_date' AND '$to_date' AND faci_con='$faci_status' GROUP BY faci_num";


		$result = mysqli_query($conn,$sql) or die(mysqli_error());
		while ($row = mysqli_fetch_assoc($result)) {  
			$data[]= array(
					'region'		=> getSingle('faci','region','faci_num',$row['faci_num']),
					'lga'			=> getSingle('faci','lga','faci_num',$row['faci_num']),
					'ward'			=> getSingle('faci','ward','faci_num',$row['faci_num']),
					'faci_num'		=> getSingle('faci','faci_num','faci_num',$row['faci_num']),
					'faci_name'		=> getSingle('faci','faci_name','faci_num',$row['faci_num']),
					'comment'		=> $row['comment'],
					'date_of_update'=> $row['date_of_update'],
					'problem'		=> getSingle('faci_problems','problems','faci_num',$row['faci_num']),
				);

		}

	// echo "<pre>";
	// print_r($data);
	// echo "</pre>";

	// 	echo $base = __DIR__;
	// exit();
	// Include the main TCPDF library (search for installation path).
	require_once('tcpdf/examples/tcpdf_include.php');

	// extend TCPF with custom functions
	class MYPDF extends TCPDF {

		// Load table data from file
		// public function LoadData($file) {
		// 	// Read file lines
		// 	$lines = file($file);
		// 	$data = array();
		// 	foreach($lines as $line) {
		// 		$data[] = explode(';', chop($line));
		// 	}
		// 	return $data;
		// }

		//Page header
	public function Header() {
		// Logo
		// $image_file = K_PATH_IMAGES.'logo_example.jpg';
		// $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title

		$T='PROBLEM REMARKS REPORT';
		$this->Cell(0, 15, $T, 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}


		// Colored table
		public function ColoredTable($header,$data) {
			// Colors, line width and bold font
			$this->SetFillColor(255, 0, 0);
			$this->SetTextColor(255);
			$this->SetDrawColor(128, 0, 0);
			$this->SetLineWidth(0.3);
			$this->SetFont('', 'B');
			// Header
			$w = array(30, 35, 30, 45,50,30,30,30);
			$num_headers = count($header);
			for($i = 0; $i < $num_headers; ++$i) {
				$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
			}
			$this->Ln();
			// Color and font restoration
			$this->SetFillColor(224, 235, 255);
			$this->SetTextColor(0);
			$this->SetFont('');
			// Data
			$fill = 0;
			// $header = array('Status', 'Region', 'LGA', 'Ward', 'Facilities Number', 'Facilities Name');
			foreach($data as $key => $row) {
				$this->Cell($w[0], 6, $row['region'], 'LR', 0, 'L', $fill);
				$this->Cell($w[1], 6, $row['lga'], 'LR', 0, 'L', $fill);
				$this->Cell($w[2], 6, $row['ward'], 'LR', 0, 'L', $fill);
				$this->Cell($w[3], 6, $row['faci_num'], 'LR', 0, 'L', $fill);
				$this->Cell($w[4], 6, $row['faci_name'], 'LR', 0, 'L', $fill);
				$this->Cell($w[5], 6, date('j - d - Y',$row['date_of_update']), 'LR', 0, 'L', $fill);
				$this->Cell($w[6], 6, $row['problem'], 'LR', 0, 'L', $fill);
				$this->MultiCell($w[7], 6, $row['comment'], 0, 'L', $fill, 0, '', '', true, 0, false, true, 40, 'T');
				// $this->Cell($w[5], 6, $row['date_of_update'], 'LR', 0, 'L', $fill);
				$this->Ln();
				$fill=!$fill;
			}
			$this->Cell(array_sum($w), 0, '', 'T');
		}
	}

	// create new PDF document
	$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Amina Nasoor');
	$pdf->SetTitle('Status Report');
	$pdf->SetSubject('Remarks Report by date');
	$pdf->SetKeywords('Amina, Nasoor, Report, Remarks, date');

	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}

	// ---------------------------------------------------------

	// set font
	$pdf->SetFont('helvetica', '', 10);

	// add a page
	$pdf->AddPage();

	// column titles
	$header = array('Region', 'LGA', 'Ward', 'Facilities Number', 'Facilities Name', 'Date', 'Problem', 'Comments');


	// data loading
	// $data = $pdf->LoadData('data/table_data_demo.txt');

	// print colored table
	$pdf->ColoredTable($header, $data);

	// ---------------------------------------------------------

	// close and output PDF document
	$pdf->Output('problem_remark_report.pdf', 'I');


else: 
	echo "No data";
endif;

//============================================================+
// END OF FILE
//============================================================+
