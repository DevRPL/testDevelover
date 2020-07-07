@extends('layouts.master')

@section('title', 'Sales Order')

@section('active', 'Sales Order')

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
        <a href="#" class="kt-subheader__breadcrumbs-link">
            Transaksi                    
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        index
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
                Data Transaksi
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('master.transaksis.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                        Tambah Transaksi
                    </a>
                </div>  
            </div>
        </div>
    </div>

    <div class="table-responsive">
    <div class="kt-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Transaction Date</th>
                    <th>Order Number</th>
                    <th>Customer</th>
                    <th>Input By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $no => $transaction)
                    <tr>
                        <td class="text-right">{{ $no + 1 }}</td>
                        <td>{{ Carbon\Carbon::parse($transaction->date)->format('d, M Y') }}</td>
                        <td class="text-center">{{ $transaction->customer->name ?? '' }}</td>
                        <td class="text-center">{{ $transaction->order_number }}</td>
                        <td>{{ $transaction->user->name ?? '' }}</td>
                        <td class="text-center">
                            @component('component.shared.btn-detail', [
                                'route' => 'master.transaksis.show',
                                'params' => $transaction->id,
                                'title' => 'Detail Transaksi',
                                'detail' => 'Detail Transaksi',
                                'type' => 'primary'
                            ]) @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>      
</div>
@endsection


