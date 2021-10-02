<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Downline
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Manage Downline</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Date of Registration</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_downline as $v_downline) {
                            ?>
                            <tr>
                                <td><?php echo $v_downline->user_uniqueId; ?></td>
                                <td><?php echo $v_downline->user_name; ?></td>
                                <td><?php echo $v_downline->user_creation_date; ?></td>
                                <td>
                                    <span class="btn-primary">
                                        <?php
                                        if ($v_downline->verification_status == '1') {
                                            echo 'Verified as Member';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-success">   
                                        <?php
                                        if ($v_downline->verification_status == 2) {
                                            echo 'Verified as Agent';
                                        }
                                        ?>   
                                    </span>
                                    <span class="btn-danger">   
                                        <?php
                                        if ($v_downline->verification_status == 0) {
                                            echo 'Unverified';
                                        }
                                        ?>   
                                    </span>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>