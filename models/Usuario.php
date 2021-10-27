<?php 

    include 'config/Model.php';

    class Usuario extends ModelConfiguration {
        
        // Cadastro de usuários
        public function cadastrar($post)
        {
            $query = 'insert into '. $this->dbname .'.users (USUARIO, EMAIL, SENHA) values ("'. $post['user'] .'", "'. $post['email'] .'", "'. md5($post['pass']) .'")';
            
            $stmt = $this->conn->prepare($query);       

            $stmt->execute();

            return $stmt->rowCount();
        }        
        
        // Recuperar um usuário por e-mail / user para verificar existência de registros
        public function verificacaoExistencia($post) {

            $query = 'select * from '. $this->dbname .'.users where USUARIO = "'. $post['user'] .'" or EMAIL = "'. $post['email'] .'"';

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            // Se achou algo, retorne true senão retorne false...
            if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) { return true; }
            else { return false; }
        }
        
        // Recuperar um usuário por e-mail / user para logar no sistema
        public function logar($post) {

            $query = 'select * from '. $this->dbname .'.users where (USUARIO = "'. $post['user'] .'" or EMAIL = "'. $post['user'] .'") and SENHA = "'. md5($post['pass']) .'"';

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            // Se achou algo, retorne os dados senão retorne false...
            if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) { return $row; }
            else { return false; }
        }
    }

?>