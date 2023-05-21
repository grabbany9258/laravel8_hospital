<!DOCTYPE html>
<html lang="en">

<head>

  <style>
    label {
      display: inline-block;
      text-align: left;
      width: 200px;
    }
  </style>

  @include('admin.css')
</head>

<body>
  <div class="container-scroller">

    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <div class="container" align="center" style="padding-top:50px ">

        {{-- Showing Message --}}
        @if (session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show" id="alert">

            <strong> {{ session()->get('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert">X</button>

          </div>
        @endif

        <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">

          @csrf

          <h1 class="mb-3 bg-primary">Email Send</h1>

          <div style="padding: 15px">
            <label for="greeting">Greeting</label>
            <input type="text" style="color:black" name="greeting" required="">
          </div>

          <div style="padding: 15px">
            <label for="Body">Body</label>
            <input type="number" style="color:black" name="body" required="">
          </div>



          <div style="padding: 15px">
            <label for="action text">Action Text</label>
            <input type="text" style="color:black" name="actiontext" required="">
          </div>

          <div style="padding: 15px">
            <label for="action url">Action Url</label>
            <input type="text" style="color:black" name="actionurl" required="">
          </div>

          <div style="padding: 15px">
            <label for="End Part">End Part</label>
            <input type="text" style="color:black" name="endpart" required="">
          </div>



          <div style="padding: 15px">

            <input type="submit" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  @include('admin.script')

  {{-- Script for removing Succesful Flash message automatically --}}

  <script>
    $('document').ready(function() {
      setTimeout(function() {
        $('div.alert').remove()
      }, 2000);
    })
  </script>
</body>

</html>
