<?php  

	class Leads_model extends CI_Model
	{
		
		public function add_source($data)
		{
		    $result = $this->db->insert('tbl_source', $data);
		
		}
		
		public function source()
		{
			$this->db->select('*');
			$this->db->from('tbl_source');
			$this->db->order_by('id','DESC');
			$sql = $this->db->get();
			return $sql->result();
			
		}
		
		public function source_by_id($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_source');
			$this->db->where('id', $id);
			$sql = $this->db->get('');
			return $sql->row();
		}
		
		public function update_source($data,$id)
		{
		    $this->db->where('id', $id);
			$this->db->update('tbl_source', $data);
		
		}
		
		public function delete_source($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_source');
		}
		
		public function add_status($data)
		{
		    $result = $this->db->insert('tbl_status', $data);
		
		}
		
		public function status()
		{
			$this->db->select('*');
			$this->db->from('tbl_status');
			$this->db->order_by('id','DESC');
			$sql = $this->db->get();
			return $sql->result();
			
		}
		
		public function status_by_id($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_status');
			$this->db->where('id', $id);
			$sql = $this->db->get('');
			return $sql->row();
		}
		
		public function update_status($data,$id)
		{
		    $this->db->where('id', $id);
			$this->db->update('tbl_status', $data);
		
		}
		
		public function delete_status($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_status');
		}
		
		
		
		// Read
		
		public function insert_lead($data)
		{
		    $result = $this->db->insert('tbl_leads', $data);
		
		}
		
		 public function leads($user_id='')
		 {
			$this->db->select('*');
			$this->db->from('tbl_leads');
			if($user_id!='')
			{
			 $this->db->where('user_id',$user_id); 	
			}	
			$this->db->order_by('id','DESC');
			$sql = $this->db->get();
			return $sql->result();
			
			
		}



			function get_leads($postData=null){
                
                      $response = array();
                
                      ## Read value
                      $draw = $postData['draw'];
                      $start = $postData['start'];
                      $rowperpage = $postData['length']; // Rows display per page
                      $columnIndex = $postData['order'][0]['column']; // Column index
                      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
                      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
                      $searchValue = $postData['search']['value']; // Search value
                
                       //echo '<pre>';
					   //print_r($postData);
					  // exit;
					  
					  // Custom search filter 
                      $searchFrom = $postData['searchFrom_datepicker'];
                      $searchTo   = $postData['searchTo_datepicker'];
                   
                      ## Search 
                      $search_arr = array();
                      $searchQuery = "";
                      if($searchValue != ''){
                          $search_arr[] = " (name like '%".$searchValue."%' or email like '%".$searchValue."%' or mobile like'%".$searchValue."%' or created_date like'%".$searchValue."%' )";
                      }
                      if($searchFrom != '' && $searchTo !='' ){
                          
						  $searchFrom = date('Y-m-d',strtotime($searchFrom));
						  $searchTo = date('Y-m-d',strtotime($searchTo));
					      $search_arr[] = " date(created_date) >='".$searchFrom."'";
						  $search_arr[] = " date(created_date) <='".$searchTo."'";
                      }
                      
                      
                      if(count($search_arr) > 0){
                          $searchQuery = implode(" and ",$search_arr);
                      }
                
                      ## Total number of records without filtering
                      $this->db->select('count(*) as allcount');
                      $records = $this->db->get('tbl_leads')->result();
                      $totalRecords = $records[0]->allcount;
                
                      ## Total number of record with filtering
                      $this->db->select('count(*) as allcount');
                      if($searchQuery != '')
                      $this->db->where($searchQuery);
                      $records = $this->db->get('tbl_leads')->result();
                      $totalRecordwithFilter = $records[0]->allcount;
                
                      ## Fetch records
                      $this->db->select('*');
                      if($searchQuery != '')
                      $this->db->where($searchQuery);
                      $this->db->order_by('id','DESC');
                      $this->db->limit($rowperpage, $start);
                      $records = $this->db->get('tbl_leads')->result();
					  //echo $this->db->last_query();
					  //exit;
					
					                  
                      $data = array();
                      $no = $start;
                      foreach($records as $record ){
                           $no ++;
                          $data[] = array( 
								"id"=>$no,
								"name"=>$record->name,
								"email"=>$record->email,
								"mobile"=>$record->mobile,
								"visiting"=>$record->visiting,
								"message"=>$record->message,
								"cdate"=>date('Y-m-d',strtotime($record->created_date))
                          );
                        					  
                      }
                	 
                
                      ## Response
                      $response = array(
                          "draw" => intval($draw),
                          "iTotalRecords" => $totalRecords,
                          "iTotalDisplayRecords" => $totalRecordwithFilter,
                          "aaData" => $data
                      );
                
                      return $response; 
                  }
	   	
		
		
		
		
	}
?>