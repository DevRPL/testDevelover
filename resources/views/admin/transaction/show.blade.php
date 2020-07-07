@extends('layouts.master')

@section('title', 'Detail Sales Order')

@section('active', 'Detail Sales Order')

@push('css')

@endpush

@push('js')
    <script src="{{ asset('admin/default/crud/forms/widgets/assets/app/custom/general/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="#" class="kt-subheader__breadcrumbs-link">
        Detail Sales Order                    
    </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Detail Sales Order   
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
				Detail Sales Order   
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions"></div>	
			</div>
		</div>
    </div>

    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped- table-bordered table-hover table-checkable"      id="example">
                        <thead>
                            <tr class="text-center">
                                <th class="font-weight-bold">No</th>
                                <th class="font-weight-bold">Product Name</th>
                                <th class="font-weight-bold">Qty</th>
                                <th class="font-weight-bold">Price</th>
                                <th class="font-weight-bold">Discount</th>
                                <th class="font-weight-bold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($transactions as $no => $transaction)
                            <tr>
                                <td class="text-right">{{ $no + 1 }}</td>
                                <td class="text-center">{{ $transaction->product->name }}</td>
                                 <td class="text-right">{{ $transaction->quantity }}</td>
                                 <td class="text-right">{{ number_format($transaction->price) }}</td>
                                 <td class="text-right">{{ $transaction->discount ?? 0 }}  %</td>
                                 <td class="text-right">Rp.{{ number_format($transaction->amount) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="btn-process">
                        <div class="col-4 d-flex">
                         
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
