<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("rsbsa_list/add");
$can_edit = ACL::is_allowed("rsbsa_list/edit");
$can_view = ACL::is_allowed("rsbsa_list/view");
$can_delete = ACL::is_allowed("rsbsa_list/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Rsbsa List</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['']) ? urlencode($data['']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-rsbsa_no">
                                        <th class="title"> Rsbsa No: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['rsbsa_no']; ?>" 
                                                data-name="rsbsa_no" 
                                                data-title="Enter Rsbsa No" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['rsbsa_no']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-control_no">
                                        <th class="title"> Control No: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['control_no']; ?>" 
                                                data-name="control_no" 
                                                data-title="Enter Control No" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['control_no']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-first_name">
                                        <th class="title"> First Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['first_name']; ?>" 
                                                data-name="first_name" 
                                                data-title="Enter First Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['first_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-middle_name">
                                        <th class="title"> Middle Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['middle_name']; ?>" 
                                                data-name="middle_name" 
                                                data-title="Enter Middle Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['middle_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-last_name">
                                        <th class="title"> Last Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['last_name']; ?>" 
                                                data-name="last_name" 
                                                data-title="Enter Last Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['last_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ext_name">
                                        <th class="title"> Ext Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ext_name']; ?>" 
                                                data-name="ext_name" 
                                                data-title="Enter Ext Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ext_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farmer_address_bgy">
                                        <th class="title"> Farmer Address Bgy: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['farmer_address_bgy']; ?>" 
                                                data-name="farmer_address_bgy" 
                                                data-title="Enter Farmer Address Bgy" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['farmer_address_bgy']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farmer_address_mun">
                                        <th class="title"> Farmer Address Mun: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['farmer_address_mun']; ?>" 
                                                data-name="farmer_address_mun" 
                                                data-title="Enter Farmer Address Mun" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['farmer_address_mun']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farmer_address_prv">
                                        <th class="title"> Farmer Address Prv: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['farmer_address_prv']; ?>" 
                                                data-name="farmer_address_prv" 
                                                data-title="Enter Farmer Address Prv" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['farmer_address_prv']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-birthday">
                                        <th class="title"> Birthday: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['birthday']; ?>" 
                                                data-name="birthday" 
                                                data-title="Enter Birthday" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['birthday']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-gender">
                                        <th class="title"> Gender: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $Sex); ?>' 
                                                data-value="<?php echo $data['gender']; ?>" 
                                                data-name="gender" 
                                                data-title="Enter Gender" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['gender']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-contact_num">
                                        <th class="title"> Contact Num: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['contact_num']; ?>" 
                                                data-name="contact_num" 
                                                data-title="Enter Contact Num" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['contact_num']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-cropname">
                                        <th class="title"> Cropname: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['cropname']; ?>" 
                                                data-name="cropname" 
                                                data-title="Enter Cropname" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['cropname']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-crop_area">
                                        <th class="title"> Crop Area: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['crop_area']; ?>" 
                                                data-name="crop_area" 
                                                data-title="Enter Crop Area" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['crop_area']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farmer">
                                        <th class="title"> Farmer: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['farmer']; ?>" 
                                                data-name="farmer" 
                                                data-title="Enter Farmer" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['farmer']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farmworker">
                                        <th class="title"> Farmworker: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['farmworker']; ?>" 
                                                data-name="farmworker" 
                                                data-title="Enter Farmworker" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['farmworker']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-fisherfolk">
                                        <th class="title"> Fisherfolk: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['fisherfolk']; ?>" 
                                                data-name="fisherfolk" 
                                                data-title="Enter Fisherfolk" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['fisherfolk']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-agency">
                                        <th class="title"> Agency: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['agency']; ?>" 
                                                data-name="agency" 
                                                data-title="Enter Agency" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['agency']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farm_type">
                                        <th class="title"> Farm Type: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['farm_type']; ?>" 
                                                data-name="farm_type" 
                                                data-title="Enter Farm Type" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['farm_type']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date_created">
                                        <th class="title"> Date Created: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date_created']; ?>" 
                                                data-name="date_created" 
                                                data-title="Enter Date Created" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date_created']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date_updated">
                                        <th class="title"> Date Updated: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date_updated']; ?>" 
                                                data-name="date_updated" 
                                                data-title="Enter Date Updated" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date_updated']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
