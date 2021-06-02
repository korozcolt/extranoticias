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

            <div class="container clearfix">

                <div class="row">
                    <div class="col-lg-8 bottommargin">

                        <div class="row col-mb-50">
                            <div class="col-12">
                                <div class="fslider flex-thumb-grid grid-6" data-animation="fade" data-arrows="true"
                                    data-thumbs="true">
                                    <div class="flexslider">
                                        <div class="slider-wrap">
                                            @foreach ($last as $post)
                                                <div class="slide"
                                                    data-thumb="{{ asset('storage/images/' . $post->image) }}">
                                                    <a href="{{ asset('articulo/' . $post->slug) }}">
                                                        <img src="{{ asset('storage/images/' . $post->image) }}"
                                                            alt="Image">
                                                        <div class="bg-overlay">
                                                            <div
                                                                class="bg-overlay-content text-overlay-mask dark align-items-end justify-content-start">
                                                                <div class="portfolio-desc py-0">
                                                                    <h3>{{ $post->title }}</h3>
                                                                    <span>{!! \Illuminate\Support\Str::limit($post->title, 5, '...') !!}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="fancy-title title-border">
                                    <h3>Actualidad</h3>
                                </div>

                                @foreach ($posts as $post)
                                    <div class="posts-md">
                                        <div class="entry row mb-5">
                                            <div class="col-md-6">
                                                <div class="entry-image">
                                                    <a href="#"><img src="{{ asset('storage/images/' . $post->image) }}"
                                                            alt="{{ $post->image }}"></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3 mt-md-0">
                                                <div class="entry-title title-sm nott">
                                                    <h3><a
                                                            href="{{ asset('articulo/' . $post->slug) }}">{{ $post->title }}</a>
                                                    </h3>
                                                </div>
                                                <div class="entry-meta">
                                                    <ul>
                                                        <li><i class="icon-calendar3"></i>
                                                            {{ $post->created_at->diffForHumans() }}</li>
                                                        <li><a href="{{ asset('articulo/' . $post->slug) }}"><i
                                                                    class="icon-camera-retro"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="entry-content">
                                                    <p class="mb-0">Asperiores, tenetur, blanditiis, quaerat odit ex
                                                        exercitationem pariatur quibusdam veritatis quisquam laboriosam esse
                                                        beatae hic perferendis.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="col-12">
                                <img src="{{ asset('images/magazine/ad.jpg') }}" alt="Ad" class="aligncenter my-0">
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="line d-block d-lg-none"></div>

                        <div class="sidebar-widgets-wrap clearfix">

                            <div class="widget clearfix">
                                <div class="row gutter-20 col-mb-30">
                                    <div class="col-4">
                                        <a href="#" class="social-icon si-dark si-colored si-facebook mb-0"
                                            style="margin-right: 10px;">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <div class="counter counter-inherit d-inline-block text-smaller"><span
                                                class="d-block font-weight-bold" data-from="30" data-to="8000"
                                                data-refresh-interval="100" data-speed="3000"
                                                data-comma="true"></span><small>Likes</small></div>
                                    </div>

                                    <div class="col-4">
                                        <a href="#" class="social-icon si-dark si-colored si-twitter mb-0"
                                            style="margin-right: 10px;">
                                            <i class="icon-twitter"></i>
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <div class="counter counter-inherit d-inline-block text-smaller"><span
                                                class="d-block font-weight-bold" data-from="500" data-to="9654"
                                                data-refresh-interval="50" data-speed="2500"
                                                data-comma="true"></span><small>Seguidores</small></div>
                                    </div>

                                    <div class="col-4">
                                        <a href="#" class="social-icon si-dark si-colored si-rss mb-0"
                                            style="margin-right: 10px;">
                                            <i class="icon-rss"></i>
                                            <i class="icon-rss"></i>
                                        </a>
                                        <div class="counter counter-inherit d-inline-block text-smaller"><span
                                                class="d-block font-weight-bold" data-from="10" data-to="980"
                                                data-refresh-interval="30" data-speed="3500"
                                                data-comma="true"></span><small>Lectores</small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget clearfix">
                                <img class="aligncenter" src="images/magazine/ad.png" alt="Image">
                            </div>
                            <div class="widget widget_links clearfix">
                                <h4>Categorias</h4>
                                <div class="row col-mb-30">
                                    <div class="col-sm-12">
                                        <ul>
                                            @forelse($categories as $category)
                                                <li><a
                                                        href="{{ URL::to('/categoria/' . $category->id) }}">{{ $category->name }}</a>
                                                </li>
                                            @empty
                                                <li><a href="#">No hay categorias asociadas</a></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="widget clearfix">
                                <img class="aligncenter" src="{{ asset('images/magazine/ad.png') }}" alt="Image">
                            </div>

                            <div class="widget clearfix">
                                <div class="fb-page" data-href="https://www.facebook.com/ExtraSincelejo"
                                    data-tabs="timeline" data-width="" data-height="" data-small-header="false"
                                    data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/ExtraSincelejo"
                                        class="fb-xfbml-parse-ignore"><a
                                            href="https://www.facebook.com/ExtraSincelejo">Costa Noticias CNI</a>
                                    </blockquote>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section><!-- #content end -->
@endsection
