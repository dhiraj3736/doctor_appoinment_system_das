@extends('layouts.main')

@section('main-section')
<div class="container">
    <div class="row justify-content-center">
        @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
        @endif
        <div class="col-md-6">
            <h1 class="display-4" style="color: white; font-size:30px;">{{$title}}</h1>
            <form action="{{$url}}" method="post" style="color:white;">
                @csrf
                <div class="container" style="background-image:url(./images/3.jpg); padding: 20px; border-radius: 10px;">
                    <div class="mb-3">
                        <label for="fname" class="form-label"><b>Name:</b></label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter Full name of patient" value="{{isset($select_item) ? $select_item->name : old('fname')}}" name="fname">
                        <span class="text-danger">
                            @error('fname')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label"><b>Gender:</b></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ isset($select_item) ? ($select_item->gender == "female" ? "checked" : "") : (old('gender') == "female" ? "checked" : "") }}>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ isset($select_item) ? ($select_item->gender == "male" ? "checked" : "") : (old('gender') == "male" ? "checked" : "") }}>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{ isset($select_item) ? ($select_item->gender == "other" ? "checked" : "") : (old('gender') == "other" ? "checked" : "") }}>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                        <span class="text-danger">
                            @error('gender')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <label><b>Email:</b></label><br>
                    <input type="email" class="form-control" placeholder="Enter Full name of patient" value="{{isset($select_item) ? $select_item->email : old('email')}}" name="email">
                    <span style="color:red;">
                        @error('email')
                        {{$message}}
                        @enderror
                    </span><br>

                    <label><b>Address:</b></label><br>
                    <input type="text" class="form-control" placeholder="address" value="{{isset($select_item) ? $select_item->address : old('address')}}" name="address">
                    <span style="color:red;">
                        @error('address')
                        {{$message}}
                        @enderror
                    </span><br>
                    <label><b>Date of Visit:</b></label><br>
                    <input type="date" class="form-control" name="dov" value="{{isset($select_item) ? $select_item->date : old('dov')}}" onChange="getDay(this.value);" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+7 day')); ?>">
                    <span style="color:red;">
                        @error('dov')
                        {{$message}}
                        @enderror
                    </span><br>

                    <label for="">Service:</label><br>
                    <select name="service" class="form-control" id="cars">
                        @foreach($service as $serviceItem)
                        <option value="{{ $serviceItem->service }}" {{ (isset($select_item) && $select_item->service == $serviceItem->service) || old('service') == $serviceItem->service ? 'selected' : '' }}>
                            {{ $serviceItem->service }}
                        </option>
                        @endforeach
                    </select>
                    <span style="color:red;">
                        @error('service')
                        {{$message}}
                        @enderror
                    </span><br>

                    <label for="">Doctor</label>
                    <select name="doctor" class="form-control" id="doctor">
                        <option value="">please choose doctor</option>
                        @foreach($doctor as $row)
                        <option value="{{ $row->name }}" {{ (isset($select_item) && $select_item->name == $row->name) || old('doctor') == $row->name ? 'selected' : '' }}>
                            {{ $row->name }}
                        </option>
                        @endforeach
                    </select>
                    <span style="color:red;">
                        @error('doctor')
                        {{$message}}
                        @enderror
                    </span><br>

                    <label id="doctorTimeLabel"><b>Doctor Available Time</b></label><br>
                    <span id="doctorTimeSpan"></span><br>

                    <label><b>Add time</b></label>
                    <input type="time" name="time" id="phone" class="form-control"  value="{{isset($select_item) ? $select_item->time : old('time')}}"><br>

                    <label><b>Contact Number</b></label><br>
                    <input type="text" name="number" id="phone" class="form-control" placeholder="Phone Number" value="{{isset($select_item) ? $select_item->number : old('number')}}">
                    <span style="color:red;">
                        @error('number')
                        {{$message}}
                        @enderror
                    </span><br>

                    <!-- Other form fields... -->
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // AJAX request to fetch doctor's available time on doctor selection change
        $('#doctor').change(function(){
            var doctorname = $(this).val();
            var route = "{{ route('getdoctortime', ':doctorname') }}";
            route = route.replace(':doctorname', doctorname);

            $.ajax({
                url: route,
                type: 'GET',
                success: function(response) {
                    // Update the label and span with the doctor's available time
                    document.getElementById('doctorTimeLabel').innerText = 'Doctor Available Time (' + response.fromtime + ' to ' + response.totime + ')';
                    document.getElementById('doctorTimeSpan').innerText = ''; // Clear any previous error message
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error
                    console.error(error);
                    document.getElementById('doctorTimeSpan').innerText = 'Error fetching doctor time';
                }
            });
        });
    });
</script>
@endsection
