@extends('admin.layouts.app')
@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div class="app-toolbar py-3 py-lg-6">
        <div class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Product List
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        Product List
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                @can('products-create')
                <a href="{{ route('admin.products.create') }}" class="btn btn-sm fw-bold btn-primary create_btn">Create New Product</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="app-content flex-column-fluid">
        <div class="app-container container-xxl">
            @include('admin.layouts.alert_message')
            <div class="card">
                <div class="card-body pt-0">
                    <form id="search_form">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center position-relative mt-10 mb-10">

                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="table">
                        @include('admin.ecommerce.products.table') {{-- Update this line to point to your products table --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.bootstrap5.min.css">

<style>
    /* Ensuring uniform height for search bar and buttons */
    .dt-buttons .btn, 
    .dataTables_filter input {
        height: 38px;  /* Same height for buttons & search bar */
        line-height: 1.5;
        border-radius: 5px; /* Optional rounded corners */
    }

    .dataTables_filter input {
        padding: 8px 12px;
        border: 1px solid #ccc;
        outline: none;
    }

    .dt-buttons {
        margin-bottom: 10px; /* Adds spacing between buttons and table */
    }

    /* Center pagination */
    .dataTables_paginate {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .dataTables_paginate .paginate_button {
        padding: 5px 10px;
        margin: 2px;
        border-radius: 5px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
    }

    .dataTables_paginate .paginate_button.current {
        background-color: #007bff;
        color: white;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script>
    $(document).ready(function () {
        $('#myDataTable').DataTable({
            dom: '<"d-flex justify-content-between"lfB>rtip', // Align search & buttons in one row
            buttons: [
                
                {
                    extend: 'csv',
                    text: '📁 CSV',
                    className: 'btn btn-success'
                },
                {
                    extend: 'excel',
                    text: '📊 Excel',
                    className: 'btn btn-warning'
                },
             
            ],
            paging: true,  // Enables pagination
            lengthMenu: [5, 10, 25, 50, 100], // Dropdown for number of records per page
            pageLength: 10, // Default rows per page
            language: {
                search: "Search:",  // Custom placeholder for search bar
                paginate: {
                    previous: "⬅ Prev",
                    next: "Next ➡"
                }
            }
        });
    });
</script>




@endsection