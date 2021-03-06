<?php
/*
    This is the Data Access Object for the webserver.  It should handle ALL requests.
      All functions take an argument list (for the ?'s) and a base query which will
      be manipulated by the DAO to a valid expression. 
*/
require_once CLASS_DIR . '/utils/database/DBConnection.php';
require_once CLASS_DIR . '/utils/database/QueryFactories.php';

class DAO{
  private $queryMap;
  public function __construct(){
    $this->queryMap = QueryListFactory::create(RESOURCE_DIR . "/SQL/queries.xml");
  }
  
  public function select($queryName, $args){
    $link = DBConnection::createConnection("Website");
    $query = (string)QueryFactory::create($this->queryMap->get($queryName), $args)->getQuery();
    
    logMessage("/query.log", "About to execute: " . $query);
    $result = mysqli_query($link, $query) or die(mysql_error());
    logMessage("/query.log", "Executed successfully, rows: " . $result->num_rows);
    
    DBConnection::closeConnection();
    return $result;
  }  
  public function update($queryName, $args){
    $link = DBConnection::createConnection("Website");
    $query = (string)QueryFactory::create($this->queryMap->get($queryName), $args)->getQuery();
    
    logMessage("/query.log", "About to execute: " . $query);
    $result = mysqli_query($link, $query) or die(mysql_error());
    logMessage("/query.log", "Executed successfully");
    
    if(LOG_BACKUP_QUERIES){
      logBackupQuery($query);
    }
    
    DBConnection::closeConnection();
  }
  
  //These functions just map to update since I dont see any difference as of now
  public function insert($queryName, $args){
    $this->update($queryName, $args);
  }
  public function delete($queryName, $args){
    $this->update($queryName, $args);
  }
}
?>