<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Member Verification
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Member Verification</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Member Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_user as $v_user) {
                            ?>
                            <tr>
                                <td><?php echo $v_user->user_name; ?></td>
                                <td>
                                    <?php
                                    if ($v_user->verification_status) {
                                        ?>
                                        <span class="label label-success">Verified</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="label label-danger">Unverified</span>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>admin/edit_user/<?php echo $v_user->user_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit User"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>admin/delete_user/<?php echo $v_user->user_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete User" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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