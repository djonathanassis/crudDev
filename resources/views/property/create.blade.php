@extends('property.master')

@section('content')
    <h1>Formulario de cadastro </h1>

    <form action="<?= url('/imoveis/store'); ?>" method="post">

        <?= csrf_field() ?>

        <label for="title">Titulo do imovel</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="description">Descricao</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <br>
        <label for="rental_price">Valor de locacao</label>
        <input type="text" name="rental_price" id="rental_price">
        <br>
        <label for="sale_price">Valor de compra</label>
        <input type="text" name="sale_price" id="sale_price">
        <br>
        <button type="submit">Cadastrar inovel</button>
    </form>

@endsection
