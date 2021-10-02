<script>
    function calculating()
    {
        var requestAmount = document.getElementById('requestAmount').value;
        var transaction_fee = ((3 * 1) / (100)) * (requestAmount * 1);
        document.getElementById('netAmount').value = (requestAmount * 1) - (transaction_fee * 1);
    }
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Fund Request
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Fund Request</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>agent/check_fund_request" method="POST">
                        <h3 style="color:red">
                            <?php
                            $msg = $this->session->userdata('check_fund_request');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('check_fund_request');
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
                                    <label>Request Amount <span style="color: red">(Required)</span></label>
                                    <input type="text" name="request_amount" id="requestAmount" onkeyup="calculating();" required placeholder="Enter Request Amount" class="form-control">
                                </div>        
                                <div class="form-group">
                                    <label>Charge</label>
                                    <input type="text" value="3%" class="form-control">
                                </div>        
                                <div class="form-group">
                                    <label>Net Amount</label>
                                    <input type="text" name="net_amount" id="netAmount" class="form-control">
                                </div>        
                                <div class="form-group">
                                    <label>Password <span style="color: red">(Required)</span></label>
                                    <input type="password" name="password" required placeholder="Enter Your Password" class="form-control">
                                </div>                        
                                <input type="hidden" name="time" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("F j, Y l") . date(' h:i A'); ?>">
                                <button type="submit" class="btn btn-dropbox pull-right">Request Fund</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>