<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Create New Member
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>admin/manage_news"> Downline Members</a></li>
            <li class="active">Create New Member</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>agent/create_new_member_check" method="POST" enctype="multipart/form-data">
                        <h3 style="color:red">
                            <?php
                            $msg = $this->session->userdata('create_new_member_check');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('create_new_member_check');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Agent ID <span style="color: red">(Required)</span></label>
                                    <input type="text" name="agent_id" required placeholder="Enter Agent ID" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>PIN <span style="color: red">(Required)</span></label>
                                    <input type="text" name="pin" required placeholder="Enter a Valid Pin" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password <span style="color: red">(Required)</span></label>
                                    <input type="password" name="password" required placeholder="Enter Password" class="form-control">
                                </div>                          
                                <button type="submit" class="btn btn-info pull-right">Proceed To Create</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>