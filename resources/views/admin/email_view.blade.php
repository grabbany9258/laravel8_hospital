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

        <form action="{{ url('sendemail', $data->id) }}" method="POST">

          @csrf

          <h1 class="mb-3 bg-primary">Email Send to User</h1>

          <div style="padding: 15px">
            <label for="greeting">Greeting</label>
            <input type="text" style="color:black" name="greeting" required="" placeholder="Write a Greeting.. ">
          </div>

          <div style="padding: 15px">
            <label for="Body">Body</label>
            <input type="text" style="color:black" name="body" required="" placeholder="Write Some Message">
          </div>



          <div style="padding: 15px">
            <label for="action text">Action Text</label>
            <input type="text" style="color:black" name="actiontext" required=""
              placeholder="Write Text For Click">
          </div>

          <div style="padding: 15px">
            <label for="action url">Action Url</label>
            <input type="text" style="color:black" name="actionurl" required="" placeholder="Write Your Link">
          </div>

          <div style="padding: 15px">
            <label for="End Part">End Part</label>
            <input type="text" style="color:black" name="endpart" required="" placeholder="Last Greetings">
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
