@extends('dropList')
@section('conteudo')
<div class="container">
    <h2>Lista de Personagens</h2>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adicionarCartaModal">
        Adicionar Carta
    </button>

    <div class="modal fade" id="adicionarCartaModal" tabindex="-1" role="dialog" aria-labelledby="adicionarCartaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adicionarCartaModalLabel">Adicionar Carta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('card.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="numero">Numero:</label>
                            <input type="text" id="numero" name="numero" required>
                        </div>
                        <div>
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>
                        </div>
                        <div>
                            <label for="atk">Ataque:</label>
                            <input type="text" id="atk" name="atk" required>
                        </div>
                        <div>
                            <label for="def">Defesa:</label>
                            <input type="text" id="def" name="def" required>
                        </div>
                        <div>
                            <label for="password">Senha:</label>
                            <input type="text" id="password" name="password" required>
                        </div>
                        <div>
                            <label for="custo">Custo:</label>
                            <input type="text" id="custo" name="custo" required>
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
                <th scope="col">Número</th>
                <th scope="col">Imagem</th>
                <th scope="col">Nome</th>
                <th scope="col">Atk / Def</th>
                <th scope="col">Senha</th>
                <th scope="col">Custo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cards as $card)
                <tr>
                    <td>{{ $card->numero }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $card->imagem) }}" style="max-width: 40px; max-height: 80px;">
                    </td>
                    <td>{{ $card->nome }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $card->raca) }}" style="max-width: 40px; max-height: 40px;">
                    </td>
                    <td>{{ $card->atk }} / {{ $card->def }}</td>
                    <td>{{ $card->password }}</td>
                    <td>{{ $card->custo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
