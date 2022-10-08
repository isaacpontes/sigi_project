<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Church') . ' - ' . $church->name }}
    </x-slot>

    <div class="card-body">
        <x-error-alert />
        <form action="{{ route('dashboard.churches.update', $church) }}" method="post">
            @csrf
            {{ method_field('put') }}

            <div class="mb-3 row">
                <label for="name" class="col-md-2 col-form-label text-md-end">Nome</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ $church->name }}" required autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-md-2 col-form-label text-md-end">Email</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $church->email }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="cnpj" class="col-md-2 col-form-label text-md-end">CNPJ</label>

                <div class="col-md-6">
                    <input id="cnpj" type="cnpj" class="form-control @error('cnpj') is-invalid @enderror"
                        name="cnpj" value="{{ $church->cnpj }}">

                    @error('cnpj')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="phone" class="col-md-2 col-form-label text-md-end">Telefone</label>

                <div class="col-md-6">
                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror"
                        name="phone" value="{{ $church->phone }}">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                Atualizar
            </button>
            <a href="{{ route('home') }}">
                <button type="button" class="btn btn-light">Cancelar</button>
            </a>

        </form>
    </div>

</x-app-layout>

@extends('layouts.app')
