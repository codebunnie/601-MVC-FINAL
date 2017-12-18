<?php

final class account extends \database\model
{
    public $acct_id;
    public $acct_email;
    public $acct_fname;
    public $acct_lname;
    public $acct_phone;
    public $acct_birthday;
    public $acct_gender;
    public $acct_password;
	public $acct_type_id;
    protected static $modelName = 'account';

    public static function getTablename()
    {

        $tableName = 'accounts';
        return $tableName;
    }


    //to find a users tasks you need to create a method here.  Use $this->id to get the usersID For the query
    public static function findTasks()
    {

        //I am temporarily putting a findall here but you should add a method to todos that takes the USER ID and returns their tasks.
        $records = todos::findAll();
        print_r($records);
        return $records;
    }
    //add a method to compare the passwords this is where bcrypt should be done and it should return TRUE / FALSE for login



    public function setPassword($password) {

        $password = password_hash($password, PASSWORD_DEFAULT);


        return $password;

    }

    public function checkPassword($LoginPassword) {

        return password_verify($LoginPassword, $this->acct_password);


    }


    public function validate()
    {
        $valid = TRUE;
        echo 'myemail: ' . $this->acct_email;
        if($this->acct_email == '') {
            $valid = FALSE;
            echo 'nothing in email';
        }


        return $valid;

    }



}


?>
