@extends('layouts.main')

@section('main-section')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card p-5 shadow-lg" style="border-radius: 20px;">
                <h2 class="text-center mb-4">{{ $title }}</h2>

                @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ $url }}" method="post">
                    @csrf

                    <!-- Date Selection -->
                    <div class="mb-4">
                        <label for="calendar" class="form-label">Select Date</label>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <div id="calendar" class=""></div>
                                <input type="hidden" name="dov" id="dov" value="{{ isset($select_item) ? $select_item->date : old('dov') }}">
                                <span class="text-danger">
                                    @error('dov')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Available Time -->
                    <div class="mb-4">
                        <label for="availableTime" class="form-label">Available Time</label>
                        <div class="d-flex flex-wrap justify-content-center" id="time-slots">
                            <!-- Time slots will be injected here by JavaScript -->
                        </div>
                    </div>

                    <!-- Reason for Appointment -->
                    <div class="mb-4">
                        <label for="reason" class="form-label">Reason for Appointment</label>
                        <textarea name="reason" id="reason" class="form-control" rows="4" placeholder="Briefly describe the reason for your visit" style="border-radius: 10px; background-color: #f8f9fa;">{{ isset($select_item) ? $select_item->reason : old('reason') }}</textarea>
                        <span class="text-danger">
                            @error('reason')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Hidden input for selected time -->
                    <input type="hidden" name="doctorName" id="doctorName" value="{{ $doctor->name }}">
                    <input type="hidden" name="selected_time" id="selected_time" value="{{ isset($select_item) ? $select_item->time : '' }}">

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 10px;">{{ isset($select_item) ? 'Update Appointment' : 'Book Appointment' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr('#calendar', {
            inline: true,
            dateFormat: "Y-m-d",
            defaultDate: "{{ isset($select_item) ? $select_item->date : date('Y-m-d') }}",
            minDate: "{{ date('Y-m-d') }}", // Disable past dates
            onChange: function(selectedDates, dateStr, instance) {
                document.getElementById('dov').value = dateStr;
                fetchAvailableSlots(dateStr);
            }
        });

        // Pre-select the time slot if editing an existing appointment
        @if(isset($select_item))
            document.addEventListener('DOMContentLoaded', function() {
                fetchAvailableSlots("{{ $select_item->date }}", "{{ $select_item->time }}");
            });
        @endif
    });

    function fetchAvailableSlots(date, preselectedTime = null) {
        const d_id = '{{ $doctor->d_id }}';

        fetch(`/available-slots?date=${date}&d_id=${d_id}`)
            .then(response => response.json())
            .then(data => {
                const timeSlotsContainer = document.getElementById('time-slots');
                timeSlotsContainer.innerHTML = '';

                if (data.timeSlots && data.timeSlots.length > 0) {
                    data.timeSlots.forEach(time => {
                        const isBooked = data.bookedSlots.some(bookedTime => bookedTime.substring(0, 5) === time);
                        const button = document.createElement('button');
                        button.type = 'button';
                        button.className = `btn m-2 time-btn ${isBooked ? 'btn-danger' : 'btn-outline-primary'}`;
                        button.textContent = time;

                        if (isBooked) {
                            button.disabled = true;
                            button.innerHTML += '<span class="badge bg-danger ms-2">Booked</span>';
                        } else {
                            if (preselectedTime && time === preselectedTime) {
                                button.classList.add('btn-primary');
                                document.getElementById('selected_time').value = time;
                            }
                            button.addEventListener('click', function() {
                                document.querySelectorAll('.time-btn').forEach(btn => btn.classList.remove('btn-primary'));
                                this.classList.add('btn-primary');
                                document.getElementById('selected_time').value = this.textContent.trim();
                            });
                        }

                        timeSlotsContainer.appendChild(button);
                    });
                } else {
                    timeSlotsContainer.innerHTML = '<p class="text-center text-muted">No available slots</p>';
                }
            })
            .catch(error => console.error('Error fetching available slots:', error));
    }
</script>

<style>
    .card {
        background-color: #ffffff;
        border: none;
    }

    .form-label {
        font-weight: 600;
        color: #495057;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        cursor: not-allowed;
        border-radius: 10px;
    }

    .btn-outline-primary {
        background-color: #ffffff;
        color: #007bff;
        border: 1px solid #007bff;
        border-radius: 10px;
    }

    .btn-primary {
        background-color: #28a745;
        color: white;
        border-radius: 10px;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    .badge {
        margin-left: 5px;
        background-color: #ffc107;
        color: black;
    }

    .time-btn {
        width: 100px;
        height: 40px;
        font-size: 16px;
    }
</style>

@endsection
