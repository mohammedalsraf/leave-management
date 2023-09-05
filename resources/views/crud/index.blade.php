@extends('crud.layout')

@section('content')
<div class="col-3 mt-3 me-5"><form action="{{ route('search') }}" method="GET" class="form-inline">
  <div class="input-group">
    <input type="text" name="keyword" class="form-control" placeholder="ابحث عن اسم موظف">
    <div class="input-group-append">
      <button type="submit" class="btn btn-primary">ابحث</button>
    </div>
    <div class="input-group-append me-1">
      <a href="{{route('index')}}" class="btn btn-primary">عرض الكل</a>
    </div>
  </div>
</form></div>

@if ($msg=Session::get('success'))
<div class="alert alert-success mt-2" role="alert">
  {{$msg}}
</div>
  
@endif
<div class="container my-2">
   
   

    <div class="container mt-3">
    
      <div class="row">
      @foreach ($emps as $emp)
      
        <!-- Employee Card 1 -->
        <div class="col-md-4">
          <div class="card mb-4">
              <img class="card-img-top  border border-primary p-2" src="{{ asset('images/' . $emp->image) }}" alt="" height="400px" width="400px">
              <div class="card-body" style="background-color: #f6ffe5">
                  <h5 class="card-title"><strong style="color: #007BFF; font-weight: bold;">{{$emp->name}}</strong></h5>
                  <p class="card-text"><strong style="color: #DC3545;">الرقم الوظيفي:</strong> <strong>{{$emp->empnumber}}</strong></p>
                  <p class="card-text"><strong style="color: #DC3545;">القسم:</strong> <strong>{{$emp->department}}</strong></p>
                  <p class="card-text"><strong style="color: #DC3545;">الجنس:</strong> <strong>{{$emp->gander}}</strong></p>
                  <p class="card-text"><strong style="color: #DC3545;">العنوان الوظيفي:</strong> <strong>{{$emp->jd}}</strong></p>
                  <p class="card-text"><strong style="color: #DC3545;">التحصيل الدراسي:</strong> <strong>{{$emp->ct}}</strong></p>
                  <p class="card-text"><strong style="color: #DC3545;">الحالة الزوجية:</strong> <strong>{{$emp->mstate}}</strong></p>
                  <p class="card-text"><strong style="color: #DC3545;">عدد الأطفال:</strong> <strong>{{$emp->chnumber}}</strong></p>
                  <p class="card-text"><strong style="color: #DC3545;">رقم الهاتف:</strong> <strong>{{$emp->phone}}</strong></p>
      
                  <div class="row">
                      <div class="col-3 ms-2">
                          <a class="btn btn-info btn-lg" href="{{route('show',$emp->id)}}">عرض</a>
                      </div>
                  
                   
                      <div class="col-3 ms-2">
                          <a class="btn btn-primary btn-lg" href="{{route('edit',$emp->id)}}">تحديث</a>
                      </div>
                      <div class="col-3 ms-2">
                          <form action="{{route('delete',$emp->id)}}" method="post">
                              @csrf
                              <input class="form-control btn btn-danger btn-lg" type="submit" value="حذف" id="deleteform" onclick="return confirmDelete();">
                          </form>
                      </div>
                  </div>
                  <div class="row  mt-3 me-2">
                    <div class="col-3 ">
                      <a class="btn btn-success btn-sm" href="{{route('lindex', $emp->id)}}"> عرض الاجازات</a>
                  </div>
                  <div class="col-3 ">
                    <a class="btn btn-success btn-sm" href="{{route('lcreate',$emp->id)}}"> اضافة اجازات</a>
                </div>
                <div class="col-3">
                  <a class="btn btn-success btn-sm" href="{{route('rcreate',$emp->id)}}"> تحديث الرصيد</a>
              </div>
                  </div>


              </div>
          </div>
      </div>
      
      
        

        <!-- Employee Card 2 -->
       

        <!-- Add more employee cards as needed -->
    
        
      @endforeach
    </div>
    {{$emps->links('pagination::bootstrap-4')}}
   
   
      
  </div>

  
  
  </div>

  <script>
    function confirmDelete() {
        if (confirm("هل انت متاكد تريد حذف هذا الموظف ؟ يجب حذف سجل الاجازات اولا اذا كان لديه سجل اجازات")) {
            // If the user confirms, allow the form to submit
            return true;
        } else {
            // If the user cancels, prevent the form from submitting
            return false;
        }
    }
</script>

@endsection