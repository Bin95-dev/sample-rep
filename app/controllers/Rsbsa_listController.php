<?php 
/**
 * Rsbsa_list Page Controller
 * @category  Controller
 */
class Rsbsa_listController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "rsbsa_list";
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
		$fields = array("rsbsa_no", 
			"control_no", 
			"first_name", 
			"middle_name", 
			"last_name", 
			"ext_name", 
			"farmer_address_bgy", 
			"farmer_address_mun", 
			"farmer_address_prv", 
			"birthday", 
			"gender", 
			"contact_num", 
			"cropname", 
			"crop_area", 
			"farmer", 
			"farmworker", 
			"fisherfolk", 
			"agency", 
			"farm_type", 
			"date_created", 
			"date_updated");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				rsbsa_list.rsbsa_no LIKE ? OR 
				rsbsa_list.control_no LIKE ? OR 
				rsbsa_list.first_name LIKE ? OR 
				rsbsa_list.middle_name LIKE ? OR 
				rsbsa_list.last_name LIKE ? OR 
				rsbsa_list.ext_name LIKE ? OR 
				rsbsa_list.farmer_address_bgy LIKE ? OR 
				rsbsa_list.farmer_address_mun LIKE ? OR 
				rsbsa_list.farmer_address_prv LIKE ? OR 
				rsbsa_list.birthday LIKE ? OR 
				rsbsa_list.gender LIKE ? OR 
				rsbsa_list.contact_num LIKE ? OR 
				rsbsa_list.cropname LIKE ? OR 
				rsbsa_list.crop_area LIKE ? OR 
				rsbsa_list.farmer LIKE ? OR 
				rsbsa_list.farmworker LIKE ? OR 
				rsbsa_list.fisherfolk LIKE ? OR 
				rsbsa_list.agency LIKE ? OR 
				rsbsa_list.farm_type LIKE ? OR 
				rsbsa_list.date_created LIKE ? OR 
				rsbsa_list.date_updated LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "rsbsa_list/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("rsbsa_list.rsbsa_no", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Rsbsa List";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("rsbsa_list/list.php", $data); //render the full page
	}
	/**
     * Load csv data
     * @return data
     */
	function import_data(){
		if(!empty($_FILES['file'])){
			$finfo = pathinfo($_FILES['file']['name']);
			$ext = strtolower($finfo['extension']);
			if(!in_array($ext , array('csv'))){
				$this->set_flash_msg("File format not supported", "danger");
			}
			else{
			$file_path = $_FILES['file']['tmp_name'];
				if(!empty($file_path)){
					$request = $this->request;
					$db = $this->GetModel();
					$tablename = $this->tablename;
					$options = array('table' => $tablename, 'fields' => '', 'delimiter' => ',', 'quote' => '"');
					$data = $db->loadCsvData( $file_path , $options , false );
					if($db->getLastError()){
						$this->set_flash_msg($db->getLastError(), "danger");
					}
					else{
						$this->set_flash_msg("Data imported successfully", "success");
					}
				}
				else{
					$this->set_flash_msg("Error uploading file", "danger");
				}
			}
		}
		else{
			$this->set_flash_msg("No file selected for upload", "warning");
		}
		$this->redirect("rsbsa_list");
	}
// No View Function Generated Because No Field is Defined as the Primary Key on the Database Table
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
			$fields = $this->fields = array("rsbsa_no","control_no","first_name","middle_name","last_name","ext_name","farmer_address_bgy","farmer_address_mun","farmer_address_prv","birthday","gender","contact_num","cropname","crop_area","farmer","farmworker","fisherfolk","agency","farm_type","date_created","date_updated");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'rsbsa_no' => 'required',
				'control_no' => 'required',
				'first_name' => 'required',
				'middle_name' => 'required',
				'last_name' => 'required',
				'ext_name' => 'required',
				'farmer_address_bgy' => 'required',
				'farmer_address_mun' => 'required',
				'farmer_address_prv' => 'required',
				'birthday' => 'required',
				'gender' => 'required',
				'contact_num' => 'required',
				'cropname' => 'required',
				'crop_area' => 'required',
				'farmer' => 'required',
				'farmworker' => 'required',
				'fisherfolk' => 'required',
				'agency' => 'required',
				'farm_type' => 'required',
				'date_created' => 'required',
				'date_updated' => 'required',
			);
			$this->sanitize_array = array(
				'rsbsa_no' => 'sanitize_string',
				'control_no' => 'sanitize_string',
				'first_name' => 'sanitize_string',
				'middle_name' => 'sanitize_string',
				'last_name' => 'sanitize_string',
				'ext_name' => 'sanitize_string',
				'farmer_address_bgy' => 'sanitize_string',
				'farmer_address_mun' => 'sanitize_string',
				'farmer_address_prv' => 'sanitize_string',
				'birthday' => 'sanitize_string',
				'gender' => 'sanitize_string',
				'contact_num' => 'sanitize_string',
				'cropname' => 'sanitize_string',
				'crop_area' => 'sanitize_string',
				'farmer' => 'sanitize_string',
				'farmworker' => 'sanitize_string',
				'fisherfolk' => 'sanitize_string',
				'agency' => 'sanitize_string',
				'farm_type' => 'sanitize_string',
				'date_created' => 'sanitize_string',
				'date_updated' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("rsbsa_list");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Rsbsa List";
		$this->render_view("rsbsa_list/add.php");
	}
// No Edit Function Generated Because No Field is Defined as the Primary Key
// No Delete Function Generated Because No Field is Defined as the Primary Key on the Database Table/View
}
