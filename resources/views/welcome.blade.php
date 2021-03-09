@extends('template.main')

@section('content')
    <div class="mt-5">
        <div>
            <h1 class="my-2">Ajouter une couleur</h1>

            <form action="/colors" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Couleur :</label>
                    <input type="text" name="color">
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
            </form>
        </div>

        <div class="mt-5">
            <h1>Ajouter une voiture</h1>

            <form action="/cars" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Marque :</label>
                    <input type="text" name="marque">
                </div>

                <div class="form-group">
                    <label for="">Année de création :</label>
                    <input type="number" name="annee">
                </div>

                <div class="form-group">
                    <label for="">Couleur :</label>
                    <select name="color_id" id="">
                        @foreach ($colors as $item)
                            <option value="{{$item->id}}">{{$item->color}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Ajouter</button>
            </form>
        </div>
    </div>

    <div class="mt-5">
        <h1>Les voitures</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Marque</th>
                <th scope="col">Année de création</th>
                <th scope="col">Couleur</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($voitures as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->marque}}</td>
                        <td>{{$item->annee}}</td>
                        <td>{{$item->colors->color}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-5">
        <h1>Les Couleurs</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Couleur</th>
                <th scope="col">Voiture</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->color}}</td>
                        <td>
                            @foreach ($item->cars as $item)
                                <p>{{$item->marque}} {{$item->annee}}</p>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection