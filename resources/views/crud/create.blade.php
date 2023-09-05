@extends('crud.layout')

@section('content')

<div class="container my-3 col-12">
   @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    {{-- <div class="row">
        <div class="col-3">
          <a class="btn btn-primary" href="{{route('products.index')}}">الرئيسية</a>
        </div>
      </div> --}}
<div class="container mt-5">
    <form id="myForm" enctype="multipart/form-data" action="{{route('store')}}" method="post">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-md-4">
              
              <div class="mb-3">
                <label for="input2" class="form-label"> الرقم الوظيفي</label>
                <input type="number" class="form-control" id="input2" name="empnumber"  >
              </div>
              <div class="mb-3">
                <label for="input2" class="form-label">الاسم الرباعي واللقب</label>
                <input type="text" class="form-control" id="input2" name="name"  >
              </div>
              <div class="mb-3">
                <label for="input2" class="form-label">الجنس</label>
                <select class="form-control" data-live-search="true" name="gander" >
                  <option value="ذكر">ذكر</option>
                  <option value="انثى">انثى</option>
                 </select>
              </div>
              <div class="mb-3">
                <label for="input2" class="form-label">العنوان الوظيفي</label>
                <select class="form-control" data-live-search="true" name="jd" >
                  <option value="مبرمج">مبرمج</option>
                  <option value="مهندس" >مهندس</option>
                  
                 </select>
              </div>
           
              <!-- Repeat similar code for input 3 to 8 -->
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="input2" class="form-label">التحصيل الدراسي</label>
                    <select class="form-control" data-live-search="true" name="ct" >
                      <option value="ماجستير">ماجستير</option>
                      <option value="دكتوراه" >دكتوراه</option>
                      
                     </select>
                  </div>
               
              <div class="mb-3">
                <label for="input2" class="form-label">القسم</label>
                <input type="text" class="form-control" id="input2" name="department" >
              </div>
              
             
              <div class="mb-3">
                <label for="input2" class="form-label">الراتب</label>
                <input type="text" class="form-control" id="input2" name="salary" >
              </div>
              <div class="mb-3">
                <label for="input2" class="form-label"> الحالة الزوجية</label>
                <select class="form-control" data-live-search="true" name="mstate" >
                  <option value="متزوج">متزوج</option>
                  <option value="اعزب" >اعزب</option>
                  
                 </select>
              </div>
              
              <!-- Repeat similar code for input 3 to 8 -->
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="input2" class="form-label">عدد الاطفال</label>
                    <input type="text" class="form-control" id="input2" name="chnumber" >
                  </div>
                  <div class="mb-3">
                    <label for="input2" class="form-label"> رقم الهاتف</label>
                    <input type="text" class="form-control" id="input2" name="phone" >
                  </div>
                  <div class="mb-3">
                    <label for="input2" class="form-label"> صورة الموظف </label>
                    <input type="file" class="form-control" id="input2" name="image" >
                  </div>
          
              
           
             
             
            
              
              <!-- Repeat similar code for input 3 to 8 -->
            </div>
          
          
            
         
          </div>
        
    
          {{-- <button type="submit" class="btn btn-primary" name="submit">حساب العلاوات والترفيعات</button>
          <button type="submit" class="btn btn-primary" name="add">اضافة</button> --}}
       
      
    

       

        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>



@endsection