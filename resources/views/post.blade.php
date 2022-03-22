@extends('layouts.blog-post')
@section('content')
    <section class="single-post-area">
        <!-- Single Post Title -->
        <div class="single-post-title bg-img background-overlay"
             style="background-image: url({{asset('img/imagesfront/bg-img/1.jpg')}});">
            <div class="container h-100">
                <div class="row h-100 align-items-end">
                    <div class="col-12">
                        <div class="single-post-title-content">
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                @foreach($post->categories as $category)
                                <a href="#">{{$category->name}}</a>
                                @endforeach
                            </div>
                            <h2 class="font-pt">{{$post->title}}</h2>
                            <p>{{$post->created_at->diffForHumans()}} by {{$post->user->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-post-contents">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="single-post-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum nunc libero, vitae
                                rutrum nunc porta id. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam
                                arcu augue, semper at elementum</p>
                            <p>nec, cursus nec ante. Vestibulum sed velit scelerisque elit posuere vulputate vel viverra
                                quam. Curabitur laoreet aliquam diam, non mattis arcu feugiat sed. Sed eget pellentesque
                                lacus. Pellentesque in diam vel mauris pretium commodo a ac magna. Suspendisse
                                scelerisque tellus convallis tortor posuere, ut commodo diam blandit. Morbi vel nulla
                                non turpis luctus tempor eu eu urna. Aliquam in lorem a augue mollis volutpat. Nunc
                                iaculis rutrum enim nec viverra. Morbi eleifend metus id tellus luctus, ac porta orci
                                imperdiet.</p>
                            <p>Morbi efficitur ligula a efficitur mollis. Suspendisse vitae sapien vitae urna eleifend
                                dapibus ut non tortor. In nec metus ac mi ultrices commodo interdum et lacus.
                                Suspendisse potenti. Suspendisse interdum semper dolor nec posuere. Lorem ipsum dolor
                                sit amet, consectetur adipiscing elit. Pellentesque ut orci non tortor pretium hendrerit
                                at vel massa. Nunc ut fermentum felis.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-post-thumb d-flex justify-content-center">
                            <img class="img-fluid" src="{{$post->photo ? asset($post->photo->file) : 'http:/via.placeholder.com/8008x600'}}" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="single-post-text">
                            <p>{{$post->body}}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="single-post-blockquote">
                            <blockquote>
                                <h6 class="font-pt mb-0">“Vestibulum nulla diam, sodales sit amet erat vel, mollis
                                    iaculis lectus. Suspendisse in rhoncus est. Sed aliquet mauris in efficitur tempor.
                                    Proin enim felis, laoreet id viverra at”</h6>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="single-post-text">
                            <p>Suspendisse vitae sapien vitae urna eleifend dapibus ut non tortor. In nec metus ac mi
                                ultrices commodo interdum et lacus. Suspendisse potenti. Suspendisse interdum semper
                                dolor nec posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                                ut orci non tortor pretium hendrerit at vel massa. Nunc ut fermentum felis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
