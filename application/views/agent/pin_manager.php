<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Pin
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Manage Pin</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>PIN</th>
                            <th>Date of Creation</th>
                            <th>Date of Expiration</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pin_info as $v_info) {
                            ?>
                            <tr>
                                <td><?php echo $v_info->pin_code; ?></td>
                                <td><?php echo $v_info->date_of_purpose; ?></td>
                                <td><?php echo $v_info->date_of_expiration; ?></td>
                                <td>
                                    <span style="color: green;">
                                        <?php
                                        if ($v_info->used_status == '1') {
                                            echo 'Unused';
                                        }
                                        ?> 
                                    </span>
                                    <span style="color: red;">   
                                        <?php
                                        if ($v_info->used_status == '0') {
                                            echo 'Used';
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