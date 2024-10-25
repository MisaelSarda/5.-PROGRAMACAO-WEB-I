<?php
    // Classe Usuario
    class Usuario {
        public $userName;
        public $userLogin;
        public $userPass;
        
        public function __construct($userName, $userLogin, $userPass) {
            $this->userName = $userName;
            $this->userLogin = $userLogin;
            $this->userPass = $userPass;
        }
    }

    // Classe Session
    class Session {
        public $sessionId;
        public $status;
        public $usuario; // Referência para um objeto Usuario
        public $dataHoraInicio;
        public $dataHoraUltimoAcesso;
        
        public function __construct($sessionId, $usuario) {
            $this->sessionId = $sessionId;
            $this->usuario = $usuario;
            $this->status = 1; // 1 para ativo, 0 para inativo
            $this->dataHoraInicio = new DateTime();
            $this->dataHoraUltimoAcesso = new DateTime();
        }
        
        public function iniciaSessao() {
            $this->status = 1;
            $this->dataHoraInicio = new DateTime();
            $this->dataHoraUltimoAcesso = new DateTime();
            return true;
        }
        
        public function finalizaSessao() {
            $this->status = 0;
            return true;
        }
        
        public function getUsuarioSessao() {
            return $this->usuario;
        }
    }

    // Exemplo de uso
    $usuario = new Usuario("Mariana", "mariana123", "senhaSegura");
    $sessao = new Session("sessao123", $usuario);

    // Iniciar a sessão
    $sessao->iniciaSessao();
    ?>