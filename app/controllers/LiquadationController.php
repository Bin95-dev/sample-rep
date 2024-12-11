<?php 
/**
 * Liquadation Page Controller
 * @category  Controller
 */
class LiquadationController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "liquadation";
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
			"Province", 
			"Municipality", 
			"Barangay", 
			"FirstName", 
			"MiddleName", 
			"LastName", 
			"RSBSA_R", 
			"System_Gen", 
			"Birth_date", 
			"Contact_no", 
			"Sex", 
			"ARB", 
			"ARCs", 
			"PWD", 
			"IPs", 
			"farmsize", 
			"date_recived", 
			"update", 
			"encoded");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				liquadation.id LIKE ? OR 
				liquadation.Province LIKE ? OR 
				liquadation.Municipality LIKE ? OR 
				liquadation.Barangay LIKE ? OR 
				liquadation.FirstName LIKE ? OR 
				liquadation.MiddleName LIKE ? OR 
				liquadation.LastName LIKE ? OR 
				liquadation.RSBSA_R LIKE ? OR 
				liquadation.System_Gen LIKE ? OR 
				liquadation.Birth_date LIKE ? OR 
				liquadation.Contact_no LIKE ? OR 
				liquadation.Sex LIKE ? OR 
				liquadation.ARB LIKE ? OR 
				liquadation.ARCs LIKE ? OR 
				liquadation.PWD LIKE ? OR 
				liquadation.IPs LIKE ? OR 
				liquadation.farmsize LIKE ? OR 
				liquadation.date_recived LIKE ? OR 
				liquadation.update LIKE ? OR 
				liquadation.encoded LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "liquadation/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("liquadation.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Liquadation";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("liquadation/list.php", $data); //render the full page
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
			$fields = $this->fields = array("id","Province","Municipality","Barangay","FirstName","MiddleName","LastName","RSBSA_R","System_Gen","Birth_date","Contact_no","Sex","ARB","ARCs","PWD","IPs","farmsize");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'id' => 'required|numeric',
				'Province' => 'required',
				'Municipality' => 'required',
				'Barangay' => 'required',
				'FirstName' => 'required',
				'MiddleName' => 'required',
				'LastName' => 'required',
				'RSBSA_R' => 'required',
				'System_Gen' => 'required',
				'Birth_date' => 'required',
				'Contact_no' => 'required|numeric',
				'Sex' => 'required',
				'ARB' => 'required',
				'ARCs' => 'required',
				'PWD' => 'required',
				'IPs' => 'required|numeric',
				'farmsize' => 'required|numeric',
			);
			$this->sanitize_array = array(
				'id' => 'sanitize_string',
				'Province' => 'sanitize_string',
				'Municipality' => 'sanitize_string',
				'Barangay' => 'sanitize_string',
				'FirstName' => 'sanitize_string',
				'MiddleName' => 'sanitize_string',
				'LastName' => 'sanitize_string',
				'RSBSA_R' => 'sanitize_string',
				'System_Gen' => 'sanitize_string',
				'Birth_date' => 'sanitize_string',
				'Contact_no' => 'sanitize_string',
				'Sex' => 'sanitize_string',
				'ARB' => 'sanitize_string',
				'ARCs' => 'sanitize_string',
				'PWD' => 'sanitize_string',
				'IPs' => 'sanitize_string',
				'farmsize' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("liquadation");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Liquadation";
		$this->render_view("liquadation/add.php");
	}
// No Edit Function Generated Because No Field is Defined as the Primary Key
// No Delete Function Generated Because No Field is Defined as the Primary Key on the Database Table/View
}
