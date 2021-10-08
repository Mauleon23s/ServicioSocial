<?php
include("acciones.php");
class Usuario{
	private $id=null;
	public $username=null;
	private $pwd=null;
	protected $mail=null;
	public $estatus=null;
	private $db = null;
	public $error = "";

	function __construct($id=null){
		$this->db = new Database("localhost","root","","abc");

		if($id){
			$this->create($id);
		}
	}
private function create($id){
	$sql = $this->db->conn->query("SELECT user_username, user_mail FROM user WHERE id = $id");
	if($sql)
	{
		if($sql ->num_rows>0)
		{
			while ($rows = $sql ->fetch_assoc()) {
				$this->createSession($id,$rows["user_username"]);
			}
			return true;
		}
		else{
			$this->error.="no hay datos";
		}

	}
	else{
		$this->error.="Hola ;)";
	}

}
	public function login($data){
		$sql = "SELECT id, user_password FROM user WHERE user_username = '".$data["username"]."'";
		$dato = $this->db->conn->query($sql);
		if($dato)
		{
			if($dato->num_rows)
			{
				while ($rows = $dato->fetch_assoc()) 
				{
					$user = $rows;
				}
			}
		}
		if(isset($user)){

		if($user)
		{
			if($this->validatePassword($data["pwd"],$user["user_password"]))
			{
				if($this->create($user["id"]))
				return true;
			}
		}
		}
		echo "<h2>Datos incorrectos</h2>";
		return false;

	}

	private function validatePassword($pwd)
	{
		return $pwd
	}

	private function makePwd($pwd){
		return $pwd
	}

	public function add($data){
	$sql = "INSERT INTO user(user_username, nombre, apellido_p, apellido_m, user_mail, user_password)".
		"VALUES ('".$data["username"]."','".$data["nombre"]."','".$data["apellido_p"]."','".$data["apellido_m"]."','".$data["mail"]."','".$this->makePwd($data["pwd"])."')";
		echo $sql;
		//var_dump($this->db->conn);
			if($this->db->conn->query($sql)){
				if($this->create($this->db->conn->insert_id))
				return true;
				else
					$this->error.="exito";
				
			}
			else{
				$this->error.="algo fallo";
			}
			return false;
	}

	private function createSession($id, $username){
		//session_start();
		$_SESSION["id"] = $id;
		$_SESSION["username"] = $username;
		$_SESSION["token"] = base64_encode($id.strtotime("now").rand(0,100).$username);
	}
	public function killSession(){
		session_start();
		session_unset();
		session_destroy();
	}


}
?>