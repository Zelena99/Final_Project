<x-layout>
    <x-slot name='title'>{{__('Affiliate - Inicia sesión')}}</x-slot>
    {{-- FOrM LOGIN --}}
    <div class="container-fluid vh-100">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 mt-5">
                {{-- FORM TITLE --}}
                <h2 class="form-title space-around text-center">{{__('Iniciar sesión')}}</h2>
                @if ($errors->any())
                <div class="alert alert-danger" >
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- FORM FIELDS --}}
                <form action="/login" method="POST" role="form" class="form-control loginSide">
                @csrf
                {{-- EMAIL --}}
                <div class="space-around my-2">
                    <input type="email" name="email" id="email" class="form-control forms_field-input"
                    placeholder="{{__('Correo electrónico')}}" date-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                {{-- Password --}}
                <div class="space-around my-2">
                    <input type="password" name="password" id="password" class="form-control forms_field-input"
                    placeholder="{{__('Tu contraseña')}}">
                    <div class="validate"></div>
                </div>
                {{-- Button Login --}}
                <div class="d-flex justify-content-center">
                <button type="submit" class=" btn btn-secondary my-1">
                    {{__('Entrar')}}
                </button>
                </div>
                </form>
                <div class="d-flex justify-content-center">
                    <p class="mt-4">{{__('¿Aún no eres de los nuestros?')}} <a class="btn btn-danger btn-sm ms-2" href="{{route('register')}}">{{__('¡Registrate!')}}</a></p>
                </div>
            </div>
        </div>
    </div>
</x-layout>