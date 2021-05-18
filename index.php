<?php

include('./includes/FastTemplate.php');
include ('./includes/funciones.php');
include('./includes/Database.php');
include ('./Croydon/Services/Webservice/Gauss/FacturacionService.php');
include ('./Croydon/Services/Webservice/Gauss/InvConsultaDispItemBod.php');
include ('./Croydon/Services/Webservice/Gauss/InvConsultaDispItemBodResponse.php');
include ('./Croydon/Services/Webservice/Facturacion/Facturacion.php');
include ('./Croydon/Services/Webservice/Facturacion/FacActOrdenPedido.php');
include ('./Croydon/Services/Webservice/Facturacion/FacActOrdenPedidoResponse.php');
include ('./Croydon/Services/Webservice/Facturacion/FacActFactura.php');
include ('./Croydon/Services/Webservice/Facturacion/FacActFacturaResponse.php');

error_reporting(1);

$templete = new FastTemplate('plantillas/');
$templete->no_strict();
$conexion = new Database;
$conexion1 = new Database;
$conexion2 = new Database;

$templete->define(array('principal' => 'index.html'));

if (!$a) {
    $templete->define(array('principal' => 'index.html'));

    if ($m) {
        $templete->assign('MENSAJE','Archivo CSV procesado- revisar correo con información de carga');
    }else{
         $templete->assign('MENSAJE','');
    }

    
}

if ($a == 'uploadcsv') {

    $conexion->query("SELECT MAX(num_csv) FROM rows_csv");$conexion->next_record();
    $numCSV = $conexion->f(0) + 1;

    $streamContext = stream_context_create(array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )));

    $uid = '8001206812';
    $cia ='01';
    $year = date("Y");
    $app = '03';

    $month = date("m");
    $day = date("d");

    $gauss = new \Croydon\Services\Webservice\Gauss\FacturacionService(array('stream_context' => $streamContext, 'trace'=>true));
    $dispItem = new \Croydon\Services\Webservice\Gauss\InvConsultaDispItemBod();

    $factura = new \Croydon\Services\Webservice\Facturacion\Facturacion(array('stream_context' => $streamContext, 'trace'=>true));
    $facOrden = new \Croydon\Services\Webservice\Facturacion\FacActOrdenPedido();
    $facFactura = new \Croydon\Services\Webservice\Facturacion\FacActFactura();

    //Importacion del csv a BD
        if(isset($_POST['import_data'])){
            // validate to check uploaded file is a valid csv file
            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    $csv_file = fopen($_FILES['file']['tmp_name'], 'r');

                    $x = 0;
                    
                    while(($csv = fgetcsv($csv_file, 1000, ";"))){
                        if ($x != 0 && $csv[0] > 0) {
                            $cedula = $csv[0];
                            $tipoDoc = $csv[1];
                            $nombre = $csv[2];
                            $apellido = $csv[3];
                            $correo = $csv[4];
                            $dirFact = $csv[5];
                            $telFijo = $csv[6];
                            $telCel = $csv[7];
                            $municipio = 11001000;
                            $dirDesp = $csv[9];
                            $nomDesp = $csv[10];
                            $apeDesp = $csv[11];                            
                            $munDesp = 11001000;                            
                            $telFijoDesp = $csv[13];
                            $telcelDesp = $csv[14];
                            $numOrder = $csv[15];
                            $precioUni = $csv[16];
                            $porcLinea = $csv[17];
                            $cant = $csv[18];
                            $sku = $csv[19];
                            $origen = $csv[20]; 
                        
                        $conexion->query("INSERT INTO `rows_csv`(`cedula`, `tipo_doc`, `nombres`, `apellidos`, `email`, `dir_fact`, `dir_desp`, `nombre_desp`, `apellido_desp`, `municipio`, `municipio_desp`, `telfijo`, `telcelular`, `telfijo_desp`, `telcelular_desp`, `orden_compra`, `precio_unitario`, `porcentaje_iva`, `cantidad`, `sku`, `origen`,num_csv) VALUES ($cedula,'$tipoDoc','$nombre','$apellido','$correo','$dirFact','$dirDesp','$nomDesp','$apeDesp',$municipio,$munDesp,'$telFijo','$telCel','$telFijoDesp','$telcelDesp','$numOrder',$precioUni,$porcLinea,$cant,'$sku','$origen',$numCSV)");
                        }

                        $x++;
                        
                    }
                    fclose($csv_file);
                }
            }
        }


        //Seleccion de datos para consumo de servicios

        $conexion->query("SELECT * FROM rows_csv WHERE estado_row = 0 GROUP BY orden_compra");
        while($conexion->next_record()){

            $idRow = $conexion->f('id_row');
            $item = $conexion->f('sku');
            $qty = $conexion->f('cantidad');
            $cedula = $conexion->f('cedula');
            $tipo_doc = $conexion->f('tipo_doc');
            $nombres = $conexion->f('nombres');
            $apellidos = $conexion->f('apellidos');
            $email = $conexion->f('email');
            $dir_fact = $conexion->f('dir_fact');
            $dir_desp = $dir_fact;
            $nombre_desp = $nombres;
            $apellido_desp = $apellidos;
            $municipio = 11001000;
            $municipio_desp = 11001000;
            $telfijo = $conexion->f('telfijo');
            $telcelular = $conexion->f('telcelular');
            $telfijo_desp = $telfijo;
            $telcelular_desp = $telcelular;
            $orden_compra = $conexion->f('orden_compra');
            $precio_unitario = $conexion->f('precio_unitario');
            $porcentaje_iva = $conexion->f('porcentaje_iva');
            $cantidad = $conexion->f('cantidad');
            $sku = $conexion->f('sku');
            $origen = $conexion->f('origen');

            $origen = strtoupper($origen);

            if(strlen($orden_compra) > 8){
                $limite = strlen($orden_compra) - 8;
                $orden_modificada = substr($orden_compra, $limite);
            }else{
                $orden_modificada = str_pad($orden_compra, 8, "0", STR_PAD_LEFT);
            }

            $ordenCompraFinal = $origen.$orden_modificada;


            $codPais = '0169';
            $codClaseCliente = 'VW';
            $condicionPago = '99';
            $codDescuento = " ";
            $fechaDocumento = $year.$month.$day;

            $SKUs = '';
            $subtotal_bruto = 0;
            $valorIva = 0;

            $conexion2->query("SELECT * FROM rows_csv WHERE estado_row = 0 AND orden_compra = ".$orden_compra);
            while($conexion2->next_record()){  

                $idRowD = $conexion2->f('id_row');
                $ordenOriginal = $conexion2->f('orden_compra');
                $skuD = $conexion2->f('sku');
                $cantidadD = $conexion2->f('cantidad');

                $dispItem->setUid($uid);
                $dispItem->setCia($cia);
                $dispItem->setAno($year);
                $dispItem->setApp($app);
                $dispItem->setCodItem($skuD);
                $dispItem->setCantidad($qty);

                $return = $gauss->InvConsultaDispItemBod($dispItem)->getReturn();
                $jsonResponse = json_decode($return);
                $resultDisp = json_encode($return);
                $disReal = $jsonResponse->CantDisponible;

                if($disReal >= $qty){

                    echo "Si hay disponibilidad - Proceder a crear cadena de sku";


                    $conexion1->query("INSERT INTO `success_row`(`id_row`, `numorden_original`, `numorden_modificada`, `detalle`, `mensaje_service`, `conse_csv`, `tipo_error`,`cant_disponible`) VALUES ($idRowD,'$ordenOriginal','$ordenCompraFinal','$skuD','$resultDisp',$numCSV,1,$disReal)");

                    $precio_unitarioD = $conexion2->f('precio_unitario');
                    $porcentaje_ivaD = $conexion2->f('porcentaje_iva');                      

                    $brutoD = $precio_unitarioD * $cantidadD;
                    $valorIvaD = ($brutoD * $porcentaje_ivaD) / 100;
                    $total_lineaD = round($brutoD + $valorIvaD);
                    if ($porcentaje_ivaD == 19) {$claseIvaFinal = 'A';}
                    else if ($porcentaje_ivaD == 5) {$claseIvaFinal = 'E';}
                    else{$claseIvaFinal = '0';}

                    $subtotal_bruto = $subtotal_bruto + $brutoD;//se acumulan los valores brutos
                    $valorIva = $valorIva + $valorIvaD;//Se va acumulando el total del iva de cada linea

                    //Información de Detalle
                    $SKUs .= '|"'.$skuD.'";"'.$total_lineaD.'";"'.$cantidadD.'";"'.$claseIvaFinal.'"';

                }else{
                    //FALLA DISPONIBILIDAD DE PRODUCTO
                    if (!$jsonResponse->CantDisponible) {
                        $disReal = 0;
                    }else{
                        $disReal = $jsonResponse->CantDisponible;
                    }                    

                    echo "El sku ".$skuD." No tiene la disponiblidad solicitada";
                    $failDisp = 'Error Disponibilidad: '.$resultDisp;
                    $conexion1->query("INSERT INTO `failed_row`(`id_row`, `numorden_original`, `numorden_modificada`, `detalle`, `mensaje_service`, `conse_csv`, `tipo_error`,`cant_disponible`) VALUES ($idRowD,'$ordenOriginal','$ordenCompraFinal','$skuD','$failDisp',$numCSV,1,$disReal)");
                    $conexion1->query("UPDATE rows_csv set estado_row = 2 WHERE id_row = ".$idRowD);
                }
                
            }

            if ($SKUs != '') {
                //$subtotal_bruto = $precio_unitario * $cantidad;
                $subtotal_confletes = $subtotal_bruto;//Sin fletes
                //$valorIva = ($subtotal_bruto * $porcentaje_iva) / 100;
                $totalcargos_coniva = $subtotal_bruto;
                $totalDescuento = " ";
                $total_linea = round($subtotal_bruto + $valorIva);                

                if ($porcentaje_iva == 19) {$porceIvaFinal = 'A';}
                else if ($porcentaje_iva == 5) {$porceIvaFinal = 'E';}
                else{$porceIvaFinal = '0';}

                /*$dispItem->setUid($uid);
                $dispItem->setCia($cia);
                $dispItem->setAno($year);
                $dispItem->setApp($app);
                $dispItem->setCodItem($item);
                $dispItem->setCantidad($qty);*/


                $cadenaOrdenGral = '"'.$uid.'"|"'.$cia.'"|"'.$year.'"|"'.$app.'"|"'.$cedula.'";"'.$tipo_doc.'";"'.$nombres.'";"'.$apellidos.'";"'.$email.'";"'.$dir_fact.'";"'.$dir_desp.'";"'.$nombre_desp.'";"'.$apellido_desp.'";"'.$municipio.'";"'.$municipio_desp.'";"'.$codPais.'";"'.$telfijo.'";"'.$telcelular.'";"'.$telfijo_desp.'";"'.$telcelular_desp.'";"'.$codClaseCliente.'";"'.$condicionPago.'";"'.$codDescuento.'";"'.$fechaDocumento.'";"'.$ordenCompraFinal.'";"'.$subtotal_bruto.'";"'.$subtotal_confletes.'";"'.$totalcargos_coniva.'";"'.round($valorIva).'";"'.$totalDescuento.'";"'.$total_linea.'"';

                //$return = $gauss->InvConsultaDispItemBod($dispItem)->getReturn();
                //$jsonResponse = json_decode($return);

                $cadenaOrden = $cadenaOrdenGral.$SKUs;

                    //echo $cadenaOrden;

                $facOrden->setCadenaOrdenPedido($cadenaOrden);
                $returnOrden = $factura->FacActOrdenPedido($facOrden)->getReturn();
                $jsonOrden = json_decode($returnOrden);
                $resultOrden = json_encode($returnOrden);
                //print_r($jsonOrden);
                if ($jsonOrden->numdoc) {
                    $pedidoCroy = $jsonOrden->numdoc;
                    $conexion1->query("INSERT INTO `success_row`(`id_row`, `numorden_original`, `numorden_modificada`, `detalle`, `mensaje_service`, `conse_csv`, `tipo_error`, `valor_pedido`,`pedido_croy`) VALUES ($idRowD,'$ordenOriginal','$ordenCompraFinal','$SKUs','$resultOrden',$numCSV,2,$total_linea,$pedidoCroy)");
                    $ordenNumDoc = $jsonOrden->numdoc;
                    $cadenaFactGral = '"'.$uid.'"|"'.$cia.'"|"'.$year.'"|"'.$app.'"|"'.$cedula.'";"'.$tipo_doc.'";"'.$nombres.'";"'.$apellidos.'";"'.$email.'";"'.$dir_fact.'";"'.$dir_desp.'";"'.$nombre_desp.'";"'.$apellido_desp.'";"'.$municipio.'";"'.$municipio_desp.'";"'.$codPais.'";"'.$telfijo.'";"'.$telcelular.'";"'.$telfijo_desp.'";"'.$telcelular_desp.'";"'.$codClaseCliente.'";"'.$condicionPago.'";"'.$codDescuento.'";"'.$fechaDocumento.'";"'.$ordenCompraFinal.'";"'.$subtotal_bruto.'";"'.$subtotal_confletes.'";"'.$totalcargos_coniva.'";"'.round($valorIva).'";"'.$totalDescuento.'";"'.$total_linea.'";"'.$ordenNumDoc.'"';

                    $cadenaFact = $cadenaFactGral.$SKUs;

                    //echo $cadenaFact;

                    $facFactura->setCadenaActFactura($cadenaFact);
                    $returnFact = $factura->FacActFactura($facFactura)->getReturn();  
                    $jsonFact = json_decode($returnFact);
                    $resulFact = json_encode($returnFact);
                    print_r($jsonFact);

                    if ($jsonFact->coddoc == 'FA') {
                        $factCroy = $jsonFact->numdoc;
                        $conexion1->query("INSERT INTO `success_row`(`id_row`, `numorden_original`, `numorden_modificada`, `detalle`, `mensaje_service`, `conse_csv`, `tipo_error`, `valor_pedido`,`factura_croy`) VALUES ($idRowD,'$ordenOriginal','$ordenCompraFinal','$SKUs','$resulFact',$numCSV,3,$total_linea,$factCroy)");
                        $conexion1->query("UPDATE rows_csv set estado_row = 1 WHERE id_row = ".$idRowD);
                        //Almacenamiento de información para archivo de liberación
                        $valorLiberar = str_pad($total_linea, 8, "0", STR_PAD_LEFT);
                        $decimales = '00';
                        $valorLiberar = $valorLiberar.$decimales;
                        $origen = substr($ordenCompraFinal, 0, 2);
                        $conexion1->query("INSERT INTO `liberaciones`(`conse_csv`, `fecha`, `orden`, `valor`, `origen`) VALUES ($numCSV,$fechaDocumento,'$ordenCompraFinal','$valorLiberar','$origen')");

                    }else{
                        //ERROR DE FACTURA
                        if ($jsonFact->msg) {
                        $detalleErrorF = $jsonFact->msg;
                        }else{
                            $detalleErrorF = $jsonFact->EXCEPTION->DESCRIPCION;
                        }
                        $failFact = 'Error Factura: '.$resulFact;
                        $conexion1->query("INSERT INTO `failed_row`(`id_row`, `numorden_original`, `numorden_modificada`, `detalle`, `mensaje_service`, `conse_csv`, `tipo_error`, `valor_pedido`,`detalle_error`) VALUES ($idRowD,'$ordenOriginal','$ordenCompraFinal','$SKUs','$failFact',$numCSV,3,$total_linea,'$detalleErrorF')");
                        $conexion1->query("UPDATE rows_csv set estado_row = 2 WHERE id_row = ".$idRowD);
                    }
                }else{
                    //ERROR DE CREACION DE ORDEN
                    if ($jsonOrden->msg) {
                        $detalleErrorO = $jsonOrden->msg;
                    }else{
                        $detalleErrorO = $jsonOrden->EXCEPTION->DESCRIPCION;
                    }
                    $failOrden = 'Error Orden: '.$resultOrden;
                    $conexion1->query("INSERT INTO `failed_row`(`id_row`, `numorden_original`, `numorden_modificada`, `detalle`, `mensaje_service`, `conse_csv`, `tipo_error`, `valor_pedido`, `detalle_error`) VALUES ($idRowD,'$ordenOriginal','$ordenCompraFinal','$SKUs','$failOrden',$numCSV,2,$total_linea,'$detalleErrorO')");
                    $conexion1->query("UPDATE rows_csv set estado_row = 2 WHERE id_row = ".$idRowD);
                }                    


            }          
            
        }


        header("Location: home.php?a=res&numcsv=$numCSV");

}



$templete->parse('PRINCIPAL', 'principal');
$templete->FastPrint('PRINCIPAL');