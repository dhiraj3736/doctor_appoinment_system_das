@extends('layouts.main')

@section('main-section')
<div class="container text-center mt-0">
    @if(session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif
    <h2 class="text-uppercase" style="color: #ced6dd; font-size: 2.5rem; letter-spacing: 1px;">Completed Schedule</h2>
    <p style="color: #7f8c8d; font-size: 1.2rem;">Manage your appointments efficiently</p>
</div>

<div class="container mt-0">
    @foreach($select_item as $row)
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-lg" data-bs-toggle="modal" data-bs-target="#appointmentModal-{{ $row->b_id }}" style="cursor: pointer;">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="icon-container bg-primary text-white rounded-circle me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="{{ asset('storage/uploads/'.$row->image) }}" alt="Doctor Image" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>

                        <div>
                            <h5 class="card-title mb-1" style="color: #34495e;">{{ $row->doctor }}</h5>
                            <p class="text-muted mb-1"><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($row->date)->format('d M Y') }} at {{ \Carbon\Carbon::parse($row->time)->format('h:i A') }}</p>

                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-end">
                        <span class="badge {{ $row->status == 0 ? 'bg-danger' : ($row->status == 1 ? 'bg-success' : 'bg-info') }} py-2 px-3">
                            {{ $row->status == 0 ? 'Not Approved' : ($row->status == 1 ? 'Approved' : 'Payment Complete') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for appointment details -->
    <div class="modal fade" id="appointmentModal-{{ $row->b_id }}" tabindex="-1" aria-labelledby="appointmentModalLabel-{{ $row->b_id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="appointmentModalLabel-{{ $row->b_id }}">{{ $row->doctor }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p><strong>Date of Visit:</strong> {{ \Carbon\Carbon::parse($row->date)->format('d M Y') }}</p>

                    <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($row->time)->format('h:i A') }}</p>
                    <p><strong>Reason:</strong> {{ $row->reason }}</p>
                    <p><strong>Doctor Charge:</strong> {{ $row->price }}</p>
                    <p><strong>Status:</strong>
                        @if($row->status == 0)
                            <span class="badge bg-danger">Not Approved</span>
                        @elseif($row->status == 1)
                            <span class="badge bg-success">Approved</span>
                        @elseif($row->status == 2)
                            <span class="badge bg-info">Payment Complete</span>
                        @endif
                    </p>
                </div>
                <div class="modal-footer">
                    @if($row->status == 0)
                        <a href="/delete/{{$row->b_id}}" class="btn btn-danger" onclick="return confirmDeletion();">Delete</a>
                        <a href="/edit/{{$row->b_id}}" class="btn btn-success">Edit</a>
                    @elseif($row->status == 1)
                        <a href="/payment/{{$row->b_id}}" class="btn btn-warning">Payment Pending</a>
                    @elseif($row->status == 2)
                        <span class="text-success">Payment Complete</span>
                    @endif
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="container mt-2">
    <div class="d-flex justify-content-center">
        {{ $select_item->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

@section('scripts')
<!-- Include Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Include Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
    function confirmDeletion() {
        return confirm("Are you sure you want to delete this appointment?");
    }
</script>
@endsection
