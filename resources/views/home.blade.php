@include('header')
@include('navbar')
<div style="background:#E5EBF0; margin-top:10px;">
<div class="container" >
        <br>
        <form action="tweet" method="post">
        <div class="input-group">
            @csrf
            <input type="text" name="tweet" class="form-control" placeholder="Update Status ...">
            <button class="btn btn-primary">Submit</button>
        </div>
        </form>
        <br>
</div>
</div>

<div style="background:white">
<div class="container" >
        @isset($tweets[0])

        @foreach($tweets as $tweet)
        <br>
        @if($tweet->users_id == Auth::user()->id)
        <div class="alert alert-success" role="alert" style="text-align:right">
        
        {{$tweet->tweet}}
        <b><a href="{{URL::to('/profile/'.$tweet->users->id)}}">{{$tweet->users->username}}</a></b>
        @if($tweet->users->photo_url ==null)
        <img src="https://www.unesale.com/ProductImages/Large/notfound.png" alt="..." onerror="" class="img-thumbnail" style="height:60px">
        @else
        <img src="{{URL::to('/images/'.$tweet->users->photo_url)}}" alt="..." onerror="" class="img-thumbnail" style="height:60px">
        @endif
        </div>
        @else
        <div class="alert alert-secondary" role="alert" >
        @if($tweet->users->photo_url ==null)
        <img src="https://www.unesale.com/ProductImages/Large/notfound.png" alt="..." onerror="" class="img-thumbnail" style="height:60px">
        @else
        <img src="{{URL::to('/images/'.$tweet->users->photo_url)}}" alt="..." onerror="" class="img-thumbnail" style="height:60px">
        @endif
        <b><a href="{{URL::to('/profile/'.$tweet->users->id)}}">{{$tweet->users->username}}</a></b>
        {{$tweet->tweet}}
        

        </div>
        @endif
        @endforeach

        
        @endif
</div>
</div>



@include('footer')