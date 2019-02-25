@include('header')
@include('navbar')
<br>
<div class="container">
    
    
    <div class="row">
        
        <div class="col-md-12" style="background:#E5EBF0">
            <form action="{{URL::to('/change_password')}}" method="post">
            @csrf
            @method('PUT')
            <br>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Old Password</label>
                <div class="col-sm-10">
                    
                    <input type="password" name="old_password" class="form-control" id="" placeholder="" >
                   
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    
                    <input type="password" name="password" class="form-control" id="" placeholder="" >
                   
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Retype New Password</label>
                <div class="col-sm-10">
                    
                    <input type="password" name="retype_password" class="form-control" id="" placeholder="" >
                   
                </div>
            </div>
            
            <button type="submit" class="btn btn-success btn-block">Submit</button>
            </form>
        </div>
    </div>


    
    
</div>

@include('footer')
