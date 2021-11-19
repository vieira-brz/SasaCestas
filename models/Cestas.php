<?php 

    include 'config/Model.php';

    class Cestas extends ModelConfiguration {
        
        // Cadastro de usuários
        public function cadastrar($post)
        {
            $query = 'insert into '. $this->dbname .'.cestas (NOME_CESTA, DESC_CESTA, VALOR_CESTA, IMAGEM_CESTA) values("'. $post['nome'] .'", "'. $post['desc'] .'", '. $post['valor'] .', "");';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            return $stmt->rowCount();
        }        
        
        // Recuperar todos os endereços do usuário
        public function buscarCestas()
        {
            $query = 'select * from '. $this->dbname .'.cestas';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) { return $row; }
            else { return false; }
        }
    }

?>