<div class="content-wrapper">
    <section class="content-header">
        <h1>
            PIN Transaction History
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">PIN Transaction History</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_pin_transaction as $v_pin_transaction) {
                            ?>
                            <tr>
                                <td><?php echo $v_pin_transaction->transaction_time; ?></td>
                                <td><?php echo $v_pin_transaction->transaction_amount; ?></td>
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