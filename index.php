<!DOCTYPE html>
<html>
<head>
    <title>CSC 309 DB Class</title>
</head>
<body>
    <h2>Registration Form</h2>

    <!-- Select all users and display in a Table -->
    <table>
        <thead>
            <tr>
                <td>SN</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Gender</td>
                <td>Date of Birth</td>
                <td>Email</td>
            </tr>
        </thead>

        <tbody>
            <?php
                $result = getUser();
                $num = mysqli_num_rows($result);
                                
            if ($num > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td> <?php echo $row["id"]; ?> </td>
                    <td> <?php echo $row["lastname"]; ?> </td>
                    <td> <?php echo $row["firstname"]; ?> </td>
                    <td> <?php echo $row["gender"]; ?> </td>
                    <td> <?php echo $row["date_of_birth"]; ?> </td>
                    <td> <?php echo $row["email"]; ?> </td>
                </tr>
            <?php 
                        }
                    }
                // Close connection
                $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
    function connection(){
        $server = 'localhost'; // 127.0.0.1
        $username = 'root';
        $password = 'rootroot';
        $db = 'csc309';

        $conn = new mysqli($server, $username, $password, $db);

        $query = "SELECT * FROM users";

        return $conn->query($query);
    }
?>