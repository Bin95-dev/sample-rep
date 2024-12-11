<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("rsbsa_list/add");
$can_edit = ACL::is_allowed("rsbsa_list/edit");
$can_view = ACL::is_allowed("rsbsa_list/view");
$can_delete = ACL::is_allowed("rsbsa_list/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Rsbsa List</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("rsbsa_list/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Rsbsa List 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('rsbsa_list'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('rsbsa_list'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('rsbsa_list'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="rsbsa_list-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-sno">#</th>
                                                <th  class="td-rsbsa_no"> Rsbsa No</th>
                                                <th  class="td-control_no"> Control No</th>
                                                <th  class="td-first_name"> First Name</th>
                                                <th  class="td-middle_name"> Middle Name</th>
                                                <th  class="td-last_name"> Last Name</th>
                                                <th  class="td-ext_name"> Ext Name</th>
                                                <th  class="td-farmer_address_bgy"> Farmer Address Bgy</th>
                                                <th  class="td-farmer_address_mun"> Farmer Address Mun</th>
                                                <th  class="td-farmer_address_prv"> Farmer Address Prv</th>
                                                <th  class="td-birthday"> Birthday</th>
                                                <th  class="td-gender"> Gender</th>
                                                <th  class="td-contact_num"> Contact Num</th>
                                                <th  class="td-cropname"> Cropname</th>
                                                <th  class="td-crop_area"> Crop Area</th>
                                                <th  class="td-farmer"> Farmer</th>
                                                <th  class="td-farmworker"> Farmworker</th>
                                                <th  class="td-fisherfolk"> Fisherfolk</th>
                                                <th  class="td-agency"> Agency</th>
                                                <th  class="td-farm_type"> Farm Type</th>
                                                <th  class="td-date_created"> Date Created</th>
                                                <th  class="td-date_updated"> Date Updated</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['']) ? urlencode($data['']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <th class="td-sno"><?php echo $counter; ?></th>
                                                <td class="td-rsbsa_no">
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
                                                <td class="td-control_no">
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
                                                <td class="td-first_name">
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
                                                <td class="td-middle_name">
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
                                                <td class="td-last_name">
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
                                                <td class="td-ext_name">
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
                                                <td class="td-farmer_address_bgy">
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
                                                <td class="td-farmer_address_mun">
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
                                                <td class="td-farmer_address_prv">
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
                                                <td class="td-birthday">
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
                                                <td class="td-gender">
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
                                                <td class="td-contact_num">
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
                                                <td class="td-cropname">
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
                                                <td class="td-crop_area">
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
                                                <td class="td-farmer">
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
                                                <td class="td-farmworker">
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
                                                <td class="td-fisherfolk">
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
                                                <td class="td-agency">
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
                                                <td class="td-farm_type">
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
                                                <td class="td-date_created">
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
                                                <td class="td-date_updated">
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
                                            <?php 
                                            }
                                            ?>
                                            <!--endrecord-->
                                        </tbody>
                                        <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php 
                                    if(empty($records)){
                                    ?>
                                    <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                        <i class="fa fa-ban"></i> No record found
                                    </h4>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if( $show_footer && !empty($records)){
                                ?>
                                <div class=" border-top mt-2">
                                    <div class="row justify-content-center">    
                                        <div class="col-md-auto justify-content-center">    
                                            <div class="p-3 d-flex justify-content-between">    
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
                                                                    <?php Html :: import_form('rsbsa_list/import_data' , "Import Data", 'CSV'); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col">   
                                                                <?php
                                                                if($show_pagination == true){
                                                                $pager = new Pagination($total_records, $record_count);
                                                                $pager->route = $this->route;
                                                                $pager->show_page_count = true;
                                                                $pager->show_record_count = true;
                                                                $pager->show_page_limit =true;
                                                                $pager->limit_count = $this->limit_count;
                                                                $pager->show_page_number_list = true;
                                                                $pager->pager_link_range=5;
                                                                $pager->render();
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
