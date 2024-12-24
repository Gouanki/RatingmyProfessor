@extends('Admin.layoutAdmin.app')
{{-- title --}}
@section('title')
    show university
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
                        @if (Session::has('msg'))
                            <div class="alert alert-primary container alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <p>{{ Session::get('msg') }}</p>
                            </div>
                        @endif
                        <h1 class="h3 fw-extrabold mb-1">
                            List Of Universities
                        </h1>
                    </div>
                </div>
            </div>
            <!-- END Heading -->
            <!-- Dynamic Table with Export Buttons -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        universities
                    </h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th class="text-center">N°</th>
                                <th>Name</th>
                                <th class="d-none d-sm-table-cell">Country</th>
                                <th class="d-none d-sm-table-cell">City</th>
                                <th class="d-none d-sm-table-cell">Email</th>
                                <th class="d-none d-sm-table-cell">Website</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {!! Form::hidden('', $count = 1) !!}
                            @foreach ($universities as $university)
                                <tr>
                                    <td class="text-center">{{ $count }}</td>
                                    <td class="fw-semibold">{{ $university->university_name }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $university->country }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $university->city }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $university->email }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $university->website }}</td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <a href="{{ url('edit_university/' . $university->id) }}"
                                            class="btn btn-primary"><i class="fa-solid fa-pen"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#modal-popin"
                                            data-id="{{ $university->id }}" data-name="{{ $university->university_name }}"
                                            class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>

                                    </td>
                                </tr>
                                {!! Form::hidden('', $count++) !!}
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                                <p class="h3 text-danger">Do you really want to delete <span id="studentName"></span>?</p>
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
    </main>
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
    <script src="{{ asset('admin/js/pages/be_tables_datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.btn-danger').click(function() {
                var studentId = $(this).data('id');
                var studentName = $(this).data('name');
                var url = "{{ url('delete_university/') }}/" + studentId;
                $('#deleteButton').attr('href', url);
                $('#studentName').text(studentName);
            });
        });
    </script>
@endsection
{{-- Script end --}}
