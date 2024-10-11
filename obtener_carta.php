<?php
if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    
    class obtener_Productos{
        // (A) CONSTRUCTOR - CONNECT TO DATABASE
        private $pdo; // PDO object
        private $stmt; // SQL statement
        public $error; // Error message
        
        function __construct() {
            try {
                $this->pdo = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
                    DB_USER, DB_PASSWORD, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
                        ]
                    );
                } catch (Exception $ex) { exit($ex->getMessage()); }
            }
            
            
            function __destruct() {
                $this->pdo = null;
                $this->stmt = null;
            }
            
            function obtplatillos () {
                
                // (C2) DATABASE ENTRY
                try {
                    
                    $this->stmt = $this->pdo->prepare("SELECT Nombre, Precio FROM productos");
                    $this->stmt->execute();
                    return $this->stmt->fetchall( PDO::FETCH_DEFAULT); 
                } catch (Exception $ex) {
                    $this->error = $ex->getMessage();
                    return false;
                }
            }
            
        }
    }
    
    
    define("DB_HOST", "localhost");
    define("DB_NAME", "carta_palacio");
    define("DB_CHARSET", "utf8");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    
    ?>