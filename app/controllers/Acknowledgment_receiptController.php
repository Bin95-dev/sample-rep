<?php 
/**
 * Acknowledgment_receipt Page Controller
 * @category  Controller
 */
class Acknowledgment_receiptController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "acknowledgment_receipt";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"Barangay", 
			"Municipality", 
			"Province", 
			"Intervention", 
			"Fund_Source", 
			"Program", 
			"Indicator", 
			"Indivdual", 
			"FCA", 
			"FirstName", 
			"MiddleName", 
			"LastName", 
			"RSBSA_NO", 
			"BIRTHDAY", 
			"Contact_no", 
			"Sex", 
			"ARBS", 
			"PWD", 
			"IP", 
			"FARM_AREA", 
			"Commodity", 
			"Type", 
			"Quantity", 
			"Variety", 
			"date_Distributed", 
			"Venue", 
			"date_encoded", 
			"date_updated");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				acknowledgment_receipt.id LIKE ? OR 
				acknowledgment_receipt.Barangay LIKE ? OR 
				acknowledgment_receipt.Municipality LIKE ? OR 
				acknowledgment_receipt.Province LIKE ? OR 
				acknowledgment_receipt.Intervention LIKE ? OR 
				acknowledgment_receipt.Fund_Source LIKE ? OR 
				acknowledgment_receipt.Program LIKE ? OR 
				acknowledgment_receipt.Indicator LIKE ? OR 
				acknowledgment_receipt.Indivdual LIKE ? OR 
				acknowledgment_receipt.FCA LIKE ? OR 
				acknowledgment_receipt.FirstName LIKE ? OR 
				acknowledgment_receipt.MiddleName LIKE ? OR 
				acknowledgment_receipt.LastName LIKE ? OR 
				acknowledgment_receipt.RSBSA_NO LIKE ? OR 
				acknowledgment_receipt.BIRTHDAY LIKE ? OR 
				acknowledgment_receipt.Contact_no LIKE ? OR 
				acknowledgment_receipt.Sex LIKE ? OR 
				acknowledgment_receipt.ARBS LIKE ? OR 
				acknowledgment_receipt.PWD LIKE ? OR 
				acknowledgment_receipt.IP LIKE ? OR 
				acknowledgment_receipt.FARM_AREA LIKE ? OR 
				acknowledgment_receipt.Commodity LIKE ? OR 
				acknowledgment_receipt.Type LIKE ? OR 
				acknowledgment_receipt.Quantity LIKE ? OR 
				acknowledgment_receipt.Variety LIKE ? OR 
				acknowledgment_receipt.date_Distributed LIKE ? OR 
				acknowledgment_receipt.Venue LIKE ? OR 
				acknowledgment_receipt.date_encoded LIKE ? OR 
				acknowledgment_receipt.date_updated LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "acknowledgment_receipt/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("acknowledgment_receipt.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Acknowledgment Receipt";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("acknowledgment_receipt/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"Barangay", 
			"Municipality", 
			"Province", 
			"Intervention", 
			"Fund_Source", 
			"Program", 
			"Indicator", 
			"Indivdual", 
			"FCA", 
			"FirstName", 
			"MiddleName", 
			"LastName", 
			"RSBSA_NO", 
			"BIRTHDAY", 
			"Contact_no", 
			"Sex", 
			"ARBS", 
			"PWD", 
			"IP", 
			"FARM_AREA", 
			"Commodity", 
			"Type", 
			"Quantity", 
			"Variety", 
			"date_Distributed", 
			"Venue", 
			"date_encoded", 
			"date_updated");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("acknowledgment_receipt.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Acknowledgment Receipt";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("acknowledgment_receipt/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("Barangay","Municipality","Province","Intervention","Fund_Source","Program","Indicator","Indivdual","FCA","FirstName","MiddleName","LastName","RSBSA_NO","BIRTHDAY","Contact_no","Sex","ARBS","PWD","IP","FARM_AREA","Commodity","Type","Quantity","Variety","date_Distributed","Venue");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Barangay' => 'required',
				'Municipality' => 'required',
				'Province' => 'required',
				'Intervention' => 'required',
				'Fund_Source' => 'required',
				'Program' => 'required',
				'Indicator' => 'required',
				'Indivdual' => 'required',
				'FCA' => 'required',
				'FirstName' => 'required',
				'MiddleName' => 'required',
				'LastName' => 'required',
				'RSBSA_NO' => 'required',
				'BIRTHDAY' => 'required',
				'Contact_no' => 'required|numeric',
				'Sex' => 'required',
				'ARBS' => 'required',
				'PWD' => 'required',
				'IP' => 'required',
				'FARM_AREA' => 'required|numeric',
				'Commodity' => 'required',
				'Type' => 'required',
				'Quantity' => 'required|numeric',
				'Variety' => 'required',
				'date_Distributed' => 'required',
				'Venue' => 'required',
			);
			$this->sanitize_array = array(
				'Barangay' => 'sanitize_string',
				'Municipality' => 'sanitize_string',
				'Province' => 'sanitize_string',
				'Intervention' => 'sanitize_string',
				'Fund_Source' => 'sanitize_string',
				'Program' => 'sanitize_string',
				'Indicator' => 'sanitize_string',
				'Indivdual' => 'sanitize_string',
				'FCA' => 'sanitize_string',
				'FirstName' => 'sanitize_string',
				'MiddleName' => 'sanitize_string',
				'LastName' => 'sanitize_string',
				'RSBSA_NO' => 'sanitize_string',
				'BIRTHDAY' => 'sanitize_string',
				'Contact_no' => 'sanitize_string',
				'Sex' => 'sanitize_string',
				'ARBS' => 'sanitize_string',
				'PWD' => 'sanitize_string',
				'IP' => 'sanitize_string',
				'FARM_AREA' => 'sanitize_string',
				'Commodity' => 'sanitize_string',
				'Type' => 'sanitize_string',
				'Quantity' => 'sanitize_string',
				'Variety' => 'sanitize_string',
				'date_Distributed' => 'sanitize_string',
				'Venue' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("acknowledgment_receipt");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Acknowledgment Receipt";
		$this->render_view("acknowledgment_receipt/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","Barangay","Municipality","Province","Intervention","Fund_Source","Program","Indicator","Indivdual","FCA","FirstName","MiddleName","LastName","RSBSA_NO","BIRTHDAY","Contact_no","Sex","ARBS","PWD","IP","FARM_AREA","Commodity","Type","Quantity","Variety","date_Distributed","Venue");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Barangay' => 'required',
				'Municipality' => 'required',
				'Province' => 'required',
				'Intervention' => 'required',
				'Fund_Source' => 'required',
				'Program' => 'required',
				'Indicator' => 'required',
				'Indivdual' => 'required',
				'FCA' => 'required',
				'FirstName' => 'required',
				'MiddleName' => 'required',
				'LastName' => 'required',
				'RSBSA_NO' => 'required',
				'BIRTHDAY' => 'required',
				'Contact_no' => 'required|numeric',
				'Sex' => 'required',
				'ARBS' => 'required',
				'PWD' => 'required',
				'IP' => 'required',
				'FARM_AREA' => 'required|numeric',
				'Commodity' => 'required',
				'Type' => 'required',
				'Quantity' => 'required|numeric',
				'Variety' => 'required',
				'date_Distributed' => 'required',
				'Venue' => 'required',
			);
			$this->sanitize_array = array(
				'Barangay' => 'sanitize_string',
				'Municipality' => 'sanitize_string',
				'Province' => 'sanitize_string',
				'Intervention' => 'sanitize_string',
				'Fund_Source' => 'sanitize_string',
				'Program' => 'sanitize_string',
				'Indicator' => 'sanitize_string',
				'Indivdual' => 'sanitize_string',
				'FCA' => 'sanitize_string',
				'FirstName' => 'sanitize_string',
				'MiddleName' => 'sanitize_string',
				'LastName' => 'sanitize_string',
				'RSBSA_NO' => 'sanitize_string',
				'BIRTHDAY' => 'sanitize_string',
				'Contact_no' => 'sanitize_string',
				'Sex' => 'sanitize_string',
				'ARBS' => 'sanitize_string',
				'PWD' => 'sanitize_string',
				'IP' => 'sanitize_string',
				'FARM_AREA' => 'sanitize_string',
				'Commodity' => 'sanitize_string',
				'Type' => 'sanitize_string',
				'Quantity' => 'sanitize_string',
				'Variety' => 'sanitize_string',
				'date_Distributed' => 'sanitize_string',
				'Venue' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("acknowledgment_receipt.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("acknowledgment_receipt");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("acknowledgment_receipt");
					}
				}
			}
		}
		$db->where("acknowledgment_receipt.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Acknowledgment Receipt";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("acknowledgment_receipt/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id","Barangay","Municipality","Province","Intervention","Fund_Source","Program","Indicator","Indivdual","FCA","FirstName","MiddleName","LastName","RSBSA_NO","BIRTHDAY","Contact_no","Sex","ARBS","PWD","IP","FARM_AREA","Commodity","Type","Quantity","Variety","date_Distributed","Venue");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'Barangay' => 'required',
				'Municipality' => 'required',
				'Province' => 'required',
				'Intervention' => 'required',
				'Fund_Source' => 'required',
				'Program' => 'required',
				'Indicator' => 'required',
				'Indivdual' => 'required',
				'FCA' => 'required',
				'FirstName' => 'required',
				'MiddleName' => 'required',
				'LastName' => 'required',
				'RSBSA_NO' => 'required',
				'BIRTHDAY' => 'required',
				'Contact_no' => 'required|numeric',
				'Sex' => 'required',
				'ARBS' => 'required',
				'PWD' => 'required',
				'IP' => 'required',
				'FARM_AREA' => 'required|numeric',
				'Commodity' => 'required',
				'Type' => 'required',
				'Quantity' => 'required|numeric',
				'Variety' => 'required',
				'date_Distributed' => 'required',
				'Venue' => 'required',
			);
			$this->sanitize_array = array(
				'Barangay' => 'sanitize_string',
				'Municipality' => 'sanitize_string',
				'Province' => 'sanitize_string',
				'Intervention' => 'sanitize_string',
				'Fund_Source' => 'sanitize_string',
				'Program' => 'sanitize_string',
				'Indicator' => 'sanitize_string',
				'Indivdual' => 'sanitize_string',
				'FCA' => 'sanitize_string',
				'FirstName' => 'sanitize_string',
				'MiddleName' => 'sanitize_string',
				'LastName' => 'sanitize_string',
				'RSBSA_NO' => 'sanitize_string',
				'BIRTHDAY' => 'sanitize_string',
				'Contact_no' => 'sanitize_string',
				'Sex' => 'sanitize_string',
				'ARBS' => 'sanitize_string',
				'PWD' => 'sanitize_string',
				'IP' => 'sanitize_string',
				'FARM_AREA' => 'sanitize_string',
				'Commodity' => 'sanitize_string',
				'Type' => 'sanitize_string',
				'Quantity' => 'sanitize_string',
				'Variety' => 'sanitize_string',
				'date_Distributed' => 'sanitize_string',
				'Venue' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("acknowledgment_receipt.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("acknowledgment_receipt.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("acknowledgment_receipt");
	}
}
