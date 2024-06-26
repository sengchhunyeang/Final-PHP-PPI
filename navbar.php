<?php
include 'Configuration/config.php';

$message = ""; // Initialize an empty message variable

if (isset($_POST['btnsave'])) {
	// Retrieve form data
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

	// SQL query to insert data into customer_orders table
	$sql = "INSERT INTO customer_orders (name_customer, phone_number, quantity, price, order_product, location, order_date, take_date, payment_status, sell_status, delivery_details) 
            VALUES ('$namecustomer', '$phone_number', '$quantity', '$price', '$order_product', '$location', '$order_date', '$take_date', '$payment_status', '$sell_status', '$delivery_details')";

	if ($conn->query($sql) === true) {
		// Set success message
		$message = '<div class="alert alert-success" role="alert">New record created successfully</div>';

		// Redirect to prevent form resubmission on page refresh
		header("Location: ".$_SERVER['PHP_SELF']);
		exit();
	} else {
		// Set error message
		$message = '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . $conn->error . '</div>';
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
			<?php echo $message; ?> <!-- Display success/error message -->
            <form class="row" method="POST">
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="namecustomer">ឈ្មោះអតិថិជន:</label>
                    <input type="text" name="namecustomer" id="namecustomer" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="PhoneNumber">លេខទូរស័ព្ទ:</label>
                    <input type="number" name="PhoneNumber" id="PhoneNumber" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Quantity">បរិមាណ:</label>
                    <input type="number" name="Quantity" id="Quantity" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Price">តម្លៃ:</label>
                    <input type="number" name="Price" id="Price" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="OrderProduct">ផលិតផលកុម្មង់:</label>
                    <select id="OrderProduct" name="OrderProduct" class="form-select form-control" required>
                        <option value="ផ្លែមៀន">ផ្លែមៀន</option>
                        <option value="ផ្លែទទឹម">ផ្លែទទឹម</option>
                        <option value="ផ្លែក្រូច">ផ្លែក្រូច</option>
                        <option value="ផ្លែម្នាស់">ផ្លែម្នាស់</option>
                        <option value="ផ្លែប៉ោម">ផ្លែប៉ោម</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Location">ទីតាំង:</label>
                    <input type="text" name="Location" id="Location" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="OrderDate">កាលបរិច្ឆេទបញ្ជា:</label>
                    <input type="date" name="OrderDate" id="OrderDate" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="TakeDate">កាលបរិច្ឆេទទទួល:</label>
                    <input type="date" name="TakeDate" id="TakeDate" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Payment">ស្ថានភាពបង់ប្រាក់:</label>
                    <select id="Payment" name="Payment" class="form-select form-control" required>
                        <option value="Not Paid">មិនទាន់បានបង់ប្រាក់</option>
                        <option value="Paid">បានបង់ប្រាក់</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Sell">ស្ថានភាពលក់:</label>
                    <select id="Sell" name="Sell" class="form-select form-control" required>
                        <option value="In Order">នៅក្នុងការបញ្ជា</option>
                        <option value="Sold Out">បានលក់អស់</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="form-label" for="Delivery">ការដឹកជញ្ជូន:</label>
                    <input type="text" name="Delivery" id="Delivery" class="form-control" required>
                </div>
                <div class="col-12 mt-3 p-2 justify-content-md-start">
                    <button type="submit" name="btnsave" id="btnsave" class="btn  btn-primary mt-3 mb-3">រក្សាទុក
                    </button>
                    <button type="reset" name="btnreset" value="Clear" onclick="hidtable();" id="btnreset"
                            class="btn btn-danger mt-3 mb-3">សម្អាត
                    </button>
                </div>
            </form>

            <!-- Display Table of Orders -->
			<?php
			// SQL query to retrieve all records from customer_orders table
			$sql = "SELECT * FROM customer_orders";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo '<div class="table-responsive">';
				echo '<table class="table table-striped table-hover">';
				echo '<thead class="table-dark">';
				echo '<tr>';
				echo '<th  scope="col">លេខរៀង</th>';
				echo '<th scope="col">ឈ្មោះអតិថិជន</th>';
				echo '<th scope="col">លេខទូរស័ព្ទ</th>';
				echo '<th scope="col">បរិមាណ</th>';
				echo '<th scope="col">តម្លៃ</th>';
				echo '<th scope="col">ផលិតផលកុម្មង់</th>';
				echo '<th scope="col">ទីតាំង</th>';
				echo '<th scope="col">កាលបរិច្ឆេទបញ្ជា</th>';
				echo '<th scope="col">កាលបរិច្ឆេទទទួល</th>';
				echo '<th scope="col">ស្ថានភាពបង់ប្រាក់</th>';
				echo '<th scope="col">ស្ថានភាពលក់</th>';
				echo '<th scope="col">ការដឹកជញ្ជូន</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';

				// Output data of each row
				while ($row = $result->fetch_assoc()) {
					echo '<tr>';
					echo '<td>' . $row['id'] . '</td>';
					echo '<td>' . $row['name_customer'] . '</td>';
					echo '<td>' . $row['phone_number'] . '</td>';
					echo '<td>' . $row['quantity'] . '</td>';
					echo '<td>' . $row['price'] . '</td>';
					echo '<td>' . $row['order_product'] . '</td>';
					echo '<td>' . $row['location'] . '</td>';
					echo '<td>' . $row['order_date'] . '</td>';
					echo '<td>' . $row['take_date'] . '</td>';
					echo '<td>' . $row['payment_status'] . '</td>';
					echo '<td>' . $row['sell_status'] . '</td>';
					echo '<td>' . $row['delivery_details'] . '</td>';
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
				echo '</div>'; // End table-responsive
			} else {
				echo '<p>No records found</p>';
			}

			$conn->close();
			?>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
<?php include_once('link-js.php'); ?>
</body>
</html>

<script>
    function hidtable() {
        var tables = document.getElementById("table");
        tables.style.display = "none";
    }
</script>

