<?php
/**
 * Created by PhpStorm.
 * User: kwilliams
 * Date: 11/27/17
 * Time: 5:32 PM
 */


//each page extends controller and the index.php?page=tasks causes the controller to be called
class tasksController extends http\controller
{
    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=task&action=show
	
	public static function routeChecker()
	{
		//Troubleshooting used to track routes and session vars
		echo 'HIT TASK CONTROLLER ROUTER';
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
	}
	
	
	
    public static function show()
    {
				
		//took a year and a day to figure this out
		session_start();
		$acct_id = $_SESSION['userID'];										
        $record = todos::findOne($acct_id);
		echo 'Checking Record';
		print_r($record);
		
		//if (!$record)
		//	self::getTemplate('create_task', $record);
	//	else
			self::getTemplate('show_task', $record);
    }

    //to call the show function the url is index.php?page=task&action=list_task

    public static function all()
    {
        $records = todos::findAll();
        /*session_start();
           if(key_exists('userID',$_SESSION)) {
               $userID = $_SESSION['userID'];
           } else {

               echo 'you must be logged in to view tasks';
           }
        $userID = $_SESSION['userID'];

        $records = todos::findTasksbyID($userID);
        */
        self::getTemplate('all_tasks', $records);

    }
    //to call the show function the url is called with a post to: index.php?page=task&action=create
    //this is a function to create new tasks

    //you should check the notes on the project posted in moodle for how to use active record here

    public static function create()
    {
        print_r($_POST);
		$record->acct_id = $_REQUEST['acct_id'];
		$record->todo_create_date = $_REQUEST['todo_create_date'];
		$record->todo_end_date = $_REQUEST['todo_end_date'];
		$record->todo_desc = $_REQUEST['todo_desc'];
		$record->todo_status_id = $_REQUEST['todo_status_id'];
		$record->save();
		
    }

    //this is the function to view edit record form
    public static function edit()
    {
        $record = todos::findOne($_REQUEST['id']);

        self::getTemplate('edit_task', $record);

    }

    //this would be for the post for sending the task edit form
	//need to grab the form vals 
	
    public static function store()
    {

        $record = todos::findOne($_REQUEST['id']);
        $record->todo_create_date = $_REQUEST['todo_create_date'];
		$record->todo_end_date = $_REQUEST['todo_end_date'];
		$record->todo_desc = $_REQUEST['todo_desc'];
		$record->todo_status_id = $_REQUEST['todo_status_id'];
			
		
		
        $record->save();
       // print_r($_POST);

    }

    public static function save() {
        session_start();
        $task = new todo();
        $task->todo_create_date = $_REQUEST['todo_create_date'];
		$task->todo_end_date = $_REQUEST['todo_end_date'];
		$task->todo_desc = $_REQUEST['todo_desc'];
		$task->todo_status_id = $_REQUEST['todo_status_id'];
        $task->ownerid = $_SESSION['userID'];
        $task->save();

    }

    //this is the delete function.  You actually return the edit form and then there should be 2 forms on that.
    //One form is the todo and the other is just for the delete button
    public static function delete()
    {
        $record = todos::findOne($_REQUEST['acct_id']);
        $record->delete();
        print_r($_POST);

    }

}