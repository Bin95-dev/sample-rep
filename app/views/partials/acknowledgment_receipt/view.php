<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("acknowledgment_receipt/add");
$can_edit = ACL::is_allowed("acknowledgment_receipt/edit");
$can_view = ACL::is_allowed("acknowledgment_receipt/view");
$can_delete = ACL::is_allowed("acknowledgment_receipt/delete");
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
                    <h4 class="record-title">View  Acknowledgment Receipt</h4>
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
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-Barangay">
                                        <th class="title"> Barangay: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Municipality">
                                        <th class="title"> Municipality: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Province">
                                        <th class="title"> Province: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Intervention">
                                        <th class="title"> Intervention: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Fund_Source">
                                        <th class="title"> Fund Source: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Program">
                                        <th class="title"> Program: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Indicator">
                                        <th class="title"> Indicator: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Indivdual">
                                        <th class="title"> Indivdual: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-FCA">
                                        <th class="title"> Fca: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-FirstName">
                                        <th class="title"> Firstname: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-MiddleName">
                                        <th class="title"> Middlename: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-LastName">
                                        <th class="title"> Lastname: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-RSBSA_NO">
                                        <th class="title"> Rsbsa No: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-BIRTHDAY">
                                        <th class="title"> Birthday: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Contact_no">
                                        <th class="title"> Contact No: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Sex">
                                        <th class="title"> Sex: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ARBS">
                                        <th class="title"> Arbs: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-PWD">
                                        <th class="title"> Pwd: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-IP">
                                        <th class="title"> Ip: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-FARM_AREA">
                                        <th class="title"> Farm Area: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Commodity">
                                        <th class="title"> Commodity: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Type">
                                        <th class="title"> Type: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Quantity">
                                        <th class="title"> Quantity: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Variety">
                                        <th class="title"> Variety: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-date_Distributed">
                                        <th class="title"> Date Distributed: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Venue">
                                        <th class="title"> Venue: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-date_encoded">
                                        <th class="title"> Date Encoded: </th>
                                        <td class="value"> <?php echo $data['date_encoded']; ?></td>
                                    </tr>
                                    <tr  class="td-date_updated">
                                        <th class="title"> Date Updated: </th>
                                        <td class="value"> <?php echo $data['date_updated']; ?></td>
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
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("acknowledgment_receipt/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("acknowledgment_receipt/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
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
