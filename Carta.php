<?php
    class Carta{
        protected $numero;
        protected $ccv;
        protected $scadenza;

        public function setNumero($_string){
            if(strlen($_string)==20){
                $this->numero=$_string;
            }else{
                throw new Exception('Numero carta non valido');
            }
        }
        public function getNumero(){
            return $this->numero;
        }
        public function setCcv($_string){
            if(strlen($_string)==3){
                $this->ccv=$_string;
            }else{
                throw new Exception('Numero ccv non valido');
            }
        }
        public function getCcv(){
            return $this->ccv;
        }
        public function setScadenza($_string){
            if(strlen($_string)==10){
                $this->scadenza=$_string;
            }else{
                throw new Exception('data di scadenza non valida');
            }
        }
        public function getScadenza(){
            return $this->scadenza;
        }
        public function __construct($_numero,$_ccv,$_scadenza){
            $this->setNumero($_numero);
            $this->setCcv($_ccv);
            $this->setScadenza($_scadenza);
        }
    }
?>