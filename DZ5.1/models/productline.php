<?php
  class ProductLine {
    // we define attributes
    // they are public so that we can access them using $post->author directly
    public $productLine;
    public $textDescription;

    public function __construct($productLine, $textDescription) {
        $this->productLine     = $productLine;
	      $this->textDescription  = $textDescription;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM productlines');


      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new ProductLine($post['productLine'], $post['textDescription'] );
      }
 
      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = $id;
      $req = $db->prepare('SELECT * FROM productlines WHERE productLine = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new ProductLine($post['productLine'], $post['textDescription'] );
    }
	 public static function insertproductline( $productLine, $textDescription ) {
      $db = Db::getInstance();
      $productLine = $productLine; //intval($productLine)

      $sql="INSERT INTO productlines ( productLine, textDescription )
      VALUES ( '$productLine', '$textDescription' )";
      $db->query($sql);
    }
	
	 public static function updateproductline($productLine, $textDescription ) {
      $db = Db::getInstance();
      $productLine = $productLine;
      
      
      $sql="UPDATE productlines SET textDescription = '$textDescription'
       WHERE productLine = '$productLine'";
      $db->query($sql);
    }
	public static function deleteproductline($id) {
      $db = Db::getInstance();

	  $sql="DELETE FROM productlines WHERE productLine ='$id'";

	if ($db->query($sql) == TRUE){
		  $rez="USPJESNO brisanje";
	  }
		  else {
			 $rez="NESPJESNO brisanje";;
		  }
		  return $rez;
	  
}
  }
?>