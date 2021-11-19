<?php 

    include 'config/Model.php';

    class Pedidos extends ModelConfiguration {
        
        // Cadastro de pedidos
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
       /* ne" onclick="confirmar('confirmar')">CONFIRMAR ETAPA</button> <i class="fas fa-check-circle"></i> <div class="status-pedido">CONFIRMADO</div> </div>
                    <div class="dot"> <button class="none" onclick="confirmar('saida')">CONFIRMAR ETAPA</button> <i class="fas fa-check-circle"></i> <div class="status-pedido">SAIU PRA ENTREGA</div> </div>
                    <div class="dot"> <button class="none" onclick="confirmar('chegada')">CONFIRMAR ETAPA</button> <i class="fas fa-check-circle"></i> <div class="status-pedido">CHEGADA NO DESTINO</div> </div>
                    <div class="dot"> <button class="none" onclick="confirmar('encerrar')" */
        public function confirmar($post)
        {
            switch ($post['acao']) 
            {
                case 'confirmar':
                    $query = 'update '. $this->dbname .'.pedidos set CONFIRMADO = "S" where ID_PEDIDO = '. $post['id'] .';';
                break;
                    
                case 'saida';
                    $query = 'update '. $this->dbname .'.pedidos set SAIDA = "S" where ID_PEDIDO = '. $post['id'] .';';
                break;
                    
                case 'chegada';
                    $query = 'update '. $this->dbname .'.pedidos set CHEGADA = "S" where ID_PEDIDO = '. $post['id'] .';';    
                break;
                    
                case 'encerrar';
                    $query = 'update '. $this->dbname .'.pedidos set ENCERRADO = "S" where ID_PEDIDO = '. $post['id'] .';';
                break;
            }


            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            return $stmt->rowCount();
        }        
        
        // Recuperar pedidos
        public function tabelaMaster()
        {
            $query = 'select p.ID_PEDIDO, p.ID_USER, p.ENCERRADO, c.NOME_CESTA, c.VALOR_CESTA, e.ENDERECO, e.ID  from '. $this->dbname .'.pedidos as p inner join '. $this->dbname .'.cestas as c on c.ID = p.ID_CESTA inner join '. $this->dbname .'.enderecos as e on e.ID = p.ID_ENDERECO where ENCERRADO = "N";';
   
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) { return $row; }
            else { return false; }
        }
        
        // Recuperar pedidos
        public function carregarTabelaToda()
        {
            $query = 'select p.ID_PEDIDO, p.ID_USER, p.ENCERRADO, c.NOME_CESTA, c.VALOR_CESTA, e.ENDERECO, e.ID  from '. $this->dbname .'.pedidos as p inner join '. $this->dbname .'.cestas as c on c.ID = p.ID_CESTA inner join '. $this->dbname .'.enderecos as e on e.ID = p.ID_ENDERECO;';
   
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) { return $row; }
            else { return false; }
        }
        
        // Recuperar dados pedido
        public function buscarId($post)
        {
            $query = 'select p.ID_PEDIDO, c.NOME_CESTA, c.VALOR_CESTA, e.ENDERECO, e.ID, p.ENVIADO, p.CONFIRMADO, p.SAIDA, p.CHEGADA, p.ENCERRADO from '. $this->dbname .'.pedidos as p inner join '. $this->dbname .'.cestas as c on c.ID = p.ID_CESTA inner join '. $this->dbname .'.enderecos as e on e.ID = p.ID_ENDERECO where ID_PEDIDO = '. $post['id'] .';';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) { return $row; }
            else { return false; }
        }
    }

?>