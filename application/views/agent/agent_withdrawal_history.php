<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Agent Withdrawal History
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Agent Withdrawal History</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Method</th>
                            <th>Transaction Amount</th>
                            <th>Fee</th>
                            <th>Net Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_agent_withdrawal_history as $v_balance_withdrawal) {
                            ?>
                            <tr>
                                <td><?php echo $v_balance_withdrawal->date; ?></td>
                                <td><?php echo $v_balance_withdrawal->user_name; ?></td>
                                <td>
                                    <span style="color: green;">
                                        <?php
                                        if ($v_balance_withdrawal->agent_id != NULL) {
                                            echo 'Agent';
                                        }
                                        ?> 
                                    </span>
                                    <span style="color: red;">   
                                        <?php
                                        if ($v_balance_withdrawal->agent_id == NULL) {
                                            echo 'Bank';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td><?php echo $v_balance_withdrawal->withdrawal_amount; ?></td>
                                <td><?php echo $v_balance_withdrawal->transaction_fee; ?></td>
                                <td><?php echo $v_balance_withdrawal->net_amount; ?></td>
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