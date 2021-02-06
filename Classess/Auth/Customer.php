<?php
namespace Classess\Auth;

use Includes\DB\Connection;

class Customer extends User
{
    private $tempAddress, $officialAddress, $job, $openedBy;

    // constructor
    public function __construct($email, $nic, $fname, $mobileNo, $branchCode, $DOB, $tempAddress, $currentAddress, $job, $officialAddress, $openedBy, $dp, $joinedDate)
    {
        parent::__construct($email, $nic, $fname, $mobileNo, $branchCode, $DOB, $currentAddress, $dp, $joinedDate);
        $this->tempAddress = $tempAddress;
        $this->officialAddress = $officialAddress;
        $this->job = $job;
        $this->openedBy = $openedBy;
    }

    public static function login($userName, $password): string{
        /**
         * All staff members login to system
         */
            if ($userName && $password){
                $sql = "SELECT * FROM customer WHERE eMail = ?";
                $stmt = (new Connection)->connect()->prepare($sql);
                $stmt->execute([$userName]);
                $result = $stmt->fetchAll();
    
                if(!$result){
                    return "Your user name or password is wrong";
                }
                else{
                    $resultRow = $result[0];
                    if($password == $resultRow['password']){
                        $resultRow['dp'] = ($resultRow['dp']) ? $resultRow['dp'] : 'img/profile/customerAvatar.png' ;
                        $_SESSION['core_bank_user'] = serialize(new Customer($resultRow['eMail'], $resultRow['NIC'], $resultRow['name'], $resultRow['mobileNo'], $resultRow['openedBranch'], $resultRow['DOB'], $resultRow['tempAddress'], $resultRow['permanantAddress'], $resultRow['job'], $resultRow['officialAddress'], $resultRow['openedBy'],$resultRow['dp'],$resultRow['joinedDate']));                        
                        header("location:customer/index.php");
                    }
                    else{
                        return "Your user name or password is wrong";
                    }
                }
            }
            return "Warning: must give username and password";
        }
    /**
     * Register customer
     */
    public function register($password){
        $sql = "INSERT INTO customer VALUES ('".$this->getNIC()."','".$this->getFname()."','".$this->getMail()."','".$password."','".$this->getmobileNo()."','".$this->tempAddress."','".$this->getAddress()."','".$this->job."','".$this->officialAddress."','".$this->getDOB()."','".$this->getDp()."','".$this->openedBy."','".$this->getBranchCode()."','".$this->getJoinedDate()."','".$this->getJoinedDate()."',null)";
        $stmt = (new Connection)->connect()->prepare($sql);
        $result=$stmt->execute();
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Get the value of tempAddress
     */ 
    public function getTempAddress():string
    {
        return $this->tempAddress;
    }

    /**
     * Get the value of officialAddress
     */ 
    public function getOfficialAddress():string
    {
        return $this->officialAddress;
    }

    /**
     * Get the value of job
     */ 
    public function getJob():string
    {
        return $this->job;
    }

    /**
     * Get the value of openedBy
     */ 
    public function getOpenedBy():string
    {
        return $this->openedBy;
    }

    public function updateAccount(){

    }

    public function checkBalance($account){
        $sql = "SELECT * FROM account WHERE acc_no='".$account."'";
        $stmt = (new Connection)->connect()->prepare($sql);
        $stmt->execute([$userName]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function showAccounts(){
        $sql = "SELECT * FROM account WHERE NIC = '".$SESSION['NIC']."'";
        $stmt = (new Connection)->connect()->prepare($sql);
        $stmt->execute([$userName]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getLoan($amount){
        return 0;
    }

    public function transaction($sender,$recipient,$amount){
        $sql = "SELECT * FROM customer WHERE NIC = '".$recipient."'";
        $stmt = (new Connection)->connect()->prepare($sql);
        $stmt->execute([$userName]);
        $result = $stmt->fetchAll();
        if(!$result){
            return "Invalid recipient";
        }
        if($amount<=0){
            return "Invalid amount";
        }

        $sql1 = "CALL transfer ('".$sender."','".$recipient."','".$amount."')";
        $stmt1 = (new Connection)->connect()->prepare($sql1);
        $stmt1->execute([$userName]);
        $result = $stmt->fetchAll();

        if (!result1){
            return "Transaction failed";
        }

        return "Transaction success";
    }
}


?>
