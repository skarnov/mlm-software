<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Fund Request
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>agent/add_fund_request">Add New Fund Request</a></li>
            <li class="active">Manage Fund Request</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <h3 style="color:red">
                <?php
                $msg = $this->session->userdata('check_fund_request');
                if (isset($msg)) {
                    echo "<p style='margin-left:2%;'>$msg</p>";
                    $this->session->unset_userdata('check_fund_request');
                }
                ?>
            </h3>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Member Type</th>
                            <th>Requested Amount</th>
                            <th>Request Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_fund_request as $v_fund_request) {
                            ?>
                            <tr>
                                <td><?php echo $v_fund_request->user_name; ?></td>
                                <td>
                                    <span style="color: green;">
                                        <?php
                                        if ($v_fund_request->user_type == '1') {
                                            echo 'Member';
                                        }
                                        ?> 
                                    </span>
                                    <span style="color: red;">   
                                        <?php
                                        if ($v_fund_request->user_type == '2') {
                                            echo 'Agent';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td><?php echo $v_fund_request->net_amount; ?></td>
                                <td><?php echo $v_fund_request->request_time; ?></td>
                                <td>
                                    <?php
                                    $agent_id = $this->session->userdata('agent_id');
                                    if ($agent_id != $v_fund_request->user_id) {
                                        ?>
                                        <a href="<?php echo base_url(); ?>agent/accept_fund_request/<?php echo $v_fund_request->fundrequest_id; ?>" class="btn btn-success" data-toggle="tooltip" title="Provide Requested Fund">Accept</a>
                                        <?php
                                    }
                                    ?>
                                    <a href="<?php echo base_url(); ?>agent/delete_fund_request/<?php echo $v_fund_request->fundrequest_id; ?>" class="btn btn-danger" onclick="return check_delete();" data-toggle="tooltip" title="Delete This Fund Request">Decline</a>
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