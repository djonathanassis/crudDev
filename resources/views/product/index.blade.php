@extends('property.master')

@section('content')

    <div class='container'>

        <legend class="text-center mt-4"><h1>Listagem de Categoria</h1></legend>

        <a href='<?= url('/product/novo'); ?>' class="btn btn-success pull-right my-4">Cadastrar Produto</a>
        <div class='clearfix'></div>

        <?php if (!empty($product)): ?>

        <table class="table table-striped">
            <tr class='active'>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Açãos</th>
            </tr>
            <?php foreach ($product as $prod):

            $linkReadMode = url('/product/' . $prod->url);
            $linkEditItem = url('/product/editar/' . $prod->url);
            $linkRemoveItem = url('/product/remover/' . $prod->url);
            ?>

            <tr>
                <td><?= $prod->id; ?></td>
                <td><?= $prod->name; ?></td>
                <td><?= $prod->category; ?></td>
                <td>
                    <a class="btn btn-primary" href="{{$linkEditItem}}">Editar</a>
                    <a class="btn btn-danger" href="{{$linkRemoveItem}}"
                       onclick="return confirm('Deseja excluir ?')">Excluir
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <?php else: ?>
        <h3 class="text-center text-primary">Não existem produto cadastrados!</h3>
        <?php endif; ?>
        </fieldset>
    </div>

@endsection
