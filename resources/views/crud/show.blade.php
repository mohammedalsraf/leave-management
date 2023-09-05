@extends('crud.layout')

@section('content')


<div class="container mt-5">
    <div class="my-2"><a class="btn btn-primary" href="{{route('index')}}">الرجوع للصفحة الرئيسية</a></div>
    
    <div class="row">
        <div class="col-md-4">
            <!-- Employee Image -->
            <img src="{{ asset('images/' . $emp->image) }}" alt="Employee Image" class="" width="425px" height="393px">
        </div>
        <div class="col-md-8">
            <!-- Employee Information -->
            
            <div class="card" style="background-color: #f6ffe5">
                <h1>{{$emp->name}}</h1>
                <div class="card-body " >
                    <p class="card-text">
                        <strong style="color: #DC3545;">الرقم الوظيفي:</strong>
                        <span>{{$emp->empnumber}}</span>
                    </p>
                    <p class="card-text">
                        <strong style="color: #DC3545;">القسم:</strong>
                        <span>{{$emp->department}}</span>
                    </p>
                    <p class="card-text">
                        <strong style="color: #DC3545;">الجنس:</strong>
                        <span>{{$emp->gander}}</span>
                    </p>
                    <p class="card-text">
                        <strong style="color: #DC3545;">العنوان الوظيفي:</strong>
                        <span>{{$emp->jd}}</span>
                    </p>
                    <p class="card-text">
                        <strong style="color: #DC3545;">التحصيل الدراسي:</strong>
                        <span>{{$emp->ct}}</span>
                    </p>
                    <p class="card-text">
                        <strong style="color: #DC3545;">الحالة الزوجية:</strong>
                        <span>{{$emp->mstate}}</span>
                    </p>
                    <p class="card-text">
                        <strong style="color: #DC3545;">عدد الأطفال:</strong>
                        <span>{{$emp->chnumber}}</span>
                    </p>
                    <p class="card-text">
                        <strong style="color: #DC3545;">رقم الهاتف:</strong>
                        <span>{{$emp->phone}}</span>
                    </p>
                    <!-- Add more information as needed -->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection