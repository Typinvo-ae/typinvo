@if (!empty(session('alert_msg')))
<div class="alert alert-danger fail text-center" role="alert">
          {{ session('alert_msg') }}
        </div>
@endif
@if (!empty(session('success_msg')))
<div class="alert alert-success text-center" role="success">
            {{ session('success_msg') }}
        </div>
@endif
@if(count($errors) >0)
<div class="col-md-12 ">
@foreach($errors->all() as $error)
<center><div class="alert alert-danger alert-dismissible fade show" role="alert">
<div class="alert-body">
{{$error}}
</div>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div></center>
@endforeach
</div>
@endif