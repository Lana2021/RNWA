<?php
  class Office {
    // we define attributes
    // they are public so that we can access them using $post->author directly
    public $officeCode;
    public $city;
    public $phone;
    public $addressLine1;
    public $country;
    public $postalCode;
    public $territory;

    public function __construct($officeCode, $city, $phone ,$addressLine1, $country, $postalCode, $territory) {
      $this->officeCode     = $officeCode;
	    $this->city  = $city;
      $this->phone  = $phone;
	    $this->addressLine1  = $addressLine1;
      $this->country = $country;
      $this->postalCode = $postalCode;
      $this->territory = $territory;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM offices');


      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Office($post['officeCode'], $post['city'], $post['phone'], $post['addressLine1'], $post['country'], $post['postalCode'], $post['territory']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM offices WHERE officeCode = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Office($post['officeCode'], $post['city'], $post['phone'], $post['addressLine1'], $post['country'], $post['postalCode'], $post['territory']);
    }
	 public static function insertoffice( $officeCode, $city, $phone ,$addressLine1, $country, $postalCode, $territory) {
      $db = Db::getInstance();
      $officeCode = intval($officeCode);
      //$level = intval($level);
      //$description =$description;
      $sql="INSERT INTO offices (  officeCode, city, phone ,addressLine1, country, postalCode, territory)
      VALUES ( '$officeCode', '$city', '$phone','$addressLine1', '$country', '$postalCode', '$territory')";
      $db->query($sql);
    }
	
	 public static function updateoffice($officeCode, $city, $phone ,$addressLine1, $country, $postalCode, $territory) {
      $db = Db::getInstance();
      $officeCode = intval($officeCode);
      //$level = intval($level);
      
      
      $sql="UPDATE offices SET city = '$city', phone = '$phone', addressLine1 = '$addressLine1', country= '$country', postalCode='$postalCode', territory='$territory'
       WHERE officeCode = '$officeCode'";
      $db->query($sql);
    }
	public static function deleteoffice($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      //$id = intval($id);
	  $sql="DELETE FROM offices WHERE officeCode ='$id'";
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
  }
?>