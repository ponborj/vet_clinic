@extends('layout.main')

@section('content')
    <div class="alert alert-success" role="alert">
        <h2>Clients</h2>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <a href="{{ route('client.create') }}" class="btn btn-success">New Client</a>
                    </div>
                    <br>
                    <div class="box-body no-padding">
                        <table id="tb_default" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Cell Phone</th>
                                    <th>Address</th>
                                    <th>State</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->cell_phone }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>{{ $client->state }}</td>
                                        <td>
                                            <a href="{{ route('client.edit', $client->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('client.delete', $client->id) }}"
                                                onclick="return confirm('Are you sure you want to delete this client?')"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
