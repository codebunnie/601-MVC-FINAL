<?php
/*
Modification Log: Gabrielle Mack (gmm28)

*Changed 'email' field in where clause to match new db field acct_email


*/
class accounts extends \database\collection
{
    protected static $modelName = 'account';

    //This is the function to write to find user by ID for login.
    //Don't forget to return the object see findOne in the collection class


    public static function findUserbyEmail($email)
    {

            $tableName = get_called_class();
            $sql = 'SELECT * FROM ' . $tableName . ' WHERE acct_email = ?';

         //grab the only record for find one and return as an object
            $recordsSet = self::getResults($sql, $email);

            if (is_null($recordsSet)) {
                return FALSE;
            } else {
                return $recordsSet[0];
            }



    }
	
	 public static function findUserByID($acct_id)
    {

            $tableName = get_called_class();
            $sql = 'SELECT * FROM ' . $tableName . ' WHERE acct_id = ?';

         //grab the only record for find one and return as an object
            $recordsSet = self::getResults($sql, $acct_id);

            if (is_null($recordsSet)) {
                return FALSE;
            } else {
                return $recordsSet[0];
            }



    }
	
	
	
	
	
	
	
	
}

