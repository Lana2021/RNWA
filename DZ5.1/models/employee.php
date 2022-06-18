<?php
  class Employee {
    // we define 7 attributes
    // they are public so that we can access them using $post->author directly
    public $employeeNumber;
    public $lastName;
    public $firstName;
	  public $extension;
	  public $email;
    public $officeCode;
    public $jobTitle;
	

    public function __construct($employeeNumber, $lastName, $firstName,$extension,$email, $officeCode, $jobTitle ) {
      $this->employeeNumber = $employeeNumber;
      $this->lastName  = $lastName;
      $this->firstName = $firstName;
      $this->extension =$extension;
      $this->email =$email;
      $this->officeCode = $officeCode;
      $this->jobTitle =$jobTitle;

    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM employees');


      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Employee($post['employeeNumber'], $post['lastName'],$post['firstName'],$post['extension'], $post['email'], $post['officeCode'], $post['jobTitle'] );
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM employees WHERE employeeNumber = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Employee($post['employeeNumber'], $post['lastName'],$post['firstName'],$post['extension'], $post['email'], $post['officeCode'], $post['jobTitle'] );
    }
	public static function deleteemployee($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      //$id = intval($id);
	  $sql="DELETE FROM employees WHERE employeeNumber ='$id'";
	  //echo $sql;
	  
      //$req = $db->prepare($sql);
      // the query was prepared, now we replace :id with our actual $id value
      //if ($req->execute(array('id' => $id))){
		  //$req=$r->execute($sql);
	if ($db->query($sql) == TRUE){
	//if (1==2){
		  $rez="USPJESNO brisanje";
	  }
		  else {
			 $rez="NESPJESNO brisanje";;
		  }
		  return $rez;
		  
	
}
  public static function updateemployee($employeeNumber, $lastName, $firstName,$extension,$email, $officeCode, $jobTitle) {
      $db = Db::getInstance();
      $officeCode = intval($officeCode);
	    //$levels = intval($levels);
	
      $sql="UPDATE employees SET lastName='$lastName', firstName='$firstName', extension = '$extension', email = '$email', officeCode = '$officeCode', jobTitle = '$jobTitle'
       WHERE employeeNumber = '$employeeNumber' ";
      $db->query($sql);
    }
	public static function insertemployee($employeeNumber, $lastName, $firstName,$extension,$email, $officeCode, $jobTitle) {
      $db = Db::getInstance();
      $officeCode = intval($officeCode);
	    //$levels = intval($levels);
      $sql="INSERT INTO employees  (employeeNumber, lastName, firstName,extension,email, officeCode, jobTitle)
      VALUES ('$employeeNumber', '$lastName', '$firstName', '$extension', '$email', '$officeCode', '$jobTitle)')";
      $db->query($sql);
    }
	
  }
?>