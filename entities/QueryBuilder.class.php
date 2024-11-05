<?php
require_once 'utils/const.php';
require_once 'exceptions/queryExceptions.class.php';
    class QueryBuilder{
        /**
         * @var PDO
         */
        private $conection;

        /**
         * @param PDO $conection
         */

        public function __construct(PDO $conection){
            $this->conection = $conection;
        }
        public function findAll(string $table, string $classEntity){
            $sql = "SELECT *from $table";
        
            $pdoStatment = $this->conection->prepare($sql);
        
            $pdoStatment->execute();
        
            if($pdoStatment->execute()=== false){
                throw new QueryExceptions("No se ha podido ejecutar la consulta");
        
            }
        
            return $pdoStatment->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $classEntity);
        }
    
    }

?>