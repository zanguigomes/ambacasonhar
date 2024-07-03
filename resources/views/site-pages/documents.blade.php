@extends('layouts.master')
@section('title', 'Documentos')
@section('content')

    <!-- Single Post Block -->
    <section class="single-post">

        <!--- Single Post header-->
        <header class="single-post-header container">
          <div class="row">
            <div class="col-12">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Início</a></li>
                    <li class="breadcrumb-item " aria-current="page">Documentos</li>
                </ol>
            </nav>
            <h1>Documentos e Arquivos</h1>
            </div>
          </div>
        </header>

        <div class="container quick-access">
            <div class="row row-cols-1 row-cols-md-2 g-4" data-masonry='{"percentPosition": true }'>

            @foreach ($documents as $doc)
                        <div class="col-12 col-lg-6 quick-access">
                            <a href="{{ Storage::url($doc->file) }}" target="_black">
                                <div class="container quick-access-button document-file radius10">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="pdf-icon">
                                                <i class="fa-regular fa-file-pdf"></i>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <h2> {{ $doc->title }} </h2>
                                            <p>{{ $doc->head_line }}</p>
                                            <span class="doc-file-date radius30"><i class="bi bi-calendar-week"></i>
                                                {{ date('d/m/Y', strtotime($doc->date_pub)) }}</span><span
                                                class="doc-file-size radius30"><i
                                                    class="bi bi-file-earmark-arrow-down"></i>
                                                {{ $doc->size }}</span>
                                            <span class="doc-file-size radius30">{{ $doc->type }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

          </div>
        </div>
      </section>

@endsection
