<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Data</title>
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
    <h1>Financial Data</h1>
    <div class="top-right">
        <a href="financial_data.php">Financial Data</a>
        <a href="employee.php">Employee</a>
        <a href="kpi.php">KPI</a>
        <a href="company.php">Company</a>
        <a href="corporate_governance.php">Corporate Governance</a>
    </div>

    <!-- Search Bar -->
    <div>
        <label for="searchInput">Search:</label>
        <input type="text" id="searchInput" placeholder="Search...">
        <label for="columnSelect">Search in:</label>
        <select id="columnSelect">
            <option value="0">FinancialID</option>
            <option value="1">CompanyID</option>
            <option value="2">Year</option>
            <option value="3">Revenue</option>
            <option value="4">Expenses</option>
            <option value="5">NetIncome</option>
            <option value="6">Assets</option>
            <option value="7">Liabilities</option>
            <option value="8">Equity</option>
            <option value="9">OperatingCashFlow</option>
            <option value="10">InvestingCashFlow</option>
            <option value="11">FinancingCashFlow</option>
        </select>
        <button onclick="searchTable()">Search</button>
    </div>

    <table id="financialDataTable">
        <tr>
            <th>FinancialID</th>
            <th>CompanyID</th>
            <th>Year</th>
            <th>Revenue</th>
            <th>Expenses</th>
            <th>NetIncome</th>
            <th>Assets</th>
            <th>Liabilities</th>
            <th>Equity</th>
            <th>OperatingCashFlow</th>
            <th>InvestingCashFlow</th>
            <th>FinancingCashFlow</th>
        </tr>
        <?php
        $connection = mysqli_connect("localhost:3308", "root", "", "Vahini");

        if (!$connection) {
            die("Error: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM FinancialData ORDER BY Year DESC";

        $stmt = mysqli_query($connection, $query);

        if (!$stmt) {
            die("Error in SQL query: " . mysqli_error($connection));
        }

        if (mysqli_num_rows($stmt) > 0) {
            while ($row = mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['FinancialID'] . '</td>';
                echo '<td>' . $row['CompanyID'] . '</td>';
                echo '<td>' . $row['Year'] . '</td>';
                echo '<td>' . $row['Revenue'] . '</td>';
                echo '<td>' . $row['Expenses'] . '</td>';
                echo '<td>' . $row['NetIncome'] . '</td>';
                echo '<td>' . $row['Assets'] . '</td>';
                echo '<td>' . $row['Liabilities'] . '</td>';
                echo '<td>' . $row['Equity'] . '</td>';
                echo '<td>' . $row['OperatingCashFlow'] . '</td>';
                echo '<td>' . $row['InvestingCashFlow'] . '</td>';
                echo '<td>' . $row['FinancingCashFlow'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="12">No data found.</td></tr>';
        }

        mysqli_close($connection);
        ?>
    </table>

    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue, found;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("financialDataTable");
            var columnIndex = document.getElementById("columnSelect").value;
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[columnIndex];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
