@extends('Admin.layoutAdmin.app')
{{-- title --}}
@section('title')
    show comment
@endsection
{{-- End title --}}
{{-- Start plugins --}}
@section('plugins')
    <link rel="stylesheet" href="{{ asset('admin/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endsection
{{-- End plugins --}}
{{-- Content start --}}
@section('content')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <!-- Heading -->
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <div class="py-3 text-center">
                        <h1 class="h3 fw-extrabold mb-1">
                            List Of Comments
                        </h1>
                    </div>
                </div>
            </div>
            <!-- END Heading -->
            <!-- Dynamic Table with Export Buttons -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    @if (Session::has('msg'))
                        <div id="alertMsg" class="alert alert-primary container fade show" role="alert"
                            style="width: 350px; position: fixed; top: 250px; right: 20px; z-index: 1000;">
                            <p>{{ Session::get('msg') }}</p>
                        </div>

                        <script>
                            setTimeout(function() {
                                document.getElementById('alertMsg').style.display = 'none';
                            }, 3000);
                        </script>
                    @endif
                    <h3 class="block-title">
                        comment
                    </h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Type</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($ratings as $rating)
                                <tr>
                                    <td class="text-center">{{ $count }}</td>
                                    <td>
                                            {{ $rating->university->university_name }}
                                    </td>
                                    <td>{{$rating->comment}}</td>
                                    <td class="d-none d-sm-table-cell">
                                        @if ($rating->status == 0)
                                            <a href="" class="btn btn-info"><i
                                                    class="fa-solid fa-thumbs-down"></i></a>
                                        @else
                                            <a href="" class="btn btn-success"><i
                                                    class="fa-solid fa-thumbs-up"></i></a>
                                        @endif
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        @if ($rating->status == 0)
                                            <a href="{{ url('/active_univ_comment/' . $rating->id) }}"
                                                class="btn btn-success"><i class="fa-solid fa-thumbs-up"></i></a>
                                        @else
                                            <a href="{{ url('/disable_univ_comment/' . $rating->id) }}"
                                                class="btn btn-info"><i class="fa-solid fa-thumbs-down"></i></a>
                                        @endif
                                        <a data-bs-toggle="modal" data-bs-target="#modal-popin" data-id="{{$rating->id}}"
                                         class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pop In Modal -->
                <div class="modal fade" id="modal-popin" tabindex="-1" role="dialog" aria-labelledby="modal-popin"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-popin" role="document">
                        <div class="modal-content">
                            <div class="block block-rounded shadow-none mb-0">
                                <div class="block-header block-header-default">
                                    <h2 class="block-title">Confirmation for deletion</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                </div>
                                <div class="block-content fs-sm">
                                    <p class="h3 text-danger">Do you really want to delete?
                                    </p>
                                </div>
                                <div class="block-content block-content-full block-content-sm text-end border-top">
                                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <a id="deleteButton" href="" type="button" class="btn btn-alt-primary">
                                        Done
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Pop In Modal -->
            </div>
            <!-- END Dynamic Table with Export Buttons -->
        @endsection
        {{-- Content end --}}

        {{-- Script start --}}
        @section('script')
            <!-- jQuery (required for DataTables plugin) -->
            <script src="{{ asset('admin/js/lib/jquery.min.js') }}"></script>

            <!-- Page JS Plugins -->
            <script src="{{ asset('admin/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('admin/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('admin/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('admin/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('admin/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('admin/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('admin/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
            <script src="{{ asset('admin/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
            <script src="{{ asset('admin/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
            <script src="{{ asset('admin/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
            <script src="{{ asset('admin/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

            <!-- Page JS Code -->
            <script>
                $(document).ready(function() {
                    $('.btn-danger').click(function() {
                        var commentId = $(this).data('id');
                        var url = "{{ url('delete_university_comment/') }}/" + commentId;
                        $('#deleteButton').attr('href', url);
                    });
                });
            </script>
        @endsection
        {{-- Script end --}}
