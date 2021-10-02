<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Fund Request History
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Fund Request History</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Member Type</th>
                            <th>Requested Amount</th>
                            <th>Request Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_fund_request_history as $v_fund_request) {
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
                                <td><?php echo $v_fund_request->request_amount; ?></td>
                                <td><?php echo $v_fund_request->request_time; ?></td>
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