<!-- Top Main -->
@include('layouts.main_top')
<!-- Top Main -->  
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Header Section -->
       {{-- @include('layouts.item.sidebar')--}}
        @include('layouts.item.topnavbar')
        <!-- Header Section -->
        <!-- Content Section -->
                    @yield('content')
        <!-- Content Section -->
    </div>
    
    <div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;    z-index: 10500 !important;">
      <div class="modal-dialog  modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="post-modalLabel">Write a story</h5>
               <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ri-close-fill"></i></button>
            </div>
            <div class="modal-body">
               @if(Auth::check())
                  @if(empty(Auth::user()->genders_id))
                     <div class="align-items-center text-center empty">
                        <div class="empty-icon">

                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <circle cx="12" cy="12" r="9"></circle>
                              <line x1="9" y1="10" x2="9.01" y2="10"></line>
                              <line x1="15" y1="10" x2="15.01" y2="10"></line>
                              <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path>
                           </svg>
                        </div>
                        <h3> Maaf ya, Kata admin Kamu Harus Setting Gender dulu nih hehe ....</h3>
                        <div class="btn-group btn-block text-center" style="padding-left: 15px">
                           <a href="{{url('/settings/edit')}}" class="btn btn-primary mr-2 mt-3">Setting Sekarang </a>
                        </div>
                     </div>
                  @else
                     <div class="d-flex align-items-center">
                     <div class="row w-100">

                        <div class="col-md-12">
                           <ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                                 <li class="col-md-6 mb-3" >
                                    <div class="iq-bg-primary rounded p-2 pointer mr-3" style="cursor: pointer;" onclick="kindStory(1)"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/07.png" alt="icon" class="img-fluid">Post a Story</div>
                                 </li>
                                 <li class="col-md-6 mb-3" >
                                    <div class="iq-bg-primary rounded p-2 pointer mr-3" style="cursor: pointer;" onclick="kindStory(2)"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/10.png" alt="icon" class="img-fluid">Post a Question?</div>
                                 </li>                           
                           </ul>
                        </div>
                        <div class="col-md-12" id="listFormPosting" style="display: none;"> 
                           <!-- <div class="user-img">
                                                               <img src="https://w7.pngwing.com/pngs/416/62/png-transparent-anonymous-person-login-google-account-computer-icons-user-activity-miscellaneous-computer-monochrome.png" alt="userimg" class="avatar-60 rounded-circle img-fluid">
                                                            </div> -->
                           <!-- write story -->
                           @if($status_write == 1)
                           <form action="{{ url('write') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">                              
                                    <div class="form-group">
                                       <div class="custom-file">
                                          <input type="file" name="photo" class="form-control @error('photo', 'write') is-invalid @enderror" accept="image/*">
                                          <!-- <label class="custom-file-label" for="customFile">{{ __('main.choose_a_photo') }}</label> -->
                                       </div>
                                       @error('photo', 'write')
                                       <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror 
                                       <small class="form-hint mt-3">
                                          {{__('main.extensions_allowed')}}
                                       </small> 
                                    </div>
                                 <!-- <fieldset class="form-fieldset border-wide">
                                    <div class="form-group">
                                       <div class="custom-file">
                                          <input type="file" name="photo" class="form-control @error('photo', 'write') is-invalid @enderror" accept="image/*">
                                          <label class="custom-file-label" for="customFile">{{ __('main.choose_a_photo') }}</label>
                                       </div>
                                    </div>
                                    @error('photo', 'write')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
      
                                    <small class="form-hint">
                                       {{__('main.extensions_allowed')}}
                                    </small>
      
                                 </fieldset> -->
      
                                 <div class="mb-3">
                                    <input type="text" class="form-control form-control-lg @error('title', 'write') is-invalid @enderror" name="title" value="{{ old('title') }}" id="title" placeholder="{{ __('main.title') }}">
      
                                    @error('title', 'write')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
      
                                 </div>
      
                                 <div class="mb-3">
                                    <textarea class="form-control form-control-lg @error('story', 'write') is-invalid @enderror" name="story" id="story" rows="6" placeholder="{{ __('main.story') }}">{{ old('story') }}</textarea>
                                    
                                    <small><strong id="min_lenght" class="text-danger mt-2"></strong></small>
                                    @error('story', 'write')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>*{{ $message }}</strong>
                                    </span>
                                    @enderror
      
                                 </div>
      
                                 <div class="mb-3">
                                    <label class="form-label">Categories</label><br/>
                                    <div class="col">
                                       <div class="form-selectgroup form-selectgroup-pills @error('category_id', 'write') is-invalid @enderror">
                                          @foreach($categories as $category)
                                          <label class="form-selectgroup-item">
                                             <input type="radio" id="category_id" name="category_id" value="{{ $category->id }}" class="form-selectgroup-input" {{ old('category_id') == $category->id ? 'checked' : '' }} @if(Auth::user()->total_point_count()<$category->score) disabled @endif>
                                                <span class="form-selectgroup-label" @if(Auth::user()->total_point_count()<$category->score) data-bs-toggle="tooltip" data-bs-html="true" title="{{ __('points.form_notice1') }}" @endif>
                                                      {{ $category->name }}
                                                </span>
                                          </label>
                                          @endforeach
                                       </div>
      
                                       @error('category_id', 'write')
                                       <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
      
                                    </div>
                                 </div>
      
                                 <div class="mb-3">
                                    <label class="form-label">{{ __('main.tags') }}</label>
                                    <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" placeholder="{{ __('main.separate_tag') }}" value="{{ old('tags') }}">
                                 </div>
      
                              </div>
                              <div class="d-flex justify-content-end">
                                 <h5 class="form-label" >Anonymous Post?</h5>
                                 <div class="custom-control custom-switch custom-switch-text  custom-control-inline">
                                    
                                    <input type="checkbox" class="custom-control-input" id="customSwitch2" checked="" name="anonim">
                                    <label class="custom-control-label" for="customSwitch2" data-on-label="On" data-off-label="Off">
                                    </label>
                                 </div>
                              </div>
                              <input type="hidden" name="genders_id" value="{{ Auth::user()->genders_id }}">
                              <input type="hidden" name="age" value="{{ Carbon::now()->diffInYears(Auth::user()->birth) }}">
                              <input type="hidden" name="kind_story" value='1' id="kind_story">
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <circle cx="12" cy="12" r="9"></circle>
                                       <line x1="9" y1="12" x2="15" y2="12"></line>
                                       <line x1="12" y1="9" x2="12" y2="15"></line>
                                    </svg> {{ __('main.btn_send') }}
                                 </button>
                              </div>
      
                           </form>
                           @else
                           <!-- if new stories are paused -->
                           <div class="modal-body">
                              <div class="text-center">
                                 <img src="{{ asset('resources/views/assets/img/warning.svg') }}" alt="">
                              </div>
                              <div class="text-center">
                                 <div class="empty-header">
                                    {{ __('main.new_entries_paused') }}
                                 </div>
                              </div>
                           </div>
                           @endif
                           <!-- end write story -->
                        </div>
                        <!-- <hr>
                        <ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
                           <li class="col-md-6 mb-3">
                              <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/07.png" alt="icon" class="img-fluid"> Photo/Video</div>
                           </li>
                           <li class="col-md-6 mb-3">
                              <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/08.png" alt="icon" class="img-fluid"> Tag Friend</div>
                           </li>
                           <li class="col-md-6 mb-3">
                              <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/09.png" alt="icon" class="img-fluid"> Feeling/Activity</div>
                           </li>
                           <li class="col-md-6 mb-3">
                              <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/10.png" alt="icon" class="img-fluid"> Check in</div>
                           </li>
                           <li class="col-md-6 mb-3">
                              <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/11.png" alt="icon" class="img-fluid"> Live Video</div>
                           </li>
                           <li class="col-md-6 mb-3">
                              <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/12.png" alt="icon" class="img-fluid"> Gif</div>
                           </li>
                           <li class="col-md-6 mb-3">
                              <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/13.png" alt="icon" class="img-fluid"> Watch Party</div>
                           </li>
                           <li class="col-md-6 mb-3">
                              <div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="{{asset('resources/views/assets/clean')}}/images/small/14.png" alt="icon" class="img-fluid"> Play with Friends</div>
                           </li>
                        </ul> -->
                        <hr>
                     </div>

                        <!-- <button type="submit" class="btn btn-primary d-block w-100 mt-3">Post</button> -->
                     </div>
                  @endif
               @else
               <div class="align-items-center text-center empty">
                  <div class="empty-icon">

                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="9" y1="10" x2="9.01" y2="10"></line>
                        <line x1="15" y1="10" x2="15.01" y2="10"></line>
                        <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path>
                     </svg>
                  </div>
                  <h3> You must be a registered user. </h3>
                  <div class="btn-group btn-block text-center" style="padding-left: 15px">
                     <a href="{{url('/login')}}" class="btn btn-outline-primary mr-2 mt-3">Sign In</a>
                     <a href="{{url('/register')}}" class="btn btn-primary ml-2  mt-3">Sign Up</a>
                  </div>
               </div>
               @endif
            </div>
         </div>
      </div>
   </div>
    @if(Auth::check())
    <!-- show notifications only if user is logged in -->
        @include('layouts.notifications')
    @endif
    @include('layouts.searchModal')
    <!-- Footer Section -->
    @include('layouts.item.footer_main')
    <!-- Footer Section -->
<!-- Bottom Main -->
@include('layouts.main_bottom')
<!-- Bottom Main --> 