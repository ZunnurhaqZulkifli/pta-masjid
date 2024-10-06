@extends('app')

@section('content')
    <div>
        <h1>Senarai Transaksi</h1>

        <div class="form-group mb-3">
            <label class="form-label"> Transaction Attributes </label>
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="transaction_search" id="transaction_search" class="form-control" placeholder="@transactions">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-sm btn-outline-primary w-100">Submit</button>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr class="">
                    <td scope="">Id</td>
                    <td class="" colspan="2">Name</td>
                    <td class="" colspan="2">Reason</td>
                    <td class="">Amount</td>
                    <td class="">Reference Number</td>
                    <td class="">Project</td>
                    <td class="">Status</td>
                    <td class="" colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="">
                        <td class="">{{ $transaction->id }}</td>
                        <td class="" colspan="2">{{ $transaction->name }}</td>
                        <td class="" colspan="2">{{ $transaction->reason }}</td>
                        <td class="">{{'RM ' . $transaction->amount}}</td>
                        <td class="">{{ $transaction->reference_number }}</td>
                        <td class="">{{ $transaction->paymentType->name }}</td>
                        <td class="">{{ $transaction->paymentStatus->name }}</td>
                        <td class="">{{ $transaction->project->name }}</td>
                        <td class="">{{ $transaction->created_at }}</td>
                        <td class="" colspan="2">
                            <a href="{{ route('transactions.show', ['transaction' => $transaction->id])}}" class="btn btn-sm btn-outline-warning">Show</a>
                            <a href="{{ route('transactions.edit', ['transaction' => $transaction->id])}}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="{{ route('transactions.destroy', ['transaction' => $transaction->id])}}" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="" class="">
            {{ $transactions->links() }}
        </a>
    </div>
@endsection
