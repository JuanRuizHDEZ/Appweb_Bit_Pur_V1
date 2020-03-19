<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries\third_party\fpdf\fpdf.php';

class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,"encabezado",0,1,'C');
        $this->Ln(2);
    }
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,"Pagina".$this->PageNo(),0,0,'C');
    }
    function headerTable($titulos,$h1,$h2){
        $this->SetFont('Arial','B',12);
        
        $array = explode(",", $titulos);
        foreach ($array as $titulo){
            $this->Cell($h1,$h2,$titulo,1,0,'C');
        }
        $this->Ln();
    }
}

class Reportes extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_reportes');
    }
    
    public function index(){
        session_start();
        $datos['tipo'] = "";
        $this->load->view('reportes/principal',$datos);
    }

    public function ventas(){
        session_start();
        $datos['tipo'] = "ventas";
        $this->load->view('reportes/principal',$datos);
    }
    
    public function inventario(){
        session_start();
        $datos['tipo'] = "inventario";
        $this->load->view('reportes/principal',$datos);
    }


    public function fpdf(){
        
        //load FPDF library
        $this->load->library('F_pdf');
        $fpdf = new FPDF();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','',12);
        $fpdf->SetMargins(8,8,8,8);
        //$fpdf->Cell(30,5,"");
        $fpdf->Ln();

        if($this->input->POST('tipo')=="ventas"){

            $dat = $this->consulvent($this->input->POST('fecha1'),$this->input->POST('fecha2'));
            foreach ($dat as $dato) {
                //$datos = $datos." ".$dato['id_venta'];
                $fpdf->Cell(10,5,$dato['id_venta']);
                $fpdf->Cell(10,5,$dato['total']);
                $fpdf->Ln();
            }
        }

        $hoy = date("dmyhis");

        //$html= $datos;
        //this the the PDF filename that user will get to download
        $pdfFilePath = "reporte_".$hoy.".pdf";

        
        
        
        $resp = $fpdf->OutPut();
    }
    
    public function pdff(){
        
        $pdf = new PDF('p','mm','A4');
        $pdf->AddPage();
        //encazado de la tabla si es de ventas
        if($this->input->POST('tipo')=="ventas"){
            $titulos = "ID,TOTAL";
            $h1=14;
            $h2=5;
            $pdf->headerTable($titulos,$h1,$h2);
        }
        //encazado de la tabla si es de inventario
        if($this->input->POST('tipo')=="inventario"){
            $titulos = "ID,NOMBRE,CANTIDAD,PRECIO";
            $h1=30;
            $h2=10;
            $pdf->headerTable($titulos,$h1,$h2);
        }
        
        $pdf->SetFont('Arial','',12);

        //comprobar si es un reporte de ventas
        if($this->input->POST('tipo')=="ventas"){

            $dat = $this->consulvent($this->input->POST('fecha1'),$this->input->POST('fecha2'));
            foreach ($dat as $dato) {
                //$datos = $datos." ".$dato['id_venta'];
                $pdf->Cell(14,5,$dato['id_venta'],1,0,'C');
                $pdf->Cell(14,5,$dato['total'],1,0,'C');
                $pdf->Ln();
            }
        }

        //comprobar si es un reporte de inventario
        if($this->input->POST('tipo')=="inventario"){

            $dat = $this->consulinvt();
            foreach ($dat as $dato) {
                //$datos = $datos." ".$dato['id_venta'];
                $pdf->Cell(30,10,$dato['id_objeto'],1,0,'C');
                $pdf->Cell(30,10,$dato['nombre_obj'],1,0,'C');
                $pdf->Cell(30,10,$dato['cantidad'],1,0,'C');
                $pdf->Cell(30,10,$dato['precio'],1,0,'C');
                $pdf->Ln();
            }
        }


        $hoy = date("dmyhis");

        //this the the PDF filename that user will get to download
        $pdfFilePath = "reporte_".$hoy.".pdf";        
        $resp = $pdf->OutPut();
    }

    public function setOutputV2($json) {
        header('Content-type: application/json');
        echo  json_encode($json,JSON_PRETTY_PRINT);
    }

    public function consulvent($f1,$f2){
        return $this->model_reportes->cargar_ventas($f1,$f2);
    }
    public function consulinvt(){
        return $this->model_reportes->cargar_inventario();
    }
}