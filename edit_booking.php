<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "maritoni_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $id = $_POST['id'];
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $countrycode = htmlspecialchars($_POST['countrycode']);
        $phone = htmlspecialchars($_POST['phone']);
        $address = htmlspecialchars($_POST['address']);
        $place = htmlspecialchars($_POST['place']);
        $zipcode = htmlspecialchars($_POST['zipcode']);
        $guest = $_POST['guest'];
        $arrival = $_POST['arrival'];
        $departure = $_POST['departure'];

        
        $stmt = $conn->prepare("UPDATE book_form SET name=?, email=?, countrycode=?, phone=?, address=?, place=?, zipcode=?, guest=?, arrival=?, departure=? WHERE id=?");
        $stmt->bind_param("ssssssssssi", $name, $email, $countrycode, $phone, $address, $place, $zipcode, $guest, $arrival, $departure, $id);

    
        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    }

    $sql = "SELECT * FROM book_form";
    $result = $conn->query($sql);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }

    echo "<table class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Country code</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Place</th>
                    <th>Zipcode</th>
                    <th>Guest</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <form method='post'>
                    <td>{$row['id']}</td>
                    <td><input type='text' name='name' value='{$row['name']}'></td>
                    <td><input type='email' name='email' value='{$row['email']}'></td>
                    <td><input type='text' name='countrycode' value='{$row['countrycode']}'></td>
                    <td><input type='text' name='phone' value='{$row['phone']}'></td>
                    <td><input type='text' name='address' value='{$row['address']}'></td>
                    <td><input type='text' name='place' value='{$row['place']}'></td>
                    <td><input type='text' name='zipcode' value='{$row['zipcode']}'></td>
                    <td><input type='number' name='guest' value='{$row['guest']}'></td>
                    <td><input type='date' name='arrival' value='{$row['arrival']}'></td>
                    <td><input type='date' name='departure' value='{$row['departure']}'></td>
                    <td>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <input type='submit' class='btn btn-primary btn-sm' value='Save'>
                        <a href='admin_dashboard.php' class='btn btn-secondary btn-sm'>Back</a> 
                    </td>
                </form>
              </tr>";
    }

    echo "</tbody></table>";

    $conn->close();
?>
