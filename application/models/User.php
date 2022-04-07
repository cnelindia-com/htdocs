<?php
class User extends CI_Model
{
	function insert($cname,$registration,$fname,$email,$password)
	{
		
		$chec_company_query = "SELECT	COUNT(*) FROM	company C WHERE	C.Name = '$cname'";
		$query=$this->db->query($chec_company_query);
		if($query->num_rows()>0)
		{
			$response =$query->row('COUNT(*)');
			
			if($response==0)
			{
					// code to add using store procedure 

					//echo $qry_stored = "SET @p0='a'; SET @p1='c'; SET @p2='v'; SET @p3='d'; SET @p4='f'; CALL `NewSignUp`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8); SELECT @p5 AS `pNewCompanyID`, @p6 AS `pNewEmployeeID`, @p7 AS `pNewEmploymentDetailID`, @p8 AS `pGUID`; ";
				//echo $qry_stored = "CALL NewSignUp('a', 'b', 'v', 'd', 'e',@pNewCompanyID,@pNewEmployeeID,@pNewEmploymentDetailID,@pGUID);  ";
			        $qry_NewSignUp = "CALL NewSignUp('$cname', '$registration', '$fname', '$email', '$password',@pNewCompanyID,@pNewEmployeeID,@pNewEmploymentDetailID,@pGUID);";
					$result_NewSignUp=$this->db->query($qry_NewSignUp); 


 
			}
			else
			{
				$data['message']="<h3 style='color:red'>This user already registered</h3>";
			}
		}
		$this->load->view('signup',@$data);
	}

		 function user_check($email,$password)
		{
			// echo $email;
			// echo $password;
			// die;
			$qry_LoginChecks ="CALL LoginChecks('$email','$password',@pResult,@pEmployeeID,@pEmploymentDetailID,@pCompanyID);";
			
			
			$result_LoginChecks=$this->db->query($qry_LoginChecks);
			
			
			// add all @variable 
			$response  = $this->db->query("SELECT @pResult as pResult, @pEmployeeID as pEmployeeID, @pEmploymentDetailID as pEmploymentDetailID, @pCompanyID as pCompanyID;");

			
			foreach ($response->result() as $row)
			{
					
					$pResult =  $row->pResult; 
					// find values of pEmploymentDetailID pEmployeeID pCompanyID
					$pEmploymentDetailID= $row->pEmploymentDetailID;
					$pEmployeeID=$row->pEmployeeID;
					$pCompanyID=$row->pCompanyID;

					// echo $pEmploymentDetailID;
					// echo $pEmployeeID;
					// echo $pCompanyID;
					// check if presult !=1
						// show invalid message

						if($pResult==1)
						{
						   $_SESSION['pEmploymentDetailID'] = $pEmploymentDetailID;
						   $_SESSION['pEmployeeID'] = $pEmployeeID;
						   $_SESSION['pCompanyID'] = $pCompanyID;

						   header('Location: https://127.0.0.1/home');
						   exit;
						}
						 


					// check if presult == 1
						// set 3 session variabl;e as example below pEmploymentDetailID pEmployeeID pCompanyID
						//$_SESSION['pResult'] = "asdasdsad";
						
						else
						 {
							 echo 'Invalid User';
						 }
						// if($pResult==1)
						// {
						//    $_SESSION['pEmploymentDetailID'] = $pEmploymentDetailID;
						//    $_SESSION['pEmployeeID'] = $pEmployeeID;
						//    $_SESSION['pCompanyID'] = $pCompanyID;

						//    print_r($_SESSION);
						// }
						// print_r($_SESSION);
						// show the dashboard 
			}
			
			//print_r($response->result() );
			
			//echo $row['pResult'];

			//echo $ss;
			//echo $result_LoginChecks->row('pResult');
			//echo $query->row('raman');
			//mysqli_next_result($this->db->conn_id); //Important Line 
			//echo $query->result_LoginChecks->pResult;
			//echo  $sqlGetOutParam = $this->db->query("SELECT @pResult;");
			// $sqlGetOutParam = "SELECT @pResult;";
			
			// print_r($outValue->result());
			//print_r($result_LoginChecks);
			//print_r($result_LoginChecks->result);
			//echo $result_LoginChecks->num_rows();
			//if($result_LoginChecks->num_rows()>0)
			{
				// $response =$result_LoginChecks->row('@pResult');
				// echo $response;
		
			  	// if($response==0){

				// }
			

			 }
		}
}
?>