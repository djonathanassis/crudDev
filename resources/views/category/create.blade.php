@extends('property.master')

@section('content')

    <div class='container'>
        <legend class="text-center mt-4">
            <h2>Formulário - Cadastro de Categoria</h2>
        </legend>
        <a href='<?= url('/category'); ?>' class="fa fa-arrow-left btn btn-success my-3" aria-hidden="true"> voltar</a>

        <fieldset>

            <form action="<?= url('/category/store'); ?>" method="post" enctype='multipart/form-data'>

                <?= csrf_field() ?>

                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="id">Codigo</label>
                        <input type="id" class="form-control" id="id" name="id" placeholder="Novo"
                               readonly=true>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Categoria</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Infome o Nome">
                </div>


                <input type="hidden" name="acao" value="incluir">
                <button type="submit" class="btn btn-primary">
                    Gravar
                </button>
                <a href='<?= url('/category'); ?>' class="btn btn-danger">Cancelar</a>
            </form>
        </fieldset>
    </div>

@endsection

