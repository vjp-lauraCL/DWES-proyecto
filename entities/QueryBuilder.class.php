<?php
require_once 'entities/database/iEntity.class.php';
require_once 'exceptions/queryExceptions.class.php';
require_once 'utils/const.php';
require_once 'entities/app.class.php';

abstract class QueryBuilder{
    /**
     * @var PDO
     */
    private $conection;
    private $table;
    private $classEntity;

    /**
     * @param PDO $conection
     */
    public function __construct(string $table, string $classEntity){
        $this->conection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }

    public function findAll(){
        $sql = "SELECT * FROM $this->table";
        $pdoStatment = $this->conection->prepare($sql);
        
        if($pdoStatment->execute() === false){
            throw new QueryException("No se ha podido ejecutar la consulta");
        }
        
        return $pdoStatment->fetchAll(PDO::FETCH_CLASS, $this->classEntity);
    }

        public function save(IEntity $entity): void{
            try{
                $parameters = $entity->toArray();
                $sql = sprintf('insert into %s (%s) values (%s)', $this->table, implode (', ', array_keys($parameters)),
            ': '. implode(',:', array_keys($parameters))); //:id, :nombre, :descripcion

            
            $statement = $this->conection->prepare($sql);
            $statement->execute($parameters);
            
            }catch(PDOException $exceptio){
                throw new QueryException("Error al insertar la BD");

                }
            }
         
        }
    

?>