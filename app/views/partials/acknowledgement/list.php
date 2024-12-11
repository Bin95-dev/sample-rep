<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("acknowledgement/add");
$can_edit = ACL::is_allowed("acknowledgement/edit");
$can_view = ACL::is_allowed("acknowledgement/view");
$can_delete = ACL::is_allowed("acknowledgement/delete");
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
                    <h4 class="record-title">Acknowledgement</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("acknowledgement/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Acknowledgement 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('acknowledgement'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('acknowledgement'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('acknowledgement'); ?>">
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
                    <div class="col-md-4 comp-grid">
                        <div class="dropdown">
                            <button class="primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-search "></i> Users
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php 
                                $option_list = $comp_model->acknowledgement_acknowledgementuser_option_list();
                                if(!empty($option_list)){
                                foreach($option_list as $option){
                                $value = (!empty($option['value']) ? $option['value'] : null);
                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                $nav_link = $this->set_current_page_link(array('acknowledgement_user' => $value , 'acknowledgement_userlabel' => $label) , true);
                                ?>
                                <a class="dropdown-item <?php echo is_active_link('acknowledgement_user', $value); ?>" href="<?php print_link($nav_link) ?>">
                                    <?php echo $label; ?>
                                </a>
                                <?php
                                }
                                }
                                ?>
                            </div>
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
                        <div class="filter-tags mb-2">
                            <?php
                            if(!empty(get_value('acknowledgement_user'))){
                            ?>
                            <div class="filter-chip card bg-light">
                                <b>Acknowledgement User :</b> 
                                <?php 
                                if(get_value('acknowledgement_userlabel')){
                                echo get_value('acknowledgement_userlabel');
                                }
                                else{
                                echo get_value('acknowledgement_user');
                                }
                                $remove_link = unset_get_value('acknowledgement_user', $this->route->page_url);
                                ?>
                                <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                    &times;
                                </a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div  class=" animated fadeIn page-content">
                            <div id="acknowledgement-list-records">
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
                                                <th  class="td-user"> User</th>
                                                <th  class="td-Program"> Program</th>
                                                <th  class="td-Item"> Item</th>
                                                <th  class="td-Quantity"> Quantity</th>
                                                <th  class="td-Indicator"> Indicator</th>
                                                <th  class="td-Purpose"> Purpose</th>
                                                <th  class="td-Fund_Source"> Fund Source</th>
                                                <th  class="td-Location"> Location</th>
                                                <th  class="td-Name"> Name</th>
                                                <th  class="td-Contact"> Contact</th>
                                                <th  class="td-Date"> Date</th>
                                                <th  class="td-Designation"> Designation</th>
                                                <th  class="td-name_of_office_Organization"> Name Of Office Organization</th>
                                                <th  class="td-Address"> Address</th>
                                                <th  class="td-encoded"> Encoded</th>
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
                                                    <td class="td-user"> <?php echo $data['user']; ?></td>
                                                    <td class="td-Program">
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
                                                    <td class="td-Item">
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
                                                    <td class="td-Quantity">
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
                                                    <td class="td-Indicator">
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
                                                    <td class="td-Purpose">
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
                                                    <td class="td-Fund_Source">
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
                                                    <td class="td-Location">
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
                                                    <td class="td-Name">
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
                                                    <td class="td-Contact">
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
                                                    <td class="td-Date">
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
                                                    <td class="td-Designation">
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
                                                    <td class="td-name_of_office_Organization">
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
                                                    <td class="td-Address">
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
                                                    <td class="td-encoded"> <?php echo $data['encoded']; ?></td>
                                                    <th class="td-btn">
                                                        <?php if($can_view){ ?>
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("acknowledgement/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_edit){ ?>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("acknowledgement/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_delete){ ?>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("acknowledgement/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("acknowledgement/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
