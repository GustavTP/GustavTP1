<?PHP

class MySQLcn {
	protected $_link;
	protected $_result;
	protected $_numRows;
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "root1234";
	private $_database = "mybook";

	//establexzca una conexion a la base de datos, cuando se crea una instancia de clase
	public function __construct(){
		$this->_link = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
		if (mysqli_connect_errno()) {
			echo "Connection Failed: ".mysqli_connect_errno();
			exit();
		}
	}

	//envia la consulta da la conexion
	public function Query($sql) {
		$this->_result = $this->_link->query($sql) or die (mysqli_error($this->_result));
		$this->_numRows = mysqli_num_rows ($this->_result);
	}

public function UpdateDb($sql){
	$this->_result = $this->_link->query ($sql) or die (mysqli_error($this->_result ));
	 return $this->_result;
	
}
public function IsertaDb($sql) {
	$this->_link-> query($sql) or die (mysqli_error($this->_result ));
	return mysqli_insert_id ($this->_link);
	
}
public function NumRows (){
	return $this->_numRows;
	
}

public function Rows() {
	$rows = array ();
	
	for ($x = 0; $x < $this->NumRows (); $x++){
		$rows [] = mysqli_fetch_assoc($this->_result);
		
	}
	return $rows;
}

public function fetRows() {
	return mysqli_fetch_row($this->_result);
}
public function GetLink() {
	return $this->_link;
}
	
public function SecureInput ($value) {
	return mysqli_real_escape_string($this->_link, $value);
}
public function Close() {
	mysqli_close ($this->_link);
}
}

?>