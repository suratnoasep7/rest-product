@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transaction</h2>
            </div>
            <div class="pull-right">
                
                <a class="btn btn-success" href="{{ route('transaction.create') }}"> Create New Transaction</a>
                
            </div>
        </div>
    </div>

    


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($transaction as $transactions)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $transactions->kd_transactions }}</td>
            <td>{{ $transactions->product->name }}</td>
            <td>{{ $transactions->product->satuan->name }}</td>
            <td>{{ $transactions->qty }}</td>
            <td>{{ number_format($transactions->product->price, 0) }}</td>
            <td>{{ number_format($transactions->total, 0) }}</td>
	        <td>
                <form action="{{ route('transaction.destroy',$transactions->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('transaction.show',$transactions->id) }}">Show</a>
                    
                    <a class="btn btn-primary" href="{{ route('transaction.edit',$transactions->id) }}">Edit</a>
                
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                    
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $transaction->links() !!}


@endsection