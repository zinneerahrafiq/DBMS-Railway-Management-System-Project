
<html>
<head>
  <style>
    /* Add some basic styling */
    body {
      font-family: sans-serif;
    }

    form {
      width: 500px;
      background-color: lightblue;
      margin: 0 auto;
      text-align: center;
      padding: 20px;
      border: 1px solid lightblue;
      border-radius: 5px;
    }

    /* Style the input fields */
    input[type="text"],
    select {
      width: 60%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
    }

    /* Style the submit button */
    button[type="submit"] {
      width: 20%;
      background-color: darkblue;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    /* Style the labels */
    label {
      font-weight: bold;
      display: block;
      margin-bottom: 10px;
    }

    /* Add some styling to the navigation bar */
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
  <body>
  <nav>
      <a href="index.php">Home</a>
      <a href="nayainsert.php">Book</a>
      <a href="delete.php">Cancel</a>
  </nav>
  <h2>Trains: </h2>
  <h4> (2046) Karakorram Express from KARACHI to LAHORE </h4>
  <h4>(2047) Lyari Express from KARACHI to PINDI</h4>
  <h4>(2048) Allama Iqbal Express from KARACHI to HYDERABAD</h4>
  <h4>(2049) Quaid e Azam Express from LAHORE to ISLAMABAD</h4>
  <h4>(2050) Liaquat Express from LAHORE to QUETTA</h4>
 <body>
  <form action="nayaform.php" method="POST">
    <input type="text" name="p_name" placeholder="Passenger Name" required>
    <br>
    <input type="text" name="adress" placeholder="Address" required>
    <br>
    <input type="text" name="gender" placeholder="gender" required>
    <br>
    <input type="text" name="age" placeholder="age" required>
    <br>
    <input type="text" name="train_no" placeholder="Train Number" required>
    <br>

<div class="form-group row">
       <label for="date" class="col-12 col-sm-3 col-form-label text-sm-right">Desired Date</label>
       <input type="date" name="train_date" id="date" class="col-12 col-sm-8 col-lg-6 form-control form-control-sm rounded-0" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime('+1 second')); ?>" max="<?php echo date('Y-m-d', strtotime('+1 week')); ?>" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])(?!(0[67]|1[01234]))-(0[1-9]|1[012])-[0-9]{4}" required>
    </div>
    <label for="category">Select category:</label><br>
    <select id="category" name="category">
      <option value="AC">AC</option>
      <option value="general">GEN</option>
    </select>
    <br>
    <button type="submit" name="submit">Insert</button>
  </form>
</body>
</html>
