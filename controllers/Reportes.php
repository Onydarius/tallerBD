<?php
class ReportesController
{
    public function __construct()
    {
        require_once "models/ReporteModel.php";
        require_once "pdf.php";
    }
    public function index()
    {
        $reporte = new Reportes_model();
        $data["titulo"] = "Reportes";
        require_once "site-media/views/menu.php";
        require_once "site-media/views/Reportes/reporte_generar.php";
    }

    public function generarVehiculos()
    {
        $fec_entrada = $_POST['fec_entrada'];
        $fec_salida = $_POST['fec_salida'];
        $Reporte = new Reportes_model();
        $data['reporte'] = $Reporte->generarVehiculos($fec_entrada,$fec_salida);
        $pdf = new FPDF();
        $header = array('Nombre', 'Numero de trabajos');
        $pdf->SetFont('Arial', '', 14);
        $pdf->AddPage();
        $w = array(50,50);
        for ($i = 0; $i < count($header); $i++)
            $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $pdf->Ln();
        foreach ($data['reporte'] as $row) {
            $pdf->Cell($w[0], 6, $row['marca'], 'LR',0,'c');
            $pdf->Cell($w[1], 6, $row['modelo'], 'LR');
            $pdf->Ln();
        }
        $pdf->Cell($w[0]+$w[1], 6, '', 'T',0,'c');
        $pdf->Output();
        
    }
    public function generarTrabajos()
    {
        $anio = $_POST['anio'];
        $Reporte = new Reportes_model();
        $data['reporte'] = $Reporte->generarTrabajos($anio);
        $pdf = new FPDF();
        $header = array('Nombre', 'Numero de trabajos');
        $pdf->SetFont('Arial', '', 14);
        $pdf->AddPage();
        $w = array(140,50);
        for ($i = 0; $i < count($header); $i++)
            $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $pdf->Ln();
        $total=0;
        foreach ($data['reporte'] as $row) {
            $pdf->Cell($w[0], 6, $row['nombre'], 'LR',0,'c');
            $pdf->Cell($w[1], 6, $row['trabajos'], 'LR');
            
            $total+= $row['trabajos'];
            $pdf->Ln();
        }
        $pdf->Cell($w[0], 6, "Total", 'LTRB ',0,'T');
        $pdf->Cell($w[1], 6, $total, 'LTRB',0,'T');
        $pdf->Output();
    }
    public function generarServicios()
    {
        $date = $_POST['date'];
        $date = explode('-',$date);
        $reporte = new Reportes_model();
        $data['reporte'] = $reporte->generarServicios($date[0],$date[1]);
        $pdf = new FPDF();
        $header = array('Nombre', 'Numero de servicios');
        $pdf->SetFont('Arial', '', 14);
        $pdf->AddPage();
        $w = array(140,50);
        for ($i = 0; $i < count($header); $i++)
            $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $pdf->Ln();
        $total=0;
        foreach ($data['reporte'] as $row) {
            $pdf->Cell($w[0], 6,iconv('UTF-8', 'windows-1252', $row['nombre']), 'LR',0,'c');
            $pdf->Cell($w[1], 6, $row['count'], 'LR');
            
            $total+= $row['count'];
            $pdf->Ln();
        }
        $pdf->Cell($w[0], 6, "Total", 'LTRB ',0,'T');
        $pdf->Cell($w[1], 6, $total, 'LTRB',0,'T');
        $pdf->Output();
    }
    public function generarEmpleadoMes(){
        $date = $_POST['date'];
        $date = explode('-',$date);
        $reporte = new Reportes_model();
        $data['reporte'] = $reporte->empleadoMes($date[0],$date[1]);
        $pdf = new FPDF('L');
        $pdf->addPage('L');
        $pdf->Image('https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg',110,50,80,0,'jpg');
      
        $pdf->SetFont('Arial','B',40);
        $pdf->SetXY(10,30);
        $pdf->Cell(0,10,$data['reporte'][0]['empleadodelmes'],0,1,'C');
        $pdf->SetXY(15,140);
        $pdf->Cell(0,20,'Empleado del mes',0,1,'C');
        $pdf->Cell(0,10,$date[1].' de '.$date[0],0,1,'C');
        $pdf->Output();
    }

    public function generarGanancias(){
        $anio = $_POST['anio'];
        $reporte = new Reportes_model();
        $data['reporte'] = $reporte->generarGanancias($anio);
        $pdf = new FPDF();
        $pdf->SetFont('Arial', '', 14);
        $pdf->AddPage('L');
        $header = array('Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Sep.','Octubre','Nov.','Diciembre'); 
        for ($i = 0; $i < count($header); $i++)
            $pdf->Cell(23, 7, $header[$i], 1, 0, 'C');
        $pdf->Ln();
        foreach($data['reporte'][0] as $row){
            if(isset($row)){
                $pdf->Cell(23, 7, $row, 1, 0, 'C');
            }else{
                $pdf->Cell(23, 7, '0.00', 1, 0, 'C');
            }
        }
        $pdf->Output();
    }
}
