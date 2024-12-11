<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("farmerslist/add");
$can_edit = ACL::is_allowed("farmerslist/edit");
$can_view = ACL::is_allowed("farmerslist/view");
$can_delete = ACL::is_allowed("farmerslist/delete");
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
                    <h4 class="record-title">View  Farmerslist</h4>
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
                                    <tr  class="td-RSBSA_NO">
                                        <th class="title"> Rsbsa No: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['RSBSA_NO']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmerslist/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-Fist_Name">
                                        <th class="title"> Fist Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Fist_Name']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmerslist/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Fist_Name" 
                                                data-title="Enter Fist Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Fist_Name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Middle_Name">
                                        <th class="title"> Middle Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Middle_Name']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmerslist/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Middle_Name" 
                                                data-title="Enter Middle Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Middle_Name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Last_Name">
                                        <th class="title"> Last Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Last_Name']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmerslist/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Last_Name" 
                                                data-title="Enter Last Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Last_Name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Barangay">
                                        <th class="title"> Barangay: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Barangay']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmerslist/editfield/" . urlencode($data['id'])); ?>" 
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
                                                data-url="<?php print_link("farmerslist/editfield/" . urlencode($data['id'])); ?>" 
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
                                                data-url="<?php print_link("farmerslist/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-Birthday">
                                        <th class="title"> Birthday: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Birthday']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmerslist/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="Birthday" 
                                                data-title="Enter Birthday" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Birthday']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-crop_name">
                                        <th class="title"> Crop Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['crop_name']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmerslist/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="crop_name" 
                                                data-title="Enter Crop Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['crop_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-crop_area">
                                        <th class="title"> Crop Area: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['crop_area']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmerslist/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-Date_imported">
                                        <th class="title"> Date Imported: </th>
                                        <td class="value"> <?php echo $data['Date_imported']; ?></td>
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("farmerslist/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("farmerslist/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
