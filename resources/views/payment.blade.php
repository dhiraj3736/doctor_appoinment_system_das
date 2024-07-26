@extends('layouts.main')

@section('main-section')
<div class="container text-center mt-5" style="color: white;">
    <h4 class="display-4" style="font-size: 30px;">Payment</h4>
</div>

<div class="container mt-1 text-center" style="color: white;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="table-responsive">
                @if ($book)
                    <p>Doctor: {{ $book->doctor }}</p>
                    <p>Service: {{ $book->service }}</p>
                    <p>Amount: Rs {{ $service->price }}</p>
                @else
                    <p>No record found</p>
                @endif

                <form action="{{ route('payment_process') }}" method="POST">
                    @csrf
                    <input type="text" name="amount" value="{{ $service->price }}">
                    <input type="text" name="return_url" value="{{ route('successpayment') }}">
                    <input type="text" name="purchase_order_id" value="{{ $uuidString }}">
                    <input type="text" name="book_id" value="{{$book->b_id}}">

                    <input type="submit" value="Pay with Khalti" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
