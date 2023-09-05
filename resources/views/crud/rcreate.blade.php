@extends('crud.layout')

@section('content')

<div class="col-3 mt-3">
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{route('rstore')}}" class="form">
        @csrf
    
        <div class="form-group">
            <label for="employee_id">معرف الموظف</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control" value="{{$myid}}" readonly>
        </div>
    
        <div class="form-group">
         
            <label for="days">رصيد اعتيادية</label>
            <input type="number" name="rased" id="days" class="form-control" >
        </div>
        
        <div class="form-group mb-2">
         
            <label for="days">رصيد مرضية</label>
            <input type="number" name="rasedm" id="days" class="form-control" >
        </div>
    
        
    
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>





@endsection