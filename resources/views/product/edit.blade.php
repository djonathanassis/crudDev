@extends('property.master')

@section('content')

    <div class='container'>
        <legend class="text-center mt-4">
            <h2>Formulário - Cadastro de Produto</h2>
        </legend>

        <a href='<?= url('/product'); ?>' class="fa fa-arrow-left btn btn-success my-3" aria-hidden="true"> voltar</a>

        <fieldset>
            <?php
            $product = $product[0];
            ?>

            <form action="<?= url('/product/update', ['id' => $product->id]); ?>" method="post" enctype='multipart/form-data'>

                <?= csrf_field() ?>
                <?= method_field('PUT'); ?>

                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="id">Codigo</label>
                        <input type="id" class="form-control" id="id" name="id" value="<?= $product->id; ?>" placeholder="Novo"
                               readonly=true>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Categoria</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $product->name; ?>" placeholder="Infome o Nome">
                </div>


                <input type="hidden" name="acao" value="incluir">
                <button type="submit" class="btn btn-primary">
                    Gravar
                </button>
                <a href='<?= url('/product'); ?>' class="btn btn-danger">Cancelar</a>
            </form>
        </fieldset>
    </div>

@endsection


