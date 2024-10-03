<?php
// Database connection details
$servername = "localhost"; // replace with your server name
$username = "root";        // replace with your database username
$password = "";            // replace with your database password
$dbname = "hospital";      // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['Patient_Name'];
    $admitted_date = $_POST['Admitted_Date'];
    $insurance = $_POST['Insurance'];
    $doctor_name = $_POST['Doctor_Name'];
    $last_appointment = $_POST['last_date'];
    $test_name = $_POST['Test_Name'];
    $test_id = $_POST['test_id'];
    $test_date = $_POST['Test_date'];
    $test_result = $_POST['Test_result'];

    // SQL query to insert the form data into the database
    $sql = "INSERT INTO patients (patient_name, admitted_date, insurance, doctor_name, last_appointment, test_name, test_id, test_date, test_result) 
            VALUES ('$patient_name', '$admitted_date', '$insurance', '$doctor_name', '$last_appointment', '$test_name', '$test_id', '$test_date', '$test_result')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>