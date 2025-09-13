@extends('layout.main')

@section('content')
    <div class="alert alert-warning" role="alert">
        <h2>Edit Clients</h2>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <br>
                    <div class="box-body no-padding">
                        <form role="form" action="{{ route('client.update', $client->id) }}" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" required
                                        oninvalid="this.setCustomValidity('Please, fill out this field')"
                                        onchange="try{setCustomValidity('')}catch(e){}">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $client->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="cell_phone">Phone</label>
                                    <input type="text" class="form-control" id="cell_phone" name="cell_phone" value="{{ $client->cell_phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $client->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state" value="{{ $client->state }}">
                                </div>

                                <br>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
