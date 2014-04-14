<?php

if(!defined('IN_OESOFT')) {
exit('OElove Access Denied');
}
class mysqlClass {
var $querynum = 0;
var $link;
var $charset;
public function connect($dbhost,$dbuser,$dbpw,$dbname = '',$dbcharset = 'utf8',$pconnect = 0,$halt = TRUE) {
if ($pconnect == 1) {
if(!$this->link = @mysql_pconnect($dbhost,$dbuser,$dbpw)) {
$halt &&$this->halt('Can not connect to MySQL server');
}
}
else {
if (!$this->link = @mysql_connect($dbhost,$dbuser,$dbpw,1)) {
$halt &&$this->halt('Can not connect to MySQL server');
}
}
if($this->version() >'4.1') {
if (!empty($dbcharset)) {
@mysql_query("SET character_set_connection=$dbcharset, character_set_results=$dbcharset, character_set_client=binary",$this->link);
}
if($this->version() >'5.0.1') {
@mysql_query("SET sql_mode=''",$this->link);
}
}
if($dbname) {
@mysql_select_db($dbname,$this->link);
}
}
public function select_db($dbname) {
return mysql_select_db($dbname,$this->link);
}
public function fetch_array($query,$result_type = MYSQL_ASSOC) {
return mysql_fetch_array($query,$result_type);
}
public function fetch_first($sql,$master=false) {
$resource = $this->query($sql,$master);
if ($resource) {
$row = mysql_fetch_array($resource,MYSQL_ASSOC);
$this->free_result($resource);
return $row;
}
else {
return NULL;
}
}
public function result_first($sql) {
return $this->result($this->query($sql),0);
}
public function query($sql,$type = '') {
$func = $type == 'UNBUFFERED'&&@function_exists('mysql_unbuffered_query') ?
'mysql_unbuffered_query': 'mysql_query';
if(!($query = $func($sql,$this->link))) {
if(in_array($this->errno(),array(2006,2013)) &&substr($type,0,5) != 'RETRY') {
$this->close();
require BASE_ROOT.'./source/conf/db.inc.php';
$this->connect(DB_HOST,DB_USER,DB_PASS,DB_DATA,DB_CHARSET,DB_PCONNECT,true);
return $this->query($sql,'RETRY'.$type);
}
elseif($type != 'SILENT'&&substr($type,5) != 'SILENT') {
if (strpos($sql,"ADD INDEX") ||strpos($sql,"DROP INDEX")) {
}
else {
$this->halt('MySQL Query Error',$sql);
}
}
}
$this->querynum++;
return $query;
}
public function affected_rows() {
return mysql_affected_rows($this->link);
}
public function error() {
return (($this->link) ?mysql_error($this->link) : mysql_error());
}
public function errno() {
return intval(($this->link) ?mysql_errno($this->link) : mysql_errno());
}
public function result($query,$row = 0) {
$query = @mysql_result($query,$row);
return $query;
}
public function num_rows($query) {
$query = mysql_num_rows($query);
return $query;
}
public function num_fields($query) {
return mysql_num_fields($query);
}
public function free_result($resource) {
if (is_resource($resource)) {
mysql_free_result($resource);
}
}
public function insert_id() {
return ($id = mysql_insert_id($this->link)) >= 0 ?$id : $this->result($this->query("SELECT last_insert_id()"),0);
}
public function fetch_row($query) {
$query = mysql_fetch_row($query);
return $query;
}
public function fetch_fields($query) {
return mysql_fetch_field($query);
}
public function version() {
if(empty($this->version)) {
$this->version = mysql_get_server_info($this->link);
}
return $this->version;
}
public function close() {
return mysql_close($this->link);
}
public function halt($message = '',$sql = '') {
$dberror = $this->error();
$dberrno = $this->errno();
echo "<meta http-equiv='Content-Type' content='text/html;charset=".OESOFT_CHARSET."' /><div style=\"position:absolute;font-size:11px;font-family:verdana,arial;background:#EBEBEB;padding:0.5em;\"><b>MySQL Error</b><br><b>Message</b>: $message<br><b>SQL</b>: $sql<br><b>Error</b>: $dberror<br><b>Errno.</b>: $dberrno<br></div>";
exit();
}
public function getall($sql,$iscache=true){
$res = $this->query($sql);
if ($res !== false){
$arr = array();
while ($row = mysql_fetch_assoc($res)){
$arr[] = $row;
}
$this->free_result($res);
}else{
return false;
}
return $arr;
}
public function insert($table,$array,$auto=0,$is=0) {
$fields = $values = array();
if(empty($array)) return false;
$sql_array=array();
if($is) {
foreach ($array[0] as $key =>$val) {
$fields[]=$key;
}
foreach ($array as $arr) {
foreach ($arr as $key =>$val) {
$values[]=$this->encode($val);
}
$sql_array[]='(\''.implode('\',\'',$values).'\')';
$values=array();
}
}else {
foreach($array as $key=>$val) {
$fields[]=$key;
$values[]=$this->encode($val);
}
$sql_array[]='(\''.implode('\',\'',$values).'\')';
}
$sql = 'INSERT INTO '.$table.' ('.implode(',',$fields).') VALUES ';
$sql.= implode(',',$sql_array).';';
if ($this->query($sql)) {
if ($auto == 1) {
return $this->insert_id();
}
else {
return true;
}
}
else{
return false;
}
}
public function update($table,$array,$where=null) {
$fields = $values = array();
foreach($array as $key=>$val) {
$values[]=preg_match("/^\[\[.+\]\]$/",$val)
?$key.'='.substr($val,2,-2)
: $key.'=\''.$this->encode($val).'\'';
}
$sql='UPDATE '.$table.' SET '.implode(',',$values).(empty($where) ?';': ' WHERE '.$where.';');
if ($this->query($sql)) {
return true;
}
else {
return false;
}
}
public function encode($s) {
if(MAGIC_QUOTES_GPC){
$s = stripslashes($s);
}
return addslashes($s);
}
public function fetch_newid($sql,$startid){
$n_id   = 0;
$result = $this->query($sql);
$ns     = $this->result($result,0);
if(empty($ns) ||$ns==""){
$n_id = $startid;
}else{
$n_id = ($ns+1);
}
return $n_id;
}
public function fetch_count($sql){
return $this->result($this->query($sql),0);
}
public function check_data($sql){
$returnflag  = false;
$result = $this->query($sql);
if($this->num_rows($result)==0){
$returnflag = false;
}else{
$returnflag = true;
}
return $returnflag;
}
public function create_table($tabname,$sql){
$sql_strings = "CREATE TABLE IF NOT EXISTS {$tabname} ({$sql}) ENGINE=MyISAM  CHARSET=".DB_CHARSET.";";
$this->query($sql_strings);
}
public function alter_table($tableName,$sql){
$this->query("ALTER TABLE {$tableName} {$sql};");
}
public function table_exist($table){
$status = false;
$rs = $this->query("SHOW TABLE STATUS LIKE '".DB_PREFIX."%'");
while ($dbList = $this->fetch_assoc($rs) ) {
$db_tabls[] = $dbList['Name'];
}
unset($rs);
if (in_array(DB_PREFIX.$table,$db_tabls)) {
$status = true;
}
return $status;
}
public function get_one($SQL){
$query=$this->query($SQL,'UNBUFFERED');
$rs =&mysql_fetch_array($query,MYSQL_ASSOC);
return $rs;
}
public function fetch_assoc($query) {
return mysql_fetch_assoc($query);
}
public function get_row($sql,$limited = false) {
if ($limited == true) {
$sql = trim($sql .' LIMIT 1');
}
$res = $this->query($sql);
if ($res !== false) {
return mysql_fetch_assoc($res);
}else {
return false;
}
}
}
?>