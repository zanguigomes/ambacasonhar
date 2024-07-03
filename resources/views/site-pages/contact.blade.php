@extends('layouts.master')
@section('title', 'Fale Connosco')
@section('content')

    <!-- Single Post Block -->
    <section class="single-post" data-aos="fade-up">
        <header class="single-post-header container" style="margin-bottom: 60px">
            <div class="row">
                <div class="col-12">

                    <div class="single-page-header radius20"><div class="single-page-header-overlay"></div>

                        <div class="nav-title">
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Início</a></li>
                                <li class="breadcrumb-item " aria-current="page">Fale Connosco</li>
                            </ol>
                            </nav>
                            <h1>Fale Connosco</h1>
                        </div>

                    </div>
                </div>
            </div>

        </header>

        <div class="container">
            <div class="row ">

            <div class="col-12 col-md-12 col-lg-8">
              <div class="single-post-body">
                <div class="single-post-content radius10">

                    <div class="header-content">
                        <form class="custom-form " action="{{ route('site.contact.store') }}" method="post" role="form"
                        enctype="multipart/form-data">

                        {{ csrf_field() }}

                        {{-- Dados vazios --}}

                            @if (count($errors) > 0)
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Por favor!</strong> Preencha os dados correctamente!
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            {{-- Dados enviados com suscesso --}}

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            {{-- Erro --}}

                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Ops!</strong> {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                        <div class="row">
                            <div class="col-12 ">
                                <label for="name">Nome (*)</label>

                                <input class="form-control" type="text" name="name"
                                    id="name" placeholder="Informe o seu Nome" value="{{ old('name') }}" required>
                            </div>

                        </div>

                        <!--Phone and whatsApp fields-->
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="email">Endereço de Email (*)</label>
                                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}"
                                    placeholder="Informe o seu email" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="phone">Telefone</label>
                                <input class="form-control" type="tel" name="phone" id="phone" data-mask="(999) 999-999-999" placeholder="Informe o seu Telefone" value="{{ old('phone') }}">
                            </div>

                        </div>

                        <div class="col-12">

                            <label for="subject">Assunto (*)</label>
                            <input class="form-control" type="text" name="subject" id="subject" placeholder="Informe o Assunto" value="{{ old('subject') }}" required>
                        </div>

                        <label for="message">Mensagem (*)</label>
                        <textarea class="form-control" name="message" id="message" title="Mensagem" placeholder="Digite a mensagem" required>{{ old('message') }}</textarea>

                        <p class="small"> (*) Campos obrigatórios</p>

                        <div class="row">
                            <div class="col-12 col-md-3">
                                <button type="submit" class="form-control text-uppercase"><h6>Enviar Mensagem</h6></button>

                            </div>
                        </div>

                    </form>
                    </div>
                </div>
              </div>
            </div>

            <!--Page sidebar -->
            <div class="col-12 col-md-12 col-lg-4 ">
              <aside class="sticky-top">

                <div class="single-post-sidebar">
                    @include('page-sections.about-sidebar')

              </div>
            </aside>
            </div>
          </div>

        </div>
      </section>

@endsection
