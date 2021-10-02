<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Ticket
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>agent/add_ticket">Add Ticket</a></li>
            <li class="active">Manage Ticket</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <h3 style="color:red">
                <?php
                $msg = $this->session->userdata('edit_ticket');
                if (isset($msg)) {
                    echo "<p style='margin-left:2%;'>$msg</p>";
                    $this->session->unset_userdata('edit_ticket');
                }
                ?>
            </h3>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_ticket as $v_ticket) {
                            ?>
                            <tr>
                                <td><?php echo $v_ticket->user_name; ?></td>
                                <td><?php echo $v_ticket->user_email; ?></td>
                                <td><?php echo $v_ticket->subject; ?></td>
                                <td><?php echo $v_ticket->message; ?></td>
                                <td>
                                    <span style="color: red;">
                                        <?php
                                        if ($v_ticket->status == '1') {
                                            echo 'Close';
                                        }
                                        ?> 
                                    </span>
                                    <span style="color: green;">   
                                        <?php
                                        if ($v_ticket->status == '0') {
                                            echo 'Open';
                                        }
                                        ?>   
                                    </span>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>