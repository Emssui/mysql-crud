<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Member Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: green;
        color: white;
    }

    #trash {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
</style>
<body>
    <?php 
        include "db_connect.php"; 
        
        // Handle Create Member
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone = $_POST['phone'];
            $birthday = $_POST['date'];
            $email = $_POST['email'];
            
            $stmt = $pdo->prepare("INSERT INTO members (firstname, lastname, phone, birthday, email) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$firstname, $lastname, $phone, $birthday, $email]);
            
            echo "New member added successfully!";
        }

        // Handle Update Member
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
            $row = [
                'id' => $_POST['id'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'birthday' => $_POST['date'], 
            ];
            
            $sql = "UPDATE members SET firstname=:firstname, lastname=:lastname, phone=:phone, birthday=:birthday, email=:email WHERE id=:id;";
            $pdo->prepare($sql)->execute($row);
            
            echo "Updated a member successfully!";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
            $id = $_POST['id'];
            $stmt = $pdo->prepare("DELETE FROM members WHERE id = ?");
            $stmt->execute([$id]);
            echo "Member deleted successfully!";
        }
    ?>

    <h2>Create</h2>
    <form method="post" action="">
        <input type="date" name="date" id="date" required>
        <br><br>
        <input type="email" name="email" id="email" placeholder="email" required>
        <input type="text" name="phone" id="phone" placeholder="phone number" required>
        <br><br>
        <input type="text" name="firstname" id="fname" placeholder="first name" required>
        <input type="text" name="lastname" id="lname" placeholder="last name" required>
        <br><br>
        <input type="submit" name="create" value="Create Member">
    </form>
    <br>
    <h2>Update</h2>
    <form method="post" action="">
        <input type="number" name="id" id="id" placeholder="ID of member" required>
        <br><br>
        <input type="date" name="date" id="date" required>
        <br><br>
        <input type="email" name="email" id="email" placeholder="email" required>
        <input type="text" name="phone" id="phone" placeholder="phone number" required>
        <br><br>
        <input type="text" name="firstname" id="fname" placeholder="first name" required>
        <input type="text" name="lastname" id="lname" placeholder="last name" required>
        <br><br>
        <input type="submit" name="update" value="Update Member">
    </form>

    <br>

    <?php 
        // Display the members table
        $stmt = $pdo->query('SELECT * FROM members');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Birthday</th>
                    <th>Email</th>
                    <th><div id='trash-container'><i id='trash' class='fa fa-trash-o' style='font-size:24px;'></i></div></th>
                  </tr>";
            foreach ($result as $row) {
                echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["firstname"]) . "</td>
                <td>" . htmlspecialchars($row["lastname"]) . "</td>
                <td>" . htmlspecialchars($row["phone"]) . "</td>
                <td>" . htmlspecialchars($row["birthday"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td><i id='trash' class='fa fa-trash-o' style='font-size:24px; cursor: pointer;' onclick='deleteMember(" . htmlspecialchars($row["id"]) . ")'></i></td>
              </tr>";
            }   
            echo "</table>";
        } else {
            echo "0 results";
        }
    ?>

    <script>
        function deleteMember(id) {
            if (confirm('Are you sure you want to delete this member?')) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        alert('Member deleted successfully!');
                        location.reload();
                    }
                };
                xhr.send("delete=1&id=" + id);
            }
        }
    </script>
</body>
</html>
