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
    <form method="POST" action="{{route('lstore')}}" class="form">
        @csrf
    
        <div class="form-group">
            <label for="employee_id">معرف الموظف</label>
            <input type="text" name="employee_id" id="employee_id" class="form-control" value="{{$myid}}" readonly>
        </div>
    
        <div class="form-group">
            <label for="start_date">من</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>
    
        <div class="form-group">
            <label for="end_date">الى</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
    
       <div class="mb-3">
                <label for="input2" class="form-label">نوع الاجازة</label>
                <select class="form-control" data-live-search="true" name="leave_type" >
                  <option value="اعتيادية">اعتيادية</option>
                  <option value="مرضية">مرضية</option>
                 </select>
              </div>
    
        <div class="form-group">
            {{-- @php
                use Carbon\Carbon;
                $date1 = Carbon::parse(request('start_date')); // Replace with your first date
                    $date2 = Carbon::parse(request('end_date')); // Replace with your second date

                    $diffInDays = $date1->diffInDays($date2)+1;

                    echo "The difference between the two dates is $diffInDays days.";
            @endphp  --}}
            <label for="days">عدد الايام</label>
            <input type="text" name="days" id="days" class="form-control" readonly >
        </div>
    
        <div class="form-group mb-2">
            <label for="reason">السبب (اختياري)</label>
            <textarea name="reason" id="reason" class="form-control"></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const startDateInput = document.getElementById("start_date");
        const endDateInput = document.getElementById("end_date");
        const daysInput = document.getElementById("days");

        startDateInput.addEventListener("change", updateDaysDifference);
        endDateInput.addEventListener("change", updateDaysDifference);

        function updateDaysDifference() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (!isNaN(startDate) && !isNaN(endDate)) {
                const diffInMilliseconds = endDate - startDate;
                const diffInDays = diffInMilliseconds / (1000 * 60 * 60 * 24);
                daysInput.value = diffInDays+1;
            } else {
                daysInput.value = '';
            }
        }
    });
</script>




@endsection