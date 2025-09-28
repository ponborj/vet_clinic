@extends('layout.main')

@section('content')
    <div class="alert alert-primary" role="alert">
        <h2>New Pet</h2>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <br>
                    <div class="box-body no-padding">
                        <form role="form" action="{{ route('pet.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        oninvalid="this.setCustomValidity('Please, fill out this field')"
                                        onchange="try{setCustomValidity('')}catch(e){}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="client_pet">Cliente:</label>
                                    <input type="text" class="form-control" id="client_pet" name="client_pet"
                                        onkeydown="return false;" required>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                                <div class="form-group">
                                    <label for="specie">Espécie</label>
                                    <input type="text" class="form-control" id="specie" name="specie">
                                </div>
                                <div class="form-group">
                                    <label for="breed">Raça</label>
                                    <input type="text" class="form-control" id="breed" name="breed">
                                </div>
                                <div class="form-group">
                                    <label for="color">Cor</label>
                                    <input type="text" class="form-control" id="color" name="color">
                                </div>
                                <div class="form-group">
                                    <label for="heigth">Altura</label>
                                    <input type="number" class="form-control" id="heigth" name="heigth" step="0.001"
                                        value="0.000" placeholder="0.000">
                                </div>
                                <div class="form-group">
                                    <label for="weight">Peso</label>
                                    <input type="number" class="form-control" id="weight" name="weight" step="0.001"
                                        value="0.000" placeholder="0.000">
                                </div>
                                <div class="form-group">
                                    <label for="weight">Genero</label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="M">Macho</option>
                                        <option value="F">Fêmea</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="birth_date">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="father">Pai</label>
                                    <input type="text" class="form-control" id="father" name="father">
                                </div>
                                <div class="form-group">
                                    <label for="mother">Mãe</label>
                                    <input type="text" class="form-control" id="mother" name="mother">
                                </div>
                                <div class="form-group">
                                    <label for="observations">Observações</label>
                                    <textarea class="form-control" id="observations" name="observations"></textarea>
                                </div>
                                <br>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
