@extends('layouts.master')

@section('title', 'Paket Laundry')

@section('active', 'Paket Laundry')

@push('css')
 	
@endpush

@push('js')

@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('master.products.edit', $product->id) }}" class="kt-subheader__breadcrumbs-link">
            Edit Product                  
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Edit {{ $product->name }}
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
				Edit Product
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
                <form class="kt-form" method="POST" action="{{ route('master.products.update', $product->id ) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Product Name*:</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" name="name" value="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Product Description*:</label>
                                    <div class="col-9">
                                        <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">stock*:</label>
                                    <div class="col-9">
                                        <input class="form-control" type="number" min="0" name="stock" value="{{ $product->stock }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Price*:</label>
                                    <div class="col-9">
                                        <input class="form-control" type="number" min="0" name="price" value="{{ $product->price }}">
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
                                    @component('component.shared.btn-submit', ['title' => 'Edit']) @endcomponent
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>	
@endsection
