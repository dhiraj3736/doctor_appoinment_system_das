@extends('layouts.main')

@section('main-section')
<div class="container mt-5" style="color: white;">
    <div class="text-center">
        <h4 class="display-4" style="font-size: 30px;">Payment</h4>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body">
                    @if ($book)
                        <div class="mb-4">
                            <h5 class="card-title"><strong>Doctor:</strong> {{ $book->doctor }}</h5>
                        </div>
                        <div class="mb-4">
                            <h5 class="card-title"><strong>Amount:</strong> Rs {{ $doctor_price->price }}</h5>
                        </div>
                    @else
                        <p class="text-danger">No record found</p>
                    @endif

                    @if ($book)
                        <form action="{{ route('payment_process') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="amount" value="{{ $doctor_price->price }}">
                            <input type="hidden" name="return_url" value="{{ route('successpayment') }}">
                            <input type="hidden" name="purchase_order_id" value="{{ $uuidString }}">
                            <input type="hidden" name="book_id" value="{{ $book->b_id }}">

                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Pay with Khalti</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
