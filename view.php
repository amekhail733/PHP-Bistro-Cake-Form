<?php include 'header.php'?>
<style> 
    .table {
        border-spacing: 0 10px;
        width: 100%;
    }
    .table thead th {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: left;
        border-bottom: 2px solid #333;
        text-align: center;
    }
    .table tbody tr {
        background-color: #f9f9f9;
    }
    .table tbody tr:nth-child(even) {
        background-color: #fff;
    }
    .table td {
        text-align: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    .table td:first-child {
        border-left: 1px solid #ddd;
    }
    .table td:last-child {
        border-right: 1px solid #ddd;
    }
    .table tbody tr:hover {
        background-color: #f2f2f2;
        cursor: pointer;
    }
    .table thead th:hover {
        background-color: #444;
        color: #fff;
        cursor: pointer;
    }
    .btn {
        display: inline-block;
        background-color: #3399FF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        text-decoration: none;
        font-size: smaller;
    }
</style>
<h1 class="text-center mt-5"><b>Order Details</b></h1>
<div class="container mt-3">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">Order Number</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Region</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Cake Option</th>
                <th scope="col">Table Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM orders WHERE id = $id";
                $view_order = mysqli_query($conn, $query);
                while($row = $view_order->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>{$row['id']}</th>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['city']}</td>";
                    echo "<td>{$row['region']}</td>";
                    echo "<td>{$row['postal_code']}</td>";
                    echo "<td>{$row['phone_number']}</td>";
                    echo "<td>{$row['cake_option']}</td>";
                    echo "<td>{$row['table_number']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>
<div class="container text-center mt-5">
    <a href="home.php" class="btn">Back to order list</a>
</div>
<?php include "footer.php" ?>