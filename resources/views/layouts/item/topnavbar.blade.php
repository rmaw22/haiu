<!-- TOP Nav Bar -->
@if(Auth::check())
            <div class="iq-top-navbar fixed-top" style="line-height: 0px;">
            @else
            <div class="iq-top-navbar" style="line-height: 0px;">
         @endif
               <div class="iq-navbar-custom">
                  <nav class="navbar navbar-expand-lg navbar-light p-0">
                     <a class="navbar-brand iq-navbar-logo d-flex justify-content-between" href="{{url('/')}}">
                        @if(!empty(App\Models\Settings::find('logo_image')->value))
                        <img src="{{asset('resources/views/assets/clean')}}/images/logo.png" class="img-fluid" />
                        <span class="mx-3"> {{ $site_name }} </span>
                        @else
                        <span class="mx-3"> {{ $site_name }} </span>
                        @endif
                     </a>

                     <div class="iq-search-bar">
                        <div class="align-items-center ms-md-auto ps-md-2 py-2 py-md-0 me-md-2 order-first order-md-last flex-grow-1">
                           <form action="{{ route('search') }}" method="get" class="searchbox">
                              @csrf
                                    <div class="input-group mt-3" >
                                       <input type="text"  class=" @error('key') is-invalid @enderror text search-input" name="key" value="{{old('key', app('request')->input('key'))}}" type="search" placeholder="{{ __('main.nav_search') }}" aria-label="Search in website" autocomplete="off" id="search" autofocus>
                                       <div class="input-group-append">
                                                <button class="btn btn-primary search-link" type="submit"><i class="ri-search-line" ></i></button>
                                       </div>
                                      
                                    </div>
                                     
                                 
                                    <span id="selections">

                                    </span>
                                    @error('key')
                                    <span class="invalid-feedback" role="alert" style="line-height: 0px !important;">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                 
                           </form>
                        </div>
                     </div>
                     <button class="navbar-toggler mt-2 pt-3" style="font-size: 30px;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                        <i class="ri-menu-3-line"></i>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex: unset !important;">

                        <ul class="navbar-nav ml-auto mr-2 navbar-list">
                          
                          
                           <li>
                              <a href="{{url('/')}}" class="iq-waves-effect d-flex align-items-center"   >
                                 <i class="ri-home-line" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Home"></i>
                              </a>
                           </li>
                           <li>
                              <a href="{{url('/random')}}" class="iq-waves-effect d-flex align-items-center" >
                                 <i class="ri-compass-line" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Random"></i>
                              </a>
                           </li>
                           <li>
                              <a href="{{url('/random')}}" class="iq-waves-effect d-flex align-items-center" data-toggle="modal" data-target="#post-modal"  >
                                 <i class="fa fa-plus-square-o" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Add Post"></i>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="search-toggle iq-waves-effect" href="#" ><i class="ri-global-line" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Categories"></i></a>
                              <div class="iq-sub-dropdown">
                                 <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                       <div class="bg-primary p-3">
                                          <h5 class="mb-0 text-white">Explore</h5>
                                       </div>
                                       <div class="p-3">
                                          <h6 class="mb-0 text-black">Categories</h6>
                                       </div>
                                       <div class="iq-list-categories" style="max-height: 150px;overflow-y: auto;">

                                          @forelse($categories as $category)
                                          <a href="{{ route('navCategories', $category->slug) }}" class="iq-sub-card" style="">
                                             <div class="media align-items-center">
                                                <div class="">
                                                   <img class="avatar-40 rounded" src="https://www.clipartmax.com/png/middle/334-3341544_black-square-logo-square-point-of-sale-logo.png" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="mb-0 "> {{ $category->name }} <span class="float-right font-size-12"><i class="ri-arrow-right-line"></i></span></h6>
   
                                                </div>
                                             </div>
                                          </a>
                                          
                                          @empty
                                          <a href="#" class="iq-sub-card">
                                             <div class="media align-items-center">
                                                <h6 class="mb-0 ">{{ __('main.there_are_no_categories') }}</h6>
                                             </div>
                                          </a>
                                          @endforelse
                                          
                                       </div>
                                       <div class="p-3">
                                          <h6 class="mb-0 text-black">Pages</h6>
                                       </div>
                                       @forelse($pages as $page)
                                       <a href="{{ url('page/'.$page->slug) }}" class="iq-sub-card">
                                          <div class="media align-items-center">
                                             <div class="">
                                                <img class="avatar-40 rounded" src="https://cdn.iconscout.com/icon/free/png-256/page-paper-copy-tool-duplicate-clone-1-18961.png" alt="">
                                             </div>
                                             <div class="media-body ml-3">
                                                <h6 class="mb-0 "> {{ $page->title }} <span class="float-right font-size-12"><i class="ri-arrow-right-line"></i></span></h6>

                                             </div>
                                          </div>
                                       </a>
                                       @empty
                                       <a href="#" class="iq-sub-card">
                                          <div class="media align-items-center">
                                             <h6 class="mb-0 ">{{ __('main.there_are_no_pages') }}</h6>
                                          </div>
                                       </a>
                                       @endforelse
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <a href="#" class="iq-waves-effect d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#searchModal" >
                                 <i class="ri-search-line" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Search"></i>
                              </a>
                           </li>
                        @if(Auth::check())
                           <li class="nav-item">
                              <a href="#" onclick="markAsRead()" class="search-toggle iq-waves-effect" data-bs-toggle="modal" data-bs-target="#notifications">
                                 <!--  onclick="markAsRead()" -->
                                 @if(Auth::user()->notification_count() >= 1  || empty(Auth::user()->genders_id) || empty(Auth::user()->avatar) )
                                 <div id="lottie-beil" ></div>
                                
                                 <span class="bg-danger dots">
                                 </span>
                                 @else
                                 <i class="fa fa-bell-o" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Notification"></i>
                                 @endif
                              </a>
                              {{--
                              <div class="iq-sub-dropdown">
                                 <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                       <div class="bg-primary p-3">
                                          <h5 class="mb-0 text-white">All Notifications<small class="badge bg-primary badge-light float-right pt-1 text-black">4</small></h5>
                                       </div>
                                       @forelse(Auth::user()->notifications() as $notifications)
                                       <a href="{{ url('view/'.$notifications->item_id.'/'.App\Models\Items::find($notifications->item_id)->slug) }}" class="iq-sub-card">
                                          <div class="media align-items-center">

                                             @if(!empty(App\Models\User::find($notifications->sender_id)->avatar))
                                             <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset('storage/app/public/images/avatar/'.App\Models\User::find($notifications->sender_id)->avatar) }}" alt="">
                                             </div>
                                             @else
                                             <div class="">
                                                <span class="avatar">
                                                   <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <circle cx="12" cy="7" r="4" />
                                                      <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                   </svg>
                                                </span>
                                             </div>
                                             @endif

                                             <div class="media-body ml-3">
                                                <h6 class="mb-0 "><strong>{{ App\Models\User::find($notifications->sender_id)->name }}</strong> </h6>
                                                <small class="float-right font-size-12"> {{ Carbon::parse($notifications->created_at)->diffForHumans() }}</small>
                                                <p class="mb-0">
                                                   @if($notifications->notification_type == "comment")
                                                   <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3" />
                                                      <line x1="8" y1="9" x2="16" y2="9" />
                                                      <line x1="8" y1="13" x2="14" y2="13" />
                                                   </svg> {{ __('main.commented_on_your') }} "<a href="{{ url('view/'.$notifications->item_id.'/'.App\Models\Items::find($notifications->item_id)->slug) }}"><strong>{{ App\Models\Items::find($notifications->item_id)->title }}</strong></a>" {{ __('main.post') }}
                                                   @else
                                                   <!-- type = like -->
                                                   <svg xmlns="http://www.w3.org/2000/svg" id="like-icon-8" class="icon   icon-filled text-danger  " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                      <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                                   </svg> {{ __('main.liked_your') }} "<a href="{{ url('view/'.$notifications->item_id.'/'.App\Models\Items::find($notifications->item_id)->slug) }}"><strong>{{ App\Models\Items::find($notifications->item_id)->title }}</strong></a>" {{ __('main.post') }}
                                                   @endif
                                                </p>
                                             </div>
                                          </div>
                                       </a>
                                       @empty
                                       <a href="#" class="iq-sub-card">
                                          <div class="media align-items-center">
                                             <div class="empty-img">
                                                <img src="{{ asset('resources/views/assets/img/notifications.svg') }}" alt="">
                                             </div>
                                             <div class="media-body ml-3">
                                                <h6 class="mb-0 "> {{ __('main.there_are_no_notifications') }}</h6>
                                             </div>
                                          </div>
                                       </a>
                                       @endforelse
                                       <a href="#" class="iq-sub-card">
                                          <div class="media align-items-center">
                                             <a href="{{ url('notifications') }}" class="btn btn-secondary">
                                                {{ __('main.see_all_notifications') }}
                                             </a>
                                          </div>
                                       </a>

                                    </div>
                                 </div>
                              </div>
                              --}}
                           </li>
                        </ul>
                        <ul class="navbar-list">
                              <li>
                                 <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                    @if(!empty(Auth::user()->avatar))
                                    <span class="avatar avatar-md" style="background-image: url({{ asset('storage/app/public/images/avatar/'.Auth::user()->avatar) }})"></span>
                                    @else
                                    <span class="avatar avatar-md">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                    </span>
                                    @endif
                                    <!-- <img src="{{asset('resources/views/assets/clean')}}/images/user/1.jpg" class="img-fluid rounded-circle mr-3" alt="user"> -->
                                    <div class="caption mx-2">
                                       <h6 class="mb-0 line-height">{{ Str::limit(Auth::user()->name, 12) }}</h6>
                                       <h6 class="text-muted">{{ Str::limit(Auth::user()->email, 12) }}</h6>
                                    </div>
                                    <i class="ri-arrow-down-s-fill"></i>
                                 </a>
                                 <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                       <div class="iq-card-body p-0 ">
                                          <div class="bg-primary p-3 line-height">
                                             <h5 class="mb-0 text-white line-height">Hello {{ Str::limit(Auth::user()->name, 12) }}</h5>
                                             <span class="text-white font-size-12">Online</span>
                                          </div>
                                          <a href="{{ url('profile/@'.Auth::user()->name) }}" class="iq-sub-card iq-bg-primary-hover">
                                             <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                   <i class="ri-file-user-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="mb-0 ">My Profile</h6>
                                                   <p class="mb-0 font-size-12">View personal profile details.</p>
                                                </div>
                                             </div>
                                          </a>
                                          <a href="{{ url('favorites') }}" class="iq-sub-card iq-bg-primary-hover">
                                             <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                   <i class="ri-file-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="mb-0 ">Saved Post</h6>
                                                   <p class="mb-0 font-size-12">View personal profile details.</p>
                                                </div>
                                             </div>
                                          </a>
                                          <div class="dropdown-divider"></div>
                                          <a href="{{ url('settings/edit') }}" class="iq-sub-card iq-bg-warning-hover">
                                             <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-warning">
                                                   <i class="ri-profile-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="mb-0 ">Edit {{ __('main.nav_account') }}</h6>
                                                   <p class="mb-0 font-size-12">Modify your personal details.</p>
                                                </div>
                                             </div>
                                          </a>
                                          @hasrole('moderator')
                                          <a href="{{ url('admin/posts') }}" class="iq-sub-card iq-bg-info-hover">
                                             <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-info">
                                                   <i class="ri-account-box-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="mb-0 ">{{ __('main.nav_post_moderation') }}</h6>
                                                   <p class="mb-0 font-size-12">Manage your Posting.</p>
                                                </div>
                                             </div>
                                          </a>
                                          @endhasrole
                                          @hasrole('admin')                                      
                                          <a href="{{ url('admin') }}" class="iq-sub-card iq-bg-danger-hover">
                                             <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-danger">
                                                   <i class="ri-lock-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                   <h6 class="mb-0 "> {{ __('main.nav_administration') }}</h6>
                                                   <p class="mb-0 font-size-12">Only For Administrator.</p>
                                                </div>
                                             </div>
                                          </a>
                                          @endhasrole                                    
                                       
                                          <div class="d-inline-block w-100 text-center p-3">
                                             <a class="bg-primary iq-sign-btn" href="{{ route('logout') }}" role="button" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                        </ul>
                           @else
                           </ul>
                           <ul class="navbar-list">
                              <li class="nav-item">
                                 <a href="{{ url('login') }}" class="iq-waves-effect d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                       <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                       <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                                    </svg>
                                    {{ __('main.nav_login') }}
                                 </a>
                                 <!-- <a class="nav-link" href="{{ url('login') }}">
                                    <span class="nav-link-icon d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M20 12h-13l3 -3m0 6l-3 -3" /></svg>
                                    </span>
                                    <span class="nav-link-title d-none d-sm-block">
                                          {{ __('main.nav_login') }}
                                    </span>
                                 </a> -->
                              </li>
                           </ul>
                           @endif
                        </ul>
                     </div>
                  </nav>

               </div>
            </div>