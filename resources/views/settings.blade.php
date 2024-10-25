@extends('base')

@section('title')
    Parametrages
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gestion de confirmation</h4>
                        <div class="table-responsive">
                            <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#addConfirmation"><i class="fa fa-plus"></i></button>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Libelle</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($confirmations as $key => $item)
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ $item->libelle }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#editConfirmation"><i class="fa fa-edit"></i></button>
                                        </td>
                                        <div class="modal" id="editConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="POST" action="/edit/confirmation/{{$item->id}}">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Modification de confirmation</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="form-label">Libelle:</label>
                                                                <input type="text" name="libelle" value="{{ $item->libelle }}" class="form-control" id="recipient-name1">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary text-white">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td class="" colspan="3">Pas de parametre de confirmation</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gestion de position</h4>
                        <div class="table-responsive">
                            <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#addPosition"><i class="fa fa-plus"></i></button>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Libelle</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($positions as $key => $item)
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ $item->libelle }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#editPosition"><i class="fa fa-edit"></i></button>
                                        </td>
                                        <div class="modal" id="editPosition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="POST" action="/edit/position/{{$item->id}}">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Modification de gestion de position</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="form-label">Libelle:</label>
                                                                <input type="text" name="libelle" value="{{ $item->libelle }}" class="form-control" id="recipient-name1">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary text-white">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td class="" colspan="3">Pas de parametre de gestion de position</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="addConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="/add/confirmation">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Ajout de confirmation</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="form-label">Libelle:</label>
                            <input type="text" name="libelle" class="form-control" id="recipient-name1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary text-white">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="addPosition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="/add/position">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Ajout de gestion de position</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="form-label">Libelle:</label>
                            <input type="text" name="libelle" class="form-control" id="recipient-name1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary text-white">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
