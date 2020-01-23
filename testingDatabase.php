<?php
include ('database.php');

//checking to see if candidates table needs creating
if ( mysqli_query( $conn, "DESCRIBE `candidates`" ) ) {
    echo "candidates table already exists, skipping table creation\n";
}
else{
  echo "candidates table does not exist, creating table...\n";
  //creating candidates table
  $createCandidatesTable = "CREATE TABLE candidates (
    id INT NOT NULL,
    firstName VARCHAR(45) NOT NULL,
    lastName VARCHAR(45) NOT NULL,
    email VARCHAR(100) NOT NULL,
    PRIMARY KEY (id));";

  if ($conn->query($createCandidatesTable) === TRUE) {
      echo "candidates table created successfully\n";
  } else {
      echo "Error creating table: " . $conn->error;
  }
}

//checking to see if candidates_jobs table needs creating
if ( mysqli_query( $conn, "DESCRIBE `candidates_jobs`" ) ) {
    echo "candidates_jobs table already exists, skipping table creation\n";
}
else{
  echo "candidates_jobs table does not exist, creating table...\n";
  //creating candidates table
  $createJobsTable = "CREATE TABLE candidates_jobs (
    jobID INT NOT NULL,
    candidateID INT NOT NULL,
    jobTitle VARCHAR(60) NOT NULL,
    companyName VARCHAR(60) NOT NULL,
    startDate VARCHAR(30) NOT NULL,
    endDate VARCHAR(30) NOT NULL,
    PRIMARY KEY (jobID));";

  if ($conn->query($createJobsTable) === TRUE) {
      echo "candidates_jobs table created successfully\n";
  } else {
      echo "Error creating table: " . $conn->error;
  }
}


$conn->close();
?>
