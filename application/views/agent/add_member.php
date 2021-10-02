<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Member
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>admin/manage_member"> Manage Member</a></li>
            <li class="active">Add New Member</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_member');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_member');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>agent/save_member" method="POST" enctype="multipart/form-data">
                    <div class="box box-info">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Member Profile Picture</label>
                                    <input type="file" name="user_image" class="form-control">
                                </div>
                                <input type="hidden" name="user_creation_date" value="<?php echo date("F d, Y") ?>">
                                <div class="form-group">
                                    <label>Member Name <span style="color: red">(Required)</span></label>
                                    <input type="text" name="user_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Member E-Mail <span style="color: red">(Required)</span></label>
                                    <input type="text" name="user_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Member Password <span style="color: red">(Required)</span></label>
                                    <input type="text" name="user_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Member Mobile <span style="color: red">(Required)</span></label>
                                    <input type="text" name="user_mobile" class="form-control">
                                </div>                                                      
                                <hr/>   
                                <div class="form-group">
                                    <label>Bank Name <span style="color: red">(Required)</span></label>
                                    <input type="text" name="bank_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <input type="text" name="branch_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Account Name <span style="color: red">(Required)</span></label>
                                    <input type="text" name="account_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Account Number <span style="color: red">(Required)</span></label>
                                    <input type="text" name="account_number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Card Number</label>
                                    <input type="text" name="card_number" class="form-control">
                                </div>                                                                                     
                                <div class="form-group">
                                    <label>Nominee Name <span style="color: red">(Required)</span></label>
                                    <input type="text" name="nominee_name" class="form-control">
                                </div>                            
                                <div class="form-group">
                                    <label>Nominee Mobile <span style="color: red">(Required)</span></label>
                                    <input type="text" name="nominee_mobile" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Nominee Email</label>
                                    <input type="text" name="nominee_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nominee Present Address Line 1</label>
                                    <input type="text" name="nominee_present_address_line_1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nominee Present Address Line 2</label>
                                    <input type="text" name="nominee_present_address_line_2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nominee Present City</label>
                                    <input type="text" name="nominee_present_city" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Nominee Present Postal Code</label>
                                    <input type="text" name="nominee_present_postal_code" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Nominee Present Country <span style="color: red">(Required)</span></label>
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
                                    <label>Present Address Line 1 <span style="color: red">(Required)</span></label>
                                    <input type="text" name="present_address_line_1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Present Address Line 2</label>
                                    <input type="text" name="present_address_line_2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Present City <span style="color: red">(Required)</span></label>
                                    <input type="text" name="present_city" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Present Postal Code <span style="color: red">(Required)</span></label>
                                    <input type="text" name="present_postal_code" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Present Country <span style="color: red">(Required)</span></label>
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
                                    <input type="text" name="security_number" placeholder="NID, Driving Licence any one" class="form-control">
                                </div> 
                                <hr/>
                                <div class="form-group">
                                    <label>Permanent Address Line 1 <span style="color: red">(Required)</span></label>
                                    <input type="text" name="permanent_address_line_1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Permanent Address Line 2</label>
                                    <input type="text" name="permanent_address_line_2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Permanent City <span style="color: red">(Required)</span></label>
                                    <input type="text" name="permanent_city" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Permanent Postal Code <span style="color: red">(Required)</span></label>
                                    <input type="text" name="permanent_postal_code" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Permanent Country <span style="color: red">(Required)</span></label>
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
                                    <input type="text" name="nominee_permanent_address_line_1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nominee Permanent Address Line 2</label>
                                    <input type="text" name="nominee_permanent_address_line_2" class="form-control">
                                </div>                               
                                <div class="form-group">
                                    <label>Nominee Permanent City</label>
                                    <input type="text" name="nominee_permanent_city" class="form-control">
                                </div>                            
                                <div class="form-group">
                                    <label>Nominee Permanent Postal Code</label>
                                    <input type="text" name="nominee_permanent_postal_code" class="form-control">
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