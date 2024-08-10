@extends('layouts.main')

@section('main-section')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header text-white bg-primary">
                        <h3 class="card-title text-center">Doctor Profile</h3>
                    </div>
                    <div class="card-body">
                        <!-- Display success or error messages -->
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <!-- Doctor Information -->
                        @if (isset($doctor))
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('storage/uploads/' . $doctor->image) }}"
                                        class="rounded-circle img-thumbnail mb-3" alt="Doctor Image"
                                        style="object-fit: cover; height: 200px; width: 200px;">
                                </div>
                                <div class="col-md-8">
                                    <h4 class="card-title text-primary">Dr. {{ $doctor->name }}</h4>
                                    <p class="card-text"><strong>NMC No.:</strong> {{ $doctor->nmc_no }}</p>
                                    <p class="card-text"><strong>Specialist:</strong> {{ $doctor->specialist }}</p>
                                    <p class="card-text"><strong>Qualification:</strong> {{ $doctor->qualification }}</p>
                                    <p class="card-text"><strong>Experience:</strong> {{ $doctor->experience }} years</p>
                                    <p class="card-text"><strong>Available Time:</strong> {{ $doctor->fromtime }} -
                                        {{ $doctor->totime }}</p>
                                    <p class="card-text"><strong>Average Rating:</strong>
                                        <span class="badge badge-warning text-dark">
                                            <!-- Display stars for average rating -->
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star{{ $i <= floor($averageRating) ? '' : '-o' }}"></i>
                                            @endfor
                                            ({{ number_format($averageRating, 1) ?? 'No ratings yet' }})
                                        </span>
                                    </p>
                                    <a href="/book" class="btn btn-success btn-block mt-4">Book Appointment</a>
                                </div>
                            </div>

                            <!-- Two-column layout for rating and comments -->
                            <div class="row mt-5">
                                <!-- Rating Form Section -->
                                <div class="col-md-6">
                                    <h5 class="text-primary">Rate This Doctor</h5>
                                    <form method="POST" action="{{ route('rating.store', $doctor->d_id) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="rating">Rating</label>
                                            <div class="rating">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <!-- Note the reversed loop -->
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
                                </div>

                                <!-- Comments Section -->
                                <div class="col-md-6">



                                    <h5 class="text-primary">Comments</h5>
                                    <div class="list-group">
                                        @if ($comments->isEmpty())
                                            <p>No comments available.</p>
                                        @else
                                            @foreach ($comments as $comment)
                                                <div class="list-group-item">
                                                    <div class="d-flex align-items-start">
                                                        <!-- Display user's photo -->
                                                        <img src="{{ asset('storage/uploads/' . $comment->image) }}" alt="User Photo" class="rounded-circle mr-7" style="object-fit: cover; height: 45px; width: 45px; padding: 4px;">

                                                        <div class="flex-grow-3">
                                                            <h6 class="mb-1">{{ $comment->fullname }}</h6>
                                                            <p>{{ $comment->comment }}</p>
                                                            <small class="text-muted">
                                                                <!-- Display the time in a relative format -->
                                                                {{ $comment->created_at->diffForHumans() }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>



                                    <!-- Comment Form Section -->
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
                @else
                    <p class="text-danger">Doctor information not available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
