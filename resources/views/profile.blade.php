@include('header')
@include('navbar')
<br>
<div class="container">
    <div id="notifications">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Dang!</strong> {{$error}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endforeach
    @endif

    @if (session('response'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Yay!</strong> {{session('response')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    </div>

    <div class="row">
        <div class="col-md-4" >
            <br>
            @if($user->photo_url != null)
            <center><img src="{{URL::to('/images/'.$user->photo_url)}}" style="width:220px;" id="profile-pict" alt="..." class="img-thumbnail rounded mx-auto d-block"></center>
            <input type="file" name="file-input" id="file-input" class="form-control">
            @else
            <center><img src="https://www.unesale.com/ProductImages/Large/notfound.png" style="width:220px;" id="profile-pict" alt="..." class="img-thumbnail rounded mx-auto d-block"></center>
            <input type="file" name="file-input" id="file-input" class="form-control">
            @endif
            <!-- <input type="hidden" name="_token" id="userid" class="form-control" value="{{ csrf_token() }}"> -->
            @if($user->id == Auth::user()->id)
            <center><button type="button" class="btn btn-primary" id="btn-change-profile" style="width:220px;"><i class="fa fa-image"></i> Upload</button></center>
            @endif
        </div>
        <div class="col-md-6" style="background:#E5EBF0">
            <form action="{{URL::to('/profile')}}" method="post">
            @csrf
            @method('PUT')
            <br>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    @if($user->id == Auth::user()->id)
                    <input type="text" name="username" class="form-control" id="" placeholder="Username" value="{{$user->username}}">
                    @else
                    <h4>{{$user->username}}</h4>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    @if($user->id == Auth::user()->id)
                    <input type="email" name="email" class="form-control" id="" placeholder="Email" value="{{$user->email}}">
                    @else
                    <h4>{{$user->email}}</h4>
                    @endif
                </div>
            </div>
            @if($user->id == Auth::user()->id)
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <!-- <input type="password" class="form-control" id="inputPassword" placeholder="Password"> -->
                    <a href="{{URL::to('/change_password')}}" class="btn btn-primary btn-block">Change Password</a>
                </div>
            </div>
            <br>
            <button style="submit" class="btn btn-block btn-success">Update Profile</button>
            @endif
            </form>
        </div>
    </div>


    
    
</div>

@include('footer')
