    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-12">


            <center><h4 class="text-uppercase">Please provide with required details to Sign Up</h4></center>
            <hr>
            <div class="form-group col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
                    <?php echo form_open('Signup'); ?>

                    <?php echo form_error('FIRST_NAME'); ?>
                    <input name="FIRST_NAME" type="text" style="text-align:center;" class="form-control" placeholder="First Name" value="<?php echo set_value('FIRST_NAME'); ?>"><br />

                    <?php echo form_error('MIDDLE_NAME'); ?>
                    <input name="MIDDLE_NAME" type="text" style="text-align:center;" class="form-control" placeholder="Middle Name(Optional)" value="<?php echo set_value('MIDDLE_NAME'); ?>"><br />

                    <?php echo form_error('LAST_NAME'); ?>
                    <input name="LAST_NAME" type="text" style="text-align:center;" class="form-control" placeholder="Last Name" value="<?php echo set_value('LAST_NAME'); ?>"><br />

                    <?php echo form_error('EMAIL'); ?>
                    <input name="EMAIL" type="text" style="text-align:center;" class="form-control" placeholder="Email Address" value="<?php echo set_value('EMAIL'); ?>"><br />

                    <?php echo form_error('password'); ?>
                    <input name="password" type="password" style="text-align:center;" class="form-control" placeholder="Password"><br />

                    <?php echo form_error('passwordConfirm'); ?>
                    <input name="passwordConfirm" type="password" style="text-align:center;" class="form-control" placeholder="Confirm Password"><br />

                    <input name="CONTACT_TIME" type="text" style="text-align:center;" class="form-control" placeholder="Contact Time(Optional)" value="<?php echo set_value('CONTACT_TIME'); ?>"><br />

                    <input name="PHONE_NO" type="text" style="text-align:center;" class="form-control" placeholder="Phone Number(Optional)" value="<?php echo set_value('PHONE_NO'); ?>"><br />

                    <center><input type="submit" class="btn btn-primary" value="Submit"/></center>
            </div>

            </div>



        </div>
