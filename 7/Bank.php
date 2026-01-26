<?php
class BankAccount {
    private $accountNumber;
    private $accountHolder;
    private $balance;
    private $pin;
    private $transactionHistory = [];


    public function __construct($accountNumber, $accountHolder, $initialBalance, $pin) {
        $this->accountNumber = $accountNumber;
        $this->accountHolder = $accountHolder;
        $this->balance = $initialBalance;
        $this->pin = $pin;
        $this->transactionHistory[] = "Account created with balance: $".$this->balance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            $this->transactionHistory[] = "Deposited: $".$amount." | New Balance: $".$this->balance;
        } else {
            echo "Invalid deposit amount.\n";
        }
    }

    public function withdraw($amount, $pin) {
        if ($pin !== $this->pin) {
            echo "Invalid PIN!\n";
            return;
        }
        if ($amount <= 0) {
            echo "Invalid withdrawal amount.\n";
            return;
        }
        if ($amount > $this->balance) {
            echo "Insufficient balance!\n";
            return;
        }
        $this->balance -= $amount;
        $this->transactionHistory[] = "Withdrawn: $".$amount." | New Balance: $".$this->balance;
    }


    public function getBalance($pin) {
        if ($pin === $this->pin) {
            return $this->balance;
        } else {
            echo "Invalid PIN!\n";
            return null;
        }
    }

    public function changePin($oldPin, $newPin) {
        if ($oldPin === $this->pin) {
            $this->pin = $newPin;
            $this->transactionHistory[] = "PIN changed successfully.";
        } else {
            echo "Old PIN is incorrect.\n";
        }
    }

   
    public function showTransactionHistory() {
        echo "\nTransaction History for ".$this->accountHolder." (Account No: ".$this->accountNumber."):\n";
        foreach ($this->transactionHistory as $transaction) {
            echo $transaction . "\n";
        }
    }
}


$account = new BankAccount("1234567890", "Pralisha", 5000, "1234");

$account->deposit(2000);
$account->withdraw(1000, "1234");
$account->withdraw(500, "0000"); 
$account->withdraw(7000, "1234"); 
$account->changePin("1234", "5678");
$account->withdraw(500, "5678");
echo "Current Balance: $" . $account->getBalance("5678") . "\n";

$account->showTransactionHistory();
?>
