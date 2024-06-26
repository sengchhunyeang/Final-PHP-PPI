
      <form>
          <input type="text" class="form-control p-3">
          <div class="row">
            <div class="col-lg-6 mt-2">
              <label for="cName" class="text-success mb-2"><span>Customer Name : </span></label>
              <input type="text" class="form-control p-3" placeholder="Customer Name">
            </div>
            <div class="col-lg-6 mt-2">
              <label for="cName" class="text-success mb-2"><span>Phone Number :</span></label>
              <input type="text" class="form-control p-3" placeholder="Phone Number">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mt-2">
              <label for="quantity" class="text-success mb-2"><span>Quantity : </span></label>
              <input type="number" class="form-control p-3" placeholder="Quantity">
            </div>
            <div class="col-lg-6 mt-2">
              <label for="price" class="text-success mb-2"><span>Price :</span></label>
              <input type="number" class="form-control p-3" placeholder="Price">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mt-2 ">
              <label for="OrderProduct" class=" text-success mb-2"><span>Order Products : </span></label>
              <select class="form-select form-select-lg form-control p-3">
                <option value="">ផ្លែមៀន</option>
                <option value="">ផ្លែទទឹម</option>
                <option value="">ផ្លែក្រូច</option>
                <option value="">ផ្លែម្នាស់</option>
                <option value="">ផ្លែប៉ោម</option>
              </select>
            </div>
            <div class="col-lg-6 mt-2">
              <label for="location" class="text-success mb-2"><span>Location :</span></label>
              <input type="text" class="form-control p-3" placeholder="Location">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mt-2">
              <label for="orderDate" class="text-success mb-2"><span>Order Date : </span></label>
              <input type="date" class="form-control p-3" placeholder="Location">
            </div>
            <div class="col-lg-6 mt-2">
              <label for="tDate" class="text-success mb-2"><span>Take Date :</span></label>
              <input type="date" class="form-control p-3" placeholder="Location">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mt-2">
              <label for="payment" class="text-success mb-2"><span>Payment : </span></label>
              <select class="form-control p-3" style="font-family: 'Poppins';">
                <option value="">NoPaid</option>
                <option value="">Paid</option>
              </select>
            </div>
            <div class="col-lg-6 mt-2">
              <label for="sell" class="text-success mb-2"><span>Sell :</span></label>
              <select class="form-control p-3">
                <option value="">In Order</option>
                <option value="">Sold Out</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mt-2">
              <label for="delivery" class="text-success mb-2"><span>Delivery : </span></label>
              <input type="text" class="form-control p-3" placeholder="Delivery">
            </div>
            <div class="col-lg-6 mt-2">
            </div>
          </div>
          <button type="submit" class="btn btn-lg btn-primary mt-3">Save</button>
          <button type="submit" class="btn btn-lg btn-danger mt-3">Back</button>
        </form>
