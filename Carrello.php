<?php
require_once __DIR__.'/Prodotto.php';
    class Carrello{
        protected $id;
        protected $idCliente;
        protected $prodotti;
        use Prodotto;

        public function addProduct($prodotto, $quantità){
            if(count($this->prodotti)>0){
                foreach($this->prodotti as $element){
                    if($element['prodotto']->getId()==$prodotto->getId()){
                        $element['quantita']+=$quantità;
                        return;
                    }
                }
            }
            $this->prodotti[]=['prodotto'=>$prodotto, 'quantita'=>$quantità];
        }
        public function removeProduct($prodotto, $quantità){
            if(count($this->prodotti)>0){
                foreach($this->prodotti as $element){
                    if($element['prodotto']->getId()==$prodotto->getId()){
                        if($element['quantita']>=$quantità){
                            $element['quantita']-=$quantità;
                            return;
                        }else{
                            throw new Exception('La quantità del prodotto da rimuovere eccede le scorte');
                        }
                    }
                }
            }
            throw new Exception('Prodotto non trovato');
        }
        private function generateIdCart(){
            include __DIR__.'/IdKey.php';
            $carrelloId++;
            $this->id=$carrelloId;
        }
        public function __construct($_idCliente){
            $this->idCliente=$_idCliente;
            $this->generateIdCart();
        }
    }
?>