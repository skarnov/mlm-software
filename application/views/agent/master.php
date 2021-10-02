<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/skin-green.css">
        <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="<?php echo base_url(); ?>asset/private/js/jQuery-2.1.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/private/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>asset/private/js/app.min.js"></script>
    </head>

    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url(); ?>agent" class="logo">
                    <span class="logo-mini"><b>Global</b></span>
                    <span class="logo-lg"><b>Global Hub</b></span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span><?php echo $this->session->userdata('agent_name'); ?> <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header bg-light-blue">
                                        <p>
                                            <?php echo $this->session->userdata('agent_name'); ?>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>agent/edit_user/<?php echo $this->session->userdata('agent_id'); ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>agent/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li class="active treeview">
                            <a href="<?php echo base_url(); ?>agent">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>agent/pin_manager">
                                <i class="fa fa-map-pin"></i> <span>PIN Manager</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fire"></i> <span>CV Management</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>agent/create_cv"> Create CV</a></li>
                                <li><a href="<?php echo base_url(); ?>agent/cv_creation_history"> CV Creation History</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-battery-full"></i> <span>Fund Management</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>agent/fund_request"> New Fund Request</a></li>
                                <li><a href="<?php echo base_url(); ?>agent/manage_fund_request"> Manage Fund Request</a></li>
                                <li><a href="<?php echo base_url(); ?>agent/fund_request_history"> Fund Request History</a></li>
                                <li><a href="<?php echo base_url(); ?>agent/asking_fund_history"> Asking Fund History</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>agent/downline_manager">
                                <i class="fa fa-bank"></i> <span>Downline Manager</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>agent/create_new_member">
                                <i class="fa fa-male"></i> <span>Create New Member</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i> <span>Transaction History</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>agent/pin_transaction"> PIN Transaction</a></li>
                                <li><a href="<?php echo base_url(); ?>agent/monthly_interest"> CV Return Summary</a></li>
                                <li><a href="<?php echo base_url(); ?>agent/fund_accept_bonus"> Fund Accept Bonus</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cogs"></i> <span>Balance Withdrawal</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>agent/new_balance_withdrawal"> New Balance Withdrawal</a></li>
                                <li><a href="<?php echo base_url(); ?>agent/bank_withdrawal_history"> Bank Withdrawal History</a></li>
                                <li><a href="<?php echo base_url(); ?>agent/agent_withdrawal_history"> Agent Withdrawal History</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-child"></i> <span>Support Ticket System</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>agent/add_ticket"> Open New Ticket</a></li>
                                <li><a href="<?php echo base_url(); ?>agent/manage_ticket"> Manage Tickets</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="http://www.labtrio.it">
                                <i class="fa fa-adjust"></i> <span>About</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <?php echo $dashboard; ?>
            <footer class="main-footer">
                <strong>Copyright © <a href="<?php echo base_url(); ?>">Global Hub</a></strong> All Rights Reserved.
            </footer>
            <script>
                function check_delete()
                {
                    var chk = confirm('Are You Want To Delete This');
                    if (chk)
                    {
                        return true;
                    } else
                    {
                        return false;
                    }
                }
            </script>
        </div>
    </body>
</html>