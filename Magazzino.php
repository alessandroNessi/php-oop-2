<?php 
require_once __DIR__.'/Prodotto.php';
class Magazzino{
        protected $id;
        protected $indirizzo;
        protected $nome;
        protected $capienza;
        protected $prodotti;
        use Prodotto;

        public function setNome($string){
            $this->nome=$string;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setIndirizzo($string){
            $this->indirizzo=$string;
        }
        public function getIndirizzo(){
            return $this->indirizzo;
        }
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
        public function getProducts(){
            return $this->prodotti;
        }
        protected function setCapienza($string){
            $temp=(int)$string;
            if($temp!=NAN){
                $this->capienza=$temp;
            }else{
                throw new Exception('capienza non è un numero');
            }
        }
        public function getCapienza(){
            return $this->capienza;
        }
        private function assignId(){
            include __DIR__.('/IdKey.php');
            $magazzinoId++;
            $this->id=$magazzinoId;
        }
        public function __construct($_nome,$_indirizzo,$_capienza,$_prodotti){
            $this->setNome($_nome);
            $this->setIndirizzo($_indirizzo);
            $this->setCapienza($_capienza);
            foreach($_prodotti as $prodotto){
                $this->addProduct($prodotto['id'],$prodotto['nome'],$prodotto['descrizione'],$prodotto['quantita']);
            }
            $this->assignId();
        }
    }
?>