<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 include_once APPPATH.'libraries\third_party\fpdf\fpdf.php';
 
class F_pdf {
    
    public $pdf;
 
    public function __construct()
    {
        //$this->$param = '"L","mm",array(100,150)';
        $this->pdf = new FPDF('L','mm',array(100,150));
    }
}