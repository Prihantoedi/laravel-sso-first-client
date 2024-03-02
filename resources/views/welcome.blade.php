@extends('layout.app')
@section('content')
<div class="container pt-5">
    
    @if($is_auth)
        <div class="text-end">
            <a href="">Logout</a>
        </div>
    @endif
    <div class="text-center"><h1>{{$data['app_name']}}</h1></div>

    @if(!$is_auth)
        <div class="not-auth-info text-center mt-5">
            <div>You're still not loggin</div>
            <div class="mt-3">
                <a href="http://127.0.0.1:8000/login?app=first_app_client" class="btn btn-danger">Login With SSO</a>
            </div>
        </div>
    @endif

    <div class="client-app-grp mt-4 d-flex justify-content-center gap-3 p-5" style="border: 1px #e7e7e7 solid;">
        <form action="" method="GET">
            <button class="btn btn-warning" id="dum-1st-app-btn">Go to 1st App</button>
            <button id="go-1st-app" type="submit" hidden></button>
        </form>
        
        <form action="" method="GET">
            <button class="btn btn-primary" id="dum-3rd-app-btn" type="submit">Go to 3rd App</button>
            <button id="go-3rd-app" type="submit" hidden></button>
        </form>
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    let dum1stAppBtn = document.getElementById('dum-1st-app-btn');

    dum1stAppBtn.addEventListener("click", function(event){
        event.preventDefault();

        window.location.href = 'http://127.0.0.1:8000';
        
    });

    let dum3rdAppBtn = document.getElementById('dum-3rd-app-btn');

    dum3rdAppBtn.addEventListener("click", function(event){
        event.preventDefault();
    });

</script>
@endsection
