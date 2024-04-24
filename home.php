<?php include "header.php" ?>
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
        font-weight: bold;
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
<div class="container mt-5">
    <h1 class="text-center"><b>Orders List</b></h1>
    <a href="orderform.php" class="btn btn-outline-dark mb-2">Place an Order</a>
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
                <th scope="col">Table Option</th>
                <th scope="col" colspan="3" class="text-center">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM orders";
                $view_orders = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($view_orders)) {
                    $id = $row['id'];
                    $address = $row['address'];
                    $city = $row['city'];
                    $region = $row['region'];
                    $postal_code = $row['postal_code'];
                    $phone_number = $row['phone_number'];
                    $cake_option = $row['cake_option'];
                    $table_number = $row['table_number'];
                    echo "<tr>";
                    echo "<th scope='row'>{$id}</th>";
                    echo "<td>{$address}</td>";
                    echo "<td>{$city}</td>";
                    echo "<td>{$region}</td>";
                    echo "<td>{$postal_code}</td>";
                    echo "<td>{$phone_number}</td>";
                    echo "<td>{$cake_option}</td>";
                    echo "<td>{$table_number}</td>";
                    echo "<td class='text-center'>
                            <a href='view.php?&id={$id}' class='btn btn-primary'>
                                <i class='bi bi-eye'></i> View 
                            </a>
                    </td>";
                    echo "<td class='text-center'>
                            <a href='delete.php?&delete&id={$id}' class='btn btn-danger'>
                                <i class='bi bi-trash'></i> Delete
                            </a>
                        </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
<?php include "footer.php"?>