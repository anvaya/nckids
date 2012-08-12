<?php
// extend TCPF with custom functions
class attendanceSheetPDF extends TCPDF {
	protected $office;
    //Page header
    public function Header() {        
        // Colors, line width and bold font
        $this->SetFillColor(191, 191, 191);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.1);
        $this->SetFont('', 'B');
        
              
        $this->Cell(0, 8, 'Attendance Sheet '. $this->office, 0, 0, 'C', 0);
        $this->Ln();
        
        $this->SetTextColor(255);
        // Header
        $w = array(55);
        $w = array_pad($w, 32, 7);
        
		    //Column titles
		    $header = array('Child');
		    foreach (range(1, 31) as $number) {
		      array_push($header, $number);
		    }
        for($i = 0; $i < count($header); $i++)
        $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        $this->Ln();
    } 
    
    public function setOffice($v){
    	$this->office = $v;
    }
    // Colored table
    public function ColoredTable($data) {
        // Header
        $w = array(55);
        $w = array_pad($w, 32, 7);
        
        // Header
        $w = array(55);
        $w = array_pad($w, 32, 7);
        
        // Color and font restoration
        $this->SetFillColor(239, 239, 239);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row->getFullName(), 'LR', 0, 'L');
            $col = 1;
            while($col < 32)
              $this->Cell($w[$col++], 6, ' ', 'LR', 0, 'L');
            $this->Ln();
            $this->Cell(array_sum($w), 10, ' ', 'LR', 0, 'L', true);
            $this->Ln();
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
} 