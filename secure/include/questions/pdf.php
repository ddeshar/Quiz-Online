<?php
error_reporting(0);
include ('../dbconnect.php');
require_once('../tcpdf/config/lang/thai.php');
require_once('../tcpdf/tcpdf.php');

class my_pdf extends TCPDF {

      //Page header
      public function Header() {
      	$file = 'image/mwa01.png';
        $this->Image($file, 15, 3, '', '', 'PNG', '', 'T', false, 600, '', false, false, 0, false, false, false);
      }

      // Page footer
      public function Footer() {
      	$this->SetFont('thsarabun', '', 14, '', true);
      	$footer_text = '<div><b>NOTE:</b> Copyright © 2017 WOC "Wame On Code Designed with love By Dipendra</div>';               
        // $this->writeHTMLCell(100, 50, 10, 285, $footer_text, 0, 0, 0, true, 'L', true);  
		$this->writeHTML($footer_text, true, true, true, true, '');
      }
}

// create new PDF document
$pdf = new my_pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPageOrientation('p'); // PDF_PAGE_ORIENTATION---> 'l' or 'p'
// set document information
$pdf->SetCreator('Dipendra');
$pdf->SetAuthor('Dipendra');
$pdf->SetTitle('Wane ON Code');
$pdf->SetSubject('WOC quiz ');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
// $pdf->SetMargins(8, 10, 8, 10); // left = 2.5 cm, top = 4 cm, right = 2.5cm
$pdf->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
$pdf->SetFont('thsarabun', '', 18, '', true);

// Add a page
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$i = "01";
// Set some content to print


$ft = ' <div style="text-align:center">
            <b>Godawari Municipality wise Inter school Running Shield Quiz Competition 2074</b><br />  
        </div> ';
$pdf->writeHTML($ft, true, false, true, false, '');
$pdf->SetFont('thsarabun', '', 16, '', true);

$html = '';
$html = '<hr />';
$html .= '<table cellspacing="0" cellpadding="1" border="1">';
//Header
$html .= "<thead>";
$html .= "<tr>";
$html .= '<th  width="5%" align="center">NO</th>';
$html .= '<th  width="56%" align="center">Question</th>';
$html .= '<th  width="20%" align="center">Answer</th>';
$html .= '<th  width="7%" align="center">Group</th>';
$html .= '<th  width="12%" align="center">Category</th>';
$html .= "</tr>";
$html .= "</thead>";

$sql = "SELECT
          questions.question,
          questions.answer,
          questions.`group`,
          categories.category_detail
        FROM
          questions
        INNER JOIN categories ON questions.category_question = categories.category_id
        ORDER BY
          categories.category_id ASC";
$respdf = mysqli_query($conn, $sql);

//Content
$html .= "<tbody>";
$p = 1;
while ( $row = mysqli_fetch_array($respdf)){
        $question           = $row["question"];
        $answer             = $row["answer"];
        $group              = $row["group"];
        $category_detail    = $row["category_detail"];
$t = $p++;
  $html .= "<tr nobr='true'>";
  $html .= "<td width=\"5%\" align=\"center\">$t</td>";
  $html .= "<td width=\"56%\">$question</td>";
  $html .= "<td width=\"20%\">$answer</td>";
  $html .= "<td width=\"7%\" align=\"center\">$group</td>";
  $html .= "<td width=\"12%\" align=\"center\">$category_detail</td>";
  $html .= "</tr>";
}
$html .= "</tbody>";
$html .= "</table>";

// Print text using writeHTMLCell()
// $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Quiz.pdf', 'I');

$pdf->lastPage(); 

//============================================================+
// END OF FILE
//============================================================+
?>