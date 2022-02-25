@extends('layouts.app2')
@section('content')
<!-- Page Content  -->
   
   <div id="content-page" class="content-page" style="padding-top:150px !important;">
  

      <div class="container">
         @if(Auth::check() && empty(Auth::user()->genders_id))
            <div class="col-sm-12">
               <div class="iq-card">
                  <div class="iq-card-body bg-info rounded">
                     <div class="d-flex justify-content-start">
                        <i class="ri-cloud-line font-size-32"></i>
                        <div class="text-left pl-3">
                           <h3 class="text-white">Hallo {{ Str::limit(Auth::user()->name, 12) }} !!</h3>
                           <p class="mb-0">Bergabung pada {{Auth::user()->created_at->format('Y-m-d H:i:s')}}</p>
                        </div>
                     </div>
                     <p class="mt-2 mb-0">

                        Selamat Bergabung di lingkungan sehat ini, silahkan berbagi apapun yang kamu inginkan selama itu positif ya.
                        <br> kamu pun bisa membantu orang lain di komunitas ini ! 
                        <hr/>
                       @if(empty(Auth::user()->genders_id))
                        Oops, Sepertinya kamu belum setting Gender deh :( Pilih Gender dulu yu supaya kamu bisa mulai berbagi cerita pada semua orang ! 
                        <br>
                        <a href="{{url('/settings/edit')}}" class="btn btn-success mt-2">Setting Gender Sekarang ! </a>
                       @else
                       @endif
                     </p>
                  </div>
               </div>
            </div>
         @endif
         <div class="row">
            <div class="col-lg-8">
               <div class="row for_feeds" data-masonry='{"percentPosition": true }'>
                  <div class="col-lg-12 row m-0 p-0 ">
                     <!-- create Posting -->
                     <div class="col-sm-12  card_feed">
                        <div id="post-modal-data" class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Write a story</h4>
                              </div>
                           </div>
                           <div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
                              <div class="d-flex align-items-center">
                                 <div class="user-img">
                                    <span class="avatar avatar-md">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                    </span>
                                 </div>
                                 <form class="post-text ml-3 w-100" action="javascript:void();">
                                    <input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
                                 </form>
                              </div>
                              <hr>
                              <ul class="post-opt-block d-flex align-items-center list-inline m-0 p-0">
                                 <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/07.png" alt="icon" class="img-fluid"> Photo/Video</li>
                                 <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/08.png" alt="icon" class="img-fluid"> Tag Friend</li>
                                 <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/09.png" alt="icon" class="img-fluid"> Feeling/Activity</li>
                                 <li class="iq-bg-primary rounded p-2 pointer">
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" id="post-option" data-toggle="dropdown">
                                             <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-option" style="">
                                             <a class="dropdown-item" href="#">Check in</a>
                                             <a class="dropdown-item" href="#">Live Video</a>
                                             <a class="dropdown-item" href="#">Gif</a>
                                             <a class="dropdown-item" href="#">Watch Party</a>
                                             <a class="dropdown-item" href="#">Play with Friend</a>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
      
                        </div>
                     </div>
                     <!-- end create posting -->
                     <div id="feeds">

                        @include('layouts.item.cardFeedItem')                 
                     </div>
                  
                  </div>
               </div>
            </div>
            <div class="col-lg-4 ">
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Viral</h4>
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <ul class="media-story m-0 p-0">
                        <li class="d-flex mb-4 align-items-center" data-toggle="modal" data-target="#post-modal" style="cursor:pointer">
                           <i class="ri-add-line font-size-18"></i>
                           <div class="stories-data ml-3">
                              <h5>Creat Your Story</h5>
                              <p class="mb-0">time to story</p>
                           </div>
                        </li>
                        @foreach($items_viral as $dataViral)
                        <li class="d-flex mb-4 align-items-center">
                              @if(!empty($dataViral->user->avatar))
                             <!-- <img class="rounded-circle img-fluid" src="https://w7.pngwing.com/pngs/416/62/png-transparent-anonymous-person-login-google-account-computer-icons-user-activity-miscellaneous-computer-monochrome.png" alt=""> -->
                              <span class="avatar avatar-md" style="background-image: url({{ asset('storage/app/public/images/avatar/'.$dataViral->user->avatar) }})"></span>
                              @else
                              <span class="avatar avatar-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                              </span>
                              @endif
                           <a href="{{url('/view')}}/{{$dataViral->id}}/{{$dataViral->slug}}">
                              <div class="stories-data ml-3">
                                 <h5>{{ $dataViral->gender->name}}</h5>
                                 <h6>{{ $dataViral->title}}</h6>
                                 <p class="mb-0">{{ Carbon::parse($dataViral->created_at)->diffForHumans() }} </p>
                              </div>
                           </a>
                        </li>
                        @endforeach
                     </ul>
                     <a href="{{url('/viral')}}" class="btn btn-primary d-block mt-3">See All</a>
                  </div>
               </div>
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Trending</h4>
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <ul class="media-story m-0 p-0">
                        @forelse($tags as $indexTag => $tagItem)
                           @if($indexTag < 3)
                           <li class="d-flex mb-4 align-items-center ">
                              <img src="https://cdn4.iconfinder.com/data/icons/check-out-vol-1-colored/48/JD-57-512.png" alt="story-img" class="rounded-circle img-fluid">
                              <div class="stories-data ml-3">
                                 <h5>
                                    <a href="{{url('/tag/'.$tagItem->name)}}">
                                       #{{$tagItem->name}} 
                                    </a>
                                       <span class="badge badge-danger mx-2">{{$tagItem->count}}</span>
                                 </h5>
                              
                              </div>
                           </li>
                           @else
                           <li class="d-flex mb-4 align-items-center ">
                              <img src="{{asset('resources/views/assets/clean')}}/images/page-img/s4.jpg" alt="story-img" class="rounded-circle img-fluid">
                              <div class="stories-data ml-3">
                                 <h5>#{{$tagItem->name}} <span class="badge badge-danger mx-2">{{$tagItem->count}}</span></h5>
                              
                              </div>
                           </li>
                           @endif
                        
                       @empty
                       <li class="d-flex mb-4 align-items-center ">
                           <img src="{{asset('resources/views/assets/clean')}}/images/page-img/s4.jpg" alt="story-img" class="rounded-circle img-fluid">
                           <div class="stories-data ml-3">
                              <h5>No Tags Available</h5>
                           </div>
                        </li>
                       @endforelse
                     </ul>
                  </div>
               </div>
               
            </div>
            <div class="col-sm-12 text-center loading card_feed">
               <img src="{{asset('resources/views/assets/clean')}}/images/page-img/page-load-loader.gif" alt="loader" style="height: 100px;">
            </div>
         </div>
      </div>
   </div>
  
   @endsection('content')
   @push('js')
   <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
   <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
   <script> 
         @if(count($errors->write->all()) > 0)  
            var x = document.getElementById("listFormPosting");
            x.style.display = "unset"; 
         @endif

      function kindStory(kind){
         // console.log(kind);
         var x = document.getElementById("listFormPosting");
         // if (x.style.display === "none") {
           
            x.style.display = "unset";
            document.getElementById("kind_story").value = kind;
         // } else {
         //    x.style.display = "none";
         // }
         if (kind == 1) {
            document.getElementById("title").placeholder = "Title of Your Story !";
            document.getElementById("story").placeholder = "Put Your Story Here !";
         }else if (kind == 2) {
            document.getElementById("title").placeholder = "What your Question About?";
            document.getElementById("story").placeholder = "Let The World Know Your Question...";

         }else {
            document.getElementById("myText").placeholder = "Story";
         }
      }
   </script>
   <script type="text/javascript">
        var paginate = 1;
        loadMoreData(paginate);
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                paginate++;
                loadMoreData(paginate);
              }
        });
        // run function when user reaches to end of the page
        function loadMoreData(paginate) {
        

            $.ajax({
                url: '?page=' + paginate,
                type: 'get',
                datatype: 'json',
                beforeSend: function() {

                    $('.loading').show();
                    $('.loading').html(`<img src="{{asset('resources/views/assets/clean')}}/images/page-img/page-load-loader.gif" alt="loader" style="height: 100px;">`);
                }
            })
            .done(function(data) {
               var $grids = $('.for_feeds').masonry({
                     itemSelector : '.card_feed' 
                  });
               console.log(data);
                if(data.html == "") {
                    $('.loading').html('');
                    $('.loading').html('No more posts.');
                    return;
                  } else {
                    $('.loading').hide();
                    $('#feeds').append(data.html).imagesLoaded(function() {
                        $grids.masonry('reloadItems');   
                        $grids.masonry('layout');
                     });
                  //   $('body').find('#feeds').append(data.html);
                     //   $('#feeds').append(data.html);
                  }
            })
               .fail(function(jqXHR, ajaxOptions, thrownError) {
                  alert('Something went wrong.');
               });
        }
    </script>
   @endpush