@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Register new equipment</div>

                <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

  <!-- Inline CSS based on choices in "Settings" tab -->
  <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

  <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
  <div class="bootstrap-iso">
   <div class="container-fluid">
    <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
       <br>

          <h4 class="text-center"><b>Send request</b></h4>
          <h6 class="text-center">Add new medical device</h6>

      <form method="post">
       <div class="form-group ">
        <label class="control-label requiredField" for="companyName">
         Company Name
         <span class="asteriskField">
          *
         </span>
        </label>
        <input class="form-control" id="companyName" name="companyName" type="text"/>
       </div>
       <div class="form-group ">
        <label class="control-label requiredField" for="equipmentName">
         Equipment Name
         <span class="asteriskField">
          *
         </span>
        </label>
        <input class="form-control" id="equipmentName" name="equipmentName" type="text"/>
       </div>
       <div class="form-group ">
        <label class="control-label requiredField" for="select">
         Equipment Type
         <span class="asteriskField">
          *
         </span>
        </label>
        <select class="select form-control" id="select" name="select">
         <option value="Equipment Type 1">
          Equipment Type 1
         </option>
         <option value="Equipment Type 2">
          Equipment Type 2
         </option>
         <option value="Equipment Type 3">
          Equipment Type 3
         </option>
        </select>
       </div>
       <div class="form-group ">
        <label class="control-label " for="message">
         Description
        </label>
        <textarea class="form-control" cols="40" id="message" name="message" rows="10"></textarea>
       </div>
       <div class="form-group">
        <div>
         <button class="btn btn-primary " name="submit" type="submit">
          Send request
         </button>
        </div>
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
            </div>
        </div>
    </div>
</div>
@endsection
