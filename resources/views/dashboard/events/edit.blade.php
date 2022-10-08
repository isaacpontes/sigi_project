<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Event') . ' - ' . $event->name }}
    </x-slot>

    <div class="row">
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    {{ __('Editar Informações do Evento') }}
                </div>
                <div class="card-body">
                    <x-error-alert />
                    <form action="{{ route('dashboard.membership.events.update', $event) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nome</label>

                            <div class="col-md-8">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $event->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Descrição</label>

                            <div class="col-md-8">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
                                    rows="6">{{ $event->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="happens_at" class="col-md-4 col-form-label text-md-end">Data e Hora</label>

                            <div class="col-md-6">
                                <input id="happens_at" type="datetime-local"
                                    class="form-control @error('happens_at') is-invalid @enderror" name="happens_at"
                                    value="{{ date('Y-m-d\TH:i', strtotime($event->happens_at)) }}" required>

                                @error('happens_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="button-group float-end">
                            <button type="submit" class="btn btn-success">
                                {{ __('Salvar') }}
                            </button>
                            <a href="{{ route('dashboard.membership.events.index') }}"
                                class="btn btn-outline-secondary">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
