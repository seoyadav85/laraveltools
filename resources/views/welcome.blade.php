@extends('layouts.front')
@section('meta_keywords')
  <title>Tools</title>
  <meta name="description" content="Tools">
  <meta name="keywords" content="Tools">
@endsection
@section('content')
 <!-- Banner Start -->
        <div class="banner">
            <div class="container">
                <div class="banner-row">
                    <div class="banner-content">
                        <h1>Best collection of Text Tools</h1>
                        <p>A collection of the best web-based text processing tools and utilities that will help you
                            automate the recurring tasks of editing and formatting text in spreadsheets, text documents
                        </p>
                        <ul>
                            <li><a href="#">Browse Tools</a></li>
                            <li class="active"><a href="#">About Us</a></li>
                        </ul>
                    </div>
                    <div class="banner-img">
                        <img src="{{asset('public/images/banner-img.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->

        <!-- Contant Start -->
        <div class="content">
            <section class="our-tools-wrap">
                <div class="container">
                    <div class="tools-filter-wrap heading">
                        <button type="button" class="prev-btn">
                            <img src="{{asset('public/images/chevron-left.svg')}}" alt="">
                            <img src="{{asset('public/images/chevron-left-white.svg')}}" class="white-arrow" alt="">
                        </button>
                        <div class="tools-filter-list">
                            <ul class="tools-filter-track">
                                <li class="active categoryLi" data-value="tag_all">
                                    <a href="javascript:void(0)">ALL</a>
                                </li>
                                @if(!empty($dataTools))
                                    @foreach($dataTools as $key22=>$value22)
                                        <li class="categoryLi" data-value="tag_{{$value22->id}}">
                                            <a value="tag_{{$value22->id}}" href="javascript:void(0)">{{$value22->title}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <button type="button" class="next-btn">
                            <img src="{{asset('public/images/chevron-right.svg')}}" alt="">
                            <img src="{{asset('public/images/chevron-right-white.svg')}}" class="white-arrow" alt="">
                        </button>
                    </div>
                    <div class="helpful-tools heading">
                        <h3>Helpfull AI Tools</h3>
                        <p>We know the best things for You. Top picks for You.</p>
                        <div class="row helpful-tools-row">
                            <div class="col-md-6 helpful-tools-col">
                                <div class="helpful-tools-card">
                                    <div class="helpful-tools-img">
                                        <img src="{{asset('public/images/paraghrase-img.png')}}" alt="">
                                    </div>
                                    <div class="helpful-tools-content">
                                        <h4>Paraphraser</h4>
                                        <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                            Velit officia consequat duis enim velit mollit.</p>
                                        <a href="#">Get Started</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 helpful-tools-col">
                                <div class="helpful-tools-card">
                                    <div class="helpful-tools-img">
                                        <img src="{{asset('public/images/article-rewriter-img.png')}}" alt="">
                                    </div>
                                    <div class="helpful-tools-content">
                                        <h4>article rewriter</h4>
                                        <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                            Velit officia consequat duis enim velit mollit.</p>
                                        <a href="#">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($dataTools as $key=>$value)
                    <div class="popular-tools category tag_{{$value->id}}" >
                        <div class="heading">
                            <h4>{{$value->title ?? ''}}</h4>
                            <p>{{$value->description ?? ''}}</p>
                        </div>
                        <div class="row popular-tools-row">
                            @if(!empty($value->tools))
                                <?php $i  = 0; ?>
                                @foreach($value->tools as $key11=>$value11)
                                 @if($i%2 != 0)
                                 <div class="col-6 col-md-3 popular-tools-col live-list" data-search="{{$value11->title}}">
                                    <div class="popular-tools-card">
                                        <?php $route = $value11->slug; ?>                              
                                        <a href="{{route($route)}}" class="popular-tools-img">                    
                                        <img src="{{asset('public/uploads/icon/'.$value11->icon)}}">
                                        </a>                                       
                                        <div class="popular-tools-content">
                                            <h6>{{$value11->title}}</h6>
                                            <p>{{$value11->short_description}}</p>
                                        </div>
                                    </div>
                                </div>
                                 @elseif($i%2  == 0)
                                 <div class="col-6 col-md-3 popular-tools-col live-list" data-search="{{$value11->title}}">
                                    <div class="popular-tools-card">
                                        <?php $route = $value11->slug; ?>
                                         <a href="{{route($route)}}" class="popular-tools-img"> 
                                                <img src="{{asset('public/uploads/icon/'.$value11->icon)}}">
                                        </a>
                                        <div class="popular-tools-content">
                                           <h6>{{$value11->title}}</h6>
                                            <p>{{$value11->short_description}}</p>
                                        </div>
                                    </div>
                                </div>
                                 @endif
                                 <?php $i++ ?>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @endforeach
                  
                </div>
            </section>
            <section class="welcome-wrap">
                <div class="container">
                    <div class="row welcome-row">
                        <div class="col-md-6 col-lg-6">
                            <div class="welcome-img">
                                <img src="{{asset('public/images/welcome-img.png')}}" alt="welcome-img">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="welcome-content">
                                <h2>Welcome to TextTools.org</h2>
                                <p>A collection of the best web-based text processing tools and utilities that will help
                                    you automate the recurring tasks of editing and formatting text in spreadsheets,
                                    text documents, and HTML files. Using these text manipulation tools can save you
                                    many hours of typing and will increase your productivity. You can find more than 50
                                    useful power tools here with different functions, from sorting data, converting
                                    letter cases, cleaning texts, and removing unwanted characters, to advanced
                                    replacement operations.</p>
                                <a href="#">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Contant End -->
<script type="text/javascript" src="{{asset('/public/js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $("body").ready(function() 
    {

        $("#live-search").on("input", function()
        {      
            var dataInput  = $(this).val();
            if(dataInput != '')
            {
                $('.heading').hide();
                search(dataInput);
            }       
            else
            {
                $('.heading').show();
                $('.live-list').show();
            }
            
        });

        function search(dataInput)
        {
            $('.live-list').each(function()
            {
               var dataSearch = $(this).attr('data-search').toLowerCase();
               if(dataSearch.indexOf(dataInput.toLowerCase()) != -1)
               {
                  $(this).show();
               }
               else
               {
                 $(this).hide();
               }
            });
        }

    });

    $(".categories").change(function() 
    {
        $(this).find("option:selected").each(function() {
            var e = $(this).attr("value");
            "tag_all" == e ? $(".category").show() : e && ($(".category").not("." + e).hide(), $("." + e).show())
        });
        var catVal = $(this).val();
        $('.categoryLi').each(function()
        {
            if($(this).attr('data-value') == catVal)
            {
                $(this).addClass('active');
            }
            else
            {
                $(this).removeClass('active');
            }
        });
    });

    $(".categoryLi").click(function() 
    {
        var e = $(this).attr("data-value");
            "tag_all" == e ? $(".category").show() : e && ($(".category").not("." + e).hide(), $("." + e).show());

        var catVal = $(this).attr('data-value');
        $('.categories').val(catVal);
    });
</script>

@endsection
