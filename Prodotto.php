<?php
    class Prodotto{
        protected $id;
        protected $nome;
        protected $descrizione;

        public function setNome($string){
            $this->nome=$string;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setDescrizione($string){
            $this->descrizione=$string;
        }
        public function getDescrizione(){
            return $this->descrizione;
        }
        private function assignId(){
            include __DIR__.("/IdKey.php");
            $prodottoId++;
            $this->id=$prodottoId;
        }
        public function getId(){
            return $this->id;
        }
        public function __construct($_nome,$_descizione){
            $this->setNome($_nome);
            $this->setDescrizione($_descizione);
            $this->assignId();
        }
    }
?>