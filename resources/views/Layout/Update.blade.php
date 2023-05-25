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
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Update</h5>

                        <form action="{{url('/')}}/update/{{$cust->id}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                                
                            
                            <div class="mb-3">
                                <label for="First Name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="FirstName" name="cname" value="{{$cust->cname}}">
                               
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$cust->email}}">
                            </div>
                            <div class="input-group-text  form-check">

                                    <span class="m-lg-1 input-group-lg">
                                        Gender:-
                                    </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="input-group-text bg-white">
                                        <label for="male" class="form-check-label">
                                            Male
                                        </label>
                                        <input type="radio" name="gender" value="M" class="form-check-input m-lg-1" @if ($cust->gender == 'M') checked
                                            
                                        @endif>

                                        <label for="female" class="form-check-label">
                                            Female
                                        </label>
                                        <input type="radio" name="gender" value="F" class="form-check-input m-lg-1" @if ($cust->gender == 'F') checked
                                            
                                        @endif>
                                        &nbsp;
                                        <label for="others" class="form-check-label">
                                            Others
                                        </label>
                                        <input type="radio" name="gender" value="O" class="form-check-input m-lg-1" @if ($cust->gender == 'O') checked
                                            
                                        @endif>
                                        &nbsp;
                                    </div>
                                </div>

                                <div class="input-group-text  form-check">

                                    <span class="m-lg-1 input-group-lg">
                                        Status:-
                                    </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="input-group-text bg-white">
                                        <label for="Active" class="form-check-label">
                                            Active
                                        </label>
                                        <input type="radio" name="active" value="1" class="form-check-input m-lg-1" @if ($cust->status == 1)
                                            checked
                                        @endif>

                                        <label for="Disable" class="form-check-label">
                                            Disabled
                                        </label>
                                        <input type="radio" name="active" value="0" class="form-check-input m-lg-1" @if ($cust->status == 0)
                                            checked
                                        @endif>
                                        &nbsp;
                                        
                                        
                                    </div>
                                    
                                </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date</label>
                                <input type="date" class="form-control"  name="date" value="{{$cust->dob}}">
                            </div>
                            <div class="mb-3">
                                <label for="Mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control"  name="mobile" value="{{$cust->mobile}}" maxlength="10">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="{{$cust->password}}">
                            </div>
                      
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>