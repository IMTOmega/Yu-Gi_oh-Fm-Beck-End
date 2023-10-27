@extends("dropList")
@section("conteudo")

<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col">Raça</th>
            </tr>
          </thead>
        <tbody id="tabelaRaca">

        </tbody>
    </table>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col">Número</th>
            <th class="col">Nome</th>
            <th class="col">Tipo</th>
            <th class="col">Raça</th>
            <th class="col">Lvl</th>
            <th class="col">Atk</th>
            <th class="col">Def</th>
            <th class="col">Password</th>
            <th class="col">Preço</th>
        </tr>
      </thead>
    <tbody id="tabelaResultado">

    </tbody>
</table>

<form id="formCarta">
    @csrf
    <label for="dados">Dados da Carta:</label>
    <textarea name="dados" id="dados" placeholder="Digite os dados da carta"></textarea>
    <button type="button" onclick="processarCarta()">Processar</button>
</form>


@endsection
@push("script")
<script>
    function processarCarta() {
            var dados = $("#dados").val().split("\n");

            var resultadoHtml = [];
            var racasUnicas = [];

            dados.forEach(function (linha) {
                var partes = linha.split("\t");
                var numero = partes[0];
                var nome = partes[1];
                var tipo = partes[2];
                var raca = partes[3];
                var level = partes[4];
                var atk = partes[5];
                var def = partes[6];
                var senha = partes[7];
                var preco = partes[8];

                // Se o campo raça estiver em branco, use o valor de tipo
                if (raca.trim() === "") {
                    raca = tipo;
                }
                // Adicione o novo campo e faça os cálculos desejados
                var novoPreco = calcularNovoPreco(atk, def);

                resultadoHtml += "<tr>";
                resultadoHtml += "<td>" + "[" + '"' + numero + '"' + "," + "</td>";
                resultadoHtml += "<td>" + '"' + nome + '"' + "," + "</td>";
                resultadoHtml += "<td>" + '"' + tipo + '"' + "," + "</td>";
                resultadoHtml += "<td>" + '"' + raca + '"' + "," + "</td>";
                resultadoHtml += "<td>" + '"' + level + '"' + "," + "</td>";
                resultadoHtml += "<td>" + '"' + atk + '"' + "," + "</td>";
                resultadoHtml += "<td>" + '"' + def + '"' + "," + "</td>";
                resultadoHtml += "<td>" + '"' + senha + '"' + "," + "</td>";
                resultadoHtml += "<td>" + '"' + preco + '"' + "]," + "</td>";
                resultadoHtml += "</tr>";

                if (racasUnicas.indexOf(raca) === -1) {
                    racasUnicas.push(raca);
                }
            });

            // Exibir os resultados na tabela
            $("#tabelaResultado").html(resultadoHtml);

            // Exibir as raças únicas na segunda tabela
            var racasHtml = racasUnicas.map(function (raca) {
                return "<tr><td>" + raca + "</td></tr>";
            }).join("");
            $("#tabelaRaca").html(racasHtml);
        }

        // Função para calcular o novo preço
        function calcularNovoPreco(atk, def) {
            var novoPrecoBase = (parseInt(atk) + parseInt(def)) / 200;
            var novoPreco = 0;

                if (novoPrecoBase <= 5) {
                    novoPreco = novoPrecoBase * 5;
                } else if (novoPrecoBase <= 10) {
                    novoPreco = novoPrecoBase * 10;
                } else if (novoPrecoBase <= 15) {
                    novoPreco = novoPrecoBase * 15;
                } else if (novoPrecoBase <= 16) {
                    novoPreco = novoPrecoBase * 25;
                } else if (novoPrecoBase <= 17) {
                    novoPreco = novoPrecoBase * 40;
                } else if (novoPrecoBase <= 18) {
                    novoPreco = novoPrecoBase * 90;
                } else if (novoPrecoBase <= 20) {
                    novoPreco = novoPrecoBase * 90;
                } else if (novoPrecoBase <= 25) {
                    novoPreco = novoPrecoBase * 100;
                } else if (novoPrecoBase <= 30) {
                    novoPreco = novoPrecoBase * 130;
                } else if (novoPrecoBase <= 35) {
                    novoPreco = novoPrecoBase * 210;
                } else {
                    novoPreco = novoPrecoBase * 340;
                }
            return novoPreco.toFixed();
        }
</script>
@endpush
@push("css")
<style>
    #dados {
        width: 900px;
        height: 150px;
    }
</style>
@endpush
