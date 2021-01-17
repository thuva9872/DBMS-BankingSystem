<?php
namespace Classess\Auth;

use Includes\DB\Connection;

class Employee extends User implements Staff
{
    /**
     * employee person addition details
     */

    private $id, $designation;

    // constructor
    public function __construct($id, $email, $nic, $fname, $mobileNo, $designation, $branchCode, $DOB, $currentAddress, $dp, $joinedDate)
    {
        parent::__construct($email, $nic, $fname, $mobileNo, $branchCode, $DOB, $currentAddress, $dp, $joinedDate);
        $this->id = $id;
        $this->designation = $designation;
    }

    public static function login($userName, $password): string{
    /**
     * All staff members login to system
     */
        if ($userName && $password){
            $sql = "SELECT * FROM Employee WHERE email = ?";
            $stmt = (new Connection)->connect()->prepare($sql);
            $stmt->execute([$userName]);
            $result = $stmt->fetchAll();

            if(!$result){
                return "Your user name or password is wrong";
            }
            else{
                $resultRow = $result[0];
                if($password == $resultRow['password']){
                    $resultRow['dp'] = ($resultRow['dp']) ? $resultRow['dp'] : 'img/profile/empAvata.jpg' ;
                    if ($resultRow['designation'] == "head_manager") {
                        $_SESSION['core_bank_user'] = serialize(new HeadManager($resultRow['ID'], $userName, $resultRow['NIC'], $resultRow['name'], $resultRow['mobileNo'], $resultRow['designation'], $resultRow['branchCode'], $resultRow['DOB'], $resultRow['Address'], $resultRow['dp'], $resultRow['JoinedDate']));
                    }elseif ($resultRow['designation'] == "manager") {
                        $_SESSION['core_bank_user'] = serialize(new Manager($resultRow['ID'], $userName, $resultRow['NIC'], $resultRow['name'], $resultRow['mobileNo'], $resultRow['designation'], $resultRow['branchCode'], $resultRow['DOB'], $resultRow['Address'], $resultRow['dp'], $resultRow['JoinedDate']));
                    }elseif ($resultRow['designation'] == "staff") {
                        $_SESSION['core_bank_user'] = serialize(new Employee($resultRow['ID'], $userName, $resultRow['NIC'], $resultRow['name'], $resultRow['mobileNo'], $resultRow['designation'], $resultRow['branchCode'], $resultRow['DOB'], $resultRow['Address'], $resultRow['dp'], $resultRow['JoinedDate']));
                    }else {
                        return "Failed to login";
                    }
                    header("location:../home/");
                }
                else{
                    return "Your user name or password is wrong";
                }
            }
        }
        return "Warning: must give username and password";
    }

    /**
     * @return designation
     */
    public function getDesignation():string{
        return $this->designation;
    }

    /**
     * @return id
     */
    public function getID():int{
        return $this->id;
    }
}

?>