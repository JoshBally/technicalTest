Executives Place - technical test

Not sure how you wanted the database to be setup.
I have only ever connected to a database before that is on a server, so I made a new database on my server and have connected to that. You might have a problem running the script because your ip address is not whitelisted to use remote connection on my server for MySQL. I have whitelisted the domains ezekia.com and notactivelylooking.com but I am not sure if that will work. If you provide the ip address you are using I can whitelist it so that it will be able use the database, but I can understand if you do not wish to share that. So I will also make a video of what happens on my computer when I run the script to show what is supposed to happen.



To run the script:

4 files are needed:  database.php, runThisScript.php, jobs.csv and candidates.csv

The files must all be in the same directory and then in the command line access the directory and run the command: "php runThisScript.php"

The script should run successfully and firstly it will read the two csv files, sorting the data into two arrays. Then the data will be uploaded to the database on my server. Then the information will be gathered from the server and displayed in a readable format in the terminal.


There is also a video demonstrating what should happen incase there is a problem.
