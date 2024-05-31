
<?php
$title="Account | Resume Builder";
require './assets/includes/header.php';
require './assets/includes/navbar.php';
// $fn->authPage();
$user=$db->query("select full_name,email_id from users where id='".$fn->Auth()['id']."'");
$user=$user->fetch_assoc();
;?>

    <div class="container">

        <div class="bg-white rounded shadow p-2 mt-4">
            <div class="d-flex justify-content-between border-bottom">
                <h5>Edit Account</h5>
                <div>
                    <a  class="text-decoration-none" onclick='history.back()'><i class="bi bi-arrow-left-circle"></i> Back</a>
                </div>
            </div>

            <div>

                <form class="row g-3 p-3" action="action\updateprofile.action.php" method="post">

                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text"  name ="full_name" value="<?=@$user['full_name']?>" class="form-control" reeqired>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email_id" value="<?=@$user['email_id']?>"  class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">New Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>




                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Update
                            Profile</button>
                    </div>
                </form>
            </div>





        </div>

    </div>
   
        
        
        <?php
require './assets/includes/footer.php';
?>