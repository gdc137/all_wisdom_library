@extends('layouts.main')

@section('title', 'Contacts')

@section('head')

@endsection

@section('content')

<!-- Basic table -->
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0 d-none" style="display: none !important;">Contacts
                </h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th style="width: 10%">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Sunject</th>
                            <th>Message</th>
                            <th>Date/time</th>
                        </tr>
                    </thead>
                    <tbody class="row_position">
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{!! $row['name'] !!}</td>
                            <td>{!! $row['email'] !!}</td>
                            <td>{!! $row['number'] !!}</td>
                            <td>{!! $row['subject'] !!}</td>
                            <td>{!! $row['message'] !!}</td>
                            <td>{!! date('Y-m-d / H:i a', strtotime($row['created_at'])) !!}</td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--/ Basic table -->

@endsection

@section('script')
<script>
    var dt_basic_table = $('.datatables-basic');
    if (dt_basic_table.length) {
        var dt_basic = dt_basic_table.DataTable({
            dom: '<"card-header border-bottom p-1"<"head-label">head<"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 10,
            bSort: true,
            lengthMenu: [10, 25, 50, 75, 100],
            buttons: [{
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle me-2',
                    text: feather.icons['share'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Export',
                    buttons: [{
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Print',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Csv',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Excel',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                    ],
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function() {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass(
                                'd-inline-flex');
                        }, 50);
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn btn-outline-secondary dropdown-toggle me-2',
                    text: feather.icons['eye'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Columns',
                }
            ],
            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            }
        });
        $('div.head-label').html('<h6 class="mb-0">Contacts</h6>');
    }
</script>
@endsection