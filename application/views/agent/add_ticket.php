<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Support Ticket
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>agent/manage_ticket"> Manage Ticket</a></li>
            <li class="active">Support Ticket</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>agent/save_ticket" method="POST">
                        <h3 style="color:red">
                            <?php
                            $msg = $this->session->userdata('save_ticket');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_ticket');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Subject <span style="color: red">(Required)</span></label>
                                    <input type="text" name="subject" required placeholder="Enter Ticket Subject" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Enter Your Message <span style="color: red">(Required)</span></label>
                                    <textarea name="message" required class="form-control"></textarea>
                                </div>
                                <input type="hidden" name="date" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("d-m-Y"); ?>">
                                <button type="submit" class="btn btn-info pull-right">Create Ticket</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>