@extends('Admin.layoutAdmin.app')
{{-- title --}}
@section('title')
    profife
@endsection
{{-- End title --}}
{{-- Section start --}}
@section('content')
<main id="main-container">

    <!-- Page Content -->
    <!-- User Info -->
    <div class="bg-image bg-image-bottom" style="background-image: url('{{asset('admin//media/photos/photo13@2x.jpg')}}');">
      <div class="bg-primary-dark-op py-4">
        <div class="content content-full text-center">
          <!-- Avatar -->
          <div class="mb-3">
            <a class="img-link" href="be_pages_generic_profile.html">
              <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('admin//media/avatars/avatar15.jpg')}}" alt="">
            </a>
          </div>
          <!-- END Avatar -->

          <!-- Personal -->
          <h1 class="h3 text-white fw-bold mb-2">
           {{$admin->student_name}}
          </h1>
          <h2 class="h5 fw-medium text-white-75">
            {{$admin->type}}
          </h2>
          <!-- END Personal -->

          <!-- Actions -->
          <a class="btn btn-alt-primary" href="{{URL::to('/edit_admin/'.$admin->id)}}">
            <i class="fa fa-fw fa-pencil-alt opacity-50 mb-1"></i> Edit
          </a>
          <!-- END Actions -->
        </div>
      </div>
    </div>
    <!-- END User Info -->
</main>

@endsection
{{-- Section End  --}}
