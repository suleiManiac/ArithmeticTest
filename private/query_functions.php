<?php

function get_user_for_login ($conn, $username, $password) {
    $sql = "SELECT * FROM users WHERE email='$username' AND pass='$password';";

    $result = mysqli_query($conn, $sql);
    confirm_result_set($result);

    return $result;
}

function get_user_by_id ($conn, $id) {
    $sql = "SELECT * FROM users WHERE id='$id';";

    $result = mysqli_query($conn, $sql);
    confirm_result_set($result);
    
    $test = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    
    return $test;
}

function update_user ($conn, $id, $col_to_update, $val) {
    $sql = "UPDATE users ";
    $sql .= "SET $col_to_update = $val ";
    $sql .= "WHERE id='$id';";

    $result = mysqli_query($conn, $sql);
    confirm_result_set($result);

    return $result;
}

function insert_new_user ($conn, $user) {
    $sql = "INSERT INTO users ";
    $sql .= "(email, pass, user_type, first_name, last_name, user_level) ";
    $sql .= "VALUES(";
    $sql .= "'" . $user['email'] . "',";
    $sql .= "'" . $user['password'] ."',";
    $sql .= "'" . $user['user_type'] ."', ";
    $sql .= "'" . $user['first_name'] ."', ";
    $sql .= "'" . $user['last_name'] ."', ";
    $sql .= "'" . $user['user_level'] ."'";
    $sql .= ")";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;    
    }
    else {
        echo mysqli_error($conn);
        db_disconnect($conn);
        exit();
    }
}

function get_all_tests ($conn) {
    $sql = "SELECT * FROM tests ";
    $sql .= "ORDER BY id ASC;";

    $result = mysqli_query($conn, $sql);
    confirm_result_set($result);

    return $result;
}

function get_test_by_criteria ($conn, $criteria_name, $criteria_val) {
    $sql = "SELECT * FROM tests WHERE $criteria_name=$criteria_val;";
    $result = mysqli_query($conn, $sql);
    confirm_result_set($result);

/*     $test = mysqli_fetch_assoc($result);
    mysqli_free_result($result); */
    return $result;
}

function get_test_by_id ($conn, $id) {
    $sql = "SELECT * FROM tests WHERE id=$id;";

    $result = mysqli_query($conn, $sql);
    confirm_result_set($result);

    $test = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $test;
}

function insert_test ($conn, $test) {
    $sql = "INSERT INTO tests ";
    $sql .= "(score, user_id, test_type) ";
    $sql .= "VALUES(";
    $sql .= "'" . $test['score'] . "',";
    $sql .= "'" . $test['user_id'] ."',";
    $sql .= "'" . $test['test_type'] ."'";
    $sql .= ")";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;    
    }
    else {
        echo mysqli_error($conn);
        db_disconnect($conn);
        exit();
    }
}
?>