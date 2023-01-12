@extends('Main.main')

@section('Madmin')
    <h1 class="text-center" style="margin-top: 6rem">Admin Accepted Request </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">FirstName</th>
                <th scope="col">Country</th>
                <th scope="col">Token</th>
                <th scope="col">GSTNo.</th>
                <th scope="col">BankName</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $data)
                <tr>

                    <td scope="row">{{ $key + 1 }}</td>

                    <td>{{ $data->firstname }}</td>
                    <td>{{ $data->country }}</td>
                    <td>{{ $data->token }}</td>
                    <td>{{ $data->gstno }}</td>
                    <td>{{ $data->bankname }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->message }}</td>
                    <td><a href="{{ route('MshowAdmin', $data->id) }}" class="btn btn-info">Show</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
