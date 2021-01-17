<?php
require 'Classess/Auth/User.php';
use Classess\Auth\User;
$loginedUser = @unserialize($_SESSION['core_bank_user']);
if (!($loginedUser instanceof User)) {
    header("location:../?e=Login First !");
}
?>
        