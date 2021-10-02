<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Update Member Information
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Update Member Information</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>admin/update_user" method="POST" name="member" enctype="multipart/form-data">
                    <div class="box box-info">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Member Profile Picture</label>
                                    <input type="file" name="user_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Member Name</label>
                                    <input type="text" name="user_creation_date" value="<?php echo $user_info->user_creation_date; ?>" class="form-control">
                                    <input type="hidden" name="user_id" value="<?php echo $user_info->user_id; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Member Name</label>
                                    <input type="text" name="user_name" value="<?php echo $user_info->user_name; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Member E-Mail</label>
                                    <input type="text" name="user_email" value="<?php echo $user_info->user_email; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Member Password</label>
                                    <input type="text" name="user_password" value="<?php echo $user_info->user_password; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Member Mobile</label>
                                    <input type="text" name="user_mobile" value="<?php echo $user_info->user_mobile; ?>" class="form-control">
                                </div>                                                      
                                <hr/>   
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <input type="text" name="bank_name" value="<?php echo $user_info->bank_name; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <input type="text" name="branch_name" value="<?php echo $user_info->branch_name; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Account Name</label>
                                    <input type="text" name="account_name" value="<?php echo $user_info->account_name; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input type="text" name="account_number" value="<?php echo $user_info->account_number; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Card Number</label>
                                    <input type="text" name="card_number" value="<?php echo $user_info->card_number; ?>" class="form-control">
                                </div>                                                                                     
                                <div class="form-group">
                                    <label>Nominee Name</label>
                                    <input type="text" name="nominee_name" value="<?php echo $user_info->nominee_name; ?>" class="form-control">
                                </div>                            
                                <div class="form-group">
                                    <label>Nominee Mobile</label>
                                    <input type="text" name="nominee_mobile" value="<?php echo $user_info->nominee_mobile; ?>" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Nominee Email</label>
                                    <input type="text" name="nominee_email" value="<?php echo $user_info->nominee_email; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nominee Present Address Line 1</label>
                                    <input type="text" name="nominee_present_address_line_1" value="<?php echo $user_info->nominee_present_address_line_1; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nominee Present Address Line 2</label>
                                    <input type="text" name="nominee_present_address_line_2" value="<?php echo $user_info->nominee_present_address_line_2; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nominee Present City</label>
                                    <input type="text" name="nominee_present_city" value="<?php echo $user_info->nominee_present_city; ?>" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Nominee Present Postal Code</label>
                                    <input type="text" name="nominee_present_postal_code" value="<?php echo $user_info->nominee_present_postal_code; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Nominee Present Country</label>
                                        <select name="nominee_present_country_id"  class="form-control select2" style="width: 100%;">
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($all_country as $v_country) {
                                                ?>
                                                <option value="<?php echo $v_country->country_id; ?>"><?php echo $v_country->country_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Present Address Line 1</label>
                                    <input type="text" name="present_address_line_1" value="<?php echo $user_info->present_address_line_1; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Present Address Line 2</label>
                                    <input type="text" name="present_address_line_2" value="<?php echo $user_info->present_address_line_2; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Present City</label>
                                    <input type="text" name="present_city" value="<?php echo $user_info->present_city; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Present Postal Code</label>
                                    <input type="text" name="present_postal_code" value="<?php echo $user_info->present_postal_code; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Present Country</label>
                                        <select name="present_country_id"  class="form-control select2" style="width: 100%;">
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($all_country as $v_country) {
                                                ?>
                                                <option value="<?php echo $v_country->country_id; ?>"><?php echo $v_country->country_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Security Number</label>
                                    <input type="text" name="security_number" value="<?php echo $user_info->security_number; ?>" class="form-control">
                                </div> 
                                <hr/>
                                <div class="form-group">
                                    <label>Permanent Address Line 1</label>
                                    <input type="text" name="permanent_address_line_1" value="<?php echo $user_info->permanent_address_line_1; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Permanent Address Line 2</label>
                                    <input type="text" name="permanent_address_line_2" value="<?php echo $user_info->permanent_address_line_2; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Permanent City</label>
                                    <input type="text" name="permanent_city" value="<?php echo $user_info->permanent_city; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Permanent Postal Code</label>
                                    <input type="text" name="permanent_postal_code" value="<?php echo $user_info->permanent_postal_code; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Permanent Country</label>
                                        <select name="permanent_country_id"  class="form-control select2" style="width: 100%;">
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($all_country as $v_country) {
                                                ?>
                                                <option value="<?php echo $v_country->country_id; ?>"><?php echo $v_country->country_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label>Nominee Permanent Address Line 1</label>
                                    <input type="text" name="nominee_permanent_address_line_1" value="<?php echo $user_info->nominee_permanent_address_line_1; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nominee Permanent Address Line 2</label>
                                    <input type="text" name="nominee_permanent_address_line_2" value="<?php echo $user_info->nominee_permanent_address_line_2; ?>" class="form-control">
                                </div>                               
                                <div class="form-group">
                                    <label>Nominee Permanent City</label>
                                    <input type="text" name="nominee_permanent_city" value="<?php echo $user_info->nominee_permanent_city; ?>" class="form-control">
                                </div>                            
                                <div class="form-group">
                                    <label>Nominee Permanent Postal Code</label>
                                    <input type="text" name="nominee_permanent_postal_code" value="<?php echo $user_info->nominee_permanent_postal_code; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Nominee Permanent Country</label>
                                        <select name="nominee_permanent_country_id"  class="form-control select2" style="width: 100%;">
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($all_country as $v_country) {
                                                ?>
                                                <option value="<?php echo $v_country->country_id; ?>"><?php echo $v_country->country_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Verification Status</label>
                                        <select name="verification_status"  class="form-control select2" style="width: 100%;">
                                            <option value="">Select Status</option>
                                            <option value="1">Verified</option>
                                            <option value="0">Unverified</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script>
    document.forms['member'].elements['verification_status'].value = '<?php echo $user_info->verification_status; ?>';
</script>