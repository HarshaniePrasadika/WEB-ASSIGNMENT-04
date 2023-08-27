<!DOCTYPE html>
<html>
<head>
    <title>Project Details </title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
    <div class="sidebar">
            <header>HARSHANI</header>
            <img src="logo.jpg" class="logo" width="70" height="70">
            
            <ul>
                <li><a href="myweb.html">HOME</a></li>
                <li><a href="About.html">ABOUT</a></li>
                <li><a href="skills.html">SKILLS</a></li>
                <li><a href="work.html">WORK PLACE</a></li>
                <li><a href="Contact.html">CONTACT</a></li>
                <li><a href="project_details.html">PROJECT</a></li>
                <li><a href="login.html">LOGIN</a></li>
            </ul>
    </div>

    <div class="info">
        <h1>Project<span>Details</span></h1><br>
    </div>

    <div class="login-container">
    <h3>Add New Project</h3>
    <div id="login-form">
    <form action="insert_project.php" method="post">
        <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image"><br>

        <input type="submit" value="Add Project">
    </form>
    <h3>Update Project</h3>
    <form action="update_project.php" method="post">
        <label for="update_id">Project ID:</label>
        <input type="number" id="update_id" name="update_id" required><br>

        <label for="new_title">New Title:</label>
        <input type="text" id="new_title" name="new_title" required><br>

        <label for="new_description">New Description:</label>
        <textarea id="new_description" name="new_description" required></textarea><br>

        <input type="submit" value="Update Project">
    </form>

    <h3>Delete Project</h3>
    <form action="delete_project.php" method="post">
        <label for="delete_id">Project ID:</label>
        <input type="number" id="delete_id" name="delete_id" required><br>

        <input type="submit" value="Delete Project">
    </form>

        
        <input type="submit" value="SUBMIT" class="btn">
    </form>


</div>
</body>
</html>