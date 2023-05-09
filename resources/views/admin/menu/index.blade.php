@extends('admin.layouts.app')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Menus</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.menus.create') }}" class="btn btn-success" role="button" aria-pressed="true"><i
                        class="fa fa-plus"></i> Add new</a>
            </div>
            <div class="card-body">
                <table id="menus" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Has dropdown</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->location }}</td>
                                <td class="text-center"><span class="badge badge badge-{{ $menu->has_dropdown ? 'success' : 'info' }}">{{ $menu->has_dropdown ? 'Yes' : 'No' }}</span></td>
                                <td class="text-center"><span class="badge badge badge-{{ $menu->is_active ? 'success' : 'danger' }}">{{ $menu->is_active ? 'Active' : 'Passive' }}</span></td>
                                <td class="text-center">
                                    <a href="{{ route('admin.menus.order_item', $menu->id) }}" class="btn btn-sm btn-info"><i class="fa fa-arrows"></i> Order item</a>
                                    <a href="{{ route('admin.menus.items.index', $menu->id) }}" class="btn btn-sm btn-success"><i class="fa fa-list"></i> Items</a>
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                    <form class="form-check-inline" action="{{ route('admin.menus.destroy', $menu->id) }}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button onclick="return confirm('Siz bu əməkdaşı silmək istədiyinizdən əminsiniz?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Has dropdown</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
@endsection


@push('css-libs')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">
@endpush


@push('js-libs')
<!-- DataTables -->
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/admin/plugins/toastr/toastr.min.js') }}"></script>
@endpush


@push('js-inline')
<script>
    $(function () {
      $('#menus').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
      });
      @if (session('success'))
        toastr.success('{{session('success')}}');
      @endif
    });
  </script>
@endpush