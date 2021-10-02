<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Balance Withdrawal
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Balance Withdrawal</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <h3 style="color:red">
                        <?php
                        $msg = $this->session->userdata('balance_withdrawal');
                        if (isset($msg)) {
                            echo "<p style='margin-left:2%;'>$msg</p>";
                            $this->session->unset_userdata('balance_withdrawal');
                        }
                        ?>
                    </h3>
                    <form action="<?php echo base_url(); ?>agent/save_balance_withdrawal" method="POST">
                        <div class="col-xs-12">
                            <h1>Your current balance is <?php echo $user_info->user_balance; ?></h1>
                        </div>
                        <div class="col-xs-4">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Balance Withdrawal Method</label>
                                        <select name="method" class="form-control select2" style="width: 100%;">
                                            <option value="1">Agent</option>
                                            <option value="2">Bank</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger pull-right">Execute</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>