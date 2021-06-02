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

            <!-- Page Title
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ============================================= -->
            <section id="page-title">

                <div class="container clearfix">
                    <h1>{!! \Illuminate\Support\Str::limit($post->title, 20, '...') !!}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('category', $post->category_id) }}">{{ $post->category->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{!! \Illuminate\Support\Str::limit($post->title, 10, '...') !!}</li>
                    </ol>
                </div>

            </section><!-- #page-title end -->

            <!-- Content
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ============================================= -->
            <section id="content">
                <div class="content-wrap">
                    <div class="container clearfix">

                        <div class="single-post mb-0">

                            <!-- Single Post
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ============================================= -->
                            <div class="entry clearfix">

                                <!-- Entry Title
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ============================================= -->
                                <div class="entry-title">
                                    <h2>{{ $post->title }}</h2>
                                </div><!-- .entry-title end -->

                                <!-- Entry Meta
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ============================================= -->
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="icon-calendar3"></i> {{ $post->created_at->diffForHumans() }}</li>
                                        <li><a href="#"><i class="icon-user"></i> {{ $post->author }}</a></li>
                                        <li><i class="icon-folder-open"></i> <a
                                                href="{{ route('category', $post->category_id) }}">{{ $post->category->name }}</a>
                                        </li>
                                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                                    </ul>
                                </div><!-- .entry-meta end -->

                                <!-- Entry Image
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ============================================= -->
                                <div class="entry-image bottommargin">
                                    <a href="#"><img src="{{ asset('storage/images/' . $post->image) }}"
                                            alt="{{ $post->image }}"></a>
                                </div><!-- .entry-image end -->

                                <!-- Entry Content
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ============================================= -->
                                <div class="entry-content mt-0">

                                    {!! $post->content !!}

                                    <div class="line"></div>

                                    <div class="clear"></div>

                                    <!-- Post Single - Share
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ============================================= -->
                                    <div class="border-0 align-items-center">
                                        <span><strong> Comparte esta nota:</strong> </span>
                                        <div>
                                            <div class="fb-share-button social-icon si-borderless m-8"
                                                data-href="{{ URL::to('/articulo/' . $post->slug) }}"
                                                data-layout="button_count">
                                            </div>
                                        </div>
                                    </div><!-- Post Single - Share End -->

                                </div>
                            </div><!-- .entry end -->

                            <!-- Post Navigation
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ============================================= -->
                            <h4>Articulos relacionados:</h4>

                            <div class="related-posts row posts-md col-mb-30">

                                @forelse ($related as $rel)
                                    <div class="entry col-12 col-md-6">
                                        <div class="grid-inner row align-items-center gutter-20">
                                            <div class="col-4 col-xl-5">
                                                <div class="entry-image">
                                                    <a href="#"><img src="{{ $rel->image }}"
                                                            alt="{{ $rel->image }}"></a>
                                                </div>
                                            </div>
                                            <div class="col-8 col-xl-7">
                                                <div class="entry-title title-xs nott">
                                                    <h3><a href="#">{{ $rel->title }}</a></h3>
                                                </div>
                                                <div class="entry-meta">
                                                    <ul>
                                                        <li><i
                                                                class="icon-calendar3"></i>{{ $rel->created_at->diffForHumans() }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="entry-content d-none d-xl-block">
                                                    {!! \Illuminate\Support\Str::limit($rel->content, 25, '...') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="entry col-12 col-md-6">
                                        <div class="grid-inner row align-items-center gutter-20">
                                            <div class="col-4 col-xl-5">
                                                <div class="entry-image">
                                                    <a href="#"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                                                </div>
                                            </div>
                                            <div class="col-8 col-xl-7">
                                                <div class="entry-title title-xs nott">
                                                    <h3><a href="#">No hay articulos relacionados</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- #content end -->
        </div>
    </section><!-- #content end -->
@endsection
