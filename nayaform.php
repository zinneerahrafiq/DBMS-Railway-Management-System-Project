<?php

// Connect to the database
include_once 'dbconnection.php';
?>
<html>
<head>
    <title>Railway Management System</title>
    <style>
      body {
        background-color: lightblue;
        text-align: center;
        font-family: sans-serif;
      }
      nav {
      background-color: darkblue;
      padding: 30px;
      text-align: center;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-size: 16px;
      margin: 0 10px;
    }

    nav a:hover {
      color: lightgray;
    }
      </style>
</head>


<body>
<nav>
      <a href="index.php">Home</a>
      <a href="nayainsert.php">Book</a>
      <a href="delete.php">Cancel</a>
    </nav>
    
<?php
//$conn = mysqli_connect('localhost', 'username', 'password', 'database_name');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $ticket_idrandom = mt_rand();
    //$ticket_id =   $_POST['ticket_id'];
    $age =   $_POST['age'];
    $gender =   $_POST['gender'];
    //$reservation_status =   $_POST['reservation_status'];
    $p_name =   $_POST['p_name'];
    $adress =   $_POST['adress'];
    $category =   $_POST['category'];
    $train_date =   $_POST['train_date'];
    $train_number = $_POST['train_no'];

    $current_date = date('Y-m-d');

    $day_of_week = date('l', strtotime($train_date));

         if ($day_of_week == "Sunday" || $day_of_week == "Saturday") {
                echo "<script>alert('You can only book dates for weekdays');</script>";
            }
      
      else{


    $query1 = "select * from TRAIN where train_no ='$train_number'";
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result1) > 0) {
        // Train number found
        

        if($category == 'AC'){
            $query2 = "select acseats_avail from TRAIN_STATUS where train_no ='$train_number'";
            $result2 = mysqli_query($conn, $query2);

            if (mysqli_num_rows($result2) > 0) {
                $row = mysqli_fetch_assoc($result2);
                $acseats_avail = $row['acseats_avail'];

                if($acseats_avail >0 && $acseats_avail <=10){
                    
                    //confirm ticket enter
                    $query4 = "INSERT INTO PASSENGER (ticket_id, age, gender, reservation_status, p_name, adress, category, train_date, train_no) VALUES ('$ticket_idrandom', '$age', '$gender', 'confirm', '$p_name', '$adress', '$category', '$train_date', '$train_number')";
                    $result4 = mysqli_query($conn, $query4);
                    
                    //minus available seats from ac in that train
                    $queryacseatsmin = "UPDATE train_status SET acseats_avail = acseats_avail - 1 WHERE train_no = '$train_number' ";
                    $resultminus = mysqli_query($conn, $queryacseatsmin);
                    //add to book seats from ac in that train
                    $queryacseatsplus = "UPDATE train_status SET acseats_book = acseats_book + 1 WHERE train_no = '$train_number' ";
                    $resultplus = mysqli_query($conn, $queryacseatsplus);
                    
                    $querypass= "select *  FROM PASSENGER WHERE ticket_id = '$ticket_idrandom'";
                    $pass = mysqli_query($conn, $querypass);
                    $row = mysqli_fetch_assoc($pass);
                    echo "----TICKET BOOKED----";
                    echo "   Name: ".$row['p_name'].", ";
                    echo "   Age: ".$row['age'].", ";
                    echo "   Address: ".$row['adress'].", ";
                    echo "   Train Number: ".$row['train_no'].", ";
                    echo "   Ticket ID: ".$row['ticket_id'].", ";
                    echo "   Status ".$row['reservation_status']." ";
                    

                }else if($acseats_avail <-1 || $acseats_avail >10) {
                    echo" ac seats not available cannot proceed";
                }else if($acseats_avail ==0 || $acseats_avail ==-1)
                {
                    if($acseats_avail ==0){
                        $query6 = "INSERT INTO PASSENGER (ticket_id, age, gender, reservation_status, p_name, adress, category, train_date, train_no) VALUES ('$ticket_idrandom', '$age', '$gender', 'waiting1', '$p_name', '$adress', '$category', '$train_date', '$train_number')";
                        $result6 = mysqli_query($conn, $query6);
                        
                    }else{ 
                        $query8 = "INSERT INTO PASSENGER (ticket_id, age, gender, reservation_status, p_name, adress, category, train_date, train_no) VALUES ('$ticket_idrandom', '$age', '$gender', 'waiting2', '$p_name', '$adress', '$category', '$train_date', '$train_number')";
                        $result8 = mysqli_query($conn, $query8);
                        
                    }
                    //minus available seats from ac in that train
                    $queryacseatsmin = "UPDATE train_status SET acseats_avail = acseats_avail - 1 WHERE train_no = '$train_number' ";
                    $resultminus = mysqli_query($conn, $queryacseatsmin);
                    //add to book seats from ac in that train
                    $queryacseatsplus = "UPDATE train_status SET acseats_book = acseats_book + 1 WHERE train_no = '$train_number' ";
                    $resultplus = mysqli_query($conn, $queryacseatsplus);

                    $querypass= "select *  FROM PASSENGER WHERE ticket_id = '$ticket_idrandom'";
                    $pass = mysqli_query($conn, $querypass);
                    $row = mysqli_fetch_assoc($pass);
                    echo "----TICKET BOOKED----";
                    echo "   Name: ".$row['p_name'].", ";
                    echo "   Age: ".$row['age'].", ";
                    echo "   Address: ".$row['adress'].", ";
                    echo "   Train Number: ".$row['train_no'].", ";
                    echo "   Ticket ID: ".$row['ticket_id'].", ";
                    echo "   Status ".$row['reservation_status']." ";
                }else{ echo " ac failed"; }
            }
            else {
                echo" ac not found";
            }
        }else 


        if($category == 'general'){
            $query3 = "select generalseats_avail from TRAIN_STATUS where train_no ='$train_number'";
            $result3 = mysqli_query($conn, $query3);

            if (mysqli_num_rows($result3) > 0) {
                $row1 = mysqli_fetch_assoc($result3);
                $genseats_avail = $row1['generalseats_avail'];

                if($genseats_avail >0 && $genseats_avail <=10){
                    //confirm ticket enter
                    $query5 = "INSERT INTO PASSENGER (ticket_id, age, gender, reservation_status, p_name, adress, category, train_date, train_no) VALUES ('$ticket_idrandom', '$age', '$gender', 'confirm', '$p_name', '$adress', '$category', '$train_date', '$train_number')";
                    $result5 = mysqli_query($conn, $query5);
                    
                    //minus available seats from general in that train
                    $querygenseatsmin = "UPDATE train_status SET generalseats_avail = generalseats_avail - 1 WHERE train_no = '$train_number' ";
                    $resultminusg = mysqli_query($conn, $querygenseatsmin);
                    //add to book seats from general in that train
                    $querygenseatsplus = "UPDATE train_status SET generalseats_book = generalseats_book + 1 WHERE train_no = '$train_number' ";
                    $resultplusg = mysqli_query($conn, $querygenseatsplus);

                    $querypass= "select *  FROM PASSENGER WHERE ticket_id = '$ticket_idrandom'";
                    $pass = mysqli_query($conn, $querypass);
                    $row = mysqli_fetch_assoc($pass);
                    echo "----TICKET BOOKED----";
                    echo "   Name: ".$row['p_name'].", ";
                    echo "   Age: ".$row['age'].", ";
                    echo "   Address: ".$row['adress'].", ";
                    echo "   Train Number: ".$row['train_no'].", ";
                    echo "   Ticket ID: ".$row['ticket_id'].", ";
                    echo "   Status ".$row['reservation_status']." ";

                }else if($genseats_avail <-1 || $genseats_avail >10) {
                    echo" general seats not available cannot proceed  ";
                }
                else if($genseats_avail ==0 || $genseats_avail ==-1){ 
                    if($genseats_avail ==0){
                    $query7 = "INSERT INTO PASSENGER (ticket_id, age, gender, reservation_status, p_name, adress, category, train_date, train_no) VALUES ('$ticket_idrandom', '$age', '$gender', 'waiting1', '$p_name', '$adress', '$category', '$train_date', '$train_number')";
                    $result7 = mysqli_query($conn, $query7);
                    
                    }
                    else{
                        $query9 = "INSERT INTO PASSENGER (ticket_id, age, gender, reservation_status, p_name, adress, category, train_date, train_no) VALUES ('$ticket_idrandom', '$age', '$gender', 'waiting2', '$p_name', '$adress', '$category', '$train_date', '$train_number')";
                        $result9 = mysqli_query($conn, $query9);
                      
                    }
                    //minus available seats from general in that train
                    $querygenseatsmin = "UPDATE train_status SET generalseats_avail = generalseats_avail - 1 WHERE train_no = '$train_number' ";
                    $resultminusg = mysqli_query($conn, $querygenseatsmin);
                    //add to book seats from general in that train
                    $querygenseatsplus = "UPDATE train_status SET generalseats_book = generalseats_book + 1 WHERE train_no = '$train_number' ";
                    $resultplusg = mysqli_query($conn, $querygenseatsplus);

                    $querypass= "select *  FROM PASSENGER WHERE ticket_id = '$ticket_idrandom'";
                    $pass = mysqli_query($conn, $querypass);
                    $row = mysqli_fetch_assoc($pass);
                    echo "----TICKET BOOKED----";
                    echo "   Name: ".$row['p_name'].", ";
                    echo "   Age: ".$row['age'].", ";
                    echo "   Address: ".$row['adress'].", ";
                    echo "   Train Number: ".$row['train_no'].", ";
                    echo "   Ticket ID: ".$row['ticket_id'].", ";
                    echo "   Status ".$row['reservation_status']." ";

                }
                else{ echo " general failed"; }
            }
            else {
                echo" gen not found";
            }
        }else {echo "nooo noo";}

        //echo "train found";
        /*$querypass= "select *  FROM PASSENGER WHERE ticket_id = '$ticket_idrandom'";
        $pass = mysqli_query($conn, $querypass);
        $row = mysqli_fetch_assoc($pass);
        echo "   Name: ".$row['p_name'].", ";
        echo "   Age: ".$row['age'].", ";
        echo "   Address: ".$row['adress'].", ";
        echo "   Train Number: ".$row['train_no'].", ";
        echo "   Ticket ID: ".$row['ticket_id'].", ";
        echo "   Status ".$row['reservation_status']." ";*/

    } 
    else {
         //Train number not found
        echo "Train number not found.";
    }

     
}
}

?>
</body>
</html>

