@extends('MainAdmin.Main.Master')
@section('FrontAdmin')
    <h1 class="text-center" style="margin-top: 6rem">Client Queries</h1>
    <div class="table-responsive">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Client_Id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">subjet.</th>
                    <th scope="col">message</th>
                    <th scope="col">Send Messsage</th>
                    

                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key => $data)
                        <tr>

                            <td scope="row">{{ $key + 1 }}</td>

                            <td>{{ $data->CI_ID }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->subject }}</td>
                            <td class="text-wrap"style="max-width:200px;">
                                <textarea name="" class="form-control" id="" readonly cols="15" rows="2">{{ $data->message }}</textarea>
                            </td>
                            <td>
                                <form action="{{ route('reply-queries', $data->id) }}" method="get">
                                    <textarea name="reply" class="form-control" id="" cols="15" rows="2"></textarea>
                                    <span class="text-danger">
                                        @error('reply')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </td>
                            <td> <button class="btn btn-info" type="submit">Submit</button>
                                </form>
                            </td>




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
                
                @endif
            </tbody>
        </table>
    </div>


@endsection
