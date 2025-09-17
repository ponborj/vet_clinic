@extends('layout.main')

@section('content')
    <div class="alert alert-success" role="alert">
        <h2>Pets</h2>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <a href="{{ route('pet.create') }}" class="btn btn-success">New Pet</a>
                    </div>
                    <br>
                    <div class="box-body no-padding">
                        <table id="tb_default" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 250px">Photo</th>
                                    <th>Name</th>
                                    <th>Dono</th>
                                    <th>Espécie</th>
                                    <th>Sexo</th>
                                    <th>Data de Nascimento</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pets as $pet)
                                    <tr>
                                        <td>{{ $pet->id }}</td>
                                        <td><img src="{{ asset('storage/' . $pet->photo_path) }}" alt="photo"
                                                style="max-width: 250px"></td>
                                        <td>{{ $pet->name }}</td>
                                        <td>Dono</td>
                                        <td>{{ $pet->specie }}</td>
                                        <td>{{ $pet->gender }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pet->birth_date)->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="{{ route('pet.edit', $pet->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('pet.delete', $pet->id) }}"
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
