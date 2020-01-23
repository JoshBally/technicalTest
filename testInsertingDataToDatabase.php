<?php
//connection to the database
include ('database.php');

//file names to be read
$jobsFile = 'jobs.csv';
$candidatesFile = 'candidates.csv';

//multidimensional array to hold all candidates information
$candidatesArray = [];

//open the file for reading
if (($openCandidates = fopen("{$candidatesFile}", "r")) !== FALSE)
{
  //each line in the file is converted into an individual array
  while (($data = fgetcsv($openCandidates, 1000, ",")) !== FALSE)
  {
    $candidatesArray[] = $data;
  }

  //closes the file
  fclose($openCandidates);
}


//calculates the number of candidates to know how many times to run For loops
$numberOfCandidates = count($candidatesArray);


//assign each value in the candidates multidimensional array to a variable
for($i=0;$i<$numberOfCandidates;$i++){
  $candidateNumber = $i +1;

  ${"candidateID$candidateNumber"} = $candidatesArray[$i][0];
  ${"candidateFirstName$candidateNumber"} = $candidatesArray[$i][1];
  ${"candidateLastName$candidateNumber"} = $candidatesArray[$i][2];
  ${"candidateEmail$candidateNumber"} = $candidatesArray[$i][3];
}



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

$success = 0;
//insert candidate info into database
for($i=0;$i<$numberOfCandidates;$i++){
  $candidateNumber = $i +1;
  $id = ${"candidateID$candidateNumber"};
  $firstName = ${"candidateFirstName$candidateNumber"};
  $lastName = ${"candidateLastName$candidateNumber"};
  $email = ${"candidateEmail$candidateNumber"};

  $populateCandidatesQuery = "INSERT INTO candidates (id, firstName, lastName, email)
  VALUES ($id, '$firstName', '$lastName', '$email');";
  if (mysqli_query($conn, $populateCandidatesQuery)) {
    }
    else {
        echo "Error: " . mysqli_error($conn);
        $success++;
    }
}
if($success == 0){
  echo "All candidates successfully added to the database\n";
}




//multidimensional array to hold all the jobs information
$jobsArray = [];

//opens the file for reading
if (($openJobs = fopen("{$jobsFile}", "r")) !== FALSE)
{
  // Each line in the file is converted into an individual array
  while (($data = fgetcsv($openJobs, 1000, ",")) !== FALSE)
  {
    $jobsArray[] = $data;
  }

  // Close the file
  fclose($openJobs);
}


$numberOfJobs = count($jobsArray);

//assign each value in the candidates multidimensional array to a variable
for($i=0;$i<$numberOfJobs;$i++){
  $jobsNumber = $i +1;

  ${"jobID$jobsNumber"} = $jobsArray[$i][0];
  ${"candidateID$jobsNumber"} = $jobsArray[$i][1];
  ${"jobTitle$jobsNumber"} = $jobsArray[$i][2];
  ${"companyName$jobsNumber"} = $jobsArray[$i][3];
  ${"startDate$jobsNumber"} = $jobsArray[$i][4];
  ${"endDate$jobsNumber"} = $jobsArray[$i][5];
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

$success = 0;
//insert jobs info into database
for($i=0;$i<$numberOfJobs;$i++){
  $jobsNumber = $i +1;

  $jobID = ${"jobID$jobsNumber"};
  $candidateID = ${"candidateID$jobsNumber"};
  $jobTitle = ${"jobTitle$jobsNumber"};
  $companyName = ${"companyName$jobsNumber"};
  $startDate = ${"startDate$jobsNumber"};
  $endDate = ${"endDate$jobsNumber"};

  $populateCandidatesQuery = "INSERT INTO candidates_jobs (jobID, candidateID, jobTitle, companyName, startDate, endDate)
  VALUES ($jobID, $candidateID, '$jobTitle', '$companyName', '$startDate', '$endDate');";
  if (mysqli_query($conn, $populateCandidatesQuery)) {
    }
    else {
        echo "Error: " . mysqli_error($conn);
        $success++;
    }
}
if($success == 0){
  echo "All candidates jobs successfully added to the database\n";
}

//close connection to database
$conn->close();
?>
