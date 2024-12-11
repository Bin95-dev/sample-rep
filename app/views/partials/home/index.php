<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 >The Dashboard</h4>
                </div>
            </div>
        </div>
    </div>
    <div  class="my-1">
        <div class="container">
            <div class="row ">
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_haronali();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-list-ul fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Haron Ali</div>
                                    <small class="">Number of Encoded | Daily</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_hassimmama();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-list-ul fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Hassim Mama</div>
                                    <small class="">Number of Encoded | Daily</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_eyaddisalongan();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-list-ul fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Eyad Disalongan</div>
                                    <small class="">Number of Encoded | Daily</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_norhainamusanip();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-list-ul fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Norhaina Musanip</div>
                                    <small class="">Number of Encoded | Daily</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_abduljabaresmail();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-list-ul fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Abdul Jabar Esmail</div>
                                    <small class="">Number of Encoded | Daily</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_binbadztending();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-list-ul fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Binbadz Tending</div>
                                    <small class="">Number of Encoded | Daily</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_wallidlantukan();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-list-ul fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Wallid Lantukan</div>
                                    <small class="">Number of Encoded | Daily</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_saudkahal();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-list-ul fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Saud Kahal</div>
                                    <small class="">Number of Encoded | Daily</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid">
                    <h5 >Total Acknowledgement Reciept Encoded</h5>
                    <?php $rec_count = $comp_model->getcount_rice();  ?>
                    <a class="animated zoomIn record-count alert alert-light"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-angle-left fa-3x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Rice</div>
                                    <small class="">Rice total Acknowledgment Reciept encoded</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_organic();  ?>
                    <a class="animated zoomIn record-count alert alert-light"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-angle-left fa-3x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Organic</div>
                                    <small class="">Organic total Acknowledgment Reciept encoded</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_hvcdp();  ?>
                    <a class="animated zoomIn record-count alert alert-light"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-angle-left fa-3x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">HVCDP</div>
                                    <small class="">HVCDP total Acknowledgment Reciept encoded</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_corn();  ?>
                    <a class="animated zoomIn record-count alert alert-light"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-angle-left fa-3x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Corn</div>
                                    <small class="">Corn total Acknowledgment Reciept encoded</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>

                    <?php $rec_count = $comp_model->getcount_rd();  ?>
                    <a class="animated zoomIn record-count alert alert-light"  href="<?php print_link("acknowledgement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-angle-left fa-3x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">R&D</div>
                                    <small class="">R&D total Acknowledgment Reciept encoded</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>


                    <?php $rec_count = $comp_model->getcount_transmitta();  ?>
                    <a class="animated zoomIn record-count alert alert-light"  href="<?php print_link("trasmittal/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-angle-left fa-3x"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">LANAO DEL SUR</div>
                                    <small class="">Total Recieved forms based on the transmittal</small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>


                    <h4 >Statistic by programs</h4>
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->doughnutchart_programs();
                        ?>
                        <div>
                            <h4>Programs</h4>
                            <small class="text-muted">Total Released inputs based on the Programs</small>
                        </div>
                        <hr />
                        <canvas id="doughnutchart_programs"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Dataset 1',
                            backgroundColor:[
                            <?php 
                            foreach($chartdata['labels'] as $g){
                            echo "'" . random_color(0.9) . "',";
                            }
                            ?>
                            ],
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('doughnutchart_programs');
                            var chart = new Chart(ctx, {
                            type:'doughnut',
                            data: chartData,
                            options: {
                            responsive: true,
                            scales: {
                            yAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            xAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
               
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->barchart_fundsource();
                        ?>
                        <div>
                            <h4>Fund Source</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="barchart_fundsource"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Fund Source',
                            backgroundColor:[
                            <?php 
                            foreach($chartdata['labels'] as $g){
                            echo "'" . random_color(0.9) . "',";
                            }
                            ?>
                            ],
                            type:'',
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('barchart_fundsource');
                            var chart = new Chart(ctx, {
                            type:'bar',
                            data: chartData,
                            options: {
                            scaleStartValue: 0,
                            responsive: true,
                            scales: {
                            xAxes: [{
                            ticks:{display: true},
                            gridLines:{display: true},
                            categoryPercentage: 1.0,
                            barPercentage: 0.8,
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            },
                            }],
                            yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            display: true
                            },
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }]
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
