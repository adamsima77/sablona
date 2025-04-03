<?php
namespace otazkyodpovede;
require_once('config/config.php');
define('__ROOT__', dirname(dirname(__FILE__)));
USE PDO;


class Qna{

    private $conn;
    public function __construct(){
        $this->connect();



    }
  
    private function connect() {
        
        $config = DATABASE;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        );
        try {
        $this->conn = new PDO('mysql:host=' . $config['HOST'] . ';dbname=' .$config['DBNAME'] . 
        ';port=' . $config['PORT'], $config['USER_NAME'], $config['PASSWORD'], $options);        
        } catch (PDOException $e) {
            
            die("Chyba pripojenia: " . $e->getMessage());}    

    }


    public function insertQnA() {
        try {
            $data = json_decode(file_get_contents(__ROOT__ . '/json/data.json'), true);
            $otazky = $data["otazky"];
            $odpovede = $data["odpovede"];
    
            $this->conn->beginTransaction();
            
            
            $sql = "INSERT INTO qna (otazka, odpoved) VALUES (:otazka, :odpoved)";
            $statement = $this->conn->prepare($sql);
    
            //Overenie duplicít
            foreach ($otazky as $key => $otazka) {
                $odpoved = $odpovede[$key];
    
               
                $checkSql = "SELECT COUNT(*) FROM qna WHERE otazka = :otazka AND odpoved = :odpoved";
                $checkStmt = $this->conn->prepare($checkSql);
                $checkStmt->bindParam(':otazka', $otazka);
                $checkStmt->bindParam(':odpoved', $odpoved);
                $checkStmt->execute();
    
                $rowCount = $checkStmt->fetchColumn();
    
             
                if ($rowCount == 0) {
                    $statement->bindParam(':otazka', $otazka);
                   $statement->bindParam(':odpoved', $odpoved);
                    $statement->execute();
                }
            }
    
           
            $this->conn->commit();
            
    
        } catch (Exception $e) {
            $this->conn->rollBack();
            echo "Chyba pri vkladaní dát: " . $e->getMessage();
        } finally {
           
            $this->conn = null;
        }
    }

    //Výpis údajov z databázy
    public function vypisQna(){
        $this->connect();

        $sql = "SELECT DISTINCT * FROM qna";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        return $result;

       $this->conn = null;
}} 


?>