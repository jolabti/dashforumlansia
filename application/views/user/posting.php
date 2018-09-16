        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Posting List</h3>
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

       <!-- <a href="<?php echo base_url('user/delete'); ?>"  class="btn btn-primary">Add Postingan</a> -->
       
        <!-- Table -->
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <td>No</td>
                    <th>Postingan</th>
                    <th>Waktu</th> 
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- Hardcore Dummy Data -->
            <tbody>

<!-- Get Data -->
            <?php
                if($postings){

                    foreach($postings as $posting){

            ?> 
            
                <tr>
                    <td><?php echo $posting->post_id; ?></td>
                    <td><?php echo $posting->posting; ?></td>
                    <td><?php echo $posting->waktu;  ?></td>
                    <td><?php echo $posting->user_id;  ?></td>
                    <td>
                      
                        <a href="<?php echo base_url('user/delete/' .$posting->post_id); ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this record ?')" >Delete</a>
                    </td>
                </tr>

<!-- Penutup Php -->
            <?php
                        }
                }

            ?>
            
            </tbody>
            
        </table>
        