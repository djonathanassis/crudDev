@extends('property.master')

@section('content')

    <div class='container'>

        <legend class="text-center mt-4"><h1>Listagem de Categoria</h1></legend>

        <a href='<?= url('/category/novo'); ?>' class="btn btn-success pull-right my-4">Cadastrar Categoria</a>
        <div class='clearfix'></div>

        <?php if (!empty($category)) :
        ?>

        <table class="table table-striped">
            <tr class='active'>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Açãos</th>
            </tr>
            <?php foreach ($category as $categ):

            $linkReadMode = url('/category/' . $categ->url);
            $linkEditItem = url('/category/editar/' . $categ->url);
            $linkRemoveItem = url('/category/remover/' . $categ->url);
            ?>

            <tr>
                <td><?= $categ->id; ?></td>
                <td><?= $categ->name; ?></td>
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

        <h3 class="text-center text-primary">Não existem clientes cadastrados!</h3>
        <?php endif; ?>
        </fieldset>
    </div>

@endsection
