@if(count($product_ids) > 0)
<table class="table table-bordered aiz-table">
  <thead>
  	<tr>
  		<td width="50%">
          <span>Products</span>
  		</td>
      <td data-breakpoints="lg" width="20%">
          <span>Base Price</span>
  		</td>
  		
  	</tr>
  </thead>
  <tbody>
      @foreach ($product_ids as $key => $id)
      	@php
      		$product = \App\Models\Product::where('product_id', '=', $id)->firstOrFail();
      	@endphp
          <tr>
            <td>
              <div class="from-group row">
                <div class="col-auto">
                  <img class="img-thumbnail" width="60px" src="{{ asset('uploads/products/').'/'.$product->thumbnail}}">
                </div>
                <div class="col">
                  <span>{{  $product->product_name  }}</span>
                </div>
              </div>
            </td>
            <td>
                <span>&#8377;{{ $product->price }}/-</span>
            </td>
            
          </tr>
      @endforeach
  </tbody>
</table>
@endif
