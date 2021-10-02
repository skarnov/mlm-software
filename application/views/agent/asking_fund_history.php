<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Asking Fund History
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Asking Fund History</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Asking Agent ID</th>
                            <th>Asking Date</th>
                            <th>Asking Amount</th>
                            <th>Charge</th>
                            <th>Net Amount/th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_fund_request_history as $v_fund_request) {
                            ?>
                            <tr>
                                <td><?php echo $v_fund_request->user_uniqueId; ?></td>
                                <td><?php echo $v_fund_request->request_time; ?></td>
                                <td><?php echo $v_fund_request->request_amount; ?></td>
                                <td><?php echo $v_fund_request->charge; ?></td>
                                <td><?php echo $v_fund_request->net_amount; ?></td>
                                <td>
                                    <span style="color: green;">
                                        <?php
                                        if ($v_fund_request->status == '1') {
                                            echo 'Accepted';
                                        }
                                        ?> 
                                    </span>
                                    <span style="color: red;">   
                                        <?php
                                        if ($v_fund_request->status == '0') {
                                            echo 'Not Accepted';
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