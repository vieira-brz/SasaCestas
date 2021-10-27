<?php 

    include 'config/Model.php';

    class Endereco extends ModelConfiguration {
        
        // Cadastro de usuários
        public function cadastrar($post)
        {
            $query = 'insert into '. $this->dbname .'.enderecos (ID_USUARIO, ENDERECO, NUMERO, AMBIENTE, CEP, CIDADE, ESTADO, ATIVO) values ('. $post['idUser'] .', "'. $post['endereco'] .'", '. $post['numero'] .', "'. $post['ambiente'] .'", "'. $post['cep'] .'", "'. $post['cidade'] .'", "'. $post['estado'] .'", "'. $post['ativo'] .'")';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            return $stmt->rowCount();
        }        
        
        // Recuperar todos os endereços do usuário
        public function buscaEnderecos($id)
        {
            $query = 'select * from '. $this->dbname .'.enderecos where ID_USUARIO = "'. $id .'" order by ATIVO';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();
            if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) { return $row; }
            else { return false; }
        }
        
        // Recuperar todos os endereços do usuário
        public function selecionarEndereco($post)
        {
            // Setando todos os endereços como inativos
            $query = 'update '. $this->dbname .'.enderecos set ATIVO = "N" where ID_USUARIO = "'. $post['idUser'] .'"';
            $stmt = $this->conn->prepare($query);       
            $stmt->execute();

            // Setando o endereço selecionado como ativo
            $query1 = 'update '. $this->dbname .'.enderecos set ATIVO = "S" where ID_USUARIO = "'. $post['idUser'] .'"  and ID = "'. $post['id'] .'"';
            $stmt2 = $this->conn->prepare($query1);       
            $stmt2->execute();            
            return $stmt2->rowCount();
        }
    }

?>