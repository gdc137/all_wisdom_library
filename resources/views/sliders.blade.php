@extends('layouts.main')

@section('title', 'Sliders')

@section('head')

@endsection

@section('content')

<!-- Basic table -->
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0 d-none" style="display: none !important;">Sliders
                </h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sliders</li>
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

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th style="width: 10%">#</th>
                            <th>Type</th>
                            <th>Image</th>
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
                            <td>{{ $row['type'] }}</td>
                            <td><img src="{{ empty($row['image']) ? asset('uploads/noimg.jpg') : asset('uploads/slider_image/' . $row['image']) }}"
                                    onclick="imagemodal(this.src)" height="100px" alt="Image"></td>
                            <td>
                                <button type="button" onclick="changeStatus('{{ $row['id'] }}')"
                                    class="sts-{{ $row['id'] }} btn btn-block btn-{{ $row['status'] == 1 ? 'success' : 'danger' }}">
                                    {{ $row['status'] == 1 ? 'Active' : 'Deactive' }}
                                </button>
                            </td>
                            <td style="width: 15%;">
                                <div class="d-inline-flex">
                                    <a class="p-1 dropdown-toggle hide-arrow text-dark btn btn-flat-primary waves-effect"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('sliders.edit', $row['id']) }}" title="Edit"
                                            class="dropdown-item">
                                            <i class="fa-regular fa-pen-to-square"></i> Edit
                                        </a>
                                        <a href="javascript:void(0)" title="Delete"
                                            data-url="{{ route('sliders.delete', $row['id']) }}"
                                            class="dropdown-item deleteItem">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </a>
                                    </div>
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

<div class="modal fade text-start" id="addItemModal" tabindex="-1" aria-labelledby="myModalLabel22" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ isset($editdata) ? 'Edit' : 'Add' }} Slider</h4>
                <button type="button" class="btn-close" aria-label="Close" @if (isset($editdata))
                    onclick="window.location.href=`{{ route('sliders') }}`" @else data-bs-dismiss="modal"
                    @endif></button>

            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="validationform"
                        action="{{ isset($editdata) ? route('sliders.edit', $editdata['id']) : route('sliders.add') }}">
                        @csrf
                        @if (isset($editdata))
                        @method('PATCH')
                        @endif
                        <input type="hidden" name="id" value="{{ isset($editdata) ? $editdata['id'] : '' }}">
                        <input type="hidden" name="imgpath" value="{{ isset($editdata) ? $editdata['image'] : '' }}">

                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="type">Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">-- Select Slider Type --</option>
                                        <option value="home" {{ isset($editdata) ? ($editdata['type']=='home'
                                            ? 'selected' : '' ) : '' }}>
                                            Home Screen</option>
                                        <option value="basic" {{ isset($editdata) ? ($editdata['type']=='basic'
                                            ? 'selected' : '' ) : '' }}>
                                            Basic Screen</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('type') }}</p>
                                </div>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="image">Image <small>(500x500 px)</small></label>
                                    <input type="file" id="image" class="form-control"
                                        placeholder="Client image or logo" name="image" accept="image/*" />
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12 d-none" id="imgpr">
                                <div class="mb-1">
                                    <img src="{{ isset($editdata) ? (empty($editdata['image']) ? asset('uploads/noimg.jpg') : asset('uploads/slider_image/' . $editdata['image'])) : '' }}"
                                        id="imgPreview" class="w-100" alt="preview">
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <button type="button" class="btn btn-flat-secondary waves-effect" aria-label="Close"
                                @if(isset($editdata)) onclick="window.location.href=`{{ route('sliders') }}`" @else
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
<!-- Modal -->
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

<!-- Modal3 -->
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
            $("#imgpr").removeClass("d-none");

            $('#addItemModal').on('hidden.bs.modal', function() {
                window.location.href = "{{ route('sliders') }}";
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
                    }, {
                    extend: 'colvis',
                    className: 'btn btn-outline-secondary dropdown-toggle me-2',
                    text: feather.icons['eye'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Columns',
                }],
                language: {
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                }
            });
            $('div.head-label').html('<h6 class="mb-0">Sliders</h6>');
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
                    type: {
                        required: true,
                    },
                    image: {
                        required: is_update,
                        fileSizeLimit: 2048000,
                        extension: "jpg|png|jpeg|gif|svg|webp"
                    }
                },
                messages: {
                    type: {
                        required: "Type is require",
                    },
                    image: {
                        required: "Image is require",
                        extension: "Please select image file"
                    }
                }
            });

            $("#image").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#imgpr").removeClass("d-none");
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
                url: "{{ route('sliders.change-status') }}",
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