<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th><?php echo $user_info->user_uniqueId; ?></th>
                                    </tr>
                                    <tr>
                                        <th>User Name</th>
                                        <th><?php echo $user_info->user_name; ?></th>
                                    </tr>
                                    <tr>
                                        <th>Joining Date</th>
                                        <th><?php echo $user_info->user_date_of_registration; ?></th>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <?php
                                            if ($user_info->verification_status == '1') {
                                                ?>
                                                <span class="label label-success">
                                                    Verified
                                                </span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="label label-danger">
                                                    Unverified
                                                </span>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Member Type</th>
                                        <td>
                                            <?php
                                            if ($user_info->user_type == '2') {
                                                ?>
                                                <span class="label label-success">
                                                    Agent
                                                </span><br/>
                                                <span class="label label-primary">
                                                    <?php echo $user_info->agency_name; ?>
                                                </span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="label label-danger">
                                                    Non-Agent
                                                </span>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </thead> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Balance</th>
                                        <th><?php echo $user_info->user_balance; ?></th>
                                    </tr>
                                    <?php
                                    foreach ($all_cv_creation as $v_cv_creation) {
                                        ?>
                                        <tr>
                                            <th>Total CV Amount</th>
                                            <th><?php echo $v_cv_creation->cv_amount; ?></th>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </thead> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agent Info</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Agent ID</th>
                                        <th><?php echo $downline_info->user_uniqueId; ?></th>
                                    </tr>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th><?php echo $downline_info->agency_name; ?></th>
                                    </tr>
                                </thead> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>