@extends('property.master')

@section('content')
    <h1>Formulario de edicao cadastro </h1>
    <?php
    $property = $property[0];
    ?>
    <form action="<?= url('/imoveis/update', ['id' => $property->id]); ?>" method="post">

        <?= csrf_field() ?>
        <?= method_field('PUT'); ?>

        <label for="title">Titulo do imovel</label>
        <input type="text" name="title" id="title" value="<?= $property->title; ?>">
        <br>
        <label for="description">Descricao</label>
        <textarea name="description" id="description" cols="30" rows="10"><?= $property->description; ?></textarea>
        <br>
        <label for="rental_price">Valor de locacao</label>
        <input type="text" name="rental_price" id="rental_price" value="<?= $property->rental_price; ?>">
        <br>
        <label for="sale_price">Valor de compra</label>
        <input type="text" name="sale_price" id="sale_price" value="<?= $property->sale_price; ?>">
        <br>
        <button type="submit">Atualizar inovel</button>
    </form>

@endsection
