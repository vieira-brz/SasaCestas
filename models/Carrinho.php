<?php 

    include 'config/Model.php';

    class Carrinho extends ModelConfiguration {
        
        // Cadastro de carrinho
        public function cadastrar($post)
        {
            $query = 'insert into '. $this->dbname .'.carrinho (ID_CESTA, CONFIRMADO, ID_USER) values("'. $post['id'] .'", "NAO", "'. $post['idU'] .'");';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            return $stmt->rowCount();
        }        
        
        // Delete de carrinho
        public function deletar($post)
        {
            $query = 'delete from '. $this->dbname .'.carrinho where ID_CARRINHO = '. $post['id'] .';';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            return $stmt->rowCount();
        }        
        
        // Confirmar compra
        public function confirmar($post)
        {
            $query = 'update '. $this->dbname .'.carrinho set CONFIRMADO = "SIM" where ID_CARRINHO = '. $post['id'] .';';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            return $stmt->rowCount();
        }        
        
        // Recuperar todos o carrinho
        public function buscarCar($post)
        {
            $query = 'select * from '. $this->dbname .'.carrinho as car inner join sasa.cestas as cesta on cesta.ID = car.ID_CESTA where car.ID_USER = '. $post['idU'] .' and CONFIRMADO = "NAO";';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) { return $row; }
            else { return false; }
        }
    }

?>