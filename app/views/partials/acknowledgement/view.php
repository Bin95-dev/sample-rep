<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("acknowledgement/add");
$can_edit = ACL::is_allowed("acknowledgement/edit");
$can_view = ACL::is_allowed("acknowledgement/view");
$can_delete = ACL::is_allowed("acknowledgement/delete");
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
                    <h4 class="record-title">View  Acknowledgement</h4>
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
                                        <td class="value">
                                            <div class="inline-page">
                                                <a class="btn btn-sm btn-primary open-page-inline" href="<?php print_link("masterdetail/index/acknowledgement/user/id/" . urlencode($data['id'])); ?>">
                                                    <i class="fa fa-eye"></i> <?php echo $data['id'] ?>
                                                </a>
                                                <div class="page-content reset-grids d-none animated fadeIn"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr  class="td-Program">
                                        <th class="title"> Program: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $Program); ?>' 
                                                data-value="<?php echo $data['Program']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Program" 
                                                data-title="Select Program" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Program']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Item">
                                        <th class="title"> Item: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Item']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Item" 
                                                data-title="Enter Item" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Item']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Quantity">
                                        <th class="title"> Quantity: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Quantity']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-Indicator">
                                        <th class="title"> Indicator: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $Indicator); ?>' 
                                                data-value="<?php echo $data['Indicator']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Indicator" 
                                                data-title="Select Indicator" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Indicator']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Fund_Source">
                                        <th class="title"> Fund Source: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $Fund_Source); ?>' 
                                                data-value="<?php echo $data['Fund_Source']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Fund_Source" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Fund_Source']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Location">
                                        <th class="title"> Location: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Location']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Location" 
                                                data-title="Enter Location" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Location']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Name">
                                        <th class="title"> Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Name']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Name" 
                                                data-title="Enter Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Contact">
                                        <th class="title"> Contact: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Contact']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Contact" 
                                                data-title="Enter Contact" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Contact']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Date">
                                        <th class="title"> Date: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['Date']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Date" 
                                                data-title="Enter Date" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Designation">
                                        <th class="title"> Designation: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Designation']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Designation" 
                                                data-title="Enter Designation" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Designation']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-name_of_office_Organization">
                                        <th class="title"> Name Of Office Organization: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['name_of_office_Organization']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="name_of_office_Organization" 
                                                data-title="Enter Name Of Office Organization" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['name_of_office_Organization']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Address">
                                        <th class="title"> Address: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Address']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Address" 
                                                data-title="Enter Address" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Address']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-encoded">
                                        <th class="title"> Encoded: </th>
                                        <td class="value"> <?php echo $data['encoded']; ?></td>
                                    </tr>
                                    <tr  class="td-Picture">
                                        <th class="title"> Picture: </th>
                                        <td class="value"><?php Html :: page_img($data['Picture'],400,400,1); ?></td>
                                    </tr>
                                    <tr  class="td-Purpose">
                                        <th class="title"> Purpose: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Purpose']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("acknowledgement/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Purpose" 
                                                data-title="Enter Purpose" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Purpose']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-user">
                                        <th class="title"> User: </th>
                                        <td class="value"> <?php echo $data['user']; ?></td>
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("acknowledgement/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("acknowledgement/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
