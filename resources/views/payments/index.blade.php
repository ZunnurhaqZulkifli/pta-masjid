@extends('app')

@section('content')
    <div>
        <h1>Senarai Bayaran</h1>

        <div class="form-group mb-3">
            <label class="form-label"> Payments Attributes </label>
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="payment_search" id="payment_search" class="form-control" placeholder="@payments">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-sm btn-outline-primary w-100">Submit</button>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr class="">
                    <td scope="">ID</td>
                    <td class="" colspan="2">Jenis Bayaran</td>
                    <td class="">Pembayar</td>
                    <td class="">Amaun Bayaran</td>
                    <td class="">No. Rujukan</td>
                    <td class="">Bayaran Pada</td>
                    {{-- <td class="" colspan="2">Actions</td> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="">
                        <th scope="row">{{ $payment->id }}</th>
                        <td class="" colspan="2">{{$payment->paymentType->name}}</td>
                        <td class="">{{$payment->name}}</td>
                        <td class="">{{'RM ' . $payment->amount}}</td>
                        <td class="">{{$payment->reference_number}}</td>
                        <td class="">{{$payment->created_at}}</td>
                        {{-- <td class="" colspan="2">
                            <a href="{{ route('payments.show', ['payment' => $payment->id])}}" class="btn btn-sm btn-outline-warning">Show</a>
                            <a href="{{ route('payments.edit', ['payment' => $payment->id])}}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="{{ route('payments.destroy', ['payment' => $payment->id])}}" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="" class="">
            {{ $payments->links() }}
        </a>
    </div>
@endsection
