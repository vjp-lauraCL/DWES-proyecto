<?php
require_once 'exceptions/queryExceptions.class.php';
require_once 'utils/const.php';
require_once 'entities/app.class.php';
require_once 'entities/database/iEntity.class.php';
abstract class  QueryBuilder{
    /**
     * @var PDO
     */
    private $connection;


    private $table;
    private $classEntity;
    /**
     * @param PDO $connection
     */
    public function __construct($table, $classEntity){
        $this->connection=App::getConnection();
        $this->table=$table;
        $this->classEntity=$classEntity;
    }
    public function findAll(){


        $sqlStatement="Select * from $this->table";
        // mejor prepare para evitar que metan codigo sql


        $pdoStatement=$this->connection->prepare($sqlStatement);


        if($pdoStatement->execute()===false){


            throw new QueryException(getErrorString(ERROR_EXECUTE_STATEMENT));


        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS,$this->classEntity);
       
    }
    public function save(IEntity $entity): void{
        try{
        $parameters =$entity->toArray();


        $sql = sprintf('insert into %s (%s) values(%s)',
        $this->table,
        implode(', ',array_keys($parameters)),
        ':'.implode(',:',array_keys($parameters)) // :id, :nombre, :descripcion
    );
   
        $statement =$this->connection->prepare($sql);
        $statement->execute($parameters);
        if($entity instanceof ImagenGaleria){
            $this->incrementNumCategorias($entity->getCategoria());
        }
    }catch(PDOException $exception){
        // die ($exception->getMessage());
        throw new  QueryException(getErrorString($exception));
    }
   
    }
    public function incrementNumCategorias(int $categoria){
        try{
            $this->connection->beginTransaction();
            $sql = "UPDATE categorias SET numImagenes = numImagenes+1 WHERE id = $categoria";
            $this->connection->exec($sql);
            $this->connection->commit();
        }catch(PDOException $exception){
            $this->connection->rollBack();
            throw new Exception($exception->getMessage());
        }
       
    }

}


?>

