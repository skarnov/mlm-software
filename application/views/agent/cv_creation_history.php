<div class="content-wrapper">
    <section class="content-header">
        <h1>
            CV Creation History
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>agent/create_cv">Create CV</a></li>
            <li class="active">CV Creation History</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Creation Date</th>
                            <th>Date of Expiration</th>
                            <th>CV Amount</th>
                            <th>Remaining PIN</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_cv_creation as $v_cv_creation) {
                            ?>
                            <tr>
                                <td><?php echo $v_cv_creation->creation_time; ?></td>
                                <td><?php echo date('d-m-Y', strtotime('+10 month', strtotime($v_cv_creation->creation_time))); ?></td>
                                <td><?php echo $v_cv_creation->cv_amount; ?></td>
                                <td><?php echo $v_cv_creation->remaining_pin; ?></td>
                                <td>
                                    <span style="color: green;">
                                        <?php
                                        if ($v_cv_creation->activation_status == '1') {
                                            echo 'Active';
                                        }
                                        ?> 
                                    </span>
                                    <span style="color: red;">   
                                        <?php
                                        if ($v_cv_creation->activation_status == '0') {
                                            echo 'Inactive';
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
            </div>
        </div>
    </section>
</div>