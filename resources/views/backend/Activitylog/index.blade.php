@extends('layouts.app')
@section('title', 'Beds')

@section('content')
    {{-- <div class="container mx-auto px-4 lg:w-4/5 xl:w-3/4"> --}}
        @if (session('status'))
        <div class="alert alert-{{ session('alert-type', 'info') }} alert-dismissible fade show" role="alert">
            <strong>{{ session('status') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card h-100">
        <div class="card-header flex-column flex-md-row border-bottom">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2 text-secondary">Beds</h5>
                <a href="{{ route('beds.create') }}" class="btn btn-primary"><i class="mdi mdi-plus me-sm-1"></i><span
                        class="d-none d-sm-inline-block">Beds</span></a>
            </div>
            <hr>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table table-bordered" id="warden">
                    <thead>
                        <tr>
                            <th></th>
                            <th>SR. NO</th>
                            <th>DATETIME</th>
                            <th>MODULE NAME</th>
                            <th>USER NAME</th>
                            <th>CHANGED VALUES</th>
                        </tr>
                    </thead>
                   
                </table>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
  
            $(document).ready(function() {

                fill_datatable();

                $("#overlay").show();

                function fill_datatable(name = '', id = '', created_at = '') {
                    var dataTable = $('#warden').DataTable({
                        searching: true,
                        processing: true,
                        serverSide: true,
                        scrollX: true,
                        lengthMenu: [10, 25, 50, 100, 1000, 10000],
                        ajax: {
                            url: "{{ route('log.index') }}",
                        },
                        columns: [{
                                data: ''
                            },
                            {
                                data: 'id'
                            },
                            {
                                data: 'created_at'
                            },
                            {
                                data: 'description'
                            },
                            {
                                data: 'causer'
                            },
                            {
                                data: 'properties'
                            },
                        ],
                        columnDefs: [{
                            // For Responsive
                            className: 'control',
                            orderable: false,
                            searchable: false,
                            responsivePriority: 1,
                            targets: 0,
                            render: function(data, type, full, meta) {
                                return '';
                                // console.log(data);
                                
                            }
                        }, ],
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function(row) {
                                        var data = row.data();
                                        return 'Details of ' + data['name'];
                                    }
                                }),
                                type: 'column',
                                renderer: function(api, rowIdx, columns) {
                                    var data = $.map(columns, function(col, i) {
                                        return col.title !==
                                            '' // ? Do not show row in modal popup if title is blank (for check box)
                                            ?
                                            '<tr data-dt-row="' +
                                            col.rowIndex +
                                            '" data-dt-column="' +
                                            col.columnIndex +
                                            '">' +
                                            '<td>' +
                                            col.title +
                                            ':' +
                                            '</td> ' +
                                            '<td>' +
                                            col.data +
                                            '</td>' +
                                            '</tr>' :
                                            '';
                                    }).join('');

                                    return data ? $('<table class="table"/><tbody />').append(data) : false;
                                }
                            }
                        },
                        fnInitComplete: function() {
                            $("#overlay").hide();
                        },
                    });
                }

                setTimeout(function() {
                    $('.alert').fadeOut('fast');
                }, 3000);

            });
        </script>
    @endsection
