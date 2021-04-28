<?php

foreach($_POST as $key=>$value) { $$key = $value; }
foreach($_GET as $key=>$value) { $$key = $value; }
foreach($_COOKIE as $key=>$value) { $$key = $value; }
foreach($_FILES as $key=>$value) { $$key = $value; }
$cabecera_mail="
<img src='https://redverde.datagestion.co/redverde/images/logoredverde.jpg'>
<hr>
    ";
$pie_mail="
<strong>Corporaci&oacute;n para el Manejo Posconsumo de Electrodom&eacute;sticos - RED VERDE</strong><br/>
Bogot&aacute; - COLOMBIA<br/>
Vis&iacute;tenos en http://www.redverde.co<br/>    
";

$id_cliente=10;
$tsesion=300;
$web="https://redverde.datagestion.co";

function getStringBetween($str,$from,$to)
{
    $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
    return substr($sub,0,strpos($sub,$to));
}

function exe_query($query)
//Ejecutar Query
{
    $conexion44 = new Database;    
    $conexion44->query($query);
    return '';
}

function evaluar($id_cliente,$clisess)
{
    global $web;
    $conexion = new Database;
    $conexion->query("SELECT * FROM cliente WHERE id_cliente=$id_cliente AND clave='$clisess'");
    if ($conexion->num_rows()==0)
        {
            print "<html><head><title></title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
            <meta http-equiv=\"REFRESH\" content=\"0;url=$web/index.php?a=s\"></HEAD></head><body bgcolor=\"#FFFFFF\" text=\"#000000\">
            </body></html> ";
            exit();
        }
    else
        {
            
        }   
}

function lista_option($tabla,$opcion,$valor,$where='')
{
    $conexion = new Database;
    $conexion->query("SELECT $opcion,$valor FROM $tabla $where ORDER BY $opcion ASC");
    while($conexion->next_record())
    {
        $lista.="<option value=\"".$conexion->f(1)."\">".$conexion->f(0)."</option>";
    }
    return $lista;
}

function modulos()
{
    
    //saco las campañas que tiene el usuario asignadas
    $id_usuario=$_COOKIE["mkid"]*1;
    $conexion = new Database;
    $conexion->query("SELECT b.modulo,b.ruta FROM usu_mod a,modulos b WHERE a.id_usuario=$id_usuario AND a.id_modulo=b.id_modulo ORDER BY b.modulo ASC");
    while($conexion->next_record())
    {
        $ruta=$conexion->f(1);        
        $modulo=utf8_encode($conexion->f(0));
        $modulos.="<a class='dropdown-item' href='admin2/$ruta/'>$modulo</a>";        
    }        
    return $modulos;
}



function modulosp()
//Permiso Modulos
{
    //saco las campañas que tiene el usuario asignadas
    $id_usuario=$_COOKIE[idusu]*1;
    $conexion = new Database;
    $conexion2 = new Database;
    $cadenasolicitudes.="<li><a href='inicio.php?a=home2'><i class='fa fa-phone fa-fw'></i> Informe de Llamadas</a></li>";
    /*$conexion->query("SELECT * FROM permisos WHERE nombre='solicitud' AND id_usuario=$id_usuario ORDER BY valor ASC");
    while($conexion->next_record())
    {
        $solicitud=  reg('solicitudes', 'id_solicitud', $conexion->f(valor));
        $cadenasolicitudes.="<li style='font-size:9pt'><a href='inicio.php?a=home2&id_solicitud=$solicitud[id_solicitud]'><i class='fa fa-angle-right fa-fw'></i>$solicitud[solicitud]</a></li>";
    }*/
    //$cadenasolicitudes.="</ul></li>";
    
    //modulos del usuario
    $conexion->query("SELECT * FROM permisos INNER JOIN modulos ON modulos.id_modulo=permisos.valor WHERE nombre='modulo' AND id_usuario=$id_usuario AND submenu=0 ORDER BY orden");
    while($conexion->next_record())
    {
        $modulo=  reg('modulos', 'id_modulo', $conexion->f(valor));
        
        //Imagen de Boton
        if($modulo[imgbtn]<>"")$btn="<i class='fa $modulo[imgbtn] fa-fw'></i>";else $btn='';
        
        //SubMenu
        $submenu=  submodulos($modulo[id_modulo], $id_usuario);
        
       
        
        if($submenu=="")$submenu="</a>";
        else $submenu="<span class='fa arrow'></span></a><ul class='nav nav-second-level'>$submenu</ul>";
        
        $cadenamodulos.="<li><a href='$modulo[ruta]'>$btn $modulo[modulo] $submenu</li>";
        
        
    }
    $cadena="
        <li><a href='inicio.php?a=home'><i class='fa fa-home fa-fw'></i>Inicio</a></li>"
        .$cadenasolicitudes.$cadenamodulos.""
        . "<li><a href='inicio.php?a=cc'><i class='fa fa-key fa-fw'></i>Cambiar Clave</a></li>"
        . "<li><a href='index.php?a=s'><i class='fa fa-sign-out fa-fw'></i>Salir</a></li>";
    //echo $cadena;
    return $cadena;
}

function submodulos($id_modulo,$id_usuario)
//SubModulos
{
    $submenu="";
    $conexion = new Database;
    $conexion->query("SELECT valor FROM permisos INNER JOIN modulos ON modulos.id_modulo = permisos.valor
                      WHERE submenu=$id_modulo AND id_usuario=$id_usuario");
    if($conexion->num_rows()>0){
        while($conexion->next_record()){
            $submodulo=  reg('modulos', 'id_modulo', $conexion->f(valor));
            if($submodulo[imgbtn]<>"")$btn="<i class='fa $submodulo[imgbtn] fa-fw'></i>";else $btn='';
            $submenu.="<li><a href='$submodulo[ruta]'>$btn $submodulo[modulo]</a></li>";
        }
    } 
    
    return $submenu;
}

function modulo($modulo,$accion,$mensaje,$adicional='')
{
    global $web;
    print "<html><head><title></title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
    <meta http-equiv=\"REFRESH\" content=\"0;url=$web/$modulo?a=$accion&m=$mensaje$adicional\"></HEAD></head><body bgcolor=\"#FFFFFF\" text=\"#000000\">
    </body></html> ";
    exit();
}

function redirigir($direccion,$mensaje,$adicional='')
//Enviar a Otra Pagina
{
    print "<html><head><title></title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
    <meta http-equiv=\"REFRESH\" content=\"0;url=$direccion?m=$mensaje&$adicional\"></HEAD></head><body bgcolor=\"#FFFFFF\" text=\"#000000\">
    </body></html> ";
    exit();
}

function reject()
{
    print "<html><head><title></title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
    <meta http-equiv=\"REFRESH\" content=\"0;url=index.php?a=s&m=Usted no puede ver una consulta no asignada a su perfil\"></HEAD></head><body bgcolor=\"#FFFFFF\" text=\"#000000\">
    </body></html> ";
    exit();
}

function f2ts($fecha) 
//Fecha (dd/mm/aaaa) a Unixtime
{
    $fecha=split('/',$fecha);
    $fecha=mktime(0,0,0,$fecha[1],$fecha[0],$fecha[2]);
    return $fecha;
}

function f2ts2($fecha) 
{
$fecha=split('-',$fecha);
$fecha=mktime(0,0,0,$fecha[1],$fecha[2],$fecha[0]);
return $fecha;
}

function date_unix($fecha) 
//Fecha (dd/mm/aaaa) a Unixtime
{
    $fecha=split('-',$fecha);
    $fecha=mktime(0,0,0,$fecha[1],$fecha[2],$fecha[0]);
    return $fecha;
}

function f3ts($fecha) 
//Fecha (aaaa/mm/dd) a Unixtime
{
    $fecha=split('/',$fecha);
    if($fecha[0]>2000)$fecha=$fecha[2]."/".$fecha[1]."/".$fecha[0];
    else $fecha=$fecha[0]."/".$fecha[1]."/".$fecha[2];
    
    
    
    //$fecha=mktime(0,0,0,$fecha[2],$fecha[0],$fecha[1]);
    return $fecha;
}


function reg($table,$field,$value,$adicional='')
//Registro en Arreglo
{
    $i=0;
    $conexion = new Database;
    $conexion->query("SHOW COLUMNS FROM $table");
    while($conexion->next_record())
    {
        $fields[$i]=$conexion->f(0);
        $i++;
    }
    $conexion->query("SELECT * FROM $table WHERE $field='$value' $adicional");
    $conexion->next_record();
    for($i=0;$i<count($fields);$i++)
    {
        $reg[$fields[$i]]=  $conexion->f($i);
    }
    return $reg;   
}

function reg_ext($table,$field,$value,$adicional='')
//Registro en Arreglo (Database2)   
{
    $i=0;
    $conexion2 = new Database2;
    $conexion2->query2("SHOW COLUMNS FROM $table");
    while($conexion2->next_record2())
    {
        $fields[$i]=$conexion2->f2(0);
        $i++;
    }
    $conexion2->query2("SELECT * FROM $table WHERE $field='$value' $adicional");
    $conexion2->next_record2();
    for($i=0;$i<count($fields);$i++)
    {
        $reg[$fields[$i]]=  $conexion2->f2($i);
    }
    return $reg;   
}

function lista2($nom_select,$tabla,$nombre,$valor,$where='')
//Listado - Value0 (Select)
{
    $lista="<select name=\"$nom_select\" id=\"$nom_select\">";
    $lista.="<option value=\"0\">- Seleccione -</option>";
    $conexion = new Database;
    $conexion->query("SELECT $nombre,$valor FROM $tabla $where ORDER BY $nombre ASC");
    while($conexion->next_record())
    {
        $lista.="<option value=\"".utf8_encode($conexion->f(1))."\">".utf8_encode($conexion->f(0))."</option>";
    }
    $lista.="</select>";
    return $lista;
}

function lista($nom_select,$tabla,$nombre,$valor,$where='')
//Listado (Select)
{
    $lista="<select name=\"$nom_select\" id=\"$nom_select\">";
    $conexion = new Database;
    $conexion->query("SELECT $nombre,$valor FROM $tabla $where ORDER BY $nombre ASC");
    while($conexion->next_record())
    {
        $lista.="<option value=\"".utf8_encode($conexion->f(1))."\">".utf8_encode($conexion->f(0))."</option>";
    }
    $lista.="</select>";
    return $lista;
}

function lista_estados($nom_select,$tabla,$nombre,$valor,$where='')
{
    $lista="<select name=\"$nom_select\" id=\"$nom_select\" onChange=\"tipo();\">";
    $lista.="<option value=\"\"></option>";
    $conexion = new Database;
    $conexion->query("SELECT $nombre,$valor FROM $tabla $where ORDER BY id_estado ASC");
    while($conexion->next_record())
    {
        $lista.="<option value=\"".utf8_encode($conexion->f(1))."\">".utf8_encode($conexion->f(0))."</option>";
    }
    $lista.="</select>";
    return $lista;
}

function cargar_archivo($archivo,$directorio)
{     
    //echo "juandas";exit;   
    if($_FILES[$archivo][size]>1)
        {
            $fecha=time().rand(100, 999);
            $nombre=quitar_tildes($_FILES[$archivo]['name']);
            $nombre=strtolower($nombre);
            $nombre=str_replace(' ', '', $nombre);
            $nombre=str_replace('php', 'txt', $nombre);
            $target_path = "/var/www/redverde/admin/$directorio/$fecha"."_".$nombre;
            $target_path2 = "$directorio/$fecha"."_".$nombre;
            move_uploaded_file($_FILES[$archivo]['tmp_name'], $target_path);            
        }
    return $target_path2;    
}

function id_nombre($tabla,$campo_tabla,$nombre_retorno,$valor_buscado,$add='')
//Buscar Dato
{
    $conexion = new Database;    
    $conexion->query("SELECT $nombre_retorno FROM $tabla WHERE $campo_tabla='$valor_buscado' $add");
    $conexion->next_record();
    return utf8_encode($conexion->f(0));
}


function estado_encuesta($estado){

    switch ($estado){
        case 0:
            $estado='Sin Gestion';break;
        case 1:
            $estado='Contactado';break;
        case 2:
            $estado='Ocupado No Contesta';break;
        case 3:
            $estado='Dato Errado';break;
        case 4:
            $estado='Programado';break;
        case 5:
            $estado='Contacto No Participa';break;
        case 7:
            $estado='Ilocalizable';break;
    }

    return $estado;
}

function estado_llamada($estado){

    switch ($estado){
        case 1:
            $estado='Aceptada';break;
        case 2:
            $estado='Devuelta Oc/Nc';break;
        case 3:
            $estado='Equivocada';break;
        case 4:
            $estado='Perdida';break;
        case 5:
            $estado='Fuera Horario';break;
        case 7:
            $estado='Prueba';break;
        case 8:
            $estado='Devuelta Efectiva';break;
    }
    
    return $estado;
}

function mensaje($numero)
{
    if($numero==1)return "Su clave actual no corresponde. Intentelo nuevamente.";
    if($numero==2)return "Su clave fue cambiada correctamente.";
    if($numero==3)return "El recurso que esta tratando de crear ya existe en el sistema.";
    if($numero==4)return "El recurso fisico se creo en el sistema.";    
    if($numero==5)return "Se modifico el estado del recurso fisico.";        
    if($numero==6)return "Se edito la informacion del recurso fisico.";            
    if($numero==7)return "El area/asignatura que esta tratando de crear/editar ya existe en el sistema.";                
    if($numero==8)return "El area/asignatura se creo en el sistema.";                    
    if($numero==9)return "No se puede eliminar el area pues tiene asignaturas asignadas.";                        
    if($numero==10)return "El area o asignatura se elimino del sistema correctamente.";                            
    if($numero==11)return "El area o asignatura se edito en el sistema correctamente.";                            
    if($numero==12)return "El cliente ya esta creado en el sistema con ese nit.";                                
    if($numero==13)return "Se ha creado el cliente de forma correcta.";                                    
    if($numero==14)return "El cliente ya esta creado en el sistema con ese nit.";                                    
    if($numero==15)return "El cliente se edito correctamente.";                                        
    if($numero==16)return "Se ingreso correctamente la informacion.";            
    if($numero==17)return "Proceso de logistica creado.";            
    if($numero==18)return "Proceso de logistica actualizado.";            
    if($numero==19)return "Se elimino el archivo del cliente.";            
    if($numero==20)return "Debe cambiar su contraseña de acceso.";            
    if($numero==21)return "Se ha enviado una nueva clave de acceso a su correo electrónico.";            
    if($numero==22)return "Se envio la informacion de forma correcta.";                
}

function lista_consecutiva($nombre,$inicio,$fin)
//Lista consecutiva de Numeros (SELECT)
{
    $lista="<select name=\"$nombre\" id=\"$nombre\">";
    for($i=$inicio;$i<=$fin;$i++)
    {
        $lista.="<option value=\"$i\">$i</option>";
    }
    $lista.="</select>";
    return $lista;
}

function lista_consecutiva_inv($nombre,$inicio,$fin)
//Lista consecutiva de Numeros (SELECT) Mayor a Menor
{
    $lista="<select name=\"$nombre\" id=\"$nombre\">";
    for($i=$fin;$i>=$inicio;$i--)
    {
        $lista.="<option value=\"$i\">$i</option>";
    }
    $lista.="</select>";
    return $lista;
}

function bloques()
//Listado de Opciones Hora (Int 15mn)
{    
    $bloques="
    <option value=\"25200\">7:00</option>
    <option value=\"26100\">7:15</option>
    <option value=\"27000\">7:30</option>
    <option value=\"27900\">7:45</option>
    <option value=\"28800\">8:00</option>
    <option value=\"29700\">8:15</option>
    <option value=\"30600\">8:30</option>
    <option value=\"31500\">8:45</option>
    <option value=\"32400\">9:00</option>
    <option value=\"33300\">9:15</option>
    <option value=\"34200\">9:30</option>
    <option value=\"35100\">9:45</option>
    <option value=\"36000\">10:00</option>
    <option value=\"36900\">10:15</option>
    <option value=\"37800\">10:30</option>
    <option value=\"38700\">10:45</option>
    <option value=\"39600\">11:00</option>
    <option value=\"40500\">11:15</option>
    <option value=\"41400\">11:30</option>
    <option value=\"42300\">11:45</option>
    <option value=\"43200\">12:00</option>
    <option value=\"44100\">12:15</option>
    <option value=\"45000\">12:30</option>
    <option value=\"45900\">12:45</option>
    <option value=\"46800\">13:00</option>
    <option value=\"47700\">13:15</option>
    <option value=\"48600\">13:30</option>
    <option value=\"49500\">13:45</option>
    <option value=\"50400\">14:00</option>
    <option value=\"51300\">14:15</option>
    <option value=\"52200\">14:30</option>
    <option value=\"53100\">14:45</option>
    <option value=\"54000\">15:00</option>
    <option value=\"54900\">15:15</option>
    <option value=\"55800\">15:30</option>
    <option value=\"56700\">15:45</option>
    <option value=\"57600\">16:00</option>
    <option value=\"58500\">16:15</option>
    <option value=\"59400\">16:30</option>
    <option value=\"60300\">16:45</option>
    <option value=\"61200\">17:00</option>
    <option value=\"62100\">17:15</option>
    <option value=\"63000\">17:30</option>
    <option value=\"63900\">17:45</option>
    <option value=\"64800\">18:00</option>
    <option value=\"65700\">18:15</option>
    <option value=\"66600\">18:30</option>
    <option value=\"67500\">18:45</option>
    <option value=\"68400\">19:00</option>
    <option value=\"69300\">19:15</option>
    <option value=\"70200\">19:30</option>
    <option value=\"71100\">19:45</option>
    <option value=\"72000\">20:00</option>
    <option value=\"72900\">20:15</option>
    <option value=\"73800\">20:30</option>
    <option value=\"74700\">20:45</option>
    <option value=\"75600\">21:00</option>
    <option value=\"76500\">21:15</option>
    <option value=\"77400\">21:30</option>
    <option value=\"78300\">21:45</option>
    <option value=\"79200\">22:00</option>
    <option value=\"80100\">22:15</option>
    <option value=\"81000\">22:30</option>
    <option value=\"81900\">22:45</option>
    <option value=\"82800\">23:00</option>
    ";

    return $bloques;
}
    
function procesando()
//Loading
{
    echo "<center><img src=\"./images/ajax-loader.gif\"><br />Procesando</center>";
}
    
function dia($dia)
{
    if ($dia==1) return "Lunes";
    if ($dia==2) return "Martes";
    if ($dia==3) return "Miercoles";
    if ($dia==4) return "Jueves";
    if ($dia==5) return "Viernes";
    if ($dia==6) return "Sabado";
    if ($dia==7) return "Domingo";
}

function normaliza ($cadena){
    $originales =  'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}


function exportMysqlToCsv($table,$filename = 'export.csv')
//Exportar Tabla a CSV
{
    $csv_terminated = "\n";
    $csv_separator = ";";
    $csv_enclosed = '';
    $csv_escaped = "\\";
    $sql_query = "select * from $table";
    // Gets the data from the database
    $result = mysql_query($sql_query);
    $fields_cnt = mysql_num_fields($result);
    $schema_insert = '';
    for ($i = 0; $i < $fields_cnt; $i++)
    {
        $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
        stripslashes(mysql_field_name($result, $i))) . $csv_enclosed;
        $schema_insert .= $l;
        $schema_insert .= $csv_separator;
    } // end for
    $out = trim(substr($schema_insert, 0, -1));
    $out .= $csv_terminated;
    // Format the data
    while ($row = mysql_fetch_array($result))
    {
        $schema_insert = '';
        for ($j = 0; $j < $fields_cnt; $j++)
        {
            if ($row[$j] == '0' || $row[$j] != '')
            {
                if ($csv_enclosed == '')
                {
                    $schema_insert .= $row[$j];
                } else
                {
                    $schema_insert .= $csv_enclosed .
                    str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
                }
            } else
            {
                $schema_insert .= '';
            }

            if ($j < $fields_cnt - 1)
            {
                $schema_insert .= $csv_separator;
            }
        } // end for
        $out .= $schema_insert;
        $out .= $csv_terminated;
    } // end while
    //header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Length: " . strlen($out));
    // Output to browser with appropriate mime type, you choose ;)
    //header("Content-type: text/x-csv");
    //header("Content-type: text/csv");
    //header("Content-type: application/csv");
    header('Content-type: text/html; charset=utf-8');
    header("Content-Disposition: attachment; filename=$filename");
    echo $out;
    exit;
}

function resultados($id_campana,$desde,$hasta,$asesor,$concesionario,$marca,$usuario='')
//Encuestas Temporales a Tabla
{
    if($asesor)$asesorsql=" AND asesor='$asesor' ";
    else $asesorsql='';
    if($concesionario!='0')$concesionariosql=" AND concesionario='$concesionario' ";
    else $concesionariosql=sqlfiltro($_COOKIE[idusu], 'concesionario');
    if($marca!='0')$marcasql=" AND marca='$marca' ";
    else $marcasql=sqlfiltro($_COOKIE[idusu], 'marca');;
    
    
    $conexion55 = new Database;
    $conexion55->query("TRUNCATE resultados");
    
    $conexion55 = new Database;    
    //entramos a las preguntas de la campana
        $conexion55->query("SELECT * FROM preguntas WHERE id_campana=$id_campana AND tipo=1");
        while($conexion55->next_record())
        {
            $id_pregunta=$conexion55->f(id_pregunta);
            $orden=$conexion55->f(orden);
            $pregunta=$conexion55->f(pregunta);
            $resultados['pregunta_'.$id_pregunta]['id_pregunta']=$id_pregunta;
            $resultados['pregunta_'.$id_pregunta]['pregunta']=$pregunta;
            $resultados['pregunta_'.$id_pregunta]['orden']=$orden;
            $conexion44 = new Database;            
            $conexion44->query("INSERT INTO resultados (id_pregunta,pregunta,orden,asesor,concesionario,marca) VALUES ($id_pregunta,'$pregunta',$orden,'$asesor','$concesionario','$marca')");
        }
        
    
        
   $conexion44 = new Database;            
   $conexion44->query("SELECT datos FROM servicios WHERE estado=1 AND id_campana=$id_campana $concesionariosql $asesorsql $marcasql AND (fecha_servicio BETWEEN $desde AND $hasta) AND datos<>''");   
   while($conexion44->next_record())
    {
       $info=  utf8_encode($conexion44->f(0));
       $datos=  arregla($info);
       $campos=array_keys($resultados);
       for($i=0;$i<count($resultados);$i++)
       {
           $campos[$i];
           $datos[$campos[$i]];
           $resultados[$campos[$i]][$datos[$campos[$i]]]++;
       }
    }
  
    //print_r($resultados);
    
   //entramos a revisa una a una las preguntas para llenar la tabla de resultados
    $conexion44 = new Database;            
    $conexion44->query("SELECT id_pregunta FROM preguntas WHERE id_campana=$id_campana");
    while($conexion44->next_record())
    {
        $id_pregunta=$conexion44->f(0);
        $valor=$resultados["pregunta_$id_pregunta"][-1];
        $query="UPDATE resultados SET r_1='".$valor."' WHERE id_pregunta=$id_pregunta";
        $conexion55 = new Database;            
        $conexion55->query($query);
        
        if($valor>0)exe_query("UPDATE resultados SET informe=1 WHERE id_pregunta=$id_pregunta AND informe=0");
        
        for($o=0;$o<=30;$o++)
        {
            $valor=$resultados["pregunta_$id_pregunta"][$o];
            $query="UPDATE resultados SET r".$o."='".$valor."' WHERE id_pregunta=$id_pregunta";
            //echo "<br />";
            $conexion55 = new Database;            
            $conexion55->query($query);
            
            if($valor>0)exe_query("UPDATE resultados SET informe=1 WHERE id_pregunta=$id_pregunta AND informe=0");
            
        }
        
        
    }

    return $resultados;
}

function preguntas($id_campana)
{
    $conexion = new Database;
    $conexion->query("SELECT * FROM preguntas WHERE id_campana=$id_campana AND tipo=1 AND estado=1 ORDER BY orden ASC");
    while($conexion->next_record())
    {
        $preguntas[$conexion->f(id_pregunta)]=  $conexion->f(pregunta);
    }
    return $preguntas;
    
}

function preguntas_id($id_campana)
{
    $conexion = new Database;
    $conexion->query("SELECT * FROM preguntas WHERE id_campana=$id_campana AND tipo=1 AND estado=1 ORDER BY orden ASC");
    while($conexion->next_record())
    {
        $preguntas_id[$conexion->f(id_pregunta)]=  $conexion->f(id_pregunta);
    }
    return $preguntas_id;
    
}

function opciones($id_campana)
{
    $conexion = new Database;
    $conexion2 = new Database;
    $conexion->query("SELECT * FROM preguntas WHERE id_campana=$id_campana ORDER BY orden ASC");
    while($conexion->next_record())
    {
        $opciones[$id_pregunta][0]=  'no';
        $id_pregunta=$conexion->f(id_pregunta);
        $conexion2->query("SELECT * FROM opciones WHERE id_pregunta=$id_pregunta ORDER BY valor ASC");
        while($conexion2->next_record())
        {
            $opciones[$id_pregunta][$conexion2->f(valor)]=  utf8_encode($conexion2->f(opcion));
        }
    }
    return $opciones;
    
}


function opciones_orden($id_campana)
{
    $conexion = new Database;
    $conexion2 = new Database;
    $conexion->query("SELECT * FROM preguntas WHERE id_campana=$id_campana ORDER BY orden ASC");
    while($conexion->next_record())
    {
        $id_pregunta=$conexion->f(id_pregunta);
        $conexion2->query("SELECT * FROM opciones WHERE id_pregunta=$id_pregunta ORDER BY orden ASC");
        while($conexion2->next_record())
        {
            $opciones[$id_pregunta][$conexion2->f(valor)]=  utf8_decode($conexion2->f(opcion));
        }
    }
    return $opciones;
    
}

function arregla($datos)
{
    $datos=explode(";",$datos);
    $i=0;
    foreach ($datos as &$valor) {

            $valor=getStringBetween($valor,"\"","\"");

            if($i==0)$variable=$valor;
            if($i==1)$val=$valor;

            $final[$variable]=$valor;
            $i++;
            if($i==2)$i=0;
    }
    return $final;
}

function evaluacliente2($clisess)
//Verifica que la sesion este activa
{
    $_COOKIE[idusu];
    $conexion = new Database;
    $conexion->query("SELECT * FROM usuarios WHERE sesion='$clisess'");
    $conexion->next_record();
    $id_usuario=$conexion->f(id_usuario);
    if($_COOKIE[idusu]!=$id_usuario)        
    redirigir ('index.php', '', "a=s");
}

function evaluacliente($clisess,$id)
{
    $conexion = new Database;
    $conexion->query("SELECT * FROM cliente WHERE cliente=1 AND id=$id");
    $conexion->next_record();
    $clave=$conexion->f(clave);
    if($clave!=$clisess)
    redirigir ('index.php', '', "a=s");
    
    
}

function permisos($id_usuario)
{
    $conexion = new Database;
    $conexion->query("SELECT * FROM permisos WHERE id_usuario=$id_usuario");
    while($conexion->next_record())
    {
        $permisos[$conexion->f(nombre)][$conexion->f(valor)]=1;
    }
    
    return $permisos;
}

function alertas($usuario)
{
    $conexion = new Database;
    $concesionariosql=sqlfiltro($_COOKIE[idusu], 'concesionario');
    $conexion->query("SELECT id_servicio FROM alertas WHERE estado=0 $concesionariosql GROUP BY id_servicio");
    return $conexion->num_rows();
}

function quitar_tildes($cadena) {
$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã","Ã‹");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
$texto = str_replace($no_permitidas, $permitidas ,$cadena);
return $texto;
}

function quitar_tildes2($cadena) 
//<editor-fold> 
{  $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã","Ã‹");
    $permitidas= array ("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&Aacute;","E","I","O","U","&ntilde;","&Ntilde;","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);
    return $texto;
}
//</editor-fold>

function cabeceras($tabla)
{
    $conexion = new Database;
    $conexion->query("SHOW COLUMNS FROM $tabla");
    while($conexion->next_record())
    {
        $cab=utf8_decode($conexion->f(0));
        $cab=  str_replace("_", " ", $cab);
        $cab= strtoupper(quitar_tildes($cab));
        $cabeceras.="\"".$cab."\";";
    }
    return $cabeceras;
}

function habeas($habeas)
{
    if($habeas==0) return "Sin responder";
    if($habeas==1) return "No";
    if($habeas==2) return "Si";
    
}

function mailalerta($id_alerta)
{
    $alerta=  reg('alertas', 'id_alerta', $id_alerta);
    $servicio=  reg('servicios', 'id_servicio', $alerta[id_servicio]);
    $contacto=  reg('contactos', 'id_contacto', $servicio[id_contacto]);
    $vehiculo=  reg('vehiculos', 'id_vehiculo', $servicio[id_vehiculo]);
    $concesionario= reg('concesionarios', 'concesionario', $alerta[concesionario]); 
    print_r($concesionario);
}

function enviar_mail($para,$para_nombre,$motivo,$mensaje)
{
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = '192.185.16.186';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = "alertas@databusiness.com.co";
    $mail->Password = "Data2016";
    $mail->setFrom('recolecciones@redverde.co', 'Red Verde');
    $mail->addReplyTo('recolecciones@redverde.co', 'Red Verde');
    $mail->Subject = $motivo;
    $mail->addAddress($para, $para_nombre);
    $mail->msgHTML($mensaje);
    $mail->send();    
    return 1;
}

function enviar_mail_data($para,$para_nombre,$motivo,$mensaje,$de='',$de_email='')
{
    if(!$de){
        $de='Sistema de Red Verde';
        $de_email='recolecciones@redverde.co';
    }
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 3;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = "envios@databusiness.com.co";
    $mail->Password = "Envi2016";
    $mail->setFrom($de_email, $de);
    $mail->addReplyTo($de_email, $de);
    $mail->Subject = utf8_decode($motivo);
    $mail->addAddress($para, $para_nombre);
    $mail->AddCC("desarrollo3@databusiness.com.co","Desarrollo");
    $mail->msgHTML($mensaje);
    $mail->send();    
    return 1;
}

function enviar_mail_alerta($para,$para_nombre,$motivo,$mensaje,$de='',$de_email='',$id='')
{
    $conexion = new Database;
    if(!$de){
        $de='Sistema de Red Verde';
        $de_email='recolecciones@redverde.co';
    }
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 3;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = "envios@databusiness.com.co";
    $mail->Password = "Envi2016";
    $mail->setFrom($de_email, $de);
    $mail->addReplyTo($de_email, $de);
    $mail->Subject = utf8_decode($motivo);
    $mail->addAddress($para, $para_nombre);
    $mail->addAddress('recolecciones@redverde.co',$de);
    $mail->AddCC("logistica@redverde.co","Logistica");
    $mail->AddBCC("operaciones@redverde.co","Operaciones");
    $mail->AddBCC("redverdedata@gmail.com","Backup");
    $mail->msgHTML($mensaje);
    $mail->send();    
    $ya=time();
    
    $conexion->query("INSERT INTO log_correos (id_solicitud,email,nombre,fecha_envio,asunto)"
            . " VALUES ('$id','$para','$para_nombre',$ya,'$motivo') ");
        
    return 1;
}

function enviar_mail_encuesta($para,$para_nombre,$motivo,$mensaje,$de='')
{
    if(!$de)$de='Red Verde - Posconsumo de Electrodomésticos';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 3;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = "envios@databusiness.com.co";
    $mail->Password = "Envi2016";
    $mail->setFrom('recolecciones@redverde.co', utf8_decode($de));
    $mail->addReplyTo('recolecciones@redverde.co', utf8_decode($de));
    $mail->Subject = utf8_decode($motivo);
    $mail->addAddress($para, $para_nombre);
    $mail->addAddress('recolecciones@redverde.co','Recolecciones');
    $mail->AddCC("logistica@redverde.co","Logistica");
    $mail->msgHTML($mensaje);
    $mail->send();    
    return 1;
}

function estado_citas($estado)
{
    if($estado==0)return "Programada";
    if($estado==1)return "Realizada";
    if($estado==2)return "Cancelada";    
    
}

function mime($extension)
{
switch ($extension) {

case "txt":
        return "text/plain";
        break;
case "xls":
        return "application/vnd.ms-excel";
        break;
case "pdf":
        return "application/pdf";
        break;
case "doc":
        return "application/msword";
        break;                 
case "zip":
        return "application/x-compressed";
        break;
case "ppt":
        return "application/vnd.ms-powerpoint";
        break;
case "jpg":
        return "image/jpeg";
        break;        
case "avi":
        return "video/avi";
        break;
case "mov":
        return "video/quicktime";
        break;        
case "mp3":
        return "audio/mpeg3";
        break;        
}

}

function mes ($numero_mes){

    switch ($numero_mes){
        case 1:
            $mes='Enero';break;
        case 2:
            $mes='Febrero';break;
        case 3:
            $mes='Marzo';break;
        case 4:
            $mes='Abril';break;
        case 5:
            $mes='Mayo';break;
        case 6:
            $mes='Junio';break;
        case 7:
            $mes='Julio';break;
        case 8:
            $mes='Agosto';break;
        case 9:
            $mes='Septiembre';break;
        case 10:
            $mes='Octubre';break;
        case 11:
            $mes='Noviembre';break;
        case 12:
            $mes='Diciembre';break;
    }
    
    return $mes;
}

function lista_meses($mes,$nom_select,$add){
    
    $select .="<select name='$nom_select' id='$nom_select' $add>";
    if($mes=='01')$select .="<option value='01' selected>Enero</option>";
    else $select .="<option value='01'>Enero</option>";
    if($mes=='02')$select .="<option value='02' selected>Febrero</option>";
    else $select .="<option value='02'>Febrero</option>";
    if($mes=='03')$select .="<option value='03' selected>Marzo</option>";
    else $select .="<option value='03'>Marzo</option>";
    if($mes=='04')$select .="<option value='04' selected>Abril</option>";
    else $select .="<option value='04'>Abril</option>";
    if($mes=='05')$select .="<option value='05' selected>Mayo</option>";
    else $select .="<option value='05'>Mayo</option>";
    if($mes=='06')$select .="<option value='06' selected>Junio</option>";
    else $select .="<option value='06'>Junio</option>";
    if($mes=='07')$select .="<option value='07' selected>Julio</option>";
    else $select .="<option value='07'>Julio</option>";
    if($mes=='08')$select .="<option value='08' selected>Agosto</option>";
    else $select .="<option value='08'>Agosto</option>";
    if($mes=='09')$select .="<option value='09' selected>Septiembre</option>";
    else $select .="<option value='09'>Septiembre</option>";
    if($mes=='10')$select .="<option value='10' selected>Octubre</option>";
    else $select .="<option value='10'>Octubre</option>";
    if($mes=='11')$select .="<option value='11' selected>Noviembre</option>";
    else $select .="<option value='11'>Noviembre</option>";
    if($mes=='12')$select .="<option value='12' selected>Diciembre</option>";
    else $select .="<option value='12'>Diciembre</option>";
    
    
    $select .="</select>";
    return $select;
    
    
}

function Imagen_Promedio($valor,$comparativo){
    if(!$valor || $valor==0){
        $img[0]="";
        $img[1]="";
    }
    else
    {
        if($valor>$comparativo){
            $img[0]="<img  src='./images/incremento.png' width=10 height=10 >";
            $img[1]="color:darkgreen";
        }elseif($valor<$comparativo){
            $img[0]="<img  src='./images/desincremento.png' width=10 height=10 >";
            $img[1]="color:firebrick";
        }elseif($valor==$comparativo){
            $img[0]="<img  src='./images/igual.png' width=10 height=10 >";
            $img[1]="";
        }else{$img[0]="";$img[1]="";}
    }
    
    return $img;
}

function sqlfiltro($id_usuario,$nombre,$campo='')
{
    $conexion = new Database;
    $conexion->query("SELECT * FROM permisos WHERE id_usuario=$id_usuario AND nombre='$nombre'");
    if($campo)$nombre=$campo;
    while($conexion->next_record())
    {
        $valor=$conexion->f(valor);
        $sql.=" $nombre='$valor' OR ";
    }
    $sql=  substr($sql, 0,-4);
    $sql="AND ($sql) ";
    return $sql;    
}

function lista_permisos($id_usuario,$nombre,$opc='',$select,$add='')
{
    $conexion = new Database;
    $conexion->query("SELECT valor FROM permisos WHERE id_usuario=$id_usuario AND nombre='$nombre'");
    if(!$opc){
        $lista="<select name=\"$select\" id=\"$select\" $add>";
        $lista.="<option value=\"0\">Todos</option>";
    }
    while($conexion->next_record())
    {
        $lista.="<option value=\"".utf8_encode($conexion->f(0))."\">".utf8_encode($conexion->f(0))."</option>";
    }
    $lista.="</select>";
    return $lista;
    
}

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message)
//<editor-fold>
//ENVIA MENSAJE
{
    $uid = md5(uniqid(time()));
    if($filename){
        $file = $path.$filename;
        $file_size = filesize($file);
        $handle = fopen($file, "r");
        $content = fread($handle, $file_size);
        fclose($handle);
        $content = chunk_split(base64_encode($content));
        $name = basename($file);
    }
    
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    if($filename)$header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    if($filename)$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    
    if (mail($mailto, $subject, "", $header)) {
    //echo "mail send ... OK"; // or use booleans here
    } else {
    //echo "mail send ... ERROR!";
    }
}
//</editor-fold>


function Motivo_Alerta ($id_servicio)
//Listado de Alertas que se genero del servicio
//<editor-fold>
{
    $conexion= new Database;
    $conexion->query("SELECT * FROM alertas WHERE id_servicio=$id_servicio");
    while($conexion->next_record()){
        $p=$conexion->f(id_pregunta);
        if($p==418){$alerta_por .='Alerta Por: Servicio de Taller <br>';}
        if($p==398){$alerta_por .='Alerta Por: Tiempo de Entrega y Exp Compra <br>';}
    }
    return $alerta_por;
}
//</editor-fold>


function Tipo_Pregunta ($id_pregunta)
//Listado de Alertas que se genero del servicio
//<editor-fold>
{
    $conexion= new Database;
    $conexion->query("SELECT * FROM opciones WHERE id_pregunta=$id_pregunta AND valor='1'");
    while($conexion->next_record()){
        $p=$conexion->f(opcion);
        if($p=='Muy Mala'){$tipo=1;}
        elseif($p=='Definitivamente No'){$tipo=2;}
        elseif($p=='Si'){$tipo=3;}
        else {$tipo=4;}
    }
    
    $conexion->query("SELECT * FROM opciones WHERE id_pregunta=$id_pregunta");
    $c=$conexion->num_rows();
    
    if($tipo==1 && $c==6)$tipo=1;
    elseif($tipo==2 && $c==6)$tipo=2;
    elseif($tipo==3 && $c==3)$tipo=3;
    else $tipo=4;
    
    
    return $tipo;
}
//</editor-fold>

function Add_Opcion ($tipo,$cant,$value=0){
    
        if($tipo==1 && $cantidad==6)$t='';
        if($tipo==2 && $cantidad==6)$t='';
        if($tipo==3 && $cantidad==3)$t='';

        if($cantidad<$cant){
                $csets=$cant-$cantidad;

            for($i=1;$i<$csets;$i++){
                $sets.="<set value='' />";
            }
        }else $sets='';
        
        return $sets;
    
}
//</editor-fold>


function Formato_Numerico ($valor,$diferente,$decimales,$add=''){
    if($valor==$diferente)$formato='-';
    else $formato=number_format($valor,$decimales,',','.').$add;
    
    return $formato;
}

function Solicitud_Andi($id)
//Linea de Atencion Andi
//<editor-fold>
{
    switch($id){
        case 1: $tipo='Entrega (Contenedor Andi)';break;
        case 2: $tipo='Entrega (Disposicion de Pilas)';break;
        case 3: $tipo='Envio de Certificado';break;
        case 4: $tipo='Informacion Programa';break;
        case 5: $tipo='Informacion Programas Posconsumo';break;
        case 6: $tipo='Instalacion de Contenedor';break;
        case 7: $tipo='Otros';break;
        case 8: $tipo='Compra de Contenedor';break;
    }
    return $tipo;
}
//</editor-fold>

?>