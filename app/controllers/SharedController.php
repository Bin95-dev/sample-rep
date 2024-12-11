<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * user_username_value_exist Model Action
     * @return array
     */
	function user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * acknowledgement_acknowledgementuser_option_list Model Action
     * @return array
     */
	function acknowledgement_acknowledgementuser_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT user AS value,user AS label FROM acknowledgement";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_haronali Model Action
     * @return Value
     */
	function getcount_haronali(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM acknowledgement WHERE User = 'Haron'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_hassimmama Model Action
     * @return Value
     */
	function getcount_hassimmama(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(User) AS num FROM acknowledgement where User = 'Hassim'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_eyaddisalongan Model Action
     * @return Value
     */
	function getcount_eyaddisalongan(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(User) AS num FROM acknowledgement where User = 'Eyad'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_norhainamusanip Model Action
     * @return Value
     */
	function getcount_norhainamusanip(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(User) AS num FROM acknowledgement WHERE User = 'Baby'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_abduljabaresmail Model Action
     * @return Value
     */
	function getcount_abduljabaresmail(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(User) AS num FROM acknowledgement WHERE User = 'Abdul Jabar'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_binbadztending Model Action
     * @return Value
     */
	function getcount_binbadztending(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(User) AS num FROM acknowledgement WHERE User = 'Bin'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_wallidlantukan Model Action
     * @return Value
     */
	function getcount_wallidlantukan(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(User) AS num FROM acknowledgement WHERE User = 'Wallid'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_saudkahal Model Action
     * @return Value
     */
	function getcount_saudkahal(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(User) AS num FROM acknowledgement WHERE User = 'Saud'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_rice Model Action
     * @return Value
     */
	function getcount_rice(){
		$db = $this->GetModel();
		$sqltext = "SELECT count(Program) AS num FROM acknowledgement WHERE Program = 'Rice'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_organic Model Action
     * @return Value
     */
	function getcount_organic(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(Program) AS num FROM acknowledgement WHERE Program = 'Organic'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_corn Model Action
     * @return Value
     */
	function getcount_corn(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(Program) AS num FROM acknowledgement WHERE Program = 'Corn'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_hvcdp Model Action
     * @return Value
     */
	function getcount_hvcdp(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(Program) AS num FROM acknowledgement Where Program = 'HVCDP'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	function getcount_rd(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(Program) AS num FROM acknowledgement Where Program = 'R&D'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}
	
	function getcount_transmitta(){

		$db = $this->GetModel();
		$sqltext = "SELECT SUM(Form_no) AS num FROM trasmittal ";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* doughnutchart_programs Model Action
	* @return array
	*/
	function doughnutchart_programs(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  a.Program, SUM(a.Quantity) AS sum_of_Quantity FROM acknowledgement AS a  GROUP BY a.Program";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'sum_of_Quantity');
		$dataset_labels =  array_column($dataset1, 'Program');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* barchart_fundsource Model Action
	* @return array
	*/
	function barchart_fundsource(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(a.Program) AS count_of_Program, a.Fund_Source FROM acknowledgement AS a GROUP BY a.Fund_Source";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_Program');
		$dataset_labels =  array_column($dataset1, 'Fund_Source');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

}
