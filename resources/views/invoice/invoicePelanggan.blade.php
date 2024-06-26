@extends('layouts.main')
@section('content')
<style>
    .order-form .container {
      color: #4c4c4c;
      padding: 20px;
      box-shadow: 0 0 10px 0 rgba(0, 0, 0, .1);
      max-width: 650px;
    }

    .order-form-label {
      margin: 8px 0 0 0;
      font-size: 14px;
      font-weight: bold;
    }

.order-form-input,
.form-label,
.form-check-label {
      font-family: 'Open Sans', sans-serif;
      font-size: 14px;

    }

    .btn-submit:hover {
      background-color: #0D47A1 !important;
    }
</style>
<section class="order-form">
  <div class="container ">
      <div class="row">
          <div class="col-12 px-4">
              <h1>You can see my Order Form</h1>
              <span>with some explanation below</span>
              <hr class="mt-1" />
          </div>

          <div class="col-12">
              <div class="row mx-4">
                  <div class="col-12">
                      <label class="order-form-label">Name</label>
                  </div>
                  <div class="col-sm-6">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form1" class="form-control order-form-input" />
                          <label class="form-label" for="form1">First</label>
                      </div>
                  </div>
                  <div class="col-sm-6 mt-2 mt-sm-0">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form2" class="form-control order-form-input" />
                          <label class="form-label" for="form2">Last</label>
                      </div>
                  </div>
              </div>

              <div class="row mt-3 mx-4">
                  <div class="col-12">
                      <label class="order-form-label">Type of thing you want to order</label>
                  </div>
                  <div class="col-12">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form3" class="form-control order-form-input" />
                      </div>
                  </div>
              </div>

              <div class="row mt-3 mx-4">
                  <div class="col-12">
                      <label class="order-form-label">Another type of thing you want to order</label>
                  </div>
                  <div class="col-12">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form4" class="form-control order-form-input" />
                      </div>
                  </div>
              </div>

              <div class="row mt-3 mx-4">
                  <div class="col-12">
                      <label class="order-form-label" for="date-picker-example">Date</label>
                  </div>
                  <div class="col-12">
                      <div data-mdb-input-init class="form-outline datepicker" data-mdb-toggle-button="false">
                          <input
                          type="text" class="form-control order-form-input" id="datepicker1" data-mdb-toggle="datepicker" />
                          <label for="datepicker1" class="form-label">Select a date</label>
                      </div>
                  </div>
              </div>

              <div class="row mt-3 mx-4">
                  <div class="col-12">
                      <label class="order-form-label">Adress</label>
                  </div>
                  <div class="col-12">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form5" class="form-control order-form-input" />
                          <label class="form-label" for="form5">Street Address</label>
                      </div>
                  </div>
                  <div class="col-12 mt-2">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form6" class="form-control order-form-input" />
                          <label class="form-label" for="form6">Street Address Line 2</label>
                      </div>
                  </div>
                  <div class="col-sm-6 mt-2 pe-sm-2">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form7" class="form-control order-form-input" />
                          <label class="form-label" for="form7">City</label>
                      </div>
                  </div>
                  <div class="col-sm-6 mt-2 ps-sm-0">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form8" class="form-control order-form-input" />
                          <label class="form-label" for="form8">Region</label>
                      </div>
                  </div>
                  <div class="col-sm-6 mt-2 pe-sm-2">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form9" class="form-control order-form-input" />
                          <label class="form-label" for="form9">Postal / Zip Code</label>
                      </div>
                  </div>
                  <div class="col-sm-6 mt-2 ps-sm-0">
                      <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form10" class="form-control order-form-input" />
                          <label class="form-label" for="form10">Country</label>
                      </div>
                  </div>
              </div>

              <div class="row mt-3 mx-4">
                  <div class="col-12">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                          <label class="form-check-label" for="flexCheckDefault">I know what I need to know</label>
                      </div>
                  </div>
              </div>

              <div class="row mt-3">
                  <div class="col-12">
                      <button  type="button" data-mdb-button-init id="btnSubmit" data-mdb-ripple-init class="btn btn-primary d-block mx-auto btn-submit">Submit</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection