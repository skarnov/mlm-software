<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Create CV
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>agent/cv_creation_history"> CV Creation History</a></li>
            <li class="active">Create CV</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>agent/save_cv_creation" method="POST">
                        <h3 style="color:red">
                            <?php
                            $msg = $this->session->userdata('save_cv_creation');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_cv_creation');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select CV Amount <span style="color: red">(Required)</span></label>
                                        <select name="cv_amount" class="form-control select2" style="width: 100%;">
                                            <option value="">Select CV</option>
                                            <?php
                                            foreach ($all_cv as $v_cv) {
                                                ?>
                                                <option value="<?php echo $v_cv->cv_amount; ?>"><?php echo $v_cv->cv_amount; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password <span style="color: red">(Required)</span></label>
                                    <input type="text" name="password" required placeholder="Enter Password" class="form-control">
                                </div>
                                <input type="hidden" name="creation_time" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("d-m-Y"); ?>">
                                <button type="submit" class="btn btn-info pull-right">Create CV</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>