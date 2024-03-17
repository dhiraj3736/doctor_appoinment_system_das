@extends('layouts.main')

@section('main-section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="display-4" style="color: white; font-size:30px;">{{$title}}</h1>

            <form action="{{$url}}" method="post" style="width:550px; color:white;">
                @csrf
                <div class="container" style="background-image:url(./images/3.jpg)">
                    <label><b>Name:</b></label><br>
                    <input type="text" class="form-control" placeholder="Enter Full name of patient" value="{{isset($select_item) ? $select_item->name : old('name')}}" name="fname" required><br>

                    <div class="mb-3">Gender

                    <input type="radio" name="gender" value="female" {{ isset($select_item) ? ($select_item->gender == "female" ? "checked" : "") : (old('gender') == "female" ? "checked" : "") }}" > female

                    <input type="radio" name="gender" value="male" {{ isset($select_item) ? ($select_item->gender == "male" ? "checked" : "") : (old('gender') == "male" ? "checked" : "") }}> male
                    <input type="radio" name="gender" value="other" {{ isset($select_item) ? ($select_item->gender == "other" ? "checked" : "") : (old('gender') == "other" ? "checked" : "") }} > other
                   
                </div>
                    <label><b>Email:</b></label><br>
                    <input type="email" class="form-control" placeholder="Enter Full name of patient" value="{{isset($select_item) ? $select_item->email : old('email')}}" name="email" required><br>


                 

                    <label><b>Address:</b></label><br>
                    <input type="text" class="form-control" placeholder="address" value="{{isset($select_item) ? $select_item->address : old('address')}}" name="address" required><br>

                    <label><b>Date of Visit:</b></label><br>
                    <input type="date" class="form-control" name="dov" value="{{isset($select_item) ? $select_item->date : old('date')}}"onChange="getDay(this.value);" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+7 day')); ?>" required><br>
                    <label for="">Service:</label><br>
<select name="service" class="form-control" id="cars">
    @foreach($service as $serviceItem)
        <option value="{{ $serviceItem->service }}" {{ (isset($select_item) && $select_item->service == $serviceItem->service) || old('service') == $serviceItem->service ? 'selected' : '' }}>
            {{ $serviceItem->service }}
        </option>
    @endforeach
</select><br>



                    <label for="">Doctor</label>
                    <select name="doctor" class="form-control" id="cars">
                    @foreach($doctor as $row)
        <option value="{{ $row->name }}" {{ (isset($select_item) && $select_item->name == $row->name) || old('doctor') == $row->name ? 'selected' : '' }}>
            {{ $row->name }}
        </option>
    @endforeach
</select><br>



                    <label><b>Time</b></label><br>
                    <select name="time" class="form-control" id="cars">
    <option value="9:30 - 10:00" {{ (isset($select_item) && ($select_item->time == '9:30 - 10:00' || old('time') == '9:30 - 10:00')) ? 'selected' : '' }}>9:30 - 10:00</option>
    <option value="10:00 - 10:30" {{ (isset($select_item) && ($select_item->time == '10:00 - 10:30' || old('time') == '10:00 - 10:30')) ? 'selected' : '' }}>10:00 - 10:30</option>
    <option value="10:30 - 11:00" {{ (isset($select_item) && ($select_item->time == '10:30 - 11:00' || old('time') == '10:30 - 11:00')) ? 'selected' : '' }}>10:30 - 11:00</option>
    <option value="11:30 - 12:00" {{ (isset($select_item) && ($select_item->time == '11:30 - 12:00' || old('time') == '11:30 - 12:00')) ? 'selected' : '' }}>11:30 - 12:00</option>
    <option value="12:30 - 1:00" {{ (isset($select_item) && ($select_item->time == '12:30 - 1:00' || old('time') == '12:30 - 1:00')) ? 'selected' : '' }}>12:30 - 1:00</option>
    <option value="3:00 - 3:30" {{ (isset($select_item) && ($select_item->time == '3:00 - 3:30' || old('time') == '3:00 - 3:30')) ? 'selected' : '' }}>3:00 - 3:30</option>
    <option value="3:30 - 4:00" {{ (isset($select_item) && ($select_item->time == '3:30 - 4:00' || old('time') == '3:30 - 4:00')) ? 'selected' : '' }}>3:30 - 4:00</option>
    <option value="4:30 - 5:00" {{ (isset($select_item) && ($select_item->time == '4:30 - 5:00' || old('time') == '4:30 - 5:00')) ? 'selected' : '' }}>4:30 - 5:00</option>
</select><br>



                    <label><b>Contact Number</b></label><br>
                    <input type="text" name="number" id="phone" class="form-control" placeholder="Phone Number"value="{{isset($select_item) ? $select_item->number : old('number')}}"  required><br>

                    <div class="container1">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection