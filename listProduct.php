    <?php
    if(isset($_POST['btnsave'])){
      $orderdate = $_POST['OrderDate'];
      $takedate = $_POST['TakeDate'];
      $customername = $_POST['namecutomer'];
      $phonenumber = $_POST['PhoneNumber'];
      $productname = $_POST['OrderProduct'];
      $quantity = $_POST['Quantity'];
      $price = $_POST['Price'];
      $delivery = $_POST['Delivery'];
      $totalprice = $quantity * $price + $delivery;
      $payment = $_POST['Payment'];
      $sell = $_POST['Sell'];
      $location = $_POST['Location'];
      echo"<div id='table' style='display: block ' class='container card ft p-2 mt-4 fs-5 table text-left table-hover fs-5'>";
          echo"<table class='table table-striped w-100  '>"; 
              echo"<tr >";
                  echo"<td class='text-success text-left '>Order Date: $orderdate</td>
                      <td class='text-success text-left '>Take Date: $takedate</td>
                      <td>
                          <button tpye='reset' id='delete' name='dalete' class='btn btn-danger'>Delete</button>
                          <button tpye='button' id='edit' name='edit' class='btn btn-primary'>Edit</button>
                      </td>
                  ";
              echo"</tr>";
              echo"<tr>";
                  echo"<td class='text-left'>Customer's Name: $customername</td>
                       <td class='text-left'>Phone Number: $phonenumber</td>
                       <td class='text-left ft'>Product's Name: $productname</td>
                  ";
              echo"</tr>";
              echo"<tr>";
                  echo"<td>Quantity:  $quantity Kg</td>
                       <td>Price: $price Riel</td>
                       <td>Delivery: $delivery Riel</td>
                  ";
              echo"</tr>";
              echo"<tr>";
                  echo"<td style='color:red'>Total Price:  $totalprice Riel</td>
                       <td style='color:red'>Payment: $payment </td>
                       <td style='color:red'>Sell: $sell </td>
                  ";
              echo"</tr>";
              echo"<tr>";
                  echo"<td >Location:  $location </td>
                       <td > </td>
                       <td > </td>
                  ";
              echo"</tr>";
          echo"</table>";
      echo"</div>";
         }
      ?>
   
      
      
      
     