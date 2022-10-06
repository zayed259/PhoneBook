<!DOCTYPE html>
<html>
<head>
<style>
    .title{
        text-align: center;
    }
#tbl {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tbl td, #tbl th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tbl tr:nth-child(even){background-color: #f2f2f2;}

#tbl tr:hover {background-color: #ddd;}

#tbl th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1 class="title">Contact List</h1>

<table id="tbl">
  <tr>
    <th>Photo</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
  </tr>
  @foreach ($contacts as $contact)
  <tr>
    <td>
        @if ($contact->photo)
            <img src="{{url(Storage::url($contact->photo))}}" class="image" alt="image" class="image-fluid rounded-circle" height="50px">
        @else
            <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="image" alt="image">
        @endif
    </td>
    <td>{{ $contact->name }}</td>
    <td>{{ $contact->phone }}</td>
    <td>{{ $contact->email }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>
