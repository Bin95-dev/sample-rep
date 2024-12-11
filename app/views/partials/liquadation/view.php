<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("liquadation/add");
$can_edit = ACL::is_allowed("liquadation/edit");
$can_view = ACL::is_allowed("liquadation/view");
$can_delete = ACL::is_allowed("liquadation/delete");
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
                    <h4 class="record-title">View  Liquadation</h4>
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
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['id']; ?>" 
                                                data-name="id" 
                                                data-title="Enter Id" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['id']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Province">
                                        <th class="title"> Province: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Province']; ?>" 
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
                                    <tr  class="td-Municipality">
                                        <th class="title"> Municipality: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Municipality']; ?>" 
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
                                    <tr  class="td-Barangay">
                                        <th class="title"> Barangay: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Barangay']; ?>" 
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
                                    <tr  class="td-FirstName">
                                        <th class="title"> Firstname: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['FirstName']; ?>" 
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
                                    <tr  class="td-RSBSA_R">
                                        <th class="title"> Rsbsa R: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['RSBSA_R']; ?>" 
                                                data-name="RSBSA_R" 
                                                data-title="Enter Rsbsa R" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['RSBSA_R']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-System_Gen">
                                        <th class="title"> System Gen: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['System_Gen']; ?>" 
                                                data-name="System_Gen" 
                                                data-title="Enter System Gen" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['System_Gen']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Birth_date">
                                        <th class="title"> Birth Date: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['Birth_date']; ?>" 
                                                data-name="Birth_date" 
                                                data-title="Enter Birth Date" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Birth_date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Contact_no">
                                        <th class="title"> Contact No: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Contact_no']; ?>" 
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
                                    <tr  class="td-ARB">
                                        <th class="title"> Arb: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ARB']; ?>" 
                                                data-name="ARB" 
                                                data-title="Enter Arb" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ARB']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ARCs">
                                        <th class="title"> Arcs: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ARCs']; ?>" 
                                                data-name="ARCs" 
                                                data-title="Enter Arcs" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ARCs']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-PWD">
                                        <th class="title"> Pwd: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['PWD']; ?>" 
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
                                    <tr  class="td-IPs">
                                        <th class="title"> Ips: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['IPs']; ?>" 
                                                data-name="IPs" 
                                                data-title="Enter Ips" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['IPs']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farmsize">
                                        <th class="title"> Farmsize: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-step="0.1" 
                                                data-value="<?php echo $data['farmsize']; ?>" 
                                                data-name="farmsize" 
                                                data-title="Enter Farmsize" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['farmsize']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date_recived">
                                        <th class="title"> Date Recived: </th>
                                        <td class="value"> <?php echo $data['date_recived']; ?></td>
                                    </tr>
                                    <tr  class="td-update">
                                        <th class="title"> Update: </th>
                                        <td class="value"> <?php echo $data['update']; ?></td>
                                    </tr>
                                    <tr  class="td-encoded">
                                        <th class="title"> Encoded: </th>
                                        <td class="value"> <?php echo $data['encoded']; ?></td>
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
