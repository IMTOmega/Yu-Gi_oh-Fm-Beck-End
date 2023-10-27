@extends('dropList')
@section('conteudo')
<div class="container">
    <h2>Lista de Personagens</h2>

    <button style="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adicionarPersonaModal">
        <i class="bi bi-emoji-tear"> </i>Adicionar Personagem  <i class="bi bi-emoji-tear"> </i>
    </button>

    <div class="modal fade" id="adicionarPersonaModal" tabindex="-1" role="dialog" aria-labelledby="adicionarPersonaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adicionarPersonaModalLabel">Adicionar Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('persona.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>
                        </div>
                        <div>
                            <label for="imagem">Imagem:</label>
                            <input type="file" id="imagem" name="imagem" accept="image/*" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Imagem</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personagens as $personagem)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $personagem->imagem) }}" style="max-width: 150px; max-height: 150px;">
                    </td>
                    <td>{{ $personagem->nome }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
