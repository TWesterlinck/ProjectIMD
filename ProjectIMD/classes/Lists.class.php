<?php


	class Lists
		{
			private $m_sListname;

			public function __get($p_sProperty)
			{
				switch($p_sProperty)
				{
					case "listname":
					return $this->m_sListname;
					break;

					default:
					throw new Exception("CANNOT GET " . $p_sProperty);
				}
			}

			public function __set($p_sProperty, $p_vValue)
			{	
				switch($p_sProperty)
				{
					case "listname":
					$this->m_sListname = $p_vValue;
					break;

					default:
					throw new Exception("CANNOT SET " . $p_sProperty);
				}
			}

			public function saveList(){

				$db = new db('localhost', 'root', '', 'project');
				$id = $db->Select("ID", "user_tbl", "email = '".$_SESSION["email"]."'");
				$id = $id->fetch_array();
				$id = $id['ID'];

				try
					{
						$db = new db('localhost', 'root', '', 'project');
						$db->insert("lists_tbl (user_id, list_name)", "'$id','$this->listname'");
					}
				catch(Exception $e)
					{
						echo $e->Message;
					}	

							
			}

			public function getMyLists(){

				$db = new db('localhost', 'root', '', 'project');
				$result = $db->select("list_name", "lists_tbl", "user_id = '".$_SESSION['user_id']."'");
				return $result;

				if($result->num_rows > 0)
					{
						return $result;
						
					}
				else
					{
						throw new Exception('Geen lijsten gevonden');
						return false;
					}


			}

			

		}

?>