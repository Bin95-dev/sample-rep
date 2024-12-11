<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("acknowledgment_receipt/add");
$can_edit = ACL::is_allowed("acknowledgment_receipt/edit");
$can_view = ACL::is_allowed("acknowledgment_receipt/view");
$can_delete = ACL::is_allowed("acknowledgment_receipt/delete");
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
                    <h4 class="record-title">Acknowledgment Receipt</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("acknowledgment_receipt/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Acknowledgment Receipt 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('acknowledgment_receipt'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('acknowledgment_receipt'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('acknowledgment_receipt'); ?>">
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
                            <div id="acknowledgment_receipt-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <?php } ?>
                                                <th class="td-sno">#</th>
                                                <th  class="td-id"> Id</th>
                                                <th  class="td-Barangay"> Barangay</th>
                                                <th  class="td-Municipality"> Municipality</th>
                                                <th  class="td-Province"> Province</th>
                                                <th  class="td-Intervention"> Intervention</th>
                                                <th  class="td-Fund_Source"> Fund Source</th>
                                                <th  class="td-Program"> Program</th>
                                                <th  class="td-Indicator"> Indicator</th>
                                                <th  class="td-Indivdual"> Indivdual</th>
                                                <th  class="td-FCA"> Fca</th>
                                                <th  class="td-FirstName"> Firstname</th>
                                                <th  class="td-MiddleName"> Middlename</th>
                                                <th  class="td-LastName"> Lastname</th>
                                                <th  class="td-RSBSA_NO"> Rsbsa No</th>
                                                <th  class="td-BIRTHDAY"> Birthday</th>
                                                <th  class="td-Contact_no"> Contact No</th>
                                                <th  class="td-Sex"> Sex</th>
                                                <th  class="td-ARBS"> Arbs</th>
                                                <th  class="td-PWD"> Pwd</th>
                                                <th  class="td-IP"> Ip</th>
                                                <th  class="td-FARM_AREA"> Farm Area</th>
                                                <th  class="td-Commodity"> Commodity</th>
                                                <th  class="td-Type"> Type</th>
                                                <th  class="td-Quantity"> Quantity</th>
                                                <th  class="td-Variety"> Variety</th>
                                                <th  class="td-date_Distributed"> Date Distributed</th>
                                                <th  class="td-Venue"> Venue</th>
                                                <th  class="td-date_encoded"> Date Encoded</th>
                                                <th  class="td-date_updated"> Date Updated</th>
                                                <th class="td-btn"></th>
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
                                            $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <?php } ?>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-id"><a href="<?php print_link("acknowledgment_receipt/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
                                                    <td class="td-Barangay">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Barangay']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Barangay" 
                                                            data-title="Enter Barangay" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Barangay']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Municipality">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Municipality']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Municipality" 
                                                            data-title="Enter Municipality" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Municipality']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Province">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Province']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Province" 
                                                            data-title="Enter Province" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Province']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Intervention">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Intervention']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Intervention" 
                                                            data-title="Enter Intervention" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Intervention']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Fund_Source">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Fund_Source']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Fund_Source" 
                                                            data-title="Enter Fund Source" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Fund_Source']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Program">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Program']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Program" 
                                                            data-title="Enter Program" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Program']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Indicator">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Indicator']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Indicator" 
                                                            data-title="Enter Indicator" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Indicator']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Indivdual">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Indivdual']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Indivdual" 
                                                            data-title="Enter Indivdual" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Indivdual']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-FCA">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['FCA']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="FCA" 
                                                            data-title="Enter Fca" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['FCA']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-FirstName">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['FirstName']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="FirstName" 
                                                            data-title="Enter Firstname" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['FirstName']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-MiddleName">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['MiddleName']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="MiddleName" 
                                                            data-title="Enter Middlename" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['MiddleName']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-LastName">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['LastName']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="LastName" 
                                                            data-title="Enter Lastname" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['LastName']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-RSBSA_NO">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['RSBSA_NO']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="RSBSA_NO" 
                                                            data-title="Enter Rsbsa No" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['RSBSA_NO']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-BIRTHDAY">
                                                        <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['BIRTHDAY']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="BIRTHDAY" 
                                                            data-title="Enter Birthday" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['BIRTHDAY']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Contact_no">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Contact_no']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Contact_no" 
                                                            data-title="Enter Contact No" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Contact_no']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Sex">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $Sex); ?>' 
                                                            data-value="<?php echo $data['Sex']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Sex" 
                                                            data-title="Enter Sex" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Sex']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ARBS">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ARBS']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ARBS" 
                                                            data-title="Enter Arbs" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ARBS']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-PWD">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['PWD']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="PWD" 
                                                            data-title="Enter Pwd" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['PWD']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-IP">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['IP']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="IP" 
                                                            data-title="Enter Ip" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['IP']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-FARM_AREA">
                                                        <span <?php if($can_edit){ ?> data-step="0.1" 
                                                            data-value="<?php echo $data['FARM_AREA']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="FARM_AREA" 
                                                            data-title="Enter Farm Area" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['FARM_AREA']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Commodity">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Commodity']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Commodity" 
                                                            data-title="Enter Commodity" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Commodity']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Type">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Type']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Type" 
                                                            data-title="Enter Type" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Type']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Quantity">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Quantity']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Quantity" 
                                                            data-title="Enter Quantity" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Quantity']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Variety">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Variety']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Variety" 
                                                            data-title="Enter Variety" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Variety']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-date_Distributed">
                                                        <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['date_Distributed']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="date_Distributed" 
                                                            data-title="Enter Date Distributed" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['date_Distributed']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Venue">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['Venue']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("acknowledgment_receipt/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Venue" 
                                                            data-title="Enter Venue" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Venue']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-date_encoded"> <?php echo $data['date_encoded']; ?></td>
                                                    <td class="td-date_updated"> <?php echo $data['date_updated']; ?></td>
                                                    <th class="td-btn">
                                                        <?php if($can_view){ ?>
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("acknowledgment_receipt/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_edit){ ?>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("acknowledgment_receipt/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_delete){ ?>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("acknowledgment_receipt/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="fa fa-times"></i>
                                                            Delete
                                                        </a>
                                                        <?php } ?>
                                                    </th>
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
                                                    <?php if($can_delete){ ?>
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("acknowledgment_receipt/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <?php } ?>
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
