This project provides the database SQL queries for a voting system. It includes tables for users, candidates, votes, and logs. The system allows users to register, vote for candidates, and track user actions.
Table of Contents

Features

Tech Stack

Installation

Usage

Database Setup

File Descriptions

Features
User Registration: Users can register securely with their details (username, password, email).

User Login: Registered users can log in using their credentials.

Voting: Once logged in, users can vote for a candidate.

View Results: Users can view voting statistics in real-time.

User Activity Logging: All actions (logins, votes) are logged for transparency.

Secure Authentication: User passwords are hashed and stored securely in the database.

Tech Stack
Frontend: HTML, CSS

Backend: PHP

Database: MySQL

Authentication: PHP Sessions, Password Hashing

Logging: PHP for logging user actions

Hosting: Can be deployed on any PHP-supported web server (e.g., Apache, Nginx)

Installation
Prerequisites:
A PHP environment set up (e.g., XAMPP, WAMP, or a live server).

A MySQL database running.

Steps:
Clone the Repository:

bash
Copy
git clonehttps://github.com/penalo2002/online-voting-system.git
cd online-voting-system
Set Up the Database:

Import the SQL schema to your MySQL database. The onlinevotingsystem2.sql file contains the necessary tables and structure.

You can do this using phpMyAdmin or via command line:

bash
Copy
mysql -u username -p < onlinevotingsystem2.sql
Replace username with your MySQL username.

Configure Database Connection:

Open the db.php file and configure the database connection settings. Replace the placeholders with your MySQL username, password, and database name.

Example:

php
Copy
$conn = mysqli_connect('localhost', 'root', '', 'onlinevotingsystem2');
Run the Application:

Place the project files in the htdocs folder if you're using XAMPP, or in the root folder of your PHP server.

Access the project via http://localhost/onlinevotingsystem2/register.php or the appropriate URL based on your setup.

Usage
Register:

Navigate to the registration page (register.php).

Fill in your username, email, and password, then submit the form to create a new user account.

Login:

After registration, log in with your username and password on the login page (login.php).

Vote:

Once logged in, navigate to the voting page (vote.php).

Select your candidate and cast your vote. Your vote will be recorded and stored securely.

View Results:

After voting, you can view the real-time voting statistics by navigating to the results page (results.php).

Database Setup
The database onlinevotingsystem2.sql contains four essential tables:

users: Stores user data (id, username, password, email).

candidates: Stores candidate information (id, name, description, party, election_date).

votes: Records votes for candidates (user_id, candidate_id).

logs: Tracks user actions (user_id, action, ip_address, user_agent, timestamp).

Ensure that you configure the database connection in db.php to match your MySQL credentials.

File Descriptions
db.php: Contains the database connection logic.

login.php: Handles the login functionality for registered users.

register.php: Manages user registration.

vote.php: The voting page where users can cast their vote.

results.php: Displays voting statistics in real-time.

onlinevotingsystem2.sql: SQL file to create the necessary database structure for the voting system.





Created by: Johanna Penalo, WUORKIYAH JAWARA, and NFAKABA CISSE 
