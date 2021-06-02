@extends('layouts.page')
@section('content')
    <!-- Content
                                                                                                                                                                                                                                                                                                                                                                                                              ============================================= -->
    <section id="content">
        <div class="content-wrap">

            <div class="section header-stick bottommargin-lg py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-auto">
                            <div class="d-flex">
                                <span class="badge badge-danger text-uppercase col-auto">¡Último Minuto!</span>
                            </div>
                        </div>

                        <div class="col-lg mt-2 mt-lg-0">
                            <div class="fslider" data-speed="800" data-pause="6000" data-arrows="false" data-pagi="false"
                                style="min-height: 0;">
                                <div class="flexslider">
                                    <div class="slider-wrap" id="lastPostsBreaking">
                                        @forelse ($last as $post)
                                            <div class="slide"><a
                                                    href="{{ URL::to('/articulo/' . $post->slug) }}"><strong>{{ $post->title }}</strong></a>
                                            </div>
                                        @empty
                                            <div class="slide"><a href="#"><strong>¡Pronto mas noticias!</strong></a></div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Posts
                                                                                                                                                                                                                                ============================================= -->
            <div id="posts" class="post-grid grid-container row gutter-40 mx-3">
                @forelse ($posts as $post)
                    <div class="entry col-md-4 col-sm-6 col-12">
                        <div class="grid-inner">
                            <div class="entry-image">
                                <a href="{{ asset('articulo/' . $post->slug) }}"><img
                                        src="{{ asset('storage/images/' . $post->image) }}"
                                        alt="{{ $post->image }}"></a>
                            </div>
                            <div class="entry-title">
                                <h2><a href="blog-single.html">{{ $post->title }}</a></h2>
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="icon-calendar3"></i> {{ $post->created_at->diffForHumans() }}</li>
                                    <li><a href="{{ asset('articulo/' . $post->slug) }}"><i class="icon-user"></i>
                                            {{ $post->author }}</a></li>
                                    <li><a href="{{ asset('articulo/' . $post->slug) }}"><i class="icon-link"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                {!! \Illuminate\Support\Str::limit($post->content, 150, '...') !!}
                                <a href="{{ asset('articulo/' . $post->slug) }}" class="more-link">Ver atículo
                                    completo</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="entry col-md-4 col-sm-6 col-12">
                        <div class="grid-inner">
                            <div class="entry-image">
                                <a href="{{ asset('images/logo@2x.png') }}" data-lightbox="image"><img
                                        src="{{ asset('images/logo@2x.png') }}" alt="Logo Imagen"></a>
                            </div>
                            <div class="entry-title">
                                <h2><a href="blog-single.html">NO HAY ARTICULOS CON ESTA CATEGORÍA AÚN</a></h2>
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="icon-calendar3"></i> {{ \Carbon\Carbon::now()->diffForHumans() }}</li>
                                    <li><a href="#"><i class="icon-user"></i> Admin</a></li>
                                    <li><a href="#"><i class="icon-link"></i></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>Pronto estaremos publicando articulos para esta categoría</p>
                                <a href="#" class="more-link">Leer mas</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div><!-- #posts end -->
        </div>
    </section><!-- #content end -->
@endsection
