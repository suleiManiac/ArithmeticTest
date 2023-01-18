<?php

require_once('../private/initialize.php');
$page_title = ' Dashboard';
include(SHARED_PATH . '/header.php');
include(SHARED_PATH . '/sidebar.php');

$user = get_user_by_id($db, $_SESSION['user_id']);

if ($_SESSION['user_type'] == 'admin') {
    $test_set = get_all_tests($db);
}
else {
    $test_set = get_test_by_criteria($db,'user_id',  $_SESSION['user_id']);    
}

//print_r($test_set);
//exit();

?>



            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-primary">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Welcome <?php echo $_SESSION['name']; ?></button>
                        
                    </div>
                </div>
            </div>

            <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->
            <?php 
            $test_array = [
                "Addition",
                "Subtraction",
                "Multiplication",
                "Division",
                "Random"
            ];
            ?>
            <div class="row">
            <div class="col-md-4">
                <h2>All Tests</h2>
            </div>
            <!-- <div class="col-md-8">&nbsp;</div> -->
            <div class="col-md-2">
                <h4>Addition Level: <span class="sign"><?php echo $_SESSION['add_level'];?></span></h4>
            </div>
            <div class="col-md-2">
                <h4>Subtraction Level: <span class="sign"><?php echo $_SESSION['sub_level'];?></span></h4>
            </div>
            <div class="col-md-2">
                <h4>Multipication Level: <span class="sign"><?php echo $_SESSION['mult_level'];?></span></h4>
            </div>
            <div class="col-md-2">
                <h4>Division Level: <span class="sign"><?php echo $_SESSION['div_level'];?></span></h4>
            </div>
            
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Score</th>
                        <th>Test Type</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php

                /* if ($_SESSION['user_type'] == 'admin') { */
                    while($rows = mysqli_fetch_assoc($test_set)) { ?>
                        <tr>
                            <td><?php echo $rows['id'];?></td>
                            <td><?php echo $user['first_name']. ' '. $user['last_name'] ;?></td>
                            <td><?php echo $rows['date'];?></td>
                            <td><?php echo $rows['score'];?></td>
                            <td><?php echo $test_array[$rows['test_type'] - 1];?></td>
                        </tr>
                    <?php }
                ?>
                 
                </tbody>
                </table>
            </div>
        </main>
        </div>
        </div>

<?php include(SHARED_PATH . '/footer.php');?>