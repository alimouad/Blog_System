<?php
class Bank {
    private  $user;
    private  $balance;


    public function construct( $user, $balance) {
        $this->user = $user;
        $this->balance = $balance;

    }

    public function deposit( $amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw( $amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    public function getBalance() {
        return $this->balance;
    }
     public function getBank() {
        return $this->name;
    }


    public function getOwner() {
        return $this->user->getName();
    }
}

class User {
    private  $name;

    public function construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

$user = new User("Alice");
$bank = new Bank($user, 100);

$bank->deposit(50);
$bank->withdraw(30);

echo "Propriétaire : " . $bank->getOwner() . "\n";
echo "Solde : " . $bank->getBalance() . " €"."\n";

class Banka {
    private $user;
    private $balance;

    public function __construct($user,$balance = 0 )
    {
        $this->user = $user;
        $this->balance = $balance;
    }

    public function all() {
        return $this->balance;
    }
    public function  add($zid) {
        $this->balance += $zid;
    }
    public function take($remove){
        $this->balance -= $remove;
    }
    
    public function getName() {
        return $this->user;
    }
}

$one = new Banka('name',100);

echo $one->all() . $one->getName();
