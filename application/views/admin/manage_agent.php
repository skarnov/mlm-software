<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Agent
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Manage Agent</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <h3 style="color:red">
                <?php
                $msg = $this->session->userdata('edit_agent');
                if (isset($msg)) {
                    echo "<p style='margin-left:2%;'>$msg</p>";
                    $this->session->unset_userdata('edit_agent');
                }
                ?>
            </h3>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Agent ID</th>
                            <th>Agent Name</th>
                            <th>Mobile</th>
                            <th>Balance</th>
                            <th>Verification Status</th>
                            <th>Activation Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_agent as $v_agent) {
                            ?>
                            <tr>
                                <td><?php echo $v_agent->user_uniqueId; ?></td>
                                <td><?php echo $v_agent->user_name; ?></td>
                                <td><?php echo $v_agent->user_mobile; ?></td>
                                <td><?php echo $v_agent->user_balance; ?></td>
                                <td>
                                    <span style="color: green;">
                                        <?php
                                        if ($v_agent->verification_status == '1') {
                                            echo 'Verified';
                                        }
                                        ?> 
                                    </span>
                                    <span style="color: red;">   
                                        <?php
                                        if ($v_agent->verification_status == '0') {
                                            echo 'Unverified';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <span style="color: green;">
                                        <?php
                                        if ($v_agent->user_status == '1') {
                                            echo 'Active';
                                        }
                                        ?> 
                                    </span>
                                    <span style="color: red;">   
                                        <?php
                                        if ($v_agent->user_status == '0') {
                                            echo 'Inactive';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <?php
                                    if ($v_agent->user_status == '1') {
                                        ?>
                                        <a href="<?php echo base_url(); ?>admin/deactive_agent/<?php echo $v_agent->user_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Deactive Agent"><i class="fa fa-times"></i></a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="<?php echo base_url(); ?>admin/active_agent/<?php echo $v_agent->user_id; ?>" class="btn btn-success" data-toggle="tooltip" title="Active Agent"><i class="fa fa-check"></i></a>
                                        <?php
                                    }
                                    ?>
                                    <a href="<?php echo base_url(); ?>admin/edit_agent/<?php echo $v_agent->user_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Agent"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>admin/delete_agent/<?php echo $v_agent->user_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Agent" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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