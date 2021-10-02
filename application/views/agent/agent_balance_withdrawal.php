<script>
    function calculating()
    {
        var withdrawalAmount = document.getElementById('withdrawalAmount').value;
        var transaction_fee = ((3 * 1) / (100)) * (withdrawalAmount * 1);
        document.getElementById('netAmount').value = (withdrawalAmount * 1) - (transaction_fee * 1);
    }
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Agent Balance Withdrawal
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>agent/new_balance_withdrawal"> Balance Withdrawal Method</a></li>
            <li class="active">Agent Balance Withdrawal</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>agent/save_agent_balance_withdrawal" method="POST">
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Agent ID <span style="color: red">(Required)</span></label>
                                    <input type="text" name="agent_id" required placeholder="Enter Agent ID" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Withdrawal Amount <span style="color: red">(Required)</span></label>
                                    <input type="number" name="withdrawal_amount" id="withdrawalAmount" onkeyup="calculating();" required placeholder="Enter Withdrawal Amount" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label>Transaction Fee</label>
                                    <input type="number" value="3" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Net Amount</label>
                                    <input type="text" name="net_amount" id="netAmount" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password <span style="color: red">(Required)</span></label>
                                    <input type="password" name="password" required placeholder="Enter Your Password" class="form-control">
                                </div>
                                <input type="hidden" name="date" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("d-m-Y"); ?>">
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