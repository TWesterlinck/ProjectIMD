<?php


	class Event
		{
			private $m_sCdbid;
			private $m_sListname;

			public function __get($p_sProperty)
			{
				switch($p_sProperty)
				{
					case "listname":
					return $this->m_sListname;
					break;

					case "cdbid":
					return $this->m_sCdbid;
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

					case "cdbid":
					$this->m_sCdbid = $p_vValue;
					break;

					default:
					throw new Exception("CANNOT SET " . $p_sProperty);
				}
			}

			public function saveEvent(){

				$db = new db('localhost', 'root', '', 'project');
				$id = $db->Select("ID", "lists_tbl", "list_name = '".$this->m_sListname."'");
				$id = $id->fetch_array();
				$id = $id['ID'];

				try
					{
						$db = new db('localhost', 'root', '', 'project');
						$db->insert("event_tbl (list_id, api_event)", "'$id','".$this->cdbid."'");
					}
				catch(Exception $e)
					{
						echo $e->Message;
					}	

							
			}

			public function getEvents(){

				$db = new db('localhost', 'root', '', 'project');
				$id = $db->Select("ID", "lists_tbl", "list_name = '".$_SESSION['listname']."'");
				$id = $id->fetch_array();
				$id = $id['ID'];


				$db = new db('localhost', 'root', '', 'project');
				$result = $db->Select("api_event", "event_tbl", "list_id = '".$id."'");

				$data = array();

				while($row = $result->fetch_array())
				{
					$data[] = $row;
				}
				//print_r($data);
				$arrayResult = array();

				foreach ($data as $d) {
					//if(array_key_exists('api_event', $d))
					//{
						$arrayResult[] = $d['api_event'];
					//}
					
				}

				
				//print_r($arrayResult);
				return($arrayResult);

			}



		}

?>