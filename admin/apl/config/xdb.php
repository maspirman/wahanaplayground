<?php

/* 
   *  PDO DATABASE CLASS
   *  Connects Database Using PDO
	 *  Creates Prepeared Statements
	 * 	Binds params to values
	 *  Returns rows and results
   */
class Db
{
  private static $host = DB_HOST;
  private static $user = DB_USER;
  private static $pass = DB_PASS;
  private static $dbname = DB_NAME;

  protected static $dbh;
  private $error;
  private static $stmt;

  public function __construct()
  {
    // Set DSN
    $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbname;
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    // Create a new PDO instanace
    try {
      Db::$dbh = new PDO($dsn, self::$user, self::$pass, $options);
    }    // Catch any errors
    catch (PDOException $e) {
      $this->error = $e->getMessage();
    }
  }

  // Prepare statement with query
  public static function query($query)
  {
    Db::$stmt = Db::$dbh->prepare($query);
  }

  // Bind values
  public static function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }
    self::$stmt->bindValue($param, $value, $type);
  }

  // Execute the prepared statement
  public static function execute()
  {
    return self::$stmt->execute();
  }

  // Get result set as array of objects
  public static function resultset()
  {
    Db::execute();
    return Db::$stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // Get result set as array of objects
  public static function resultarray()
  {
    Db::execute();
    return Db::$stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Get single record as object
  public static function single()
  {
    Db::execute();
    return Db::$stmt->fetch(PDO::FETCH_OBJ);
  }

  // Get record row count
  public static function rowCount()
  {
    Db::execute();
    return Db::$stmt->rowCount();
  }

  // Returns the last inserted ID
  public function lastInsertId()
  {
    return $this->dbh->lastInsertId();
  }

  // json result database
  public static function jsonPut($col, $tbl)
  {
    Db::query("SELECT * FROM `{$tbl}` ORDER BY `{$col}` DESC");
    $array = Db::resultset();

    // header('Content-Type: application/json');
    return json_encode($array);
  }
  
  // json result database
  public static function arrayPut($col, $tbl)
  {
    Db::query("SELECT * FROM `{$tbl}` ORDER BY `{$col}` DESC");
    $array = Db::resultarray();

    // header('Content-Type: application/json');
    return json_encode($array);
  }

  public static function insertDb($tbl, $array)
  {
    $key = array_keys($array);
    $keys = implode(',', $key);
    $value = array_values($array);
    $values = implode(',', $value);
    $sql = "INSERT INTO `{$tbl}` (`{$keys}`) VALUES (`{$values}`)";
    Db::query($sql);
    return Db::rowCount();
  }

  public static function selectDb($tbl, $array)
  {
    $key = array_keys($array);
    $sql = "SELECT * FROM `{$tbl}` ORDER BY '$key[0]'";
    Db::query($sql);
    return Db::resultarray();
  }

  public static function selectDbs($tbl, $array)
  {
    $keys = array_keys($array);
    $key = $keys[0];
    $values = array_values($array);
    $value = $values[0];
    $sql = "SELECT * FROM `{$tbl}` WHERE $key='$value'";
    Db::query($sql);
    return Db::resultarray();
    // return $key;
  }
}
