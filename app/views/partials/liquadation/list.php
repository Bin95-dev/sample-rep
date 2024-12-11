<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("liquadation/add");
$can_edit = ACL::is_allowed("liquadation/edit");
$can_view = ACL::is_allowed("liquadation/view");
$can_delete = ACL::is_allowed("liquadation/delete");
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
                    <h4 class="record-title">Liquadation</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("liquadation/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Liquadation 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('liquadation'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('liquadation'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('liquadation'); ?>">
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
                            <div id="liquadation-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-sno">#</th>
                                                <th  class="td-id"> Id</th>
                                                <th  class="td-Province"> Province</th>
                                                <th  class="td-Municipality"> Municipality</th>
                                                <th  class="td-Barangay"> Barangay</th>
                                                <th  class="td-FirstName"> Firstname</th>
                                                <th  class="td-MiddleName"> Middlename</th>
                                                <th  class="td-LastName"> Lastname</th>
                                                <th  class="td-RSBSA_R"> Rsbsa R</th>
                                                <th  class="td-System_Gen"> System Gen</th>
                                                <th  class="td-Birth_date"> Birth Date</th>
                                                <th  class="td-Contact_no"> Contact No</th>
                                                <th  class="td-Sex"> Sex</th>
                                                <th  class="td-ARB"> Arb</th>
                                                <th  class="td-ARCs"> Arcs</th>
                                                <th  class="td-PWD"> Pwd</th>
                                                <th  class="td-IPs"> Ips</th>
                                                <th  class="td-farmsize"> Farmsize</th>
                                                <th  class="td-date_recived"> Date Recived</th>
                                                <th  class="td-update"> Update</th>
                                                <th  class="td-encoded"> Encoded</th>
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
                                                <td class="td-id">
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
                                                <td class="td-Province">
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
                                                <td class="td-Municipality">
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
                                                <td class="td-Barangay">
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
                                                <td class="td-FirstName">
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
                                                <td class="td-MiddleName">
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
                                                <td class="td-LastName">
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
                                                <td class="td-RSBSA_R">
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
                                                <td class="td-System_Gen">
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
                                                <td class="td-Birth_date">
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
                                                <td class="td-Contact_no">
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
                                                <td class="td-Sex">
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
                                                <td class="td-ARB">
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
                                                <td class="td-ARCs">
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
                                                <td class="td-PWD">
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
                                                <td class="td-IPs">
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
                                                <td class="td-farmsize">
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
                                                <td class="td-date_recived"> <?php echo $data['date_recived']; ?></td>
                                                <td class="td-update"> <?php echo $data['update']; ?></td>
                                                <td class="td-encoded"> <?php echo $data['encoded']; ?></td>
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
