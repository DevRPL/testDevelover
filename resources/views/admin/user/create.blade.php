@extends('layouts.master')

@section('title', 'Create Users')

@section('active', 'Create Users')

@push('css')

@endpush

@push('js')
    <script src="{{ asset('admin/default/crud/forms/widgets/assets/app/custom/general/crud/forms/widgets/bootstrap-datepicker.js') }}" 
        type="text/javascript"></script>
@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Manage Users                  
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Create Users
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
				Manage Users
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions"></div>	
			</div>
		</div>
	</div>

<div class="row">
    <div class="col-lg-12">	
        <div class="kt-portlet__body">
            <form class="kt-form" method="POST" action="{{ route('master.users.store') }}">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Name *:</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" name="name" placeholder="Nama" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Email *:</label>
                                    <div class="col-9">
                                        <input class="form-control" type="email" name="email" placeholder="Email" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">password*:</label>
                                    <div class="col-9">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Confirm password*:</label>
                                    <div class="col-9">
                                        <input type="password" name="confirm-password" class="form-control" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    {{ csrf_field() }}
                                    @component('component.shared.btn-submit',
                                        ['title' => 'Save']
                                    ) @endcomponent
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>	
@endsection
