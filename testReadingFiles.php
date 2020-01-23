<?php

//testing reading the files
//reads both files and makes a multidimensional array for each
//prints all the data which is the same as data in the csv files

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

var_dump($candidatesArray);



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


var_dump($jobsArray);



?>
