<?php

include("admin_profile.php"); 


if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $query = "SELECT profile_picture FROM register_form WHERE id='$admin_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $profile_picture = $row['profile_picture'];

       
        $_SESSION['profile_picture'] = $profile_picture;
    } else {
        
        $_SESSION['profile_picture'] = 'default-profile.jpg';
    }
} else {
   
    $_SESSION['profile_picture'] = 'default-profile.jpg';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel and Tour Admin Dashboard</title>
    
    <!-- Swiper CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- CSS LINK-->
    <link rel="stylesheet" href="dashboard.css">


</head>

<body>
    <div class="side-menu">
        <div class="logo-maritoni">
            <img src="logo.png" alt="logo">
        </div>
        <ul>
            <li onclick="showDashboard()">
                <img src="dashboard_icon.png" alt="">&nbsp; Dashboard
            </li>
           
            <li onclick="toggleTourPackages()"> 
                <img src="tour-package_icon.png" alt="Tour Packages Icon" style="vertical-align: middle;"> Tour Packages
            </li>
            <li onclick="manageUsers()">
                <img src="booking_icon.png" alt="Manage Users Icon" style="vertical-align: middle;"> Manage Users
            </li>
            <li onclick="manageBookings()">
                <img src="booking_icon.png" alt="Manage Booking Icon" style="vertical-align: middle;"> Manage Bookings
            </li>
            <li onclick="manageInquiries()"> 
                <img src="Inquiries,Pages_icon.png" alt="Manage Inquiries Icon" style="vertical-align: middle;">  Manage Inquiries
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="user-dropdown">
                    <div class="user-info">
                        <img src="<?php echo $_SESSION['profile_picture'] ?: 'default-profile.jpg'; ?>" alt="Profile Picture" id="profilePicture" style="width:36px; height:36px; border-radius:50%;">
                        <span>Welcome</span>
                        <span>Administrator</span>
                        <i class="fas fa-caret-down"></i>
                    </div>
                    <div class="dropdown-content" id="dropdownContent">
                        <a href="admin_profile.php">Profile</a>
                        <a href="index.php" onclick="logout()">Logout</a>
                    </div>
                </div>

            </div>

        </div>
        <section id="dashboard" class="dashboard-section active-section">
            <h3>DASHBOARD</h3>
            <div class="dashboard-container"> 
                <div class="box">
                <img src="business-bag.png" alt="Icon">
                <h3>Total Packages</h3>
                <?php
                  
                    $servername = "localhost";
                    $username = "root"; 
                    $password = "";
                    $dbname = "maritoni_db"; 

                    
                    $con = new mysqli($servername, $username, $password, $dbname);

                    
                    if ($con->connect_error) {
                        die("Connection failed: " . $con->connect_error);
                    }

                    $dash_packages_query = "SELECT * FROM packages";
                    $dash_packages_query_run = mysqli_query($con, $dash_packages_query);

                    if ($packages_total = mysqli_num_rows($dash_packages_query_run)) {
                        echo '<h4 class="mb-0">'.$packages_total.'</h4>';
                    } else {
                        echo '<h4 class="mb-0">No Data</h4>';
                    }
                ?>
                    
            </div>
                <div class="box">
                    <img src="user.png" alt="Icon">
                    <h3>Total Users</h3>
                    <?php
                        
                        $servername = "localhost";
                        $username = "root"; 
                        $password = "";
                        $dbname = "maritoni_db"; 

                        
                        $con = new mysqli($servername, $username, $password, $dbname);

                        
                        if ($con->connect_error) {
                            die("Connection failed: " . $con->connect_error);
                        }

                        
                        $dash_users_query = "SELECT COUNT(*) AS user_count FROM register_form WHERE user_type = 'user'";
                        $dash_users_query_run = mysqli_query($con, $dash_users_query);

                       
                        if ($dash_users_query_run) {
                            $row = mysqli_fetch_assoc($dash_users_query_run);
                            $users_total = $row['user_count'];
                            echo '<h4 class="mb-0">' . $users_total . '</h4>';
                        } else {
                            echo '<h4 class="mb-0">No Data</h4>';
                        }

                        
                        $con->close();
                    ?>
                        </div>
                        <div class="box">
                            <img src="booking_icon.png" alt="Icon">
                            <h3>Total Bookings</h3>
                            <?php
                               
                                $servername = "localhost";
                                $username = "root"; 
                                $password = "";
                                $dbname = "maritoni_db"; 

                                
                                $con = new mysqli($servername, $username, $password, $dbname);

                                
                                if ($con->connect_error) {
                                    die("Connection failed: " . $con->connect_error);
                                }

                               
                                $dash_users_query = "SELECT COUNT(*) AS user_count FROM register_form WHERE user_type = 'user'";
                                $dash_users_query_run = mysqli_query($con, $dash_users_query);

                               
                                if ($dash_users_query_run) {
                                    $row = mysqli_fetch_assoc($dash_users_query_run);
                                    $users_total = $row['user_count'];
                                    echo '<h4 class="mb-0">' . $users_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-0">No Data</h4>';
                                }

                                
                                $con->close();
                            ?>
                        </div>

                        <div class="box">
                            <img src="inquiries.png" alt="Icon">
                            <h3>Total Inquiries</h3>
                            <?php

                                $servername = "localhost";
                                $username = "root"; 
                                $password = "";
                                $dbname = "maritoni_db"; 

                             
                                $con = new mysqli($servername, $username, $password, $dbname);

                               
                                if ($con->connect_error) {
                                    die("Connection failed: " . $con->connect_error);
                                }

                                
                                $dash_inquiries_query = "SELECT * FROM inquiries";
                                $dash_inquiries_query_run = mysqli_query($con, $dash_inquiries_query);

                               
                                if ($dash_inquiries_query_run) {
                                    $inquiries_total = mysqli_num_rows($dash_inquiries_query_run);
                                    echo '<h4 class="mb-0">' . $inquiries_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-0">No Data</h4>';
                                }

                                
                                $con->close();
                            ?>
                        </div>
                    </div>



           
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Country code</th>
                                <th>Phone</th>
                                <th>Zipcode</th>
                                <th>Address</th>
                                <th>Place</th>
                                <th>Guest</th>
                                <th>Arrival</th>
                                <th>Departure</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $database = "maritoni_db";

                                $conn = new mysqli($servername, $username, $password, $database);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM book_form";
                                $result = $conn->query($sql);

                                if (!$result) {
                                    die("Invalid query: " . $conn->error);
                                }

                                while($row = $result->fetch_assoc()) {
                                    echo "
                                    <tr>
                                        <td>$row[id]</td>
                                        <td>$row[name]</td>
                                        <td>$row[email]</td>
                                        <td>$row[countrycode]</td>
                                        <td>$row[phone]</td>
                                        <td>$row[address]</td>
                                        <td>$row[place]</td> 
                                        <td>$row[zipcode]</td>
                                        <td>$row[guest]</td>
                                        <td>$row[arrival]</td>
                                        <td>$row[departure]</td>
                                        <td>
                                            <a class='btn btn-primary btn-sm' href='/Maritoni/edit_booking.php?id=$row[id]'>Edit</a>|<a class='btn btn-primary btn-sm' href='/Maritoni/delete_booking.php?id=$row[id]'>Delete</a>
                                        </td>
                                    </tr>
                                    ";    
                                }
                            ?>
                    </tbody>
                </table>
            
            </section>
        
        <!-- Manage Tour Packages Section -->
        <section id="manageTourPackages" class="dashboard-section">
            <h2>Manage Packages</h2>
            <br>
            <button onclick="window.location.href='/Maritoni/addnewpackages.php'" class="btn btn-success">Add New Package</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "maritoni_db";

                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM packages";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        $price_with_sign = '₱' . $row['Price'];
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td><img src='{$row['image']}' alt='Package Image' style='width: 100px;'></td>
                            <td>{$row['Description']}</td>
                            <td>{$row['details']}</td>
                            <td>$price_with_sign</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/Maritoni/edit_packages.php?id={$row['id']}'>Edit</a> | 
                                <a class='btn btn-danger btn-sm' href='/Maritoni/delete_packages.php?id={$row['id']}'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
            <br>
        </section>       
    


        
        <!-- Manage Users Section -->
<section id="manageUsers" class="dashboard-section">
    <h2>Manage Users</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Cellphone number</th>
                <th>Address</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            include("db.php");
            
            
            $query = "SELECT id, fname, Mname, lname, gender, cnum, address, email, password FROM register_form WHERE user_type = 'user'";
            $result = mysqli_query($conn, $query);
            
           
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fname'] . "</td>";
                    echo "<td>" . $row['Mname'] . "</td>";
                    echo "<td>" . $row['lname'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['cnum'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    
                    echo "<td><a class='btn btn-primary btn-sm' href='/Maritoni/edit_user.php?id={$row['id']}'>Edit</a> | <a class='btn btn-primary btn-sm' href='/Maritoni/delete_user.php?id={$row['id']}'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No users found</td></tr>";
            }
           
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</section>

   


        
        <!-- Manage Bookings Section -->
<section id="manageBookings" class="dashboard-section">
    <h2>Manage Booking</h2>
   
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Country code</th>
                <th>Phone</th>
                <th>Zipcode</th>
                <th>Address</th>
                <th>Place</th>
                <th>Guest</th>
                <th>Arrival</th>
                <th>Departure</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "maritoni_db";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM book_form";
            $result = $conn->query($sql);

            if (!$result) {
                die("Invalid query: " . $conn->error);
            }

            while($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[countrycode]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[place]</td> 
                    <td>$row[zipcode]</td>
                    <td>$row[guest]</td>
                    <td>$row[arrival]</td>
                    <td>$row[departure]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/Maritoni/edit_booking.php?id=$row[id]'>Edit</a>|<a class='btn btn-primary btn-sm' href='/Maritoni/delete_booking.php?id=$row[id]'>Delete</a>
                        
                    </td>
                </tr>
                ";    
            }
        ?>
        </tbody>
    </table>
</section>


<section id="manageInquiries" class="dashboard-section">
    <h2>Manage Inquiries</h2>
    <br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "maritoni_db";

                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM inquiries";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['contactnumber']}</td>
                        <td>{$row['message']}</td>
                        <td>{$row['date']}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit_inquiries.php?id={$row['id']}'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete_inquiries.php?id={$row['id']}'>Delete</a>
                            <button class='btn btn-info btn-sm' onclick='showEmailForm({$row['id']}, \"{$row['email']}\")'>Email</button>
                        </td>
                    </tr>
                    ";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <div id="emailForm" style="display:none;">
        <h2>Send Email</h2>
        <form id="emailFormElement" method="post" action="send_email_inquiries.php">
            <label for="to">To:</label>
            <input type="email" id="to" name="to" required readonly><br><br>
            
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required><br><br>
            
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>
            
            <button type="submit">Send Email</button>
        </form>
    </div>
</section>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function showEmailForm(id, email) {
    document.getElementById('to').value = email;
    document.getElementById('emailForm').style.display = 'block';
    document.getElementById('emailForm').scrollIntoView({ behavior: 'smooth' });
}

document.getElementById('emailFormElement').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var formData = new FormData(this);
    
    fetch('send_email_inquiries.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Success', 'Email has been sent successfully!', 'success');
        } else {
            Swal.fire('Error', 'Failed to send email: ' + data.error, 'error');
        }
    })
    .catch(error => {
        Swal.fire('Error', 'An error occurred: ' + error.message, 'error');
    });
});
</script>









    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        
            function toggleDropdown() {
            document.getElementById("dropdownContent").classList.toggle("show");
        }

       
        window.onclick = function(event) {
            if (!event.target.matches('.user-info')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        
        
        
        
        function showDashboard() {
            hideAllSections();
          
            document.getElementById('dashboard').classList.add('active-section');
        }

        
        function toggleTourPackages() {
            showSection('manageTourPackages');
        }

        function manageBookings() {
            showSection('manageBookings');
        }

        function manageUsers() {
            showSection('manageUsers');
        }

        function manageInquiries() {
            showSection('manageInquiries');
        }

        
        function hideAllSections() {
            var sections = document.querySelectorAll('.dashboard-section');
            sections.forEach(function(section) {
                section.classList.remove('active-section');
            });
        }

        
        function showSection(sectionId) {
            hideAllSections();
            document.getElementById(sectionId).classList.add('active-section');
        }
        document.querySelector('.user-info').addEventListener('click', function() {
            document.querySelector('.dropdown-content').classList.toggle('show');
        });

        window.onclick = function(event) {
            if (!event.target.matches('.user-info')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }


     
    </script>

    
    
</body>
</html>