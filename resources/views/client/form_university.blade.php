@extends('client.layout.app')
{{-- Content Start  --}}
@section('content')
    @if (Session::has('msg'))
        <div id="alertMsg" class="alert alert-danger container fade show" role="alert"
            style="width: 350px; position: fixed; top: 250px; right: 20px; z-index: 1000;">
            <p>{{ Session::get('msg') }}</p>
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alertMsg').style.display = 'none';
            }, 3000);
        </script>
    @endif
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>

                            <li class="breadcrumb-item active no-wrap" aria-current="page">university</li>
                        </ol>
                    </nav>

                    <p class="h4 text-white">Rate: {{ $university->university_name }}</p>
                </div>
                <p class="text-white"><b class="bg-warning"><mark>N</mark> B: </b> You can only rate univerisity you're
                    belong to.</p>
            </div>
        </div>
    </header>
    <hr class="m-4">
    <form action="{{ url('/student_rate_university') }}" method="POST">
        {{ csrf_field() }}
        {!! Form::hidden('id', $university->id) !!}
        <div class="container my-5">
            <div class="row g-4">
                <div class="col-md-6 mb-3">
                    <label for="reputation" class="form-label"><i class="fa-solid fa-square-check"
                            style="color: #80d0c7;"></i> Reputation</label>
                    <select
                        class="form-select @if ($errors->has('reputation')) is-invalid
                    @else
                        @if (old('reputation'))
                            is-valid @endif
                    @endif"
                        name="reputation" id="reputation" style="height: 55px;">
                        <option selected></option>
                        <option value="1">Awful</option>
                        <option value="2">OK</option>
                        <option value="3">Good</option>
                        <option value="4">Great</option>
                        <option value="5">Awesome</option>
                    </select>
                    @error('reputation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="location" class="form-label"><i class="fa-solid fa-location-dot"
                            style="color: #80d0c7;"></i> Location</label>
                    <select
                        class="form-select  @if ($errors->has('location')) is-invalid
                    @else
                        @if (old('location'))
                            is-valid @endif
                    @endif"
                        name="location" id="location" style="height: 55px;">
                        <option selected></option>
                        <option value="1">Awful</option>
                        <option value="2">OK</option>
                        <option value="3">Good</option>
                        <option value="4">Great</option>
                        <option value="5">Awesome</option>
                    </select>
                    @error('location')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 mb-3">
                    <label for="opportunity" class="form-label"><i class="fa-solid fa-earth-americas"
                            style="color: #80d0c7;"></i> Opportunities</label>
                    <select
                        class="form-select @if ($errors->has('opportunity')) is-invalid
                    @else
                        @if (old('opportunity'))
                            is-valid @endif
                    @endif"
                        name="opportunity" id="opportunity" style="height: 55px;">
                        <option selected></option>
                        <option value="1">Awful</option>
                        <option value="2">OK</option>
                        <option value="3">Good</option>
                        <option value="4">Great</option>
                        <option value="5">Awesome</option>
                    </select>
                    @error('opportunity')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="food" class="form-label"><i class="fa-solid fa-bowl-food" style="color: #80d0c7;"></i>
                        Food</label>
                    <select
                        class="form-select  @if ($errors->has('food')) is-invalid
                    @else
                        @if (old('food'))
                            is-valid @endif
                    @endif"
                        name="food" id="food" style="height: 55px;">
                        <option selected></option>
                        <option value="1">Awful</option>
                        <option value="2">OK</option>
                        <option value="3">Good</option>
                        <option value="4">Great</option>
                        <option value="5">Awesome</option>
                    </select>
                    @error('food')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 mb-3">
                    <label for="internet" class="form-label"><i class="fa-solid fa-wifi" style="color: #80d0c7;"></i>
                        Internet</label>
                    <select
                        class="form-select  @if ($errors->has('internet')) is-invalid
                    @else
                        @if (old('internet'))
                            is-valid @endif
                    @endif"
                        name="internet" id="internet" style="height: 55px;">
                        <option selected></option>
                        <option value="1">Awful</option>
                        <option value="2">OK</option>
                        <option value="3">Good</option>
                        <option value="4">Great</option>
                        <option value="5">Awesome</option>
                    </select>
                    @error('internet')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">

                    <label for="safety" class="form-label"><i class="fa-solid fa-shield" style="color: #80d0c7;"></i>
                        Safety</label>
                    <select
                        class="form-select  @if ($errors->has('safety')) is-invalid
                    @else
                        @if (old('safety'))
                            is-valid @endif
                    @endif"
                        name="safety" id="safety" style="height: 55px;">
                        <option selected></option>
                        <option value="1">Awful</option>
                        <option value="2">OK</option>
                        <option value="3">Good</option>
                        <option value="4">Great</option>
                        <option value="5">Awesome</option>
                    </select>
                    @error('safety')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 mb-3">
                    <label for="happiness" class="form-label"><i class="fa-solid fa-face-grin-tears"
                            style="color: #80d0c7;"></i> Happiness</label>
                    <select
                        class="form-select form-select-lg @if ($errors->has('happiness')) is-invalid
                    @else
                        @if (old('happiness'))
                            is-valid @endif
                    @endif"
                        name="happiness" id="happiness" style="height: 55px;">
                        <option selected></option>
                        <option value="1">Awful</option>
                        <option value="2">OK</option>
                        <option value="3">Good</option>
                        <option value="4">Great</option>
                        <option value="5">Awesome</option>
                    </select>
                    @error('happiness')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="club" class="form-label"><i class="fa-solid fa-people-group"
                            style="color: #80d0c7;"></i> Club</label>
                    <select
                        class="form-select  @if ($errors->has('club')) is-invalid
                    @else
                        @if (old('club'))
                            is-valid @endif
                    @endif"
                        name="club" id="club" style="height: 55px;">
                        <option selected></option>
                        <option value="1">Awful</option>
                        <option value="2">OK</option>
                        <option value="3">Good</option>
                        <option value="4">Great</option>
                        <option value="5">Awesome</option>
                    </select>
                    @error('club')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- <div class="row g-3">
                    <div class="col-12"> --}}
                <label for="comment" class="form-label full-width"><i class="fa-solid fa-feather"
                        style="color: #80d0c7;"></i> Write a Review</label>
                <textarea
                    class="form-control    @if ($errors->has('comment')) is-invalid
                        @else
                            @if (old('comment'))
                                is-valid @endif
                        @endif"
                    name="comment" id="comment" rows="3"></textarea>
                @error('comment')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                {{-- </div>
                </div> --}}
                <div class="row g-3">
                    <button type="submit"
                        class="btn btn-lg custom-btn hover-opacity-5 w-50 mx-auto d-block">Send</button>
                </div>
            </div>

        </div>
    </form>
@endsection
{{-- Content End --}}
