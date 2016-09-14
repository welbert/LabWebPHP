<?php
/**
 *
 * @author Welbert Serra
 * include 'connection_database.php';
 *Example : $result = DataBase::getInstance()->executeQuery("DELETE FROM Table WHERE field");
 */
class DataBase
{
   private static $instance;
   private static $conn;
   private function __construct()
   {
      $server = 'localhost';
      $user = 'root';
      $password = 'usbw';
      $dbname = "mybase";

      self::$conn = new mysqli($server, $user, $password,$dbname);

      // Check connection
      if (self::$conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      echo '<script type="text/javascript">',
   	"javascript: console.log('Connected successfully');",
   	'</script>';
   }

   public static function getInstance() { //Singleton
        if ( self::$instance === null)
            self::$instance = new self();

        return self::$instance;
   }

   public function executeQuerySelect($sql) //query que possui retorno de linhas
   {
      return self::$conn->query($sql);
   }

   public function executeQuery($sql) //query para saber se executou ou não com sucesso
   {
      if (self::$conn->query($sql) === TRUE) {
         return array(true);
      } else {
         return array(false,self::$conn->error);
      }
   }

   public function executeQueryLastId($sql)
   {
      if (self::$conn->query($sql) === TRUE) {
         $last_id = self::$conn->insert_id;
         return array($last_id);
      } else {
         return array(0,self::$conn->error);
      }
   }

}
DataBase::getInstance(); //Iniciando a primeira instancia
?>
