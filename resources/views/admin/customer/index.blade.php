@extends('layouts.master')

@section('title', 'Customer')

@section('active', 'Customer')

@push('css')
 	<link href="{{ asset('admin/default/crud/datatables/basic/assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    <script>
        $(document).ready(function() {
           $('#example').dataTable( {
                "paging": true,
                "pageLength": 10
            });
        });
    </script>
	<script src="{{ asset('admin/default/crud/datatables/data-sources/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
   
@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('master.customers.index') }}" class="kt-subheader__breadcrumbs-link">
          View  Customer                    
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        View  Customer       
    </span>
@endsection

@section('content')
<div class="content kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-line-chart"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Manage Customer
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					@component('component.shared.btn-create-modal', [
                        'id' => '#crete_customer',
                        'title' => 'Create Customer',
                    ]) @endcomponent
				</div>	
			</div>
		</div>
		<div class="modal fade" id="crete_customer" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" data-keyboard="false" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="m-form" method="POST" action="{{ route('master.customers.store') }}">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Name*:</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-control-label">Address*:</label>
                                <textarea class="form-control" name="address" id="address"></textarea>
                            </div>
                             <div class="form-group">
                                <label for="phone" class="form-control-label">Phone*:</label>
                                <input type="text" name="phone" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="gender" class="form-control-label">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
							</div>
                        </div>
                        <div class="modal-footer">
                            {{ csrf_field() }}
                            @component('component.shared.btn-save', [
                                'close' => 'Cancel', 'save' => 'Save'
                            ]) @endcomponent
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>

	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable" id="example">
            <thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Gender</th>
					<th>Created By</th>
					<th>Action</th>
				</tr>
			</thead>
            <tbody>
                @foreach ($customers as $no => $customer)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->gender }}</td>
                        <td>{{ $customer->user->name }}</td>
                        <td class="d-flex justify-content-center">
                            @component('component.shared.btn-edit', [
                                'route' => 'master.customers.edit',
                                'params' => $customer->id,
                                'title' => 'Edit',
                                'detail' => 'Edit'
                            ]) @endcomponent
                            @component('component.shared.btn-delete', [
                                'route' => 'master.customers.destroy',
                                'params' => $customer->id,
                                'title' => 'Delete',
                                'detail' => 'Delete'
                            ]) @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
		</table>
	</div>		
@endsection
