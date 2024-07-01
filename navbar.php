<?php
include 'Configuration/config.php';

$message = ""; // Initialize an empty message variable

if (isset($_POST['btnsave'])) {
	// Retrieve form data
	$record_id = $_POST['record_id'];
	$namecustomer = $_POST['namecustomer'];
	$phone_number = $_POST['PhoneNumber'];
	$quantity = $_POST['Quantity'];
	$price = $_POST['Price'];
	$order_product = $_POST['OrderProduct'];
	$location = $_POST['Location'];
	$order_date = $_POST['OrderDate'];
	$take_date = $_POST['TakeDate'];
	$payment_status = $_POST['Payment'];
	$sell_status = $_POST['Sell'];
	$delivery_details = $_POST['Delivery'];

	if (!empty($record_id)) {
		// Update existing record
		$stmt = $conn->prepare("UPDATE customer_orders SET name_customer=?, phone_number=?, quantity=?, price=?, order_product=?, location=?, order_date=?, take_date=?, payment_status=?, sell_status=?, delivery_details=? WHERE id=?");
		$stmt->bind_param("ssissssssssi", $namecustomer, $phone_number, $quantity, $price, $order_product, $location,
			$order_date, $take_date, $payment_status, $sell_status, $delivery_details, $record_id);
	} else {
		// Insert new record
		$stmt = $conn->prepare("INSERT INTO customer_orders (name_customer, phone_number, quantity, price, order_product, location, order_date, take_date, payment_status, sell_status, delivery_details) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssissssssss", $namecustomer, $phone_number, $quantity, $price, $order_product, $location,
			$order_date, $take_date, $payment_status, $sell_status, $delivery_details);
	}

	if ($stmt->execute()) {
		// Set success message
		$message = '<div class="alert alert-success" role="alert">អ្នកបានបញ្ចូលជោជ័យ</div>';
		// Redirect back to navbar.php
		header("Location: navbar.php");
		exit();
	} else {
		// Set error message
		$message = '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
	}
	$stmt->close();
}
// Remaining PHP code for delete, edit, and display table goes here
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "DELETE FROM customer_orders WHERE id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $id);

	if ($stmt->execute()) {
		// Delete success message
		$message = '<div class="alert alert-success" role="alert">បានលុបប្រភេទទិន្នន័យដោយជោគជ័យ</div>';
	} else {
		// Set error message
		$message = '<div class="alert alert-danger" role="alert">មានបញ្ហាក្នុងការលុប: ' . $stmt->error . '</div>';
	}
	$stmt->close();
}
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	// Retrieve the record's data
	$sql = "SELECT * FROM customer_orders WHERE id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$record = $result->fetch_assoc();
	$stmt->close();
}
$fruits = [];
$sql = "SELECT fruit_name FROM fruit";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$fruits[] = $row['fruit_name'];
	}
}
$locations = [];
$sql = "SELECT location_name FROM location";
$resultlocation = $conn->query($sql);
if ($resultlocation->num_rows > 0) {
	while ($row = $resultlocation->fetch_assoc()) {
		$locations[] = $row['location_name'];
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Order</title>
    <link rel="shortcut icon" href="images/ppiImage.png">
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy&display=swap" rel="stylesheet">
	<?php include_once('link-css.php'); ?>
    <style>
        body, input, select, label, button {
            font-family: 'Kantumruy', sans-serif;
        }

        /* Custom styling for better spacing and appearance */
        .form-group {
            margin-bottom: 1.5rem; /* Adjust spacing between form groups */
        }

        .form-label {
            font-weight: bold;
            color: #198754; /* Green color for labels */
            font-size: 1.2rem;
        }

        .form-control {
            font-size: 1rem;
            border-radius: 0.5rem; /* Rounded corners for form inputs */
        }

        .btn-primary {
            background-color: #0d6efd; /* Blue background color for buttons */
            border-color: #0d6efd;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: #0b5ed7; /* Darker blue on hover */
            border-color: #0b5ed7;
        }

        /* Responsive table and smaller text */
        .table-custom {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529; /* Dark text color */
            font-size: 0.9rem; /* Smaller font size */
        }

        .table-custom th,
        .table-custom td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6; /* Lighter border color */
        }

        .table-custom thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6; /* Lighter border color for header */
        }

        .table-custom tbody + tbody {
            border-top: 2px solid #dee2e6; /* Lighter border color between rows */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row p-3">
        <div class="col"></div>
        <div class="col-sm-10 bg-primary text-center p-3">
            <div class="text-white fs-4">បញ្ចូលការកម្មង់</div>
        </div>
        <div class="col"></div>
    </div>
    <div class="row p-2">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 rounded-4 p-3 border">
            <div class="alert  text-center" role="alert">
				<?php echo $message; ?>
            </div>

            <form class="row" method="POST">

                <input type="hidden" name="record_id" value="<?php echo isset($record['id']) ? $record['id'] : ''; ?>">
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="namecustomer">ឈ្មោះអតិថិជន:</label>
                    <input type="text" name="namecustomer" id="namecustomer" class="form-control" required
                           value="<?php echo isset($record['name_customer']) ? $record['name_customer'] : ''; ?>">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="PhoneNumber">លេខទូរស័ព្ទ:</label>
                    <input type="number" name="PhoneNumber" id="PhoneNumber" class="form-control" required
                           value="<?php echo isset($record['phone_number']) ? $record['phone_number'] : ''; ?>">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Quantity">បរិមាណ:</label>
                    <input type="number" name="Quantity" id="Quantity" class="form-control" required
                           value="<?php echo isset($record['quantity']) ? $record['quantity'] : ''; ?>">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Price">តម្លៃ:</label>
                    <input type="number" name="Price" id="Price" class="form-control" required
                           value="<?php echo isset($record['price']) ? $record['price'] : ''; ?>">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="OrderProduct">ផលិតផលកុម្មង់:</label>
                    <select id="OrderProduct" name="OrderProduct" class="form-select form-control" required>
						<?php foreach ($fruits as $fruit): ?>
                            <option value="<?php echo $fruit; ?>" <?php echo (isset($record['order_product']) && $record['order_product'] == $fruit) ? 'selected' : ''; ?>><?php echo $fruit; ?></option>
						<?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Location">ទីតាំង:</label>
                    <select id="Location" name="Location" class="form-select form-control" required>
						<?php foreach ($locations as $location): ?>
                            <option value="<?php echo $location; ?>" <?php echo (isset($record['location']) && $record['location'] == $location) ? 'selected' : ''; ?>><?php echo $location; ?></option>
						<?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="OrderDate">កាលបរិច្ឆេទបញ្ជា:</label>
                    <input type="date" name="OrderDate" id="OrderDate" class="form-control" required
                           value="<?php echo isset($record['order_date']) ? $record['order_date'] : date('Y-m-d'); ?>">
                </div>

                <div class="col-sm-6 form-group">
                    <label class="form-label" for="TakeDate">កាលបរិច្ឆេទទទួល:</label>
                    <input type="date" name="TakeDate" id="TakeDate" class="form-control" required
                           value="<?php echo isset($record['take_date']) ? $record['take_date'] : date('Y-m-d'); ?>">
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Payment">ស្ថានភាពបង់ប្រាក់:</label>
                    <select id="Payment" name="Payment" class="form-select form-control" required>
                        <option value="Not Paid" <?php echo (isset($record['payment_status']) && $record['payment_status'] == 'Not Paid') ? 'selected' : ''; ?>>
                            Not Paid
                        </option>
                        <option value="Paid" <?php echo (isset($record['payment_status']) && $record['payment_status'] == 'Paid') ? 'selected' : ''; ?>>
                            Paid
                        </option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Sell">ស្ថានភាពលក់:</label>
                    <select id="Sell" name="Sell" class="form-select form-control" required>
                        <option value="In Order" <?php echo (isset($record['sell_status']) && $record['sell_status'] == 'In Order') ? 'selected' : ''; ?>>
                            In Order
                        </option>
                        <option value="Sold Out" <?php echo (isset($record['sell_status']) && $record['sell_status'] == 'Sold Out') ? 'selected' : ''; ?>>
                            Sold Out
                        </option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Delivery">ការដឹកជញ្ជូន:</label>
                    <input type="text" name="Delivery" id="Delivery" class="form-control" required
                           pattern="[0-9]+" title="ត្រូវតែជាលេខ"
                           value="<?php echo isset($record['delivery_details']) ? $record['delivery_details'] : ''; ?>">
                </div>

                <div class="col-12 mt-3 p-2 justify-content-md-start">
                    <button type="submit" name="btnsave" id="btnsave" class="btn  btn-primary mt-3 mb-3">រក្សាទុក
                    </button>
                    <button type="reset" name="btnreset" value="Clear" id="btnreset" class="btn btn-danger mt-3 mb-3">
                        សម្អាត
                    </button>
                </div>
            </form>
        </div>
    </div>
	<?php
	// SQL query to retrieve all records from customer_orders table
	$sql = "SELECT *, (quantity * price + delivery_details) AS Total_money FROM customer_orders";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<div id="table" class="container card ft p-2  fs-5 table text-left table-hover">';
		echo '<table class="table  w-100">';

		// Table header (thead)
		echo '<thead>';

		echo '</thead>';

		// Table body (tbody)
		echo '<tbody>';
		while ($row = $result->fetch_assoc()) {
			$id = $row['id'];
			$orderdate = $row['order_date'];
			$takedate = $row['take_date'];
			$customername = $row['name_customer'];
			$phonenumber = $row['phone_number'];
			$productname = $row['order_product'];
			$quantity = $row['quantity'];
			$price = $row['price'];
			$delivery = $row['delivery_details'];
			$totalprice = $row['Total_money'];
			$payment = $row['payment_status'];
			$sell = $row['sell_status'];
			$location = $row['location'];

			// Table row (tr) for each order
			echo '<tr class="">';
			echo '<td class="text-left text-success ">' .'Order Date'. $orderdate . '</td>';
			echo '<td class="text-left text-success">' .'TakeDate'. $takedate . '</td>';
			echo '<td>
                <a class="btn btn-danger" href="?delete=' . $id . '">Delete</a>
                <a class="btn btn-warning" href="?edit=' . $id . '">Edit</a>
                </td>';
			echo '<td></td>'; // Empty column for spacing or additional actions
			echo '</tr>';

			// Additional rows for customer details, product information, etc.
			echo '<tr>';
			echo '<td class="text-left">Customer\'s Name: ' . $customername . '</td>';
			echo '<td class="text-left">Phone Number: ' . $phonenumber . '</td>';
			echo '<td class="text-left">Product\'s Name: ' . $productname . '</td>';
			echo '<td></td>'; // Empty column for spacing or additional actions
			echo '</tr>';

			echo '<tr>';
			echo '<td>Quantity: ' . $quantity . ' Kg</td>';
			echo '<td>Price: ' . $price . ' Riel</td>';
			echo '<td>Delivery: ' . $delivery . ' Riel</td>';
			echo '<td></td>'; // Empty column for spacing or additional actions
			echo '</tr>';

			echo '<tr>';
			echo '<td style="color:red">Total Price: ' . $totalprice . ' Riel</td>';
			echo '<td style="color:red">Payment: ' . $payment . '</td>';
			echo '<td style="color:red">Sell: ' . $sell . '</td>';
			echo '<td></td>'; // Empty column for spacing or additional actions
			echo '</tr>';

			echo '<tr>';
			echo '<td>Location: ' . $location . '</td>';
			echo '<td></td>'; // Empty column for spacing or additional actions
			echo '<td></td>'; // Empty column for spacing or additional actions
			echo '<td></td>'; // Empty column for spacing or additional actions
			echo '</tr>';
		}
		echo '</tbody>';

		echo '</table>';
		echo '</div>'; // End of table container
	} else {
		echo '<p class="text-center text-success">មិនមានការកម្មង់ទេ</p>'; // No orders found message
	}

	$conn->close();
	?>



</div>
<?php include_once('link-js.php'); ?>
</body>
</html>

<script>

</script>