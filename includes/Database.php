<?php
/*
 * Session Management for PHP3
 *
 * (C) Copyright 1998 SH Online Dienst GmbH
 *                    Boris Erdmann, Kristian Koehntopp
 *
 * $Id: db_mysql.inc,v 1.5 1998/11/21 08:37:28 sas Exp $
 *
 */

class Database {
  var $Host     = "localhost";  
  var $Database = "rpex";
  var $User     = "root";
  var $Password = ''; 
  

    var $Link_ID  = 0;
  var $Query_ID = 0;
  var $Record   = array();
  var $Row;

  var $Errno    = 0;
  var $Error    = "";
  
#  var $Auto_free = 0;     ## Set this to 1 for automatic mysqli_free_result()

  function connect() {
    if ( 0 == $this->Link_ID ) {
      $this->Link_ID=mysqli_connect($this->Host, $this->User, $this->Password, $this->Database);
      if (!$this->Link_ID) {
        $this->Errno = mysqli_errno();
        $this->Error = mysqli_error();
        $this->Halt("Link-ID == false, pconnect failed");
      }
      /*
      if (!mysqli_query(sprintf("use %s",$this->Database),$this->Link_ID)) {
        $this->Errno = mysqli_errno();
        $this->Error = mysqli_error();
        $this->Halt("cannot use database ".$this->Database);
      }
       * 
       */
    }
  }

  function stateconnection(){
    if($this->Link_ID){
      return $this->Link_ID;
    }
  }

  function query($Query_String) {
    $this->connect();    
    //$this->Query_ID = mysqli_query($Query_String,$this->Link_ID);
    $this->Query_ID = mysqli_query($this->Link_ID,$Query_String);
    $this->Row   = 0;
    $this->Errno = mysqli_errno($this->Link_ID);
    $this->Error = mysqli_error($this->Link_ID);
    if (!$this->Query_ID) {
      $this->halt("Invalid SQL: ".$Query_String);
    }
    return $this->Query_ID;
  }

  function next_record() {
    $this->Record = mysqli_fetch_array($this->Query_ID);
    $this->Row   += 1;
    $this->Errno = mysqli_errno($this->Link_ID);
    $this->Error = mysqli_error($this->Link_ID);

    $stat = is_array($this->Record);
    if (!$stat && $this->auto_free) {
      mysqli_free_result($this->Query_ID);
      $this->Query_ID = 0;
    }
    return $stat;
  }

  function seek($pos) {
    $status = mysqli_data_seek($this->Query_ID, $pos);
    if ($status)
      $this->Row = $pos;
    return;
  }
  function metadata($table) {
    $count = 0;
    $id    = 0;
    $res   = array();

    $this->connect();
    /*$id = @mysqli_list_fields($this->Database, $table);*/
    /*if ($id < 0) {
      $this->Errno = mysqli_errno($this->Link_ID);
      $this->Error = mysqli_error($this->Link_ID);
      $this->halt("Metadata query failed.");
    }*/
    $id = mysqli_query($this->Link_ID,"SHOW COLUMNS FROM ".$table);

    if ($id != true) {
      $this->Errno = mysqli_errno($this->Link_ID);
      $this->Error = mysqli_error($this->Link_ID);
      $this->halt("Metadata query failed.");
    }

    $count = mysqli_num_fields($id);

    for ($i=0; $i<$count; $i++) {
      /*$res[$i]["table"] = mysqli_field_table ($id, $i);
      $res[$i]["name"]  = mysqli_field_name  ($id, $i);
      $res[$i]["type"]  = mysqli_field_type  ($id, $i);
      $res[$i]["len"]   = mysqli_field_len   ($id, $i);
      $res[$i]["flags"] = mysqli_field_flags ($id, $i);*/

      $info_campo = $id->fetch_field_direct($i);
      $res[$i]["table"] = $info_campo->table;
      $res[$i]["name"]  = $info_campo->name;
      $res[$i]["type"]  = $info_campo->type;
      $res[$i]["len"]   = $info_campo->length;
      $res[$i]["flags"] = $info_campo->flags;
      $res["meta"][$res[$i]["name"]] = $i;
      $res["num_fields"]= $count;
    }
    
    mysqli_free_result($id);
    return $res;
  }

  function affected_rows() {
    return mysqli_affected_rows($this->Link_ID);
  }

  function num_rows() {
    return mysqli_num_rows($this->Query_ID);
  }

  function num_fields() {
    return mysqli_num_fields($this->Query_ID);
  }

  function nf() {
    return $this->num_rows();
  }

  function np() {
    print $this->num_rows();
  }

  function f($Name) {
    return $this->Record[$Name];
  }

  function p($Name) {
    print $this->Record[$Name];
  }
  
  function halt($msg) {
    //mail('japarici@gmail.com','Error Bettingshop',"Error Bettingshop $msg");
    //echo "Tenemos un problema de conexion a la base de datos. Ya hemos recibido el reporte y estamos trabajando en solucionarlo lo antes posible<br/>$msg";
    //exit;
    
    printf("<b>MySQL Error</b>: %s (%s) $msg<br>\n",
      $this->Errno,
      $this->Error);
    die("Session halted.");
  }
  function get_next_id($sequence) {
   $temp_db_conn = new Database;
   $temp_db_conn->query("update $sequence set id = LAST_INSERT_ID(id+1)");
   if($temp_db_conn->Errno) return(-1);
   $temp_db_conn->query('select LAST_INSERT_ID()');
   if($temp_db_conn->Errno) return(-1);
   $temp_db_conn->next_record();
   return($temp_db_conn->f(0)+0);
  }
}
?>