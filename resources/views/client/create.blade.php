@extends('layout.main')

@section('content')
    <div class="alert alert-primary" role="alert">
        <h2>New Clients</h2>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <br>
                    <div class="box-body no-padding">
                        <form role="form" action="{{ route('client.store') }}" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        oninvalid="this.setCustomValidity('Please, fill out this field')"
                                        onchange="try{setCustomValidity('')}catch(e){}">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="cell_phone">Phone</label>
                                    <input type="text" class="form-control" id="cell_phone" name="cell_phone">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state">
                                </div>

                                <br>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
