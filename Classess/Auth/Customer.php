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
                        header("location:home/");
                    }
                    else{
                        return "Your user name or password is wrong";
                    }
                }
            }
            return "Warning: must give username and password";
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
}


?>
