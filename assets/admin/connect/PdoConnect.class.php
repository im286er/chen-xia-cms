<?php 

	
	class PDO_CON{
		
		var $dbtype;
		var $host;
		var $user;
		var $pasw;
		var $dbname;
		//构造函数
		function __construct($dbtype,$host,$user,$pasw,$dbname){
			
			$this->dbtype=$dbtype;
			$this->host=$host;
			$this->user=$user;
			$this->pasw=$pasw;
			$this->dbname=$dbname;
		}
		
		function get_conId(){
			if($this->dbtype=='mysql' || $this->dbtype=='mssql'){
				$dsn="$this->dbtype:host=$this->host;dbname=$this->dbname";
			}else{
				$dsn="$this->dbtype:dbname=$this->dbname";
			}

			try {
				//初始化PDO对象$pdo
				$conn=new PDO($dsn, $this->user, $this->pasw);
				$conn->query('set names utf8');//设置字符编码
				return $conn;
			}catch(PDOException $e){
				die("Error!".$e->getMessage().'<br/>');
			}
		}
		
		function ExceSQL($sql,$conn){
			
			//sql语句检测	防止注入攻击
			//$sql=$this->Sql_Str_Check($sql);
			
			$sqltype=strtolower((substr(trim($sql),0,6)));//截取sql关键词
			$rs=$conn->prepare($sql);
			$rs->execute();
			
			if($sqltype=='select'){
				$array=$rs->fetchAll(PDO::FETCH_ASSOC);
				if(count($array)==0 || $rs==false){
					return false;
				}else{
					return $array;
				}
			}elseif($sqltype=='update' || $sqltype=='insert' || $sqltype=='delete'){
				
				if($rs->rowCount()>0){//有行影响
					return true;
				}else{
					return false;
				}
			}
			
		}
		
	}//class类

?>