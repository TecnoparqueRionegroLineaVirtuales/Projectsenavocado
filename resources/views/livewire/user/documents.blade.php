<div>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a class="text-green-600" href="{{ route('frontend.user.index') }}">Inicio</a></li>
                <li>Documentos</li>
            </ol>
            <h2>Documentos</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    @if ($documents->count())
        <section id="blog" class="blog">
            <div class="container w-5/6 mx-auto pb-40">
                <div class="container" data-aos="fade-up">
                    @foreach ($documents as $document)
                        @if ($document->status == '1')
                            <article class="entry">
                                <div class="card mb-3">
                                    <div class="row g-0 flex flex-wrap border border-gray-300 rounded">
                                        <div class="w-96">
                                            <img src="{{ asset($document->url_photo) }}" alt="" class="img-fluid">
                                        </div>

                                        <div class="contenido">
                                            <div class="card-body">

                                                <h2 class="entry-title uppercase">
                                                    <a>{{ $document->title }}</a>
                                                </h2>

                                                <div class="entry-meta">
                                                    <ul>
                                                        <li class="d-flex align-items-center">
                                                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                                        <a>{{ $document->name_author }}{{ $document->lastname_author }}</a>
                                                        </li>
                                                        <li class="d-flex align-items-center">
                                                            <svg class="h-6 w-6 text-gray-400"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />  <line x1="16" y1="2" x2="16" y2="6" />  <line x1="8" y1="2" x2="8" y2="6" />  <line x1="3" y1="10" x2="21" y2="10" /></svg>
                                                            <a><time datetime="2020-11-11">{{ $document->date_publication }}</time></a>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="entry-content">
                                                    <p>
                                                        {{ $document->description }}
                                                    </p>
                                                    <div class="read-more py-5">
                                                        {{--@if (Route::has('login'))
                                                            @auth
                                                                <a href="{{ route('admin.download', [$document->id]) }}"
                                                                    class='btn btn-ghost-dark'>
                                                                    Descargar
                                                                </a>
                                                            @endauth
                                                        @else
                                                            <a href="{{ route('frontend.download', [$document->id]) }}"
                                                                class='btn btn-ghost-dark'>
                                                                Descargar
                                                            </a>
                                                        @endif--}}
                                                        <a href="{{ route('frontend.download', [$document->id]) }}"
                                                            class='btn btn-ghost-dark'>
                                                            Descargar
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        
                            
                        @endif
                        <!-- End blog entry -->
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Blog Section -->
    @else
        <div class="px-6 py-4">
            No hay registros
        </div>
    @endif

    <style>
        .tarjeta{
            margin-bottom: 50px;
        }

        .img{
            width: 200px;
            height: 250px;
        }

        /*--------------------------------------------------------------
        # Documentos - entradas de blog
        --------------------------------------------------------------*/

        .blog {
            padding: 40px 0 20px 0;
        }

        .blog .entry {
            padding: 30px;
            margin-bottom: 60px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }

        .blog .entry .entry-title {
            font-size: 28px;
            font-weight: bold;
            padding-top: 10px;
            margin: 0 0 20px 0;
        }

        .blog .entry .entry-title a {
            color: #545454;
            transition: 0.3s;
        }

        .blog .entry .entry-title a:hover {
            color: #e96b56;
        }

        .blog .entry .entry-meta {
            margin-bottom: 15px;
            color: #bababa;
        }

        .blog .entry .entry-meta ul {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            align-items: center;
            padding: 0;
            margin: 0;
        }

        .blog .entry .entry-meta ul li + li {
            padding-left: 20px;
        }

        .blog .entry .entry-meta i {
            font-size: 16px;
            margin-right: 8px;
            line-height: 0;
        }

        .blog .entry .entry-meta a {
            color: #777777;
            font-size: 14px;
            display: inline-block;
            line-height: 1;
        }

        .blog .entry .entry-content p {
            line-height: 24px;
        }

        .blog .entry .entry-content .read-more {
            -moz-text-align-last: right;
            text-align-last: right;
        }

        .blog .entry .entry-content .read-more a {
            display: inline-block;
            background: #e96b56;
            color: #fff;
            padding: 6px 20px;
            transition: 0.3s;
            font-size: 14px;
            border-radius: 4px;
        }

        .blog .entry .entry-content .read-more a:hover {
            background: #ec7f6d;
        }

        .blog .entry .entry-content h3 {
            font-size: 22px;
            margin-top: 30px;
            font-weight: bold;
        }

        .blog .entry .entry-content blockquote {
            overflow: hidden;
            background-color: #fafafa;
            padding: 60px;
            position: relative;
            text-align: center;
            margin: 20px 0;
        }

        .blog .entry .entry-content blockquote p {
            color: #444444;
            line-height: 1.6;
            margin-bottom: 0;
            font-style: italic;
            font-weight: 500;
            font-size: 22px;
        }

        .blog .entry .entry-content blockquote::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background-color: #545454;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .contenido{
            width: 675px;
            padding-right: 15px;
            padding-left: 15px;
        }

        /*--------------------------------------------------------------
            # Breadcrumbs
        --------------------------------------------------------------*/

        .breadcrumbs {
        padding: 20px 0 20px 0;
        background: #f7f7f7;
        border-bottom: 1px solid #ededed;
        margin-bottom: 40px;
        }

        .breadcrumbs h2 {
        font-size: 28px;
        font-weight: 700;
        color: #545454;
        padding: 0 0 5px 105px;
        }

        .breadcrumbs ol {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        padding: 0 0 5px 95px;
        margin: 0;
        font-size: 14px;
        }

        .breadcrumbs ol li {
        padding-left: 10px;
        }

        .breadcrumbs ol li + li::before {
        display: inline-block;
        padding-right: 10px;
        color: #6e6e6e;
        content: "/";
        }
    </style>
</div>
