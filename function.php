<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'crud_oop');

class DB_con
{
    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed" . mysqli_connect_error();
        }
    }

    public function insert($firstname,    $lastname,    $email,    $phonenumber,    $address)
    {
        $insertdata = mysqli_query($this->dbcon, "INSERT INTO tblname(firstname,	lastname,	email,	phonenumber,	address) values('$firstname' , '$lastname','$email','$phonenumber','$address')");
        return $insertdata;
    }

    public function fetchdata()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tblname");
        return $result;
    }

    public function registration($fname, $uname, $uemail, $password)
    {
        $reg = mysqli_query($this->dbcon, "INSERT INTO tbluser(fullname , username , useremail , password) values('$fname' , '$uname' , '$uemail' , '$password')");
        return $reg;
    }

    public function usernameavilable($uname)
    {
        $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tbluser WHERE username = '$uname'");
        return $checkuser;
    }

    public function signin($uname, $password)
    {
        $signingquery = mysqli_query($this->dbcon, "SELECT id , fullname FROM tbluser WHERE username='$uname' AND password = '$password'");
        return $signingquery;
    }

    public function fetch_one_record($userid)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tblname WHERE id = '$userid'");
        return $result;
    }

    public function update_data($firstname,    $lastname,    $email,    $phonenumber,    $address, $userid)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tblname SET 
            firstname = '$firstname',
            lastname = '$lastname',
            email = '$email',
            phonenumber = '$phonenumber',
            address = '$address'
            WHERE id = '$userid'
        ");
        return $result;
    }

    public function delete_data($userid) 
    {
        $result = mysqli_query($this->dbcon, "DELETE FROM tblname WHERE id = '$userid'");
        return $result;
    }
}
