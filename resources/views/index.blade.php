<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Image</th>
        <th>Address</th>
        <th colspan="3" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($passports as $passport)
      @php($date=date('Y-m-d', $passport['date']))
        
        


      <tr>
        <td>{{$passport['id']}}</td>
        <td>{{$passport['name']}}</td>
        <td>{{$date}}</td>
        <td>{{$passport['email']}}</td>
        <td>{{$passport['number']}}</td>
        <td><img src="{{asset('images/'.$passport['filename'])}}" alt="" height="60px" width="60px"></td>
        <td>{{$passport['office']}}</td>
        
        <td><a href="{{action('PassportController@edit', $passport['id'])}}" class="btn btn-warning">Edit</a></td>
        <td><a href="{{action('PassportController@create')}}" class="btn btn-success">Create</a></td>
        <td>
          <form action="{{action('PassportController@destroy', $passport['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>