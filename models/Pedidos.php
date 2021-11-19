<?php 

    include 'config/Model.php';

    class Pedidos extends ModelConfiguration {
        
        // Cadastro de carrinho
        public function cadastrar($post)
        {
            $query = 'insert into '. $this->dbname .'.pedidos (ID_USER, ID_CESTA, ID_ENDERECO) values ('. $post['idU'] .', '. $post['idC'] .', '. $post['idE'] .');';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            return $stmt->rowCount();
        }        
        
        // Delete de carrinho
        public function deletar($post)
        {
            $query = 'delete from '. $this->dbname .'.pedidos where ID_CARRINHO = '. $post['id'] .';';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            return $stmt->rowCount();
        }        
        
        // Confirmar compra
        public function confirmar($post)
        {
            $query = 'update '. $this->dbname .'.pedidos set CONFIRMADO = "SIM" where ID_CARRINHO = '. $post['id'] .';';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            return $stmt->rowCount();
        }        
        
        // Recuperar todos o carrinho
        public function tabelaMaster()
        {
            $query = 'select p.ID_PEDIDO, c.NOME_CESTA, c.VALOR_CESTA, e.ENDERECO, e.ID  from '. $this->dbname .'.pedidos as p inner join '. $this->dbname .'.cestas as c on c.ID = p.ID_CESTA inner join '. $this->dbname .'.enderecos as e on e.ID = p.ID_ENDERECO where ENCERRADO = "N";';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) { return $row; }
            else { return false; }
        }
    }

?>