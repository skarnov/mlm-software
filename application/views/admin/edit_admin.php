<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Admin
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Profile</a></li>
            <li class="active">Edit Admin</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>admin/update_admin" method="POST" name="admin">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="admin_name" required value="<?php echo $admin_info->admin_name; ?>" class="form-control">
                                    <input type="hidden" name="admin_id" value="<?php echo $admin_info->admin_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="admin_email" value="<?php echo $admin_info->admin_email; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="admin_password" required value="<?php echo $admin_info->admin_password; ?>" class="form-control">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Edit</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>