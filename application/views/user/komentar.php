        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Komentar User</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

          <!-- Flash Data Sukkses -->
        <?php 
            if($this->session->flashdata('success_msg')){

                ?>

                <div class="alert alert-success">
                    
                <?php echo $this->session->flashdata('success_msg');    ?>

                </div>

        <?php
            }

        ?>

<!-- Flash Data Failed -->
            <?php 
            if($this->session->flashdata('error_msg')){

                ?>

                <div class="alert alert-success">
                    
                <?php echo $this->session->flashdata('error_msg');    ?>

                </div>
                
        <?php

            }

        ?>
       
        <!-- Table -->
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <td>No</td>
                    <!-- <td>Email</td> -->
                    <th>komentar</th>
                    <th>Waktu</th> 
                    <th>User</th> 
                    <th>Action</th>
                </tr>
            </thead>
            <!-- Hardcore Dummy Data -->
            <tbody>

<!-- Get Data -->
            <?php
                if($komens){

                    foreach($komens as $komen){

            ?> 
            
                <tr>
                    <td><?php echo $komen->komen_id; ?></td>
                    <!-- <td><?php echo $komen->email; ?></td> -->
                    <td><?php echo $komen->komentar; ?></td>
                    <td><?php echo $komen->waktu;  ?></td>
                    <td><?php echo $komen->user_id; ?></td>
                    <td>
                      
                        <a href="<?php echo base_url('user/delete_komentar/' .$komen->komen_id); ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this record ?')" >Delete</a>
                    </td>
                </tr>

<!-- Penutup Php -->
            <?php
                        }
                }

            ?>
            
            </tbody>
            
        </table>
        