<?php 
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);

define('DATABASE','bw254');
define('USERNAME','bw254');
define('PASSWORD','jar0ElbPf');
define('CONNECTION','sql2.njit.edu');


//class dbConn
//{
//	protected static $db;
//	private function __construct()
//	{
//		try{
//			self::$db = new PDO('mysql:host='.CONNECTION.';dbname='.DATABASE,USERNAME,PASSWORD);
//			self::$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//		}
//		catch(PDOException $e){
//			echo "Connection Error:".$e->getMessage();
//		}
//
//	}
//	
//	public static function getConnection()
//	{
//		if(!self::$db)
//			{
//				new dbConn();
//			}
//		return self::$db;
//		
//	}
//}





class htmltage
{
	static public function htmlhead()
	{
		return '<html>';
	}

	static public function htmlend()
	{
		return '</html>';
	}

	static public function tablestart()
	{
		return "<table style='width:100%'>";
	}

	static public function tableend()
	{
		return '</table>';
	}

	static public function tabledetail($input)
	{
		return '<td>'.$input.'</td>';
	}

	static public function tablelinestart()
	{
		return '<tr>';
	}

	static public function tablelineend()
	{
		return '</tr>';
	}

	static public function htmlbody()
	{
		return '<body>';
	}

	static public function htmlbodyend()
	{
		return '</body>';
	}
}

class page
{
	protected static $html;
	public function __construct()
	{
		$this->html .= htmltage::htmlhead();
		$this->html .= '<link rel="stylesheet" href="styles.css">';
		$this->html .= htmltage::htmlbody();
		$this->html .= htmltage::tablestart();
	}

	public function input($text)
	{
		//$this->html .= htmltage::tablelinestart();
		$this->html .= htmltage::tabledetail($text);
		//$this->html .= htmltage::tablelineend();

	}

	public function tableline()
	{
		$this->html .= htmltage::tablelinestart();
	}
	
	public function tableliend()
	{
		$this->html .= htmltage::tablelineend();
	}

	public function __destruct()
	{
		$this->html .= htmltage::tableend();
		$this->html .= htmltage::htmlbodyend();
		$this->html .= htmltage::htmlend();
		print ($this->html);
	}
}



 
      try{
			$db = new PDO('mysql:host='.CONNECTION.';dbname='.DATABASE,USERNAME,PASSWORD);
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			echo '<br>Connection successfully<br/>';
		}
		catch(PDOException $e){
			echo "Connection Error:".$e->getMessage();
		}
	//	$db = dbConn::getConnection();
		
		$s = 'SELECT * FROM accounts WHERE id < 6';
		//$statement = $db->prepare($sql);
		//$statement->execute();

		//$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement = $db->query($s);
		//$statement->setFetchMode(PDO::FETCH_ASSOC);
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		$obj = new page;
		$count = 0;
		foreach($results as $r)
		{
			$obj->tableline();
			++$count;
			foreach($r as $k)
			{
			
				$obj->input($k);
			}
			$obj->tableliend();
		}
		echo '<br>number of records is '.$count.'<br>';
?>