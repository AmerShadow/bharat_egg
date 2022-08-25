 
 <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('cust_add')}}" method="POST">
              @csrf
              {{$errors}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Mobileno</label>

                  <div class="col-sm-10">
                    <input type="text" name="mobileno" class="form-control" id="mobileno" placeholder="Mobileno">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="shop_name" class="col-sm-2 control-label">Shop Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="shop_name" class="form-control" id="shop_name" placeholder="Shop Name">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Category Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('cate_add')}}" method="POST">
              @csrf
              {{$errors}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                  </div>
                </div>
                <div class="form-group">
                  <label for="count" class="col-sm-2 control-label">Count</label>

                  <div class="col-sm-10">
                    <input type="text" name="count" class="form-control" id="count" placeholder="Count">
                  </div>
                </div>
                <div class="form-group">
                  <label for="quality" class="col-sm-2 control-label">Quality</label>

                  <div class="col-sm-10">
                    <input type="text" name="quality" class="form-control" id="quality" placeholder="Quality">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
           <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Inventory Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('inv_add')}}" method="POST">
              @csrf
              {{$errors}}
              <div class="box-body">
                <div class="form-group">
                  <label for="fruit_name" class="col-sm-2 control-label">Fruit Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="fruit_name" class="form-control" id="fruit_name" placeholder="Fruit Name">
                  </div>
                </div>
                <div class="form-group">
                <label>Select Category</label>
                <select name="cate_id" class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
                <div class="form-group">
                  <label for="quantity" class="col-sm-2 control-label">Quantity</label>

                  <div class="col-sm-10">
                    <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="p_price" class="col-sm-2 control-label">Purchase Price</label>

                  <div class="col-sm-10">
                    <input type="text" name="p_price" class="form-control" id="p_price" placeholder="Purchase Price">
                  </div>
                </div>
                <div class="form-group">
                  <label for="seller" class="col-sm-2 control-label">Seller</label>

                  <div class="col-sm-10">
                    <input type="text" name="seller" class="form-control" id="seller" placeholder="Seller">
                  </div>
                </div>
                <div class="form-group">
                  <label for="p_a" class="col-sm-2 control-label">Level A</label>

                  <div class="col-sm-10">
                    <input type="text" name="p_a" class="form-control" id="p_a" placeholder="Level A">
                  </div>
                </div>
                <div class="form-group">
                  <label for="p_b" class="col-sm-2 control-label">Level B</label>

                  <div class="col-sm-10">
                    <input type="text" name="p_b" class="form-control" id="p_b" placeholder="Level B">
                  </div>
                </div>
                <div class="form-group">
                  <label for="p_c" class="col-sm-2 control-label">Level C</label>

                  <div class="col-sm-10">
                    <input type="text" name="p_c" class="form-control" id="p_c" placeholder="Level C">
                  </div>
                </div>
                <div class="form-group">
                  <label for="end_limit" class="col-sm-2 control-label">End Limit</label>

                  <div class="col-sm-10">
                    <input type="text" name="end_limit" class="form-control" id="end_limit" placeholder="End Limit">
                  </div>
                </div>
                <div class="form-group">
                <label>Purchase Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="p_date" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label for="expense" class="col-sm-2 control-label">Expense</label>

                  <div class="col-sm-10">
                    <input type="text" name="expense" class="form-control" id="expense" placeholder="Expense">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('credit')}}" method="POST">
              @csrf
              {{$errors}}
              <div class="box-body">
                 <div class="form-group">
                <label>Customer</label>
                <select name="cust_id" class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
                 <div class="form-group">
                <label>Inventory</label>
                <select name="inv_id" class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
                <div class="form-group">
                  <label for="quantity" class="col-sm-2 control-label">Quantity</label>

                  <div class="col-sm-10">
                    <input type="text" name="quantity" class="form-control" id="quantity" placeholder="quantity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Discount</label>

                  <div class="col-sm-10">
                    <input type="text" name="discount" class="form-control" id="discount" placeholder="Discount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="amount" class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="total" class="col-sm-2 control-label">Total</label>

                  <div class="col-sm-10">
                    <input type="text" name="total" class="form-control" id="total" placeholder="Total">
                  </div>
                </div>
                <div class="form-group">
                  <label for="debit" class="col-sm-2 control-label">Debit</label>

                  <div class="col-sm-10">
                    <input type="text" name="debit" class="form-control" id="debit" placeholder="Debit">
                  </div>
                </div>
                <div class="form-group">
                  <label for="credit" class="col-sm-2 control-label">Credit</label>

                  <div class="col-sm-10">
                    <input type="text" name="credit" class="form-control" id="credit" placeholder="Credit">
                  </div>
                </div>
                <div class="form-group">
                  <label for="closing_credit" class="col-sm-2 control-label">Closing Credit</label>

                  <div class="col-sm-10">
                    <input type="text" name="closing_credit" class="form-control" id="closing_credit" placeholder="Closing Credit">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('sell')}}" method="POST">
              @csrf
              {{$errors}}
              <div class="box-body">
                 <div class="form-group">
                <label>Customer</label>
                <select name="cust_id" class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
                 <div class="form-group">
                <label>Inventory</label>
                <select name="inv_id" class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
                <div class="form-group">
                  <label for="quantity" class="col-sm-2 control-label">Quantity</label>

                  <div class="col-sm-10">
                    <input type="text" name="quantity" class="form-control" id="quantity" placeholder="quantity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Discount</label>

                  <div class="col-sm-10">
                    <input type="text" name="discount" class="form-control" id="discount" placeholder="Discount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="amount" class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="total" class="col-sm-2 control-label">Total</label>

                  <div class="col-sm-10">
                    <input type="text" name="total" class="form-control" id="total" placeholder="Total">
                  </div>
                </div>
                <div class="form-group">
                  <label for="pay_type" class="col-sm-2 control-label">Payment Type</label>

                  <div class="col-sm-10">
                    <input type="text" name="pay_type" class="form-control" id="pay_type" placeholder="Payment Type">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
