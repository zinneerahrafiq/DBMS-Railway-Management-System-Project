
<!DOCTYPE html>
<html>
  <head>
    <title>Railway Management System</title>
    <style>
      body {
        background-color: lightblue;
        text-align: center;
        font-family: sans-serif;
      }
      h1 {
        color: white;
        text-shadow: 2px 2px 4px #000000;
      }
      .options {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 50vh;
      }
      form {
        display: flex;
        flex-direction: row; /* Change the value of flex-direction to column */
        justify-content: space-between;
        width: 80%;
        margin: 0 auto 20px;
      }
      label {
        width: 45%;
        margin: 0;
        text-align: right;
        padding-right: 10px;
      }
      input[type="text"] {
        width: 50%;
        height: 30px;
        font-size: 18px;
        border: 2px solid blue;
        border-radius: 5px;
        padding: 0 10px;
      }
      .option {
        background-color: white;
        border: 2px solid blue;
        border-radius: 10px;
        box-shadow: 4px 4px 8px #888888;
        color: blue;
        font-size: 20px;
        padding: 20px 40px;
        text-decoration: none;
        margin: 20px 0;
        transition: all 0.5s;
      }
      .option:hover {
        background-color: lightgrey;
        transform: scale(1.1);
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
  <h1>Welcome to the Railway Management System</h1>
  <h2> We have Trains to and from KARACHI, LAHORE, ISLAMABAD, QUETTA, PINDI </h2>
  
  <div class="options">
    
    <a class="option" href="nayainsert.php">Book Ticket</a>
    <a class="option" href="delete.php">Cancel Ticket</a>

  </div>
</body>
</html>
