<?php 
    use App\Helpers\Helper;
    $dataCat = Helper::getCat();
?>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('/public/images/textools-logo.svg')}}" class="" alt="">
                <img src="{{asset('/public/images/textools-logo-night-mode.svg')}}" class="night-mode-logo" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <img src="{{asset('/public/images/bar-icon.png')}}" alt="">
                    <img src="{{asset('/public/images/bar-icon-white.png')}}" class="bar-icon-white" alt="">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="selct-input-wrap">
                    <div class="select-wrap">
                        <select class="categories">
                            <option value="tag_all">All Tools</option>
                            @if(!empty($dataCat))
                                @foreach($dataCat as $key22=>$value22)
                                    <option value="tag_{{$value22->id}}">{{$value22->title}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="search-wrap">
                        <input id="live-search" type="search" placeholder="Search">
                    </div>
                </div>
            </div>
            <ul class=" header-link">
                <li class="day-mode">
                	<button type="button">
                		<img src="{{asset('/public/images/day_mode.svg')}}" alt="">
                	</button>
                </li>
                <li class="night-mode"><button type="button"><i class="fa fa-moon-o"
                            aria-hidden="true"></i></button>
                </li>
                <li>
                	<a target="_blank" href="https://www.addtoany.com/share">
                		<img src="{{asset('/public/images/share-icon.svg')}}" alt="">
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<script src="{{asset('public/js/front/jquery-3.3.1.min.js')}}"></script> 
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
            }
            
        });

        function search(dataInput)
        {
            $('.live-list').each(function()
            {
               var dataSearch = $(this).attr('data-search');
               if(dataSearch.indexOf(dataInput) != -1)
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

    $("#categories").change(function() 
    {
        $(this).find("option:selected").each(function() {
            var e = $(this).attr("value");
            "tag_all" == e ? $(".category").show() : e && ($(".category").not("." + e).hide(), $("." + e).show())
        });
    });
</script>