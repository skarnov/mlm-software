<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Previous Revenue
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>admin/previous_revenue"> Previous Revenue</a></li>
            <li class="active">Previous Revenue</li>
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
                            <th>Month</th>
                            <th>Rate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_revenue as $v_revenue) {
                            ?>
                            <tr>
                                <td><?php echo $v_revenue->interest_month_year; ?></td>
                                <td><?php echo $v_revenue->interest_value; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>admin/delete_revenue/<?php echo $v_revenue->interest_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Revenue" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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