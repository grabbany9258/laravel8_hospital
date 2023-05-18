<!DOCTYPE html>
<html lang="en">

<head>
  @include('user.css')
</head>

<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('user.header')

  <div class="container">
    <h3 class="text-center mt-5 mb-4 bg-primary">Appointment List</h3>

    <table class="table table-bordered table-striped text-center">
      <tr>
        <th>Doctor Name</th>
        <th>Date</th>
        <th>Message</th>
        <th>Status</th>
        <th>Cancel Apponments</th>
      </tr>

      @foreach ($appoint as $appoints)
        <tr>
          <td>{{ $appoints->name }}</td>
          <td>{{ $appoints->date }}</td>
          <td>{{ $appoints->message }}</td>
          <td>{{ $appoints->status }}</td>
          <td><a class="btn btn-danger" onclick="return confirm('Are you sure to Delete this ?')"
              href="{{ url('cancel_appoint', $appoints->id) }}">Cancel</a></td>
        </tr>
      @endforeach
    </table>
  </div>





</body>

</html>
