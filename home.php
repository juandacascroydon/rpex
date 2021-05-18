<?php 

include('./includes/FastTemplate.php');
include ('./includes/funciones.php');
include('./includes/Database.php');

require 'phpmailer/PHPMailerAutoload.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

error_reporting(1);

$templete = new FastTemplate('plantillas/');
$templete->no_strict();
$conexion = new Database;
$conexion2 = new Database;

if ($a=='res') {
	$templete->define(array('principal' => 'home.html'));

	$templete->assign('NUMCSV',$numcsv);

	$templete->define_dynamic('FAILEDCSV', 'principal');

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setTitle('Faltantes');
	$sheet->setCellValue('A1', 'NUM_ORD');
	$sheet->setCellValue('B1', 'REFERENCIA');
	$sheet->setCellValue('C1', 'CANT_SOLI');
	$sheet->setCellValue('D1', 'ORD_DISP');
	$cont = 2;
        $conexion->query("SELECT * FROM failed_row WHERE tipo_error=1 AND conse_csv = ".$numcsv);
        while($conexion->next_record()){

        	$row = reg('rows_csv','id_row',$conexion->f('id_row'));

        	$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A'.$cont, $conexion->f('numorden_original'));
			$sheet->setCellValue('B'.$cont, $row['sku']);
			$sheet->setCellValue('C'.$cont, $row['cantidad']);
			$sheet->setCellValue('D'.$cont, $conexion->f('cant_disponible'));

            $cont ++;
        }
    $spreadsheet->createSheet();
    $spreadsheet->setActiveSheetIndex(1); 
    $spreadsheet->getActiveSheet()->setTitle('No procesados'); 
    $sheet = $spreadsheet->getActiveSheet();
    	$sheet->setCellValue('A1', 'NUM_ORD');
    	$sheet->setCellValue('B1', 'CAUSA');
    	$sheet->setCellValue('C1', 'VALOR');

    $cont = 2;
    $conexion->query("SELECT * FROM failed_row WHERE tipo_error in (2,3) AND conse_csv = ".$numcsv);
    while($conexion->next_record()){

       	$row = reg('rows_csv','id_row',$conexion->f('id_row'));

        $sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A'.$cont, $conexion->f('numorden_original'));	
		$sheet->setCellValue('B'.$cont, $conexion->f('detalle_error'));
		$sheet->setCellValue('C'.$cont, $conexion->f('valor_pedido'));

        $cont ++;
    }

    $spreadsheet->createSheet();
    $spreadsheet->setActiveSheetIndex(2); 
    $spreadsheet->getActiveSheet()->setTitle('Facturados');
    $sheet = $spreadsheet->getActiveSheet();
    	$sheet->setCellValue('A1', 'NUM_ORD');
    	$sheet->setCellValue('B1', 'PED_CROY');
    	$sheet->setCellValue('C1', 'FAC_CROY');
    	$sheet->setCellValue('D1', 'VAL_FAC');

    $cont = 2;
    $conexion->query("SELECT * FROM success_row WHERE tipo_error = 3 AND conse_csv = ".$numcsv);
    while($conexion->next_record()){

       	$pedCroy = reg('success_row','id_row',$conexion->f('id_row'),' AND tipo_error=2');

        $sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A'.$cont, $conexion->f('numorden_original'));	
		$sheet->setCellValue('B'.$cont, $pedCroy['pedido_croy']);
		$sheet->setCellValue('C'.$cont, $conexion->f('factura_croy'));
		$sheet->setCellValue('D'.$cont, $conexion->f('valor_pedido'));

        $cont ++;
    }		



     
    $spreadsheet->setActiveSheetIndex(0);  

    //GENERACION DEL EXCEL  

	

	$writer = new Xlsx($spreadsheet);
	$writer->save('reporte.xlsx');



    //GENERACION DE PRN
    $month = date("m");
    $day = date("d");
    $reciboRappi = "\RP".$month.$day.$numcsv.".prn";
    $reciboExito = "\EX".$month.$day.$numcsv.".prn";    
    //$ruta = 'C:\Users\jdjua\Documents\carpeta';
    
    
    $conexion->query("SELECT * FROM liberaciones WHERE origen='RP' AND conse_csv = ".$numcsv);
    if ($conexion->num_rows() > 0) {
        $prnRP = fopen("Y:\pruebajd".$reciboRappi, "a") or die ("Error al crear PRNRP");
        while($conexion->next_record()){
            $fecha = $conexion->f('fecha');
            $orden = $conexion->f('orden');
            $valor = $conexion->f('valor');
            $recibo = $fecha.$orden.$valor;
            fwrite($prnRP, $recibo);
            fwrite($prnRP, "\n");
        }
    }

    $conexion->query("SELECT * FROM liberaciones WHERE origen='EX' AND conse_csv = ".$numcsv);
    if ($conexion->num_rows() > 0) {
        $prnEX = fopen('Y:\pruebajd'.$reciboExito, "a") or die ("Error al crear PRNRP");
        while($conexion->next_record()){
            $fecha = $conexion->f('fecha');
            $orden = $conexion->f('orden');
            $valor = $conexion->f('valor');
            $recibo = $fecha.$orden.$valor;
            fwrite($prnEX, $recibo);
            fwrite($prnEX, "\n");
        }
    }
        



	//Envio de correo

    //create an instance of PHPMailer
    $mail = new PHPMailer();

    //set a host
    $mail->Host = "smtp.gmail.com";

    //enable SMTP
    $mail->isSMTP();
    $mail->SMTPDebug = 0;

    //set authentication to true
    $mail->SMTPAuth = true;

    //set login details for Gmail account
    $mail->Username = "jd.juandacas@gmail.com";
    $mail->Password = "juanda112186";

    //set type of protection
    $mail->SMTPSecure = "ssl"; //or we can use TLS

    //set a port
    $mail->Port = 465; //or 587 if TLS

    //set subject
    $mail->Subject = "test email";

    //set HTML to true
    $mail->isHTML(true);

    //set body
    $mail->Body = "Adjunto encuentra el reporte del csv recientemente cargado";

    //add attachment
    $mail->addAttachment('reporte.xlsx', 'Reporte.xlsx');

    //set who is sending an email
    $mail->setFrom('jd.juandacas@gmail.com', 'Desarrollo Tecnologia');

    //set where we are sending email (recipients)
    $mail->addAddress('desarrolladorweb4@croydon.com.co');
    $mail->addAddress('coordinadorweb@croydon.com.co');

    //send an email
    if ($mail->send()){
        echo "mail is sent";
    }
    else{
        //echo $mail->ErrorInfo;   
    }

    header("Location: index.php?m=1");   


}




$templete->parse('PRINCIPAL', 'principal');
$templete->FastPrint('PRINCIPAL');

 ?>



