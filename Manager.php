<?php 
require_once __DIR__.'/Utente.php';
    class Manager extends Utente{
        protected $livello;
        protected $grado='manager';

        protected function setLivello($string){
            $temp=(int)$string;
            if($temp!=NAN){
                $this->livello=$temp;
            }else{
                throw new Exception('livello non è un numero');
            }
        }

        public function getLivello(){
            return $this->livello;
        }
        public function getGrado(){
            return $this->grado;
        }

        public function __construct($_nome,$_cognome,$_cf,$_dataNascita,$_livello){
            parent::__construct($_nome,$_cognome,$_cf,$_dataNascita);
            $this->livello=$_livello;
        }
    }
?>