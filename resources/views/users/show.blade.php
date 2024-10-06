@extends('app')

@section('content')
    <div>
        <h1>Pengguna {{ $user->name }}</h1>
        <table class="table">
            <thead>
                <tr class="">
                    <td scope="">Id</td>
                    <td class="" colspan="2">Name</td>
                    <td class="">Email</td>
                    <td class="">Username</td>
                    <td class="">Phone</td>
                    <td class="">IC NO</td>
                    <td class="">Created At</td>
                    <td class="" colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <th scope="row">{{ $user->id }}</th>
                    <td class="" colspan="2">{{ $user->name }}</td>
                    <td class="">{{ $user->email }}</td>
                    <td class="">{{ $user->username }}</td>
                    <td class="">{{ $user->phone_number }}</td>
                    <td class="">{{ $user->identification_number }}</td>
                    <td class="">{{ $user->created_at }}</td>
                    <td class="" colspan="2">
                        <a href="{{ route('users.edit', ['user' => $user->id])}}" class="btn btn-sm btn-outline-primary">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>

        @foreach($payments as $payment)
            <div class="card mb-3">
                <div class="card-header">
                    Payment {{ $payment->reference_number }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Payment Type: {{ $payment->paymentType->name }}</h5>
                    <p class="card-text">Amount: RM {{ $payment->amount }}</p>
                    <p class="card-text">Reference Number: {{ $payment->reference_number }}</p>
                    <p class="card-text">Paid At: {{ $payment->created_at }}</p>
                    <a href="{{ route('payments.show', ['payment' => $payment->id]) }}" class="btn btn-primary">Lihat</a>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $payments->links() }}
        </div>
    </div>
@endsection
