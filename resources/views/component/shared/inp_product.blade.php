<select class="product_id form-control" name="{{ $name }}">
    <option value="">== Select Product == </option>
    @foreach ($products as $product)
        <option data-price="{{ $product->price }}" value="{{ $product->id }}">{{ $product->name  }}</option>
    @endforeach
</select>