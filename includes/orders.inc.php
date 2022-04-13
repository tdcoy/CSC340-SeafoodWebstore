<?php
 if (isset($_GET['id'])){
        require_once '../db_connect.php';
        // Store the value from get to a 
        // local variable "course_id"
        $course_id=$_GET['id'];
  
        // SQL query that sets the status
        // to 1 to indicate activation.
        $sqlUpdateStatus = "UPDATE orders SET order_status = '1' WHERE order_number = $course_id";
  
        // Execute the query
        mysqli_query($conn,$sqlUpdateStatus);
    }
  
    // Go back to course-page.php
    header("location: ../html/ordersvendor.php");

?>
