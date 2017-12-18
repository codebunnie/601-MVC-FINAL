<?php

final class todo extends database\model
{
    public $acct_id;
    public $todo_id;
    public $todo_create_date;
    public $todo_end_date;
    public $todo_due_date;
    public $todo_desc;
	public $todo_status_id;
    protected static $modelName = 'todo';

    public static function getTablename()
    {

        $tableName = 'todos';
        return $tableName;
    }
}

?>
