@include('header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <h2 class="text-center mt-3"> DATA</h2><br>
        @if (session()->has('UpdateSuccess'))
            {{-- <div class="alert alert-success text-center">{{session()->get('UpdateSuccess')}}</div> --}}
            @php
                echo "<script>alert('Data Updated Successfull')</script>";
            @endphp
        @endif
        @if (session()->has('LoginSuccess'))
            {{-- <div class="alert alert-success text-center">{{session()->get('LoginSuccess')}}</div> --}}
            @php
                echo "<script>alert(Login Successfull')</script>";
            @endphp
        @endif

        @if (session()->has('DeleteSuccess'))
            {{-- <div class="alert alert-success text-center">{{session()->get('UpdateSuccess')}}</div> --}}
            @php
                echo "<script>alert('Data Deleted Successfull')</script>";
            @endphp
        @endif

        @if (session()->has('alreadyauthenticated'))
            {{-- <div class="alert alert-success text-center">{{session()->get('UpdateSuccess')}}</div> --}}
            @php
                echo "<script>alert('Please Logout Before Going to Login Page')</script>";
            @endphp
        @endif

        <div class="row justify-content-md-center">
            <div class="col-8 text-center">
                <table class="table table-hover">
                    <thead>
                        <tr class="bg bg-primary text-white">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    @foreach ($cust as $customer)
                        
                    
                        <tbody>
                            <tr>
                                <td>
                                    {{$customer->id}}
                                </td>
                                <td>
                                    {{$customer->cname}}
                                </td>
                                <td>
                                    {{$customer->email}}
                                </td>
                                <td>
                                    @if ($customer->gender == 'M')
                                        Male
                                    @elseif($customer->gender == 'F')
                                        Female
                                    @else
                                       Others 
                                    @endif
                                </td>
                                <td>
                                    {{$customer->dob}}
                                </td>
                                <td>
                                    {{$customer->mobile}}
                                </td>
                                <th>
                                        @if ($customer->status== 1)
                                            active
                                        @else
                                            disabled
                                        @endif
                                    
                                </th>
                                <td>
                                    <a href="{{url('/')}}/edit/{{$customer->id}}" class=" btn btn-success">
                                        Update </a>
                                    <a href="{{url('/')}}/delete/{{$customer->id}}" class="btn btn-danger">
                                        Delete </a>

                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">

            <a href="/register" class="btn btn-primary mb-3 text-white"
                style="font-size:19px; width:65%;">Add
                Data</a>
        </div>
    </div>
</body>

</html>