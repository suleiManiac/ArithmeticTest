<?php

require_once('../private/initialize.php');
$page_title = " Division";
include(SHARED_PATH . '/header.php');
$user_level = $_SESSION['div_level'];


if (is_request_post()) {
    

    $test = [];
    $correct_answers =  $_POST['corr_ans'];
    $user_answers = $_POST['user_ans'];
    $length = count($correct_answers);
    $answer_count = 0;
    $test_type = 4;

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 2;
    
    for ($i = 0; $i < $length; $i++) {
        if ($correct_answers[$i] === $user_answers[$i]) $answer_count++;
    }

    $score_percentage = ($answer_count/$length) * 100;
    
    switch ($user_level ) {
        case $user_level == 1 and $score_percentage >= 60:
        case $user_level == 2 and $score_percentage >= 60:
            $user_level++;
            break;
        case $user_level == 3 and $score_percentage >= 70:
        case $user_level == 4 and $score_percentage >= 70:
            $user_level++;
            break;
        case $user_level == 5 and $score_percentage >= 70:
            break;
        default: 
            break;
    }

    $_SESSION['div_level'] = $user_level;

    $update = update_user($db, $_SESSION['user_id'], 'div_level', $user_level);

    if ($update) {
        
        $test['score'] = $answer_count;
        $test['test_type'] = 4;
        $test['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;

        $result = insert_test($db, $test);

        if ($result === true) {
            $new_id = mysqli_insert_id($db);
            redirect_to(url_for('/index.php'));
        }
        else {
            $errors = $result;
        }        
    }
    else {
        $errors = $update;
    }


/*     $test['score'] = $answer_count;
    $test['test_type'] = 4;
    $test['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;

    $result = insert_test($db, $test);

    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/index.php'));
    }
    else {
        $errors = $result;
    } */


}

?>
<?php include(SHARED_PATH . '/sidebar.php');?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-primary">Division</h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div> -->
    </div>

    <div class="row">
            <div class="col-md-3">
                <h2>All Tests</h2>
            </div>
            <div class="col-md-6">&nbsp;</div>
            <div class="col-md-3">
                <h4>You are at division level: <span class="sign"><?php echo $_SESSION['div_level'];?></span></h4>
            </div>
            
            </div>
    <hr>
    <div class="container d-flex justify-content-center">
        <form action="division.php" method="post">
        <?php for ($i = 0; $i < 1 + $user_level; $i++) { ?>
            <div class="row form-group">
                <?php 
                    if ($user_level >= 3) {
                        $multiplier = 100; 
                    }
                    else {
                        $multiplier = 10;
                    }

                    $num1 = rand(1, $multiplier * $user_level);
                    $num2 = rand(1, $multiplier * $user_level);

                    $num1 = $num1 % $num2 == 0 ? $num1: $num2 * rand(1, 9);
                ?>
                <label for=""><?php echo $i+1; ?>. </label>
                <div class="col-md-2">
                    <input type="number" class="form-control" id="" value="<?php echo $num1;?>" readonly> 
                </div>
                <div class="col-md-1">
                    <span class="sign">/</span>
                </div>
                <div class="col-md-2">
                    <input type="number" name="" id="" class="form-control" value="<?php echo $num2;?>" readonly>
                </div>
                <div class="col-md-1">
                    <span class="sign">=</span>
                </div>
                <div class="col-md-4">
                    <input type="number" name="user_ans[]" id="" class="form-control">
                </div>
                <input type="hidden" name="corr_ans[]" value="<?php echo $num1 / $num2; ?>">
            </div>
        <?php } ?>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary btn-lg">
            </div>

<!--  -->
        </form>
    </div>
</main>
</div>
</div>

<?php include(SHARED_PATH . '/footer.php');?>