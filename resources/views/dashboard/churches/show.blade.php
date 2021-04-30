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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Informações da Igreja
                </div>
                <div class="card-body">
                    <form action="{{ route( 'dashboard.church.update' ) }}" method="post">
                        @csrf
                        @method('PUT')
        
                        <div class="my-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nome</label>
                
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $church->name }}">
                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $church->email }}">
                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="mb-3 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Telefone</label>
                
                            <div class="col-md-8">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $church->phone }}">
                
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-3">
                                Atualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Assinatura
                </div>
                <div class="card-body">
                    <div class="my-3 row">
                        <label class="col-md-4 col-form-label text-md-end">Plano</label>
            
                        <div class="col-md-8">
                            <select class="form-select" disabled>
                                <option @if ($church->plan === 1) selected @endif>Bronze</option>
                                <option @if ($church->plan === 2) selected @endif>Prata</option>
                                <option @if ($church->plan === 3) selected @endif>Ouro</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="my-3 row">
                        <label class="col-md-4 col-form-label text-md-end">Expira em</label>
            
                        <div class="col-md-8">
                            <input type="date" class="form-control" value="{{ $church->expiration }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
