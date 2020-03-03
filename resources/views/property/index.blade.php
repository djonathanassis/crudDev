@extends('property.master')

@section('content')
    <h1>Listagem de Produtos</h1>

    <p><a href="<?= url('/imoveis/novo'); ?>">Cadastrar novo imovel</a></p>

    <?php

    if (!empty($properties)) {
        echo "<table>";
        echo "<tr>
              <td>Titulo</td>
              <td>Valor de Locacao</td>
              <td>Valor de Compra</td>
              <td>Acao</td>
          </tr>";
        foreach ($properties as $property) {

            $linkReadMode = url('/imoveis/' . $property->name);
            $linkEditItem = url('/imoveis/editar/' . $property->name);
            $linkRemoveItem = url('/imoveis/remover/' . $property->name);

            echo "<tr>
                <td>{$property->title}</td>
                <td>" . number_format($property->rental_price, "2", ",", ".") . "</td>
                <td>" . number_format($property->sale_price, "2", ",", ".") . "</td>
                <td><a href='{$linkReadMode}'>Ver Mais</a> | <a href='{$linkEditItem}'>Editar</a> | <a href='{$linkRemoveItem}'>Remover</a> </td>
            </tr>";
        }
        echo "</table>";
    }
    ?>

@endsection
