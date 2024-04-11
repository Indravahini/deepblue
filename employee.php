<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 12px; /* Increased padding for header */
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: black; /* Set font color to black */
        }

        th:hover {
            background-color: #cceeff; /* Change hover color to light blue */
        }

        .top-right {
            position: absolute;
            top: 20px; /* Increased top spacing */
            right: 20px; /* Increased right spacing */
            color: black;
        }

        .top-right a {
            color: black; /* Set font color to black */
            text-decoration: none; /* Remove underline */
            margin-right: 10px; /* Add margin between links */
        }

        .top-right a:hover {
            color: blue; /* Change hover color to blue */
        }
    </style>
</head>
<body>
    <h1>Employee</h1>
    <div class="top-right">
        <a href="financial_data.php">Financial Data</a>
        <a href="employee.php">Employee</a>
        <a href="kpi.php">KPI</a>
        <a href="company.php">Company</a>
        <a href="corporate_governance.php">Corporate Governance</a>
    </div>
    <table>
        <tr>
            <th>EmployeeID</th>
            <th>CompanyID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Department</th>
            <th>Position</th>
            <th>Salary</th>
            <th>HireDate</th>
        </tr>
        <?php
        $connection = mysqli_connect("localhost:3308", "root", "", "Vahini");

        if (!$connection) {
            die("Error: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM Employee ORDER BY HireDate DESC";

        $stmt = mysqli_query($connection, $query);

        if (!$stmt) {
            die("Error in SQL query: " . mysqli_error($connection));
        }

        if (mysqli_num_rows($stmt) > 0) {
            while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['EmployeeID'] . '</td>';
                echo '<td>' . $row['CompanyID'] . '</td>';
                echo '<td>' . $row['FirstName'] . '</td>';
                echo '<td>' . $row['LastName'] . '</td>';
                echo '<td>' . $row['Department'] . '</td>';
                echo '<td>' . $row['Position'] . '</td>';
                echo '<td>' . $row['Salary'] . '</td>';
                echo '<td>' . $row['HireDate'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="8">No data found.</td></tr>';
        }

        mysqli_close($connection);
        ?>
    </table>
</body>
</html>
