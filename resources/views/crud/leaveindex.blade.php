@extends('crud.layout')

@section('content')
@if($leaves)

<div class="container p-5">
    <div class="container mt-1">
        <div class="my-2"><a class="btn btn-primary" href="{{route('index')}}">الرجوع للصفحة الرئيسية</a></div>
    <div class="mb-3"><h1> معلومات سجل الاجازات لـ : <span style="color: rgb(6, 3, 192)">{{$emp->name}}</span></h1></div>
    
    
    <table class="table table-primary table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col"> معرف الموظف</th>
                <th scope="col"> تاريخ بدء الاجازة</th>
                <th scope="col">تاريخ نهاية الاجازة</th>
                <th scope="col">نوع الاجازة</th>
                <th scope="col">عدد الايام</th>
                <th scope="col">السبب</th>
                <th scope="col" style="width: 10%">الاجراء</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalDays = 0; // Initialize the total days variable
            @endphp
            @foreach($leaves as $leave)
                <tr>
                    <td>{{$leave->employee_id}}</td>
                    <td>{{$leave->start_date}}</td>
                    <td>{{$leave->end_date}}</td>
                    <td>{{$leave->leave_type}}</td>
                    <td>{{$leave->days}}</td>
                    <td>{{$leave->reason}}</td>
                    <td>
                        <div class="row">
                            <div class="col ms-2">
                                <form action="{{route('ldelete',$leave->id)}}" method="post">
                                    @csrf
                                    <input class="form-control btn btn-danger btn-lg" type="submit" value="حذف">
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @php
                $totalDaysm=0;
                if($leave->leave_type=="اعتيادية"){
                    $totalDays += $leave->days; 
                    
                }else {
                    
                    $totalDaysm += $leave->days; 
                }
                
            
                    
                @endphp
            @endforeach
            <tr>
                @php
               
               if ($rasedd !== null) {
                $rased = $rasedd->rased;
                $final = $rased - $totalDays;
                $rasedm = $rasedd->rasedm;
                $finalm = $rasedm - $totalDaysm;
            } else {
                // Handle the case where $rasedd is null
                $rased = $final = $rasedm = $finalm = 0; // or some other appropriate default values
            }
            @endphp
                <td colspan="3"></td>
                <td> <strong>الرصيد اعتيادية : {{$rased}} </strong></td>
                <td><strong>مجموع الاجازات الاعتيادية : {{$totalDays}}</strong></td>
                <td><strong>الرصيد الحالي اعتيادية : {{ $final}}</strong></td>
                <td colspan="2"></td>
                
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><strong>الرصيد مرضية : {{$rasedm}}</strong></td>
                <td><strong>مجموع الاجازات المرضية : {{$totalDaysm}}</strong></td>
                <td><strong>الرصيد الحالي مرضية : {{ $finalm}}</strong></td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>
    
</div>

   
@else
<div class="alert alert-danger mt-2" role="alert">
    <h3>    لايوجد سجل اجازات لدى هذا الموظف قم باضافة الرصيد اولا ثم اضف الاجازات
    </h3>
  </div>
@endif
    



@endsection