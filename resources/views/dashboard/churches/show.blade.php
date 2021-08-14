<x-app-layout>
    <x-slot name="header">
        {{ $church->name }}
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8 col-lg-6 offset-md-2 offset-lg-3">
            <div class="card mb-4">
                <div class="card-header">
                    {{ __('Informações da Igreja') }}
                </div>
                <div class="card-body">
                    <form action="{{ route( 'dashboard.church.update' ) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="my-3 row">
                            <label for="name" class="col-lg-4 col-form-label text-lg-end">
                                {{ __('Nome') }}
                            </label>

                            <div class="col-lg-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $church->name }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-lg-4 col-form-label text-lg-end">
                                {{ __('Email') }}
                            </label>

                            <div class="col-lg-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $church->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone" class="col-lg-4 col-form-label text-lg-end">
                                {{ __('Telefone') }}
                            </label>

                            <div class="col-lg-8">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $church->phone }}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mt-3">
                                {{ __('Atualizar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
