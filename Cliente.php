<?php 
require_once __DIR__.'/Utente.php';
require_once __DIR__.'/Carta.php';
require_once __DIR__.'/Carrello.php';
class Cliente extends Utente{
    protected $carrello;
    protected $carte;
    use Carta;
    use Carrello;

    public function addCarta($_numero, $_ccv, $_scadenza){
        foreach($this->carte as $carta){
            if($carta->getNumero()==$_numero){
                throw new Exception('Carta già presente');
                return;
            }
        }
        $this->carte[]= new Carta($_numero, $_ccv, $_scadenza);
    }

    public function removeCarta($_numero){
        foreach($this->carte as $index=>$carta){
            if($carta->getNumero()==$_numero){
                unset($this->carte[$index]);
                return;
            }
        }
        throw new Exception('Carta non trovata');
    }
    private function assignCart(){
        $this->carrello= new Carrello($this->id);
    }
    public function __construct($_nome,$_cognome,$_cf,$_dataNascita){
        parent::__construct($_nome,$_cognome,$_cf,$_dataNascita);
        $this->assignCart();
    }
}
?>