<div class="content-wrapper">
    <section class="content-header">
        <h1>
            CV Return Summary
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">CV Return Summary</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>CV Amount</th>
                            <th>Per Month CV</th>
                            <th>Rate of Revenue</th>
                            <th>Total Revenue</th>
                            <th>Total Amount</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_monthly_interest as $v_monthly_interest) {
                            ?>
                            <tr>
                                <td><?php echo $v_monthly_interest->cv_amount; ?></td>
                                <td><?php echo ($v_monthly_interest->cv_amount) / 10; ?></td>
                                <td><?php echo $v_monthly_interest->rate_of_revenue; ?></td>
                                <td><?php echo $v_monthly_interest->total_revenue; ?></td>
                                <td><?php echo $v_monthly_interest->total_amount; ?></td>
                                <td><?php echo $v_monthly_interest->declare_date; ?></td>
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