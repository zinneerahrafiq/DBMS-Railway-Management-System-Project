<?php
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
if (isset($_POST['submit'])) {

    $ticket_id =   $_POST['ticket_id'];
    //$category = $_POST['category'];

    $ticket_idrandom = mt_rand();

    $query1= "select train_no  FROM PASSENGER WHERE ticket_id = '$ticket_id'";
    $train = mysqli_query($conn, $query1);
    $query4 = "select category  FROM PASSENGER WHERE ticket_id = '$ticket_id'";
    $cat = mysqli_query($conn, $query4);
    if (mysqli_num_rows($cat) > 0) {
        $row = mysqli_fetch_assoc($cat);
        $category = $row['category'];//    }//else {echo "no";}

    if($train){
        if($category == 'AC'){
            $query3 = "UPDATE TRAIN_STATUS SET acseats_avail = acseats_avail + 1 WHERE train_no = (SELECT train_no FROM PASSENGER WHERE ticket_id = '$ticket_id')";
            $result3 = mysqli_query($conn, $query3);
            
            $query2 = "UPDATE TRAIN_STATUS SET acseats_book = acseats_book - 1 WHERE train_no = (SELECT train_no FROM PASSENGER WHERE ticket_id = '$ticket_id')";
            $result2 = mysqli_query($conn, $query2);

            $query = "DELETE FROM PASSENGER WHERE ticket_id = '$ticket_id'";
            $result = mysqli_query($conn, $query);

            $query7 = "UPDATE PASSENGER SET reservation_status = 'confirm'  WHERE reservation_status = 'waiting1'" ;
            $result7 = mysqli_query($conn, $query7);

            $query8 = "UPDATE PASSENGER SET reservation_status = 'waiting1' WHERE reservation_status = 'waiting2'" ;
            $result8 = mysqli_query($conn, $query8);
            

           
            //status waiting 1 uska tkid cancel wale ka tkid, status confirm, waiitng 2 wale ko waiting 1 kardo 
        }else //if($category == 'general')
        {
            $query5 = "UPDATE TRAIN_STATUS SET generalseats_avail = generalseats_avail + 1 WHERE train_no = (SELECT train_no FROM PASSENGER WHERE ticket_id = '$ticket_id')";
            $result5 = mysqli_query($conn, $query5);
    
            $query6 = "UPDATE TRAIN_STATUS SET generalseats_book = generalseats_book - 1 WHERE train_no = (SELECT train_no FROM PASSENGER WHERE ticket_id = '$ticket_id')";
            $result6 = mysqli_query($conn, $query6);

            $query11 = "DELETE FROM PASSENGER WHERE ticket_id = '$ticket_id'";
            $result11 = mysqli_query($conn, $query11);

            $query9 = "UPDATE PASSENGER SET reservation_status = 'confirm'  WHERE reservation_status = 'waiting1'" ;
            $result9 = mysqli_query($conn, $query9);

            $query10 = "UPDATE PASSENGER SET reservation_status = 'waiting1' WHERE reservation_status = 'waiting2'" ;
            $result10 = mysqli_query($conn, $query10);
           
        }
        //else{
          //  echo "error";
        //}

    

    
    }
    }else{
        echo "no train on this ticket";
    }
    

}
else{
    echo "hehe";
}


?>
