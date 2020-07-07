@extends('layouts.master')

@section('title', 'Paket Laundry')

@section('active', 'Paket Laundry')

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
        <a href="{{ route('master.products.index') }}" class="kt-subheader__breadcrumbs-link">
           View Product                  
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
       View Product           
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
				Manage Product
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					@component('component.shared.btn-create-modal', [
                        'id' => '#crete_product',
                        'title' => 'Create Product',
                    ]) @endcomponent
				</div>	
			</div>
		</div>
		<div class="modal fade" id="crete_product" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" data-keyboard="false" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="m-form" method="POST" action="{{ route('master.products.store') }}">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Product Name*:</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Product Description*:</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price" class="form-control-label">Stock*:</label>
                                <input type="number" name="stock" min="0" class="form-control" id="price">
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Price*:</label>
                                <input type="number" name="price" min="0" class="form-control" id="name">
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

	<div class="table-responsive">
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable" id="example">
            <thead>
				<tr>
					<th class="text-center" style="width:10px">No</th>
					<th class="text-center">Product</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Stock</th>
					<th class="text-center">Price</th>
					<th class="text-center" style="width:120px">Action</th>
				</tr>
			</thead>
            <tbody>
                @foreach ($products as $no => $product)
                    <tr>
                        <td class="text-right">{{ $no + 1 }}</td>
                        <td class="text-center">{{ $product->name }}</td>
                        <td class="text-center">{{ $product->description }}</td>
                        <td class="text-right">{{ number_format($product->stock) }}</td>
                        <td class="text-right">Rp. {{ number_format($product->price) }}</td>
                        <td class="d-flex justify-content-center text-center">
                            @component('component.shared.btn-edit', [
                                'route' => 'master.products.edit',
                                'params' => $product->id,
                                'title' => 'Edit',
                                'detail' => 'Edit'
                            ]) @endcomponent
                            @component('component.shared.btn-delete', [
                                'route' => 'master.products.destroy',
                                'params' => $product->id,
                                'title' => 'Hapus',
                                'detail' => 'Hapus'
                            ]) @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
		</table>
	</div>		
</div>

@endsection
