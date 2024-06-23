# Task_Management_Application
# Introduction
A To-Do application is a productivity tool that helps users manage their tasks and activities efficiently. This documentation will guide you through the features and functionality of the application, and provide instructions for integrating it into your project.

# Key Features
1. **Task Creation:** Users can add new tasks with details such as title, description, and due date.
2. **Task Viewing:** Users can view a list of all tasks, often with options to filter or sort by various criteria such as priority or due date.
3. **Task Updating:** Users can update the details of a task if changes are needed.
4. **Task Deletion:** Users can delete tasks that are no longer relevant or needed.
5. **Responsive Design:** Ensures the application works well on various devices, including desktops, tablets, and smartphones.

# Technologies Used
**Backend:** PHP is used for server-side scripting and managing the application logic.

**Database:** MySQL or another relational database to store task data.

**Frontend:** HTML, CSS, and JavaScript for the user interface, often enhanced with frameworks like Bootstrap or libraries like jQuery.

**API:** RESTful API to handle communication between the frontend and backend.

# Prerequisite
**Server:** WAMPP
**Software:** VS CODE

# Architecture
The application typically follows a client-server architecture where the frontend (client) communicates with the backend (server) via HTTP requests. The backend processes these requests, interacts with the database, and returns the appropriate responses.

# Getting Started
# Setup the Database
Run the local server and create a New Database namely **“todo”** in it. Once the database is created, create a table named **“task”** in this database. Use the code mentioned below to create this table.

<pre>CREATE TABLE `task` (
  `task_id` int(10) PRIMARY KEY,
  `task` text(250) NOT NULL,
  `description` text(30) NOT NULL,
  `deadline` date NOT NULL,
);
INSERT INTO `task` VALUES
(1, 'React.js', 'It is an popular JavaScript Library', '23-06-2024'),
(2, 'Meeting', 'Organize a meeting', '22-06-2024');
ALTER TABLE `task`
  MODIFY `task_id` int(10) AUTO_INCREMENT, AUTO_INCREMENT=3; </pre>
  
# Create a connection with Database
Inside the folder, create a file named – **“config.php”**. Inside this file used the below mentioned code to establish a connection with the database.
mysqli_connect( ) function is used to create the connection. It takes 4 parameter – hostname, username, password and database name, in the same order as mentioned.
die( ) function terminates the execution if there an error while connecting to the database.

**->mysqli_connect( )** function is used to create the connection. It takes 4 parameter – hostname, username, password and database name, in the same order as mentioned.

**->die( )** function terminates the execution if there an error while connecting to the database.

# Usage
Once the development server is running, you can access To-Do by visiting **http://localhost/** in your web browser.

# Output

# Add Page
![image](https://github.com/ishika024/Task_Management_Application/assets/86250466/e51bb73a-cf38-4c38-96f1-7b4a5c8a48d5)

# Update Page
![image](https://github.com/ishika024/Task_Management_Application/assets/86250466/c815b0ce-6938-43ce-ba9d-f7dfead22102)

# Updated Page
![image](https://github.com/ishika024/Task_Management_Application/assets/86250466/0e2c5d57-36a6-4d1b-8771-2426dca83937)

# After Deletion
![image](https://github.com/ishika024/Task_Management_Application/assets/86250466/7d4a5535-a255-4725-b896-3d2aed8d4d05)



