<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Fund Accept Bonus
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Fund Accept Bonus</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Withdrawn By</th>
                            <th>Date</th>
                            <th>Amount Withdrawn</th>
                            <th>Bonus Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_fund_accept_bonus as $v_bonus) {
                            ?>
                            <tr>
                                <td><?php echo $v_bonus->user_name; ?></td>
                                <td><?php echo $v_bonus->transaction_time; ?></td>
                                <td><?php echo $v_bonus->amount_withdrawn; ?></td>
                                <td><?php echo $v_bonus->bonus_amount; ?></td>
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