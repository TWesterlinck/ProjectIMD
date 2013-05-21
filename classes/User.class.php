<?php


	class User
	{
		private $m_sName;
		private $m_sPassword;
		private $m_sEmail;
		private $m_sID;

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "Name":
				return $this->m_sName;
				break;

				case "Password":
				return $this->m_sPassword;
				break;

				case "Email":
				return $this->m_sEmail;
				break;

				case "ID":
				return $this->m_sID;

				default:
				throw new Exception("CANNOT GET " . $p_sProperty);
			}
		}

		public function __set($p_sProperty, $p_vValue)
		{	
			switch($p_sProperty)
			{
				case "Name":
				$this->m_sName = mysql_real_escape_string($p_vValue);
				break;

				case "Password":

					$salt = "verzint iets ! 3023032KF. . D";
					$this->m_sPassword = md5($p_vValue.$salt);

				break;

				case "Email":
				$this->m_sEmail = mysql_real_escape_string($p_vValue);
				break;

				case "ID":
				$this->m_sID = $p_vValue;
				break;

				default:
				throw new Exception("CANNOT SET " . $p_sProperty);
			}
		}

		public function Register()
		{
			try
			{
				$db = new db('localhost', 'root', '', 'project');
				$db->insert("user_tbl (username, password, email)", "'$this->Name','$this->Password', '$this->Email'");
				
			}
			catch(Exception $e)
			{
				echo $e->Message;
			}
		}

		public function CanLogin()
		{
		
			$db = new db('localhost', 'root', '', 'project');

			$res = $db->Select("username, ID" , "user_tbl","password = '$this->Password' and email = '$this->Email'");

			if($res->num_rows == 1)
			{
				$obj = $res->fetch_object();
				$this->Name = $obj->username;
				$this->ID = $obj->ID;
				return true;
				
			}else
			{
				throw new Exception('Fout bij het aanmelden.');
				return false;
			}
			
		}

	}	

?>