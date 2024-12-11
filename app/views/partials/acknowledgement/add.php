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
                    <h4 class="record-title">Add New Acknowledgement</h4>
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
                        <form id="acknowledgement-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("acknowledgement/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="Program">Program <span class="text-danger">*</span></label>
                                    <div id="ctrl-Program-holder" class=""> 
                                        <select required=""  id="ctrl-Program" name="Program"  placeholder="Select Program"    class="custom-select" >
                                            <option value="">Select Program</option>
                                            <?php
                                            $Program_options = Menu :: $Program;
                                            if(!empty($Program_options)){
                                            foreach($Program_options as $option){
                                            $value = $option['value'];
                                            $label = $option['label'];
                                            $selected = $this->set_field_selected('Program', $value, "");
                                            ?>
                                            <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                            </option>                                   
                                            <?php
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="Item">Item <span class="text-danger">*</span></label>
                                    <div id="ctrl-Item-holder" class=""> 
                                        <input id="ctrl-Item"  value="<?php  echo $this->set_field_value('Item',""); ?>" type="text" placeholder="Enter Item"  required="" name="Item"  class="form-control " />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="Quantity">Quantity <span class="text-danger">*</span></label>
                                        <div id="ctrl-Quantity-holder" class=""> 
                                            <input id="ctrl-Quantity"  value="<?php  echo $this->set_field_value('Quantity',""); ?>" type="number" placeholder="Enter Quantity" step="1"  required="" name="Quantity"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="Indicator">Indicator <span class="text-danger">*</span></label>
                                            <div id="ctrl-Indicator-holder" class=""> 
                                                <select required=""  id="ctrl-Indicator" name="Indicator"  placeholder="Select Indicator"    class="custom-select" >
                                                    <option value="">Select Indicator</option>
                                                    <?php
                                                    $Indicator_options = Menu :: $Indicator;
                                                    if(!empty($Indicator_options)){
                                                    foreach($Indicator_options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = $this->set_field_selected('Indicator', $value, "");
                                                    ?>
                                                    <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                        <?php echo $label ?>
                                                    </option>                                   
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="Purpose">Purpose </label>
                                            <div id="ctrl-Purpose-holder" class=""> 
                                                <input id="ctrl-Purpose"  value="<?php  echo $this->set_field_value('Purpose',""); ?>" type="text" placeholder="Enter Purpose"  name="Purpose"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="Fund_Source">Fund Source </label>
                                                <div id="ctrl-Fund_Source-holder" class=""> 
                                                    <select  id="ctrl-Fund_Source" name="Fund_Source"  placeholder="Select a value ..."    class="custom-select" >
                                                        <option value="">Select a value ...</option>
                                                        <?php
                                                        $Fund_Source_options = Menu :: $Fund_Source;
                                                        if(!empty($Fund_Source_options)){
                                                        foreach($Fund_Source_options as $option){
                                                        $value = $option['value'];
                                                        $label = $option['label'];
                                                        $selected = $this->set_field_selected('Fund_Source', $value, "");
                                                        ?>
                                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                            <?php echo $label ?>
                                                        </option>                                   
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="Location">Location <span class="text-danger">*</span></label>
                                                <div id="ctrl-Location-holder" class=""> 
                                                    <input id="ctrl-Location"  value="<?php  echo $this->set_field_value('Location',""); ?>" type="text" placeholder="Enter Location"  required="" name="Location"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="Name">Name </label>
                                                    <div id="ctrl-Name-holder" class=""> 
                                                        <input id="ctrl-Name"  value="<?php  echo $this->set_field_value('Name',""); ?>" type="text" placeholder="Enter Name"  name="Name"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="Contact">Contact </label>
                                                        <div id="ctrl-Contact-holder" class=""> 
                                                            <input id="ctrl-Contact"  value="<?php  echo $this->set_field_value('Contact',""); ?>" type="number" placeholder="Enter Contact" step="1"  name="Contact"  class="form-control " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="Date">Date </label>
                                                            <div id="ctrl-Date-holder" class="input-group"> 
                                                                <input id="ctrl-Date" class="form-control datepicker  datepicker"  value="<?php  echo $this->set_field_value('Date',""); ?>" type="datetime" name="Date" placeholder="Enter Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="Designation">Designation </label>
                                                                <div id="ctrl-Designation-holder" class=""> 
                                                                    <input id="ctrl-Designation"  value="<?php  echo $this->set_field_value('Designation',""); ?>" type="text" placeholder="Enter Designation"  name="Designation"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label" for="name_of_office_Organization">Name Of Office Organization </label>
                                                                    <div id="ctrl-name_of_office_Organization-holder" class=""> 
                                                                        <input id="ctrl-name_of_office_Organization"  value="<?php  echo $this->set_field_value('name_of_office_Organization',""); ?>" type="text" placeholder="Enter Name Of Office Organization"  name="name_of_office_Organization"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label class="control-label" for="Address">Address </label>
                                                                        <div id="ctrl-Address-holder" class=""> 
                                                                            <input id="ctrl-Address"  value="<?php  echo $this->set_field_value('Address',""); ?>" type="text" placeholder="Enter Address"  name="Address"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <label class="control-label" for="Picture">Picture </label>
                                                                            <div id="ctrl-Picture-holder" class=""> 
                                                                                <div class="dropzone " input="#ctrl-Picture" fieldname="Picture"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" filesize="3" maximum="1">
                                                                                    <input name="Picture" id="ctrl-Picture" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('Picture',""); ?>" type="text"  />
                                                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                                        <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label class="control-label" for="user">User </label>
                                                                                <div id="ctrl-user-holder" class=""> 
                                                                                    <input id="ctrl-user"  value="<?php  echo $this->set_field_value('user',USER_NAME); ?>" type="text" placeholder="Enter User"  readonly name="user"  class="form-control " />
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
