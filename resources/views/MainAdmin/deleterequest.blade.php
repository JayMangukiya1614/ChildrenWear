@extends('MainAdmin.Main.Master')

@section('FrontAdmin')
    <h1 class="text-center" style="margin-top: 6rem">Admin Deleted Request </h1>
    <div class="table-responsive">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Seller Name</th>
                    <th scope="col">Shopname</th>
                    <th scope="col">Token</th>
                    <th scope="col">GSTNo.</th>
                    <th scope="col">BankName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)

                    @foreach ($data as $key => $data)
                        <tr>

                            <td scope="row">{{ $key + 1 }}</td>

                            <td>{{ $data->firstname }} &nbsp {{ $data->middlename }} &nbsp {{ $data->lastname }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->shopname }}</td>
                            <td>{{ $data->token }}</td>
                            <td>{{ $data->gstno }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->bankname }}</td>
                            <td class="text-wrap"style="max-width:200px;">{{ $data->email }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->message }}</td>
                            <td><a href="{{ route('MshowDeleteform', $data->id) }}" class="btn btn-info">View</a></td>

                        </tr>
                    @endforeach
                @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> Data Not Found ...</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                @endif
            </tbody>
        </table>
    </div>


@endsection
