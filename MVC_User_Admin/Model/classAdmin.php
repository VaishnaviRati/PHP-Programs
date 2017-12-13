<?php
include 'db_config.php';
	
class Admin 
{
	public $db;

	public function __construct()
	{
	     $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
         if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			    exit;
		  }
	}

	/*** for login process ***/
	public function check_login($emailusername, $password)
	{
        $password = md5($password);
		$check_login_sql="SELECT id from dbUsers WHERE email='$emailusername' or username='$emailusername' and password='$password' and role_id=1";
		//checking if the username is available in the table
        $result = mysqli_query($this->db,$check_login_sql);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;

	    if ($count_row == 1) {
	        // this login var will use for the session thing
	        $_SESSION['login'] = true;
	        $_SESSION['id'] = $user_data['id'];
	        return true;
	    }
    }
			/*** To get the details in editprofile in user ***/
    public function user_details($id)
    {
    	$user_detail_sql="SELECT * FROM dbUsers WHERE role_id=2";
	    $result = mysqli_query($this->db,$user_detail_sql);
	    return  $result;
    }

    public function user_detailsOnId($id)
    {
    	$user_sql="SELECT id, username,email,phone_number FROM dbUsers WHERE id=$id";
	    $result = mysqli_query($this->db,$user_sql);
	    return  $result;
    }
    	
    public function update_changes($name,$email,$phone_number,$id) 
    {
        $update_sql="UPDATE dbUsers SET username = '$name', email ='$email' ,phone_number='$phone_number' WHERE id = $id";
    	$result = mysqli_query($this->db,$update_sql);
        if ($result === TRUE) {
		    return TRUE;
		} 
    }

    public function delete_user($id)
    {
        $delete_sql="DELETE FROM dbUsers WHERE id=$id";
    	$result = mysqli_query($this->db,$delete_sql);
    	return $result;    	
    }

    public function status_disable($id)
    {
        $disable_sql="UPDATE dbUsers SET status = 0 WHERE id = $id";
        $result = mysqli_query($this->db,$disable_sql);
        if ($result === TRUE) {
		    return TRUE;
	    } 
		    
    }


   public function status_enable($id)
    {
        $enable_sql="UPDATE dbUsers SET status=1 WHERE id = $id";
        $result = mysqli_query($this->db,$enable_sql);
        if ($result === TRUE) {
		    return TRUE;
		} 
		    
    }

   /*** starting the session ***/
	public function get_session()
	{
	    return $_SESSION['login'];
	}

	public function user_logout() {
	    $_SESSION['login'] = FALSE;
	    session_destroy();
	}


}
?>