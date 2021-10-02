<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Root User Balance
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Root User Balance</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>admin/update_root_user_balance" method="POST">
                        <h3 style="color:red">
                            <?php
                            $msg = $this->session->userdata('update_root_user_balance');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('update_root_user_balance');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Current Balance</label>
                                    <input type="text" name="user_balance" value="<?php echo $root_user->user_balance; ?>" class="form-control">
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $root_user->user_id; ?>">
                                <button type="submit" class="btn btn-info pull-right">Execute</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>