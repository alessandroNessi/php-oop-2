<?php
    class Utente{
        protected $id;
        protected $nome;
        protected $cognome;
        protected $cf;
        protected $dataNascita;

        public function setNome($string){
            $this->nome=$string;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setCognome($string){
            $this->cognome=$string;
        }
        public function getCognome(){
            return $this->cognome;
        }
        public function setCf($string){
            if(strlen($string)==16){
                $this->cf=$string;
            }else{
                throw new Exception('codice fiscale errato');
            }
        }
        public function getCf(){
            return $this->cf;
        }
        public function setDataNascita($string){
            if(strlen($string)==10){
                $this->dataNascita=$string;
            }else{
                throw new Exception('data di nascita errata');
            }
        }
        public function getDataNascita(){
            return $this->dataNascita;
        }
        private function assignId(){
            include __DIR__.("/IdKey.php");
            $userId++;
            $this->id=$userId;
        }
        public function getId(){
            return $this->id;
        }
        public function __construct($_nome,$_cognome,$_cf,$_dataNascita){
            $this->setNome($_nome);
            $this->setCognome($_cognome);
            $this->setCf($_cf);
            $this->setDataNascita($_dataNascita);
            $this->assignId();
        }
    }
?>