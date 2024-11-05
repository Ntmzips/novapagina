
<?php
class Banco {

   private $pdo;
   private $array;
   private $numRows;


    public function __construct($host, $dbname, $user, $pass){
        try{ 
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user, $pass);

        } catch(PDOException $e){
            echo "Erro".$e->getMessage();
        }
    }
    public function query($sql) {
        $query = $this->pdo->query($sql);
        $this->numRows = $query->rowCount();
        $this->array = $query->fetchAll();
    }

    public function numRows(){
       return $this->numRows;
    }

    public function result() {
        return $this->array;
    }


    public function insert($table, $data) {
        if(!empty($table) && (is_array($data) && count($data) > 0)) {
            $sql = "INSERT INTO ".$table." SET ";
            //INSERT INTO tabela SET nome = 'jose', idade = 90
            $dados = array();
            foreach($data as $chave => $valor){
                $dados[] = $chave." = '".addslashes($valor)."'";
            }
            $sql = $sql.implode(", ", $dados);
            
            $this->pdo->query($sql);
        }
    }

}


?>