<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Acknowledgment Receipt</h4>
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
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="acknowledgment_receipt-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("acknowledgment_receipt/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Barangay">Barangay <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-Barangay"  value="<?php  echo $this->set_field_value('Barangay',""); ?>" type="text" placeholder="Enter Barangay"  required="" name="Barangay"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Municipality">Municipality <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-Municipality"  value="<?php  echo $this->set_field_value('Municipality',""); ?>" type="text" placeholder="Enter Municipality"  required="" name="Municipality"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="Province">Province <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-Province"  value="<?php  echo $this->set_field_value('Province',""); ?>" type="text" placeholder="Enter Province"  required="" name="Province"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="Intervention">Intervention <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-Intervention"  value="<?php  echo $this->set_field_value('Intervention',""); ?>" type="text" placeholder="Enter Intervention"  required="" name="Intervention"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="Fund_Source">Fund Source <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-Fund_Source"  value="<?php  echo $this->set_field_value('Fund_Source',""); ?>" type="text" placeholder="Enter Fund Source"  required="" name="Fund_Source"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="Program">Program <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-Program"  value="<?php  echo $this->set_field_value('Program',""); ?>" type="text" placeholder="Enter Program"  required="" name="Program"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="Indicator">Indicator <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-Indicator"  value="<?php  echo $this->set_field_value('Indicator',""); ?>" type="text" placeholder="Enter Indicator"  required="" name="Indicator"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="Indivdual">Indivdual <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-Indivdual"  value="<?php  echo $this->set_field_value('Indivdual',""); ?>" type="text" placeholder="Enter Indivdual"  required="" name="Indivdual"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="FCA">Fca <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-FCA"  value="<?php  echo $this->set_field_value('FCA',""); ?>" type="text" placeholder="Enter Fca"  required="" name="FCA"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="FirstName">Firstname <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input id="ctrl-FirstName"  value="<?php  echo $this->set_field_value('FirstName',""); ?>" type="text" placeholder="Enter Firstname"  required="" name="FirstName"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="MiddleName">Middlename <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-MiddleName"  value="<?php  echo $this->set_field_value('MiddleName',""); ?>" type="text" placeholder="Enter Middlename"  required="" name="MiddleName"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="LastName">Lastname <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-LastName"  value="<?php  echo $this->set_field_value('LastName',""); ?>" type="text" placeholder="Enter Lastname"  required="" name="LastName"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label class="control-label" for="RSBSA_NO">Rsbsa No <span class="text-danger">*</span></label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="">
                                                                                                <input id="ctrl-RSBSA_NO"  value="<?php  echo $this->set_field_value('RSBSA_NO',""); ?>" type="text" placeholder="Enter Rsbsa No"  required="" name="RSBSA_NO"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="BIRTHDAY">Birthday <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="input-group">
                                                                                                    <input id="ctrl-BIRTHDAY" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('BIRTHDAY',""); ?>" type="datetime" name="BIRTHDAY" placeholder="Enter Birthday" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                                                        <div class="input-group-append">
                                                                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <label class="control-label" for="Contact_no">Contact No <span class="text-danger">*</span></label>
                                                                                                </div>
                                                                                                <div class="col-sm-8">
                                                                                                    <div class="">
                                                                                                        <input id="ctrl-Contact_no"  value="<?php  echo $this->set_field_value('Contact_no',""); ?>" type="number" placeholder="Enter Contact No" step="1"  required="" name="Contact_no"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group ">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4">
                                                                                                        <label class="control-label" for="Sex">Sex <span class="text-danger">*</span></label>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="">
                                                                                                            <?php
                                                                                                            $Sex_options = Menu :: $Sex;
                                                                                                            if(!empty($Sex_options)){
                                                                                                            foreach($Sex_options as $option){
                                                                                                            $value = $option['value'];
                                                                                                            $label = $option['label'];
                                                                                                            //check if current option is checked option
                                                                                                            $checked = $this->set_field_checked('Sex', $value, "");
                                                                                                            ?>
                                                                                                            <label class="custom-control custom-radio custom-control-inline">
                                                                                                                <input id="ctrl-Sex" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="Sex" />
                                                                                                                    <span class="custom-control-label"><?php echo $label ?></span>
                                                                                                                </label>
                                                                                                                <?php
                                                                                                                }
                                                                                                                }
                                                                                                                ?>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group ">
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-4">
                                                                                                            <label class="control-label" for="ARBS">Arbs <span class="text-danger">*</span></label>
                                                                                                        </div>
                                                                                                        <div class="col-sm-8">
                                                                                                            <div class="">
                                                                                                                <input id="ctrl-ARBS"  value="<?php  echo $this->set_field_value('ARBS',""); ?>" type="text" placeholder="Enter Arbs"  required="" name="ARBS"  class="form-control " />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group ">
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-4">
                                                                                                                <label class="control-label" for="PWD">Pwd <span class="text-danger">*</span></label>
                                                                                                            </div>
                                                                                                            <div class="col-sm-8">
                                                                                                                <div class="">
                                                                                                                    <input id="ctrl-PWD"  value="<?php  echo $this->set_field_value('PWD',""); ?>" type="text" placeholder="Enter Pwd"  required="" name="PWD"  class="form-control " />
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-sm-4">
                                                                                                                    <label class="control-label" for="IP">Ip <span class="text-danger">*</span></label>
                                                                                                                </div>
                                                                                                                <div class="col-sm-8">
                                                                                                                    <div class="">
                                                                                                                        <input id="ctrl-IP"  value="<?php  echo $this->set_field_value('IP',""); ?>" type="text" placeholder="Enter Ip"  required="" name="IP"  class="form-control " />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-4">
                                                                                                                        <label class="control-label" for="FARM_AREA">Farm Area <span class="text-danger">*</span></label>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <div class="">
                                                                                                                            <input id="ctrl-FARM_AREA"  value="<?php  echo $this->set_field_value('FARM_AREA',""); ?>" type="number" placeholder="Enter Farm Area" step="0.1"  required="" name="FARM_AREA"  class="form-control " />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group ">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-sm-4">
                                                                                                                            <label class="control-label" for="Commodity">Commodity <span class="text-danger">*</span></label>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-8">
                                                                                                                            <div class="">
                                                                                                                                <input id="ctrl-Commodity"  value="<?php  echo $this->set_field_value('Commodity',""); ?>" type="text" placeholder="Enter Commodity"  required="" name="Commodity"  class="form-control " />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="form-group ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <label class="control-label" for="Type">Type <span class="text-danger">*</span></label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-8">
                                                                                                                                <div class="">
                                                                                                                                    <input id="ctrl-Type"  value="<?php  echo $this->set_field_value('Type',""); ?>" type="text" placeholder="Enter Type"  required="" name="Type"  class="form-control " />
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="form-group ">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-sm-4">
                                                                                                                                    <label class="control-label" for="Quantity">Quantity <span class="text-danger">*</span></label>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-8">
                                                                                                                                    <div class="">
                                                                                                                                        <input id="ctrl-Quantity"  value="<?php  echo $this->set_field_value('Quantity',""); ?>" type="number" placeholder="Enter Quantity" step="1"  required="" name="Quantity"  class="form-control " />
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group ">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-4">
                                                                                                                                        <label class="control-label" for="Variety">Variety <span class="text-danger">*</span></label>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-8">
                                                                                                                                        <div class="">
                                                                                                                                            <input id="ctrl-Variety"  value="<?php  echo $this->set_field_value('Variety',""); ?>" type="text" placeholder="Enter Variety"  required="" name="Variety"  class="form-control " />
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="form-group ">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-sm-4">
                                                                                                                                            <label class="control-label" for="date_Distributed">Date Distributed <span class="text-danger">*</span></label>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-sm-8">
                                                                                                                                            <div class="input-group">
                                                                                                                                                <input id="ctrl-date_Distributed" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('date_Distributed',""); ?>" type="datetime" name="date_Distributed" placeholder="Enter Date Distributed" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                                                                                                    <div class="input-group-append">
                                                                                                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group ">
                                                                                                                                        <div class="row">
                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                <label class="control-label" for="Venue">Venue <span class="text-danger">*</span></label>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                <div class="">
                                                                                                                                                    <input id="ctrl-Venue"  value="<?php  echo $this->set_field_value('Venue',""); ?>" type="text" placeholder="Enter Venue"  required="" name="Venue"  class="form-control " />
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                                                                                        <div class="form-ajax-status"></div>
                                                                                                                                        <button class="btn btn-primary" type="submit">
                                                                                                                                            Submit
                                                                                                                                            <i class="fa fa-send"></i>
                                                                                                                                        </button>
                                                                                                                                    </div>
                                                                                                                                </form>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </section>
