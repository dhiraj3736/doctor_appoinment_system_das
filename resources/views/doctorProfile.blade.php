@extends('layouts.main')

@section('main-section')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                    <div class="card-body" style="background-color: #E8D3FC; border-radius: 15px 15px 0 0;">
                        <div class="row">
                            <!-- Doctor Info Column -->
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('storage/uploads/' . $doctor->image) }}"
                                    class="rounded-circle mb-3" alt="Doctor Image"
                                    style="object-fit: cover; height: 120px; width: 120px;">
                                <h4 class="card-title text-dark">Dr. {{ $doctor->name }}</h4>
                                <p class="text-muted">{{ $doctor->specialist }}</p>
                                <p><strong>Rating:</strong>
                                    <span class="badge badge-warning text-dark">
                                        <!-- Display stars for average rating -->
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i <= floor($averageRating) ? '' : '-o' }}"></i>
                                        @endfor
                                        ({{ number_format($averageRating, 1) ?? 'No ratings yet' }})
                                    </span>
                                </p>
                                <p><strong>Experience:</strong> {{ $doctor->experiance }}</p>
                                <p><strong>Qualification:</strong> {{ $doctor->qualification }}</p>
                                <p><strong>NMC No.:</strong> {{ $doctor->nmc_no }}</p>
                                <p><strong>Available Time:</strong> {{ $doctor->fromtime }} - {{ $doctor->totime }}</p>
                                <p><strong>Description:</strong> {{ $doctor->description ?? 'No description available.' }}</p>

                                <a href="/bookAppoinment/{{$doctor->d_id}}" class="btn btn-success btn-block mt-4" style="background-color: #7B61FF; border-color: #7B61FF;">Book Now</a>
                            </div>

                            <!-- Comments and Rating Column -->
                            <div class="col-md-6">
                                <h5 class="text-primary">Rate This Doctor</h5>
                                <form method="POST" action="{{ route('rating.store', $doctor->d_id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <div class="rating">
                                            @for ($i = 5; $i >= 1; $i--)
                                                <input type="radio" id="rating-star{{ $i }}"
                                                    name="rating" value="{{ $i }}"
                                                    @if (isset($userRating) && $userRating == $i) checked @endif required>
                                                <label for="rating-star{{ $i }}" class="star">
                                                    <i class="fas fa-star"></i>
                                                </label>
                                            @endfor
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Rating</button>
                                </form>

                                <h5 class="text-primary mt-4">Comments</h5>
                                <div class="list-group">
                                    @if ($comments->isEmpty())
                                        <p>No comments available.</p>
                                    @else
                                        @foreach ($comments as $comment)
                                            <div class="list-group-item">
                                                <div class="d-flex align-items-start">
                                                    <img src="{{ asset('storage/uploads/' . $comment->image) }}" alt="User Photo" class="rounded-circle mr-3" style="object-fit: cover; height: 45px; width: 45px;">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">{{ $comment->fullname }}</h6>
                                                        <p>{{ $comment->comment }}</p>
                                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <hr>
                                <h5 class="text-primary mt-4">Leave a Comment</h5>
                                <form method="POST" action="{{ route('comments.store', $doctor->d_id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="comment">Comment</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
