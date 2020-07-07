@extends('layouts.master')

@section('title', 'Create Sales Order')

@section('active', 'Create Sales Order')

@push('css')

@endpush

@push('js')
    <script src="{{ asset('admin/default/crud/forms/widgets/assets/app/custom/general/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>

    <script>
        $("#m_select2_customer").select2({
            placeholder: "Select Customer"
        });
        // $('.money').simpleMoneyFormat();
    </script>

<script type="text/javascript">
    function totalAmount(){
        var t = 0;
        $('.amount').each(function(i,e){
            var amt = $(this).val()-0;
            t += amt;
        });
        $('tr .total').html(numberFormat(t));
    }

    $(function () {
        $('.getmoney').change(function(){
            var total = $('.total').html();
            var getmoney = $(this).val();
            var t = getmoney - total;
            $('.backmoney').val(t).toFixed(2);
        });
        $('.add').click(function () {
            var product = $('.product_id').html();
            var n = ($('.neworderbody tr').length - 0) + 1;
            var tr = '<tr><td class="no">' + n + '</td>' + '<td><select class="form-control product_id" name="product_id[]">' + product + '</select></td>' +
                '<td><input type="text" class="qty form-control" name="quantity[]" value="{{ old('
            email ') }}"></td>' +
                '<td><input type="text" class="price form-control" name="price[]" value="{{ old('
            email ') }}"></td>' +
                '<td><input type="text" class="dis form-control" name="discount[]"></td>' +
                '<td><input type="text" class="amount form-control" name="amount[]"></td>' +
                '<td class="text-center"><input type="button" class="col-5 btn btn-danger mr-2 delete" value="x"></td></tr>';
            $('.neworderbody').append(tr);
        });
        $('.neworderbody').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
            totalAmount();
        });
        $('.neworderbody').delegate('.product_id', 'change', function () {
            var tr = $(this).parent().parent();
            var price = tr.find('.product_id option:selected').attr('data-price');
            tr.find('.price').val(price);
            
            var qty = tr.find('.qty').val() - 0;
            var dis = tr.find('.dis').val() - 0;
            var price = tr.find('.price').val() - 0;
        
            var total = (qty * price) - ((qty * price * dis)/100);
            if(isNaN(total)) {
                var total = 0;
            }
            tr.find('.amount').val(total);
            totalAmount();
        });
        $('.neworderbody').delegate('.qty , .dis', 'keyup', function () {
            var tr = $(this).parent().parent();
            var qty = tr.find('.qty').val() - 0;
            var dis = tr.find('.dis').val() - 0;
            var price = tr.find('.price').val() - 0;

            var total = (qty * price) - ((qty * price * dis)/100);
            if(isNaN(total)) {
                var total = 0;
            }
            tr.find('.amount').val(total);
            totalAmount();
        });
    });

    function numberFormat(x) {
        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
    
@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Manage Sales Order                  
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Create Sales Order    
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
                Create Sales Order    
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions"></div>    
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('master.transaksis.store') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12"> 
                <div class="kt-portlet__body">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 30%">Date</td>
                            <td>
                                <input class="form-control" name="date" value="{{ now()->format('Y-m-d') }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Order Number</td>
                            <td>
                                <input class="form-control" name="order_number" value="{{ $numberNew }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Customer Name</td>
                            <td>
                                <select class="form-control text-white bg-primary"  name="customer_id" id="m_select2_customer">
                                    <option value="">== Select Customer == </option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped- table-bordered table-hover table-checkable">
                            <thead>
                                <tr class="text-center">
                                    <th class="font-weight-bold">No</th>
                                    <th class="font-weight-bold">Product Name</th>
                                    <th class="font-weight-bold">Qty</th>
                                    <th class="font-weight-bold">Price</th>
                                    <th class="font-weight-bold">Discount</th>
                                    <th class="font-weight-bold">Total</th>
                                    <th class="font-weight-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody class="neworderbody">
                                <tr>
                                    <td class="text-right no"  width="5%">{{ $i = 0 + 1 }}</td>
                                    <td class="text-center" width="40%">
                                        <!-- <select class="form-control product_id" name="product_id[]">
                                            <option value="">== Select Product == </option>
                                            @foreach($products as $product)
                                                <option data-price="{{ $product->price }}" value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select> -->

                                        @component('component.shared.inp_product', [
                                            'products' => $products, 'name' => 'product_id[]'
                                        ]) @endcomponent

                                    </td>
                                    <td class="text-right" width="10%">
                                        <input type="text" class="qty form-control" name="quantity[]" value="{{ old('qty') }}">
                                    </td>

                                    <td class="text-right" width="10%">
                                        <input type="text" class="money price form-control" name="price[]" value="{{ old('email') }}">
                                    </td>
                                    <td class="text-right" width="10%">
                                        <input type="text" class="dis form-control" name="discount[]">
                                    </td>
                                    <td class="text-right" width="10%">
                                        <input type="text" class="amount form-control" name="amount[]">
                                    </td>
                                    <td class="text-center" width="10%">
                                        <input type="button" class="col-5 btn btn-primary mr-2 add" value="+">
                                    </td>
                                </tr>
                            </tbody>
                                <tr>
                                    <td colspan="4" class="text-center text-light bg-primary font-weight-bold">Sub Total</td>
                                    <td class="text-light text-right bg-primary font-weight-bold">Rp.</td>
                                    <td class="text-right font-weight-bold total">0</td>
                                    <td class="text-light bg-primary"></td>
                                </tr>
                        </table>
                        <div class="btn-process">
                            <div class="col-4 d-flex">
                                <button class="col-5 btn btn-primary mr-2">Proses Order</button>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
