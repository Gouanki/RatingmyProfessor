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

                            <li class="breadcrumb-item active" aria-current="page">professor</li>
                        </ol>
                    </nav>

                    <h3 class="text-white">Rate: {{ $professor->professor_name }}</h3>
                    <small class="text-white">{{ $professor->university->university_name }}</small>
                </div>
                <p class="text-white"><b class="bg-warning"> <mark>N</mark> B: </b>  You can only rate professor if you belong to the same university.</p>
            </div>
        </div>
    </header>
    <hr class="m-4">
    <form action="{{ url('/student_rate_professor') }}" method="post">
        {{ csrf_field() }}
        {!! Form::hidden('id', $professor->id) !!}
        <div class="container col-11">
            <div class="row g-4">
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Select Course</label>
                    <select
                        class="form-select form-select-lg @error('course')
                        is-invalid
                    @enderror"
                        name="course" id="courseSelect">
                        <option selected>Select a course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                        <option value="other">Other</option>
                    </select>
                    @error('course')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="col-md-6 mb-3" id="otherCourseDiv" style="display: none;">
                        <label for="otherCourse" class="form-label">Enter Course Name</label>
                        <input type="text" class="form-control" id="otherCourse" name="course_name">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <p>Did this professor use textbooks?</p>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input @error('textbooks')
                        is-invalid
                    @enderror"
                            type="radio" name="textbooks" id="inline_yes" value="1">
                        <label class="form-check-label" for="inline_yes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input @error('textbooks')
                        is-invalid
                    @enderror"
                            type="radio" name="textbooks" id="inline_no" value="0">
                        <label class="form-check-label" for="inline_no">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row g-4">
                <div class="col-md-6 mb-3">
                    <p>Did he take time to listen to student?</p>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input @error('listened_to_students')
                        is-invalid
                    @enderror"
                            type="radio" name="listened_to_students" id="inline_yes" value="1">
                        <label class="form-check-label" for="inline_yes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input @error('listened_to_students')
                        is-invalid
                    @enderror"
                            type="radio" name="listened_to_students" id="inline_no" value="0">
                        <label class="form-check-label" for="inline_no">
                            No
                        </label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <p>Would you take this professor again?</p>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input @error('take_again')
                        is-invalid
                    @enderror"
                            type="radio" name="take_again" id="inline_yes" value="1">
                        <label class="form-check-label" for="inline_yes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input @error('take_again')
                        is-invalid
                    @enderror"
                            type="radio" name="take_again" id="inline_no" value="0">
                        <label class="form-check-label" for="inline_no">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row g-4">
                <div class="col-md-6 mb-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Grade your Professor</label>
                        <select class="form-select form-select-lg" name="gy_Professor" id="">

                            <option selected></option>
                            <option value="hawesome">Hawesome</option>
                            <option value="great">Great</option>
                            <option value="good">Good</option>
                            <option value="ok">Ok</option>
                            <option value="awful">Awful</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="mb-3">
                        <label for="" class="form-label"> How difficult was this professor?</label>
                        <select class="form-select form-select-lg" name="difficult_professor" id="">
                            <option selected></option>
                            <option value="1">Very difficult</option>
                            <option value="2">Difficult</option>
                            <option value="3">Average</option>
                            <option value="4">Easy</option>
                            <option value="5">Very easy</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row g-4">
                <div class="col-md-6 mb-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Select grade</label>
                        <select
                            class="form-select form-select-lg @error('grade')
                        is-invalid
                    @enderror"
                            name="grade" id="">
                            <option selected></option>
                            <option value="100">A+</option>
                            <option value="93">A</option>
                            <option value="90">A-</option>
                            <option value="87">B+</option>
                            <option value="80">B-</option>
                            <option value="77">C+</option>
                            <option value="73">C</option>
                            <option value="70">C-</option>
                            <option value="68">D+</option>
                            <option value="63">D</option>
                            <option value="60">D-</option>
                            <option value="50">D-</option>
                        </select>
                        @error('grade')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Write a Review</label>
                        <textarea class="form-control @error('comment')
                       is-invalid
                    @enderror"
                            name="comment" id="commentInput" rows="3"></textarea>
                    </div>
                    @error('comment')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-8 col-12 mx-auto">
                <button class="btn btn custom-btn hover-opacity-5 w-50 mx-auto d-block" type="submit">Send</button>
            </div>
        </div>
    </form>
@endsection
{{-- Content End --}}
@section('scripts')
    <script>
        document.getElementById('courseSelect').addEventListener('change', function() {
            if (this.value === 'other') {
                document.getElementById('otherCourseDiv').style.display = 'block';
            } else {
                document.getElementById('otherCourseDiv').style.display = 'none';
            }
        });
    </script>
@endsection
