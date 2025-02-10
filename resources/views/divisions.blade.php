@extends('layouts.main')

@section('title', 'Divisions')

@section('head')

@endsection

@section('content')

<!-- Basic table -->
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0 d-none" style="display: none !important;">Divisions
                </h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Divisions</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-end col-md-3 col-12 d-md-block">
        <div class="mb-1 breadcrumb-right">
            <div class="dropdown">
                <button type="button" id="modalbutton" class="btn btn-relief-primary" data-bs-toggle="modal"
                    data-bs-target="#addItemModal"><i class="fa-solid fa-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('divisions') }}">
                @csrf

                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="search_scripture_id">Scripture</label>
                            <select name="search_scripture_id" id="search_scripture_id" class="form-control">
                                <option value="">-- Select Scripture --</option>
                                @foreach ($scriptures as $row)
                                <option value="{{ $row['id'] }}">{{ $row['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>Scripture</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Visible At</th>
                            <th>Other Details</th>
                            <th>Status</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="row_position">
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $row['scripture'] }}</td>
                            <td>{{ $row['title'] }}</td>
                            <td>
                                <img src="{{ empty($row['image']) ? asset('uploads/noimg.jpg') : asset('uploads/divisions/' . $row['image']) }}" onclick="imagemodal(this.src)" height="100px" alt="Image">
                            </td>
                            <td>{{ date('d-m-Y H:i a', strtotime($row['visible_at'])) }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modaldetail{{ $row['id'] }}">
                                    Details
                                </button>

                                <div class="modal fade text-start" id="modaldetail{{ $row['id'] }}" tabindex="-1" aria-labelledby="myModalLabel18" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel18">Division Details</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <b>Description</b> : {{ $row['description'] }}<br>
                                                <b>Slug</b> : {{ $row['meta_slug'] }}<br>
                                                <b>Title</b> : {{ $row['meta_title'] }}<br>
                                                <b>Desc</b> : {{ $row['meta_desc'] }}<br>
                                                <b>keywords</b> : {{ $row['meta_keywords'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" onclick="changeStatus(`{{ $row['id'] }}`)"
                                    class="sts-{{ $row['id'] }} btn btn-block btn-{{ $row['active_status'] == 1 ? 'success' : 'danger' }}">
                                    {{ $row['active_status'] == 1 ? 'Active' : 'Deactive' }}
                                </button>
                            </td>
                            <td>
                                <div class="d-flex flex-row">
                                    <a href="{{ route('divisions.edit', $row['id']) }}" title="Edit"
                                        class="btn btn-info me-1">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="javascript:void(0)" title="Delete"
                                        data-url="{{ route('divisions.delete', $row['id']) }}"
                                        class="btn btn-danger deleteItem">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
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

<!-- Modals -->

<div class="modal fade text-start" id="addItemModal" tabindex="-1" aria-labelledby="myModalLabel22" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ isset($editdata) ? 'Edit' : 'Add' }} Division</h4>
                <button type="button" class="btn-close" aria-label="Close" @if (isset($editdata))
                    onclick="window.location.href=`{{ route('divisions') }}`" @else data-bs-dismiss="modal"
                    @endif></button>

            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="validationform"
                        action="{{ isset($editdata) ? route('divisions.edit', $editdata['id']) : route('divisions.add') }}">
                        @csrf
                        @if (isset($editdata))
                        @method('PATCH')
                        @endif
                        <input type="hidden" name="id" value="{{ isset($editdata) ? $editdata['id'] : '' }}">
                        <input type="hidden" name="imgpath" value="{{ isset($editdata) ? $editdata['image'] : '' }}">

                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="scripture_id">Scripture</label>
                                    <select name="scripture_id" id="scripture_id" class="form-control">
                                        <option value="">-- Select Scripture --</option>
                                        @foreach ($scriptures as $row)
                                        <option value="{{ $row['id'] }}" @selected(isset($editdata) ? ($editdata['scripture_id']==$row['id']) : '' )>{{ $row['title'] }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('scripture_id') }}</p>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ isset($editdata) ? $editdata['title'] : '' }}"
                                        placeholder="Enter Title">
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" placeholder="Enter Description">{{ isset($editdata) ? $editdata['description'] : '' }}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="file" id="image" class="form-control"
                                        placeholder="Image" name="image" accept="image/*" />
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 invisible" id="imgpr">
                                <div class="mb-1">
                                    <img src="{{ isset($editdata) ? (empty($editdata['image']) ? asset('uploads/noimg.jpg') : asset('uploads/divisions/' . $editdata['image'])) : '' }}"
                                        id="imgPreview" class="w-100" alt="preview">
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="visible_at">Visible At</label>
                                    <input type="date" class="form-control" name="visible_at" id="visible_at"
                                        value="{{ isset($editdata) ? date('Y-m-d', strtotime($editdata['visible_at'])) : '' }}"
                                        placeholder="Enter Visible At" min="{{ isset($editdata) ? date('Y-m-d', strtotime($editdata['visible_at'])) : date('Y-m-d') }}">
                                    <p class="text-danger">{{ $errors->first('visible_at') }}</p>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="meta_slug">Meta Slug</label>
                                    <input type="text" class="form-control" name="meta_slug" id="meta_slug"
                                        value="{{ isset($editdata) ? $editdata['meta_slug'] : '' }}"
                                        placeholder="Enter Meta Slug">
                                    <p class="text-danger">{{ $errors->first('meta_slug') }}</p>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                                        value="{{ isset($editdata) ? $editdata['meta_title'] : '' }}"
                                        placeholder="Enter Meta Title">
                                    <p class="text-danger">{{ $errors->first('meta_title') }}</p>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="meta_desc">Meta Ddescription</label>
                                    <input type="text" class="form-control" name="meta_desc" id="meta_desc"
                                        value="{{ isset($editdata) ? $editdata['meta_desc'] : '' }}"
                                        placeholder="Enter Meta Ddescription">
                                    <p class="text-danger">{{ $errors->first('meta_desc') }}</p>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                                        value="{{ isset($editdata) ? $editdata['meta_keywords'] : '' }}"
                                        placeholder="Enter Meta Keywords">
                                    <p class="text-danger">{{ $errors->first('meta_keywords') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="button" class="btn btn-flat-secondary waves-effect" aria-label="Close"
                                @if(isset($editdata)) onclick="window.location.href=`{{ route('divisions') }}`" @else
                                data-bs-dismiss="modal" @endif>Close</button>
                            @if (isset($editdata))
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                            @else
                            <button type="submit" class="btn btn-primary float-end">Add</button>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-start" id="imagemodal" tabindex="-1" aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card">
                <div class="card-body">
                    <img class="img-fluid rounded mb-75" src="" id="popimage" alt="img" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
</div>
<button type="button" class="d-none" id="imagebtn" data-bs-toggle="modal" data-bs-target="#imagemodal"></button>

<div class="modal fade text-start" id="deleteModal" tabindex="-1" aria-labelledby="myModalLabel22" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Sure, you want to delete?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card">
                <div class="card-body">
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row text-center">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success me-1">Yes</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"
                                    aria-label="Close">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<button type="button" class="d-none" id="deleteModalBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"></button>

@endsection

@section('script')
@if (isset($editdata))
<script>
    var is_update = false;
    $("#modalbutton").click();
    $("#imgpr").removeClass("invisible");

    $('#addItemModal').on('hidden.bs.modal', function() {
        window.location.href = "{{ route('divisions') }}";
    })
</script>
@else
<script>
    var is_update = true;
</script>
@endif
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
        $('div.head-label').html('<h6 class="mb-0">Divisions</h6>');
    }

    function imagemodal(img) {
        $("#popimage").attr('src', img);
        $("#imagebtn").click();
    }

    $(function() {
        jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
            return !element.files[0] || (element.files[0].size <= limit);
        }, 'Image is too big');

        var validationForm = $('#validationform');
        validationForm.validate({
            rules: {
                title: {
                    required: true,
                },
                image: {
                    fileSizeLimit: 2048000,
                    extension: "jpg|png|jpeg|gif|svg|webp"
                },
                visible_at: {
                    required: true,
                    date: true,
                },
            },
            messages: {
                title: {
                    required: "Title is require",
                },
                image: {
                    extension: "Please select image file"
                }
            }
        });

        $("#image").change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#imgpr").removeClass("invisible");
                    $("#imgPreview").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $(".datatables-basic").on('click', ".deleteItem", function() {
            let route = $(this).data('url');
            $("#deleteForm").attr('action', route);
            $("#deleteModalBtn").click();
        });
    });

    function changeStatus(id) {
        $.ajax({
            url: "{{ route('divisions.change-status') }}",
            type: "POST",
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
            },
            success: function(data) {
                if (data == 'success') {
                    $(".sts-" + id).hasClass('btn-danger') ? $(".sts-" + id).removeClass('btn-danger')
                        .addClass('btn-success').text('Active') : $(".sts-" + id).removeClass('btn-success')
                        .addClass('btn-danger').text('Deactive');
                } else if (data == 'error') {
                    alert('error');
                } else {
                    alert(data);
                }
            }
        });
    }
</script>

@if (\Session::has('success'))
<script>
    $(function() {
        toastr['success'](`{!! \Session::get('success') !!}`, 'Success!', {
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            positionClass: 'toast-top-center',
            timeOut: 3000,
        });
    });
</script>
@endif
@endsection