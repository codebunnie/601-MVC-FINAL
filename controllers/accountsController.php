<?php
/**
 * Created by PhpStorm.
 * User: kwilliams
 * Date: 11/27/17
 * Time: 5:32 PM
 */


//each page extends controller and the index.php?page=tasks causes the controller to be called
class accountsController extends http\controller
{
	public static function routeChecker()
	{
		echo 'HIT ACCOUNTS CONTROLLER ROUTER';
	}
	
	

    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=task&action=show
    public static function show()
    {
        $record = accounts::findOne($_REQUEST['id']);
        self::getTemplate('show_account', $record);
    }

    //to call the show function the url is index.php?page=accounts&action=all

    public static function all()
    {

        $records = accounts::findAll();
        self::getTemplate('all_accounts', $records);

    }
    //to call the show function the url is called with a post to: index.php?page=task&action=create
    //this is a function to create new tasks

    //you should check the notes on the project posted in moodle for how to use active record here

    //this is to register an account i.e. insert a new account
    public static function register()
    {
        //https://www.sitepoint.com/why-you-should-use-bcrypt-to-hash-stored-passwords/
        //USE THE ABOVE TO SEE HOW TO USE Bcrypt
        self::getTemplate('register');
    }

    //this is the function to save the user the new user for registration
    public static function store()

    {
        $user = accounts::findUserbyEmail($_REQUEST['acct_email']);


        if ($user == FALSE) {
            $user = new account();
			$user->acct_id = $_POST['acct_id'];
            $user->acct_email = $_POST['acct_email'];
            $user->acct_fname = $_POST['acct_fname'];
            $user->acct_lname = $_POST['acct_lname'];
            $user->acct_phone = $_POST['acct_phone'];
            $user->acct_birthday = $_POST['acct_birthday'];
            $user->acct_gender = $_POST['acct_gender'];
			$user->acct_type_id = $_POST['acct_type_id'];			
			$user->acct_password = $_POST['acct_password'];//for testing purposes
			
			
            //$user->password = $_POST['password'];
            //this creates the password
            //this is a mistake you can fix...
            //Turn the set password function into a static method on a utility class.
            $user->acct_password = $user->setPassword($_POST['acct_password']);
            $user->save();

            //you may want to send the person to a
            // login page or create a session and log them in
            // and then send them to the task list page and a link to create tasks
			
			
            header("Location: index.php?page=homepage&action=show");

        } else {
            //You can make a template for errors called error.php
            // and load the template here with the error you want to show.
           // echo 'already registered';
            $error = 'already registered';
            self::getTemplate('error', $error);

        }

    }

    public static function edit()
    {
        $record = accounts::findOne($_REQUEST['acct_id']);

        self::getTemplate('edit_account', $record);

    }
//this is used to save the update form data
    public static function save() {
        $user = accounts::findOne($_REQUEST['id']);

        $user->acct_email = $_POST['acct_email'];
            $user->acct_fname = $_POST['acct_fname'];
            $user->acct_lname = $_POST['acct_lname'];
            $user->acct_phone = $_POST['acct_phone'];
            $user->acct_birthday = $_POST['acct_birthday'];
            $user->acct_gender = $_POST['acct_gender'];			
			$user->acct_type_id = $_POST['acct_type_id'];
        $user->save();
        header("Location: index.php?page=accounts&action=all");

    }

    public static function delete() {

        $record = accounts::findOne($_REQUEST['id']);
        $record->delete();
        header("Location: index.php?page=accounts&action=all");
    }

    //this is to login, here is where you find the account and allow login or deny.
    public static function login()
    {
        //you will need to fix this so we can find users username.  YOu should add this method findUser to the accounts collection
        //when you add the method you need to look at my find one, you need to return the user object.
        //then you need to check the password and create the session if the password matches.
        //you might want to add something that handles if the password is invalid, you could add a page template and direct to that
        //after you login you can use the header function to forward the user to a page that displays their tasks.
        //        $record = accounts::findUser($_POST['email']);

        $user = accounts::findUserbyEmail($_REQUEST['acct_email']);


        if ($user == FALSE) {
            echo 'user not found';
        } else {

            if($user->checkPassword($_POST['acct_password']) == TRUE) {

                echo 'login';

                session_start();
                $_SESSION["userID"] = $user->acct_id;
				$_REQUEST["id"] = $_SESSION["userID"];
				 echo 'SESSION VALUE: <BR>';
				 print_r($_SESSION);
				 echo '<br> REQUEST VALUE: <BR>';
				 print_r($_REQUEST);
				
				header("Location: index.php?page=user_tasks&action=all");

                //forward the user to the show all todos page
               
            } else {
                echo 'password does not match';
            }

        }




    }

}