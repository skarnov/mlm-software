<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Monthly Revenue Rate
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>admin/previous_revenue"> Previous Revenue</a></li>
            <li class="active">Monthly Revenue Rate</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>admin/save_interest_rate" method="POST">
                        <h3 style="color:red">
                            <?php
                            $msg = $this->session->userdata('save_interest_rate');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_interest_rate');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Month</label>
                                    <input type="text" name="interest_month_year" value="<?php echo date('m-Y'); ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Interest Rate</label>
                                    <input type="text" name="interest_value" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-info pull-right">Execute</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>