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

$templete->define(array('principal' => 'index.html'));

if (!$a) {
    $templete->define(array('principal' => 'index.html'));

    
}

if ($a == 'uploadcsv') {

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
                            $dirDesp = $csv[6];
                            $nomDesp = $csv[7];
                            $apeDesp = $csv[8];
                            $municipio = $csv[9];
                            $munDesp = $csv[10];
                            $telFijo = $csv[11];
                            $telCel = $csv[12];
                            $telFijoDesp = $csv[13];
                            $telcelDesp = $csv[14];
                            $numOrder = $csv[15];
                            $precioUni = $csv[16];
                            $porcLinea = $csv[17];
                            $cant = $csv[18];
                            $sku = $csv[19];
                            $origen = $csv[20]; 
                        
                        $conexion->query("INSERT INTO `rows_csv`(`cedula`, `tipo_doc`, `nombres`, `apellidos`, `email`, `dir_fact`, `dir_desp`, `nombre_desp`, `apellido_desp`, `municipio`, `municipio_desp`, `telfijo`, `telcelular`, `telfijo_desp`, `telcelular_desp`, `orden_compra`, `precio_unitario`, `porcentaje_iva`, `cantidad`, `sku`, `origen`) VALUES ($cedula,'$tipoDoc','$nombre','$apellido','$correo','$dirFact','$dirDesp','$nomDesp','$apeDesp',$municipio,$munDesp,'$telFijo','$telCel','$telFijoDesp','$telcelDesp','$numOrder',$precioUni,$porcLinea,$cant,'$sku','$origen')");
                        }

                        $x++;
                        
                    }
                    fclose($csv_file);
                }
            }
        }


        //Seleccion de datos para consumo de servicios

        $conexion->query("SELECT * FROM rows_csv WHERE estado_row = 0");
        while($conexion->next_record()){
            $item = $conexion->f('sku');
            $qty = $conexion->f('cantidad');
            $cedula = $conexion->f('cedula');
            $tipo_doc = $conexion->f('tipo_doc');
            $nombres = $conexion->f('nombres');
            $apellidos = $conexion->f('apellidos');
            $email = $conexion->f('email');
            $dir_fact = $conexion->f('dir_fact');
            $dir_desp = $conexion->f('dir_desp');
            $nombre_desp = $conexion->f('nombre_desp');
            $apellido_desp = $conexion->f('apellido_desp');
            $municipio = $conexion->f('municipio');
            $municipio_desp = $conexion->f('municipio_desp');
            $telfijo = $conexion->f('telfijo');
            $telcelular = $conexion->f('telcelular');
            $telfijo_desp = $conexion->f('telfijo_desp');
            $telcelular_desp = $conexion->f('telcelular_desp');
            $orden_compra = $conexion->f('orden_compra');
            $precio_unitario = $conexion->f('precio_unitario');
            $porcentaje_iva = $conexion->f('porcentaje_iva');
            $cantidad = $conexion->f('cantidad');
            $sku = $conexion->f('sku');
            $origen = $conexion->f('origen');

            $codPais = '0169';
            $codClaseCliente = 'VW';
            $condicionPago = '99';
            $codDescuento = " ";
            $fechaDocumento = $year.$month.$day;

            $subtotal_bruto = $precio_unitario * $cantidad;
            $subtotal_confletes = $precio_unitario * $cantidad;//Sin fletes

            $valorIva = ($subtotal_bruto * $porcentaje_iva) / 100;
            $totalcargos_coniva = $subtotal_bruto + $valorIva;
            $totalDescuento = " ";
            $total_linea = $subtotal_bruto + $valorIva;

            $origen = strtoupper($origen);

            if(strlen($orden_compra) > 8){
                $limite = strlen($orden_compra) - 8;
                $orden_modificada = substr($orden_compra, $limite);
            }else{
                $orden_modificada = str_pad($orden_compra, 8, "0", STR_PAD_LEFT);
            }

            $ordenCompraFinal = $origen.$orden_modificada;

            if ($porcentaje_iva == 19) {$porceIvaFinal = 'A';}
            else if ($porcentaje_iva == 5) {$porceIvaFinal = 'E';}
            else{$porceIvaFinal = 'C';}
            

            $dispItem->setUid($uid);
            $dispItem->setCia($cia);
            $dispItem->setAno($year);
            $dispItem->setApp($app);
            $dispItem->setCodItem($item);
            $dispItem->setCantidad($qty);


            $return = $gauss->InvConsultaDispItemBod($dispItem)->getReturn();

            $jsonResponse = json_decode($return);

            if($jsonResponse->CantDisponible >= $qty){
                echo "Si hay disponibilidad - Proceder a crear pedido";
                $cadenaOrden = '"'.$uid.'"|"'.$cia.'"|"'.$year.'"|"'.$app.'"|"'.$cedula.'";"'.$tipo_doc.'";"'.$nombres.'";"'.$apellidos.'";"'.$email.'";"'.$dir_fact.'";"'.$dir_desp.'";"'.$nombre_desp.'";"'.$apellido_desp.'";"'.$municipio.'";"'.$municipio_desp.'";"'.$codPais.'";"'.$telfijo.'";"'.$telcelular.'";"'.$telFijoDesp.'";"'.$telcelular_desp.'";"'.$codClaseCliente.'";"'.$condicionPago.'";"'.$codDescuento.'";"'.$fechaDocumento.'";"'.$ordenCompraFinal.'";"'.$subtotal_bruto.'";"'.$subtotal_confletes.'";"'.$totalcargos_coniva.'";"'.$valorIva.'";"'.$totalDescuento.'";"'.$total_linea.'"|"'.$sku.'";"'.$total_linea.'";"'.$cantidad.'";"'.$porceIvaFinal.'"';
                //echo $cadenaOrden;
                $facOrden->setCadenaOrdenPedido($cadenaOrden);
                $returnOrden = $factura->FacActOrdenPedido($facOrden)->getReturn();
                $jsonOrden = json_decode($returnOrden);
                $ordenNumDoc = $jsonOrden->numdoc;
                //echo $ordenNumDoc; 
                $cadenaFact = '"'.$uid.'"|"'.$cia.'"|"'.$year.'"|"'.$app.'"|"'.$cedula.'";"'.$tipo_doc.'";"'.$nombres.'";"'.$apellidos.'";"'.$email.'";"'.$dir_fact.'";"'.$dir_desp.'";"'.$nombre_desp.'";"'.$apellido_desp.'";"'.$municipio.'";"'.$municipio_desp.'";"'.$codPais.'";"'.$telfijo.'";"'.$telcelular.'";"'.$telFijoDesp.'";"'.$telcelular_desp.'";"'.$codClaseCliente.'";"'.$condicionPago.'";"'.$codDescuento.'";"'.$fechaDocumento.'";"'.$ordenCompraFinal.'";"'.$subtotal_bruto.'";"'.$subtotal_confletes.'";"'.$totalcargos_coniva.'";"'.$valorIva.'";"'.$totalDescuento.'";"'.$total_linea.'";"'.$ordenNumDoc.'"|"'.$sku.'";"'.$total_linea.'";"'.$cantidad.'";"'.$porceIvaFinal.'"';
                $facFactura->setCadenaActFactura($cadenaFact);
                $returnFact = $factura->FacActFactura($facFactura)->getReturn();  
                $jsonFact = json_decode($returnFact);
                print_r($jsonFact);
            }else{
                echo "Fallas de disponibilidad cantidad: ".$qty." Disponibles: ".$jsonResponse->CantDisponible;
            }
        }

}










$templete->parse('PRINCIPAL', 'principal');
$templete->FastPrint('PRINCIPAL');