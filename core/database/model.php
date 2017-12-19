<?php
namespace database;

use http\controller;

abstract class model
{

    public function save()
    {

        if($this->validate() == FALSE) {
            echo 'failed validation';
            exit;
        }
		$INSERT = "";

        if ($this->acct_id != '') {
			echo 'HIT UPDATE';
            $sql = $this->update();
        } else {
			echo 'HIT INSERT';
            $sql = $this->insert();
            $INSERT = TRUE;
        }
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $array = get_object_vars($this);

        if ($INSERT == TRUE) {

            unset($array['acct_id']);

        }

        foreach (array_flip($array) as $key => $value) {
            $statement->bindParam(":$value", $this->$value);
        }
        $statement->execute();
        if ($INSERT == TRUE) {

            $this->acct_id = $db->lastInsertId();

        }


        return $this->acct_id;
        }



    private function insert()
    {

        $modelName = static::$modelName;
        $tableName = $modelName::getTablename();
        $array = get_object_vars($this);
        unset($array['acct_id']);
        $columnString = implode(',', array_flip($array));
        $valueString = ':' . implode(',:', array_flip($array));
        $sql = 'INSERT INTO ' . $tableName . ' (' . $columnString . ') VALUES (' . $valueString . ')';
        return $sql;
    }

    public function validate() {

        return TRUE;
    }

    private function update()
    {
		//echo "<br>HIT CORE/MODEL UPDATE";
        
		$modelName = static::$modelName;
        $tableName = $modelName::getTablename();
        $array = get_object_vars($this);

        $comma = " ";
		
		//TShooting
	//	print_r($array['acct_id']);
		
	//	echo '<BR><BR>PASSED ARRAY<BR><BR>';
		
		
		foreach ($array as $key => $value) {
		//	 echo 'Key:'.$key.'   Value: '.$value.'</br>';			 
		};
		
		//Had to modify this query as passing acct_id and todo_id into the update caused a referential integ
		
        $sql = 'UPDATE ' . $tableName . ' SET ';
		
		//  foreach ($array as $key => $value) {
            if (!empty($value)) {
              //  $sql .= $comma . $key . ' = "' . $value . '"';
				 $comma = ", ";
				$sql .= 			'todo_create_date'	. ' = "' . $array['todo_create_date'] 	. '"'.
						$comma .	'todo_end_date' 	. ' = "' . $array['todo_end_date'] 		. '"'.
						$comma .	'todo_due_date' 	. ' = "' . $array['todo_due_date'] 		. '"'.
						$comma .	'todo_desc' 		. ' = "' . $array['todo_desc'] 			. '"'.
						$comma .	'todo_status_id'	. ' = "' . $array['todo_status_id']		. '"';
				
				
				
				
				
				
               
            }
       // }
        $sql .= ' WHERE todo_id=' . $this->todo_id;
	//	echo '<br> SQL PRINTOUT <BR>'.$sql.'<BR>';
        return $sql;

    }

    public function delete()
    {
        $db = dbConn::getConnection();
        $modelName = static::$modelName;
        $tableName = $modelName::getTablename();
        $sql = 'DELETE FROM ' . $tableName . ' WHERE acct_id=' . $this->acct_id;
        $statement = $db->prepare($sql);
        $statement->execute();
    }
}

?>
