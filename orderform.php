<?php include "header.php" ?>
<style>
    form {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color:white;
    }
    h2{text-align: center; padding-top:20px;}
    div {margin-bottom: 15px;}
    input[type="text"] {
        border: none;
        border-bottom: 1px solid #ccc;
        padding: 10px;
        width: 100%;
    }
    label {
        display: inline-block;
        margin-right: 10px;
    }
    input[type="radio"] {
        margin-right: 5px;
        vertical-align: middle;
    }
    input[type="submit"] {
        background-color: #3399FF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
    }
    .container {
        text-align: center;
        margin-top: 50px;
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
    span{font-style: italic;}
</style>
<body>
    <h2>Bistro Mini-Cake Order Form</h2>
    <form method="post">
        <div>
            <label for="id">Order Id:</label>
            <input type="text" id="id" name="id" required placeholder="Order ID">
        </div>
        <div>
            <label for="street_address">Street Address:</label>
            <input type="text" id="street_address" name="street_address" required placeholder="Street Address">
        </div>
        <div>
            <label for="street_address_line2">Street Address Line 2:</label>
            <input type="text" id="street_address_line2" name="street_address_line2" placeholder="Street Address Line 2">
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required placeholder="City">
        </div>
        <div>
            <label for="region">Region:</label>
            <input type="text" id="region" name="region" required placeholder="Region">
        </div>
        <div>
            <label for="postal_code">Postal / Zip Code:</label>
            <input type="text" id="postal_code" name="postal_code" required placeholder="Postal/Zip Code">
        </div>
        <div>
            <label for="table_number">Table number:</label>
            <input type="text" id="table_number" name="table_number" required placeholder="Table Number">
        </div>
        
        <div id="radiodiv">
            <br>
            <label>Best option for you:</label><br><br>
            <label for="wild_berry_cake">Wild Berry Cake</label>
            <input type="radio" id="wild_berry_cake" name="cake_option" value="Wild Berry Cake"><br>
            
            <label for="chocolate_vanilla_caramel_cake">Chocolate, Vanilla and Caramel Cake</label>
            <input type="radio" id="chocolate_vanilla_caramel_cake" name="cake_option" value="Chocolate, Vanilla and Caramel Cake"><br>
            
            <label for="tiramisu">Tiramisu</label>
            <input type="radio" id="tiramisu" name="cake_option" value="Tiramisu"><br>
            
            <label for="carrot_pumpkin_cake">Carrot and Pumpkin Cake</label>
            <input type="radio" id="carrot_pumpkin_cake" name="cake_option" value="Carrot and Pumpkin Cake"><br>
            
            <label for="cheesecake_raspberry">Cheesecake with Raspberry</label>
            <input type="radio" id="cheesecake_raspberry" name="cake_option" value="Cheesecake with Raspberry"><br>
            
            <label for="amandina_cake">Amandina Cake</label>
            <input type="radio" id="amandina_cake" name="cake_option" value="Amandina Cake"><br><br>
            
            <label>Best raw option for you:</label><br><br>
            <label for="wild_berry_cake_raw">Wild Berry Cake – raw</label>
            <input type="radio" id="wild_berry_cake_raw" name="cake_option" value="Wild Berry Cake – raw"><br>
            
            <label for="pear_banana_pineapple_cake_raw">Pear, Banana and Pineapple Cake – raw</label>
            <input type="radio" id="pear_banana_pineapple_cake_raw" name="cake_option" value="Pear, Banana and Pineapple Cake – raw"><br>
            
            <label for="mango_vanilla_cake_raw">Mango & Vanilla Cake – raw</label>
            <input type="radio" id="mango_vanilla_cake_raw" name="cake_option" value="Mango & Vanilla Cake – raw"><br>
            
            <label for="amoraws_cake_raw">Amoraws Cake – raw</label>
            <input type="radio" id="amoraws_cake_raw" name="cake_option" value="Amoraws Cake – raw"><br>
            
            <label for="chocolate_cake_raw">Chocolate Cake – raw</label>
            <input type="radio" id="chocolate_cake_raw" name="cake_option" value="Chocolate Cake – raw"><br>

            <label for="cocoa_mint_cake_raw">Cocoa and Mint Cake – raw</label>
            <input type="radio" id="cocoa_mint_cake_raw" name="cake_option" value="Cocoa and Mint Cake – raw"><br>
        </div>
        <div>
            <label for="phone_number">Phone number:</label><br>
            <span>E.g: 1111111111</span>
            <input type="text" id="phone_number" name="phone_number" pattern="[0-9]{10}" placeholder="Phone Number" required>
        </div>
        <div><input type="submit" value="Submit Order"></div>
    </form>
    <div class="container text-center mt-5">
        <a href="home.php" class="btn"> Back </a>
    </div>
    <?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["street_address"])) {
        $errors[] = "Street Address is required";
    }

    if (empty($_POST["city"])) {
        $errors[] = "City is required";
    }

    if (empty($_POST["region"])) {
        $errors[] = "Region is required";
    }

    if (empty($_POST["postal_code"])) {
        $errors[] = "Postal / Zip Code is required";
    }
    if (empty($_POST["table_number"])) {
        $errors[] = "Table Number is required";
    }

    if (empty($_POST["phone_number"])) {
        $errors[] = "Phone number is required";
    } elseif (!preg_match("/^[0-9]{10}$/", $_POST["phone_number"])) {
        $errors[] = "Invalid phone number format. Please enter a 10-digit number.";
    }

    if (empty($errors)) {
        $host = 'localhost:3310';
        $student_id = 'id';
        $username = 'root';
        $password = '';
        $database = 'ordermanagement';
        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = $conn->prepare("INSERT INTO orders (id, address, city, region, postal_code, phone_number, cake_option, table_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $id, $address, $city, $region, $postal_code, $phone_number, $cake_option, $table_number);

        $id = $_POST["id"];
        $address = $_POST["street_address"];
        $city = $_POST["city"];
        $region = $_POST["region"];
        $postal_code = $_POST["postal_code"];
        $phone_number = $_POST["phone_number"];
        $cake_option = $_POST["cake_option"];
        $table_number = $_POST["table_number"];

        if ($stmt->execute()) {
            echo "Order processed successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    } else {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    }
}
?>
<?php include "footer.php" ?>