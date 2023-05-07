<body>
    <?php    
    include_once "inc/header.php";

    include_once "inc/conn.php";
    session_start();

    $sql="SELECT * FROM fake_users";
    $result = mysqli_query($conn, $sql);

    echo "<h1 style='text-align: center;'>Employee Information</h1>";
    // Process the query result
    if (mysqli_num_rows($result) > 0) {
        echo "<table style='max-width: 700px'class='mt-3 mx-auto table table-striped'><tr><th id='ID'>ID </th><th id='NAME'>Name<i ></th><th id='EMAIL'>Email<i ></th><th id='NUMBER'>Number<i ></th><th id='hiring_date'>Hiring date </th><th id='hourly_pay'>Hourly Pay </th><th id='ADDRESS'>Address<i ></th><th>Delete</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td><a href='inc/update.php' onclick='setSessionId(" . $row["id"] . ");'>" . $row["id"] . "</a></td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["number"] . "</td><td>" . $row["hiring_date"] . "</td><td>" .$row["hourly_pay"] . "</td><td>" .$row["address"] . "</td> <td><button type='button' onclick='deleteUser(".$row["id"].")'class='btn btn-dark'>Delete</button>  </td></tr>";
        }
        echo "</table>";
        
    } else {
        echo "No results found";
    }

    // Close the database connection when done
    mysqli_close($conn);
    ?>
</body>
</html>
<script >
    function setSessionId(id) {
        $.ajax({
            type: "POST",
            url: "Set/ID.php",
            data: {id:  id},
            success: function(response) {
                console.log(response);
                
            }
        });
    }
    function deleteUser(id) {
        if (window.confirm("Are you sure you want to delete this item?")) {
            $.ajax({
            type: "POST",
            url: "set_session.php",
            data: {id:  id},
            success: function(response) {
                console.log(response);
                
            }
        });
            window.location.href = 'http://localhost/phpwork/CRM/inc/delete.php';
        } else {
        
        }
        
    }
</script>