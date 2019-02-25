@include('header')
@include('navbar')

<div class="container">
    <br>

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
    
    
    <h3>Login</h3>
    <form action="login" method="post">
        @csrf
        <div class="form-group">
            <label for="InputEmail">Email</label>
            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Your Email">
        </div>
        <div class="form-group">
            <label for="InputPassword">Password</label>
            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <hr>

    <h3>Register</h3>
    <form action="register" method="post">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="InputEmail">Email</label>
            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="InputName">Username</label>
            <input name="username" type="text" class="form-control" id="inputUsername" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="InputPassword">Password</label>
            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="InputRetypePassword">Retype Password</label>
            <input name="retype_password" type="password" class="form-control" id="inputRetypePassword" placeholder="Retype Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@include('footer')
    