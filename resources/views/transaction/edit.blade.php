@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('transaction.update',$transaction->id) }}" method="POST">
    	@csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="hidden" name="kd_transactions" class="form-control" placeholder="Kd Transactions" value="{{ $transaction->kd_transactions }}">
		        <div class="form-group">
		            <strong>Product:</strong>
                    <select name="product_id" class="form-control" id="product">
                        <option>-- Pilih Product --</option>
                        @foreach($product as $products)
                            <option value="{{ $products->id }}" data-harga="{{ $products->price }}" {{ ($products->id == $transaction->product_id) ? 'selected' : '' }}>
                                {{ $products->name }}
                            </option>
                        @endforeach
                    </select>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Qty:</strong>
		            <input type="number" name="qty" class="form-control" placeholder="Qty" id="qty" value="{{ $transaction->qty }}">
		        </div>
		    </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Harga:</strong>
		            <input type="number" name="price" class="form-control" placeholder="Harga" id="harga" value="{{ $transaction->product->price }}" disabled>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Total:</strong>
		            <input type="number" name="total" class="form-control" placeholder="Total" id="total" value="{{ $transaction->total }}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

    <script>
        $( document ).ready(function() {
            $("#product").change(function(){
                var idProduct = $(this).val();
                var harga = $(this).find(':selected').attr('data-harga');
                $("#harga").val(harga);
            });
            $("#qty").bind('keyup mouseup', function () {
                if($(this).val() != '') {
                    var total = $('#harga').val() * $(this).val();
                    $("#total").val(total);
                }         
            });
        });
    </script>

@endsection