@extends('layouts.app2')
@section('content')
<!-- Page Content  -->
<?php

        use \App\Http\Controllers\HomeController;
?>
<div id="content-page" class="content-page" style="padding-top:120px !important;">
      <div class="container">
         <div class="row" data-masonry='{"percentPosition": true }'>
            <div class="row">
               <div class="col-lg-8 row m-0 p-0">
                  <div class="iq-card iq-card-block iq-card-stretch">
                     <div class="iq-card-body">
                        <div class="user-post-data">
                           <div class="d-flex flex-wrap">
                              <div class="media-support-user-img mr-3">
                                 @if(!empty($item->user->avatar))
                                <!-- <img class="rounded-circle img-fluid" src="https://w7.pngwing.com/pngs/416/62/png-transparent-anonymous-person-login-google-account-computer-icons-user-activity-miscellaneous-computer-monochrome.png" alt=""> -->
                                 <span class="avatar avatar-md" style="background-image: url({{ asset('storage/app/public/images/avatar/'.$item->user->avatar) }})"></span>
                                 @else
                                 <span class="avatar avatar-md">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                 </span>
                                 @endif
                              </div>
                              <div class="media-support-info mt-2">
                                 <h5 class="mb-0 d-inline-block"><a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="">
                                       @if($item->anonim == '0')
                                       {{ $item->user->name }}
                                       @else
                                       {{ $item->gender->name }}
                                       @endif
                                       - </a></h5>
                                 <p class="mb-0 d-inline-block">({{ __('main.years_old', ['age' => $item->age]) }})</p>
                                 <p class="mb-0 text-primary">1 hour ago</p>
                              </div>
                              <!-- bagian menu optional -->
                              <div class="iq-card-post-toolbar">
                                 <div class="dropdown">
                                    <span class="dropdown-toggle" id="postdata-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                       <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu m-0 p-0" aria-labelledby="postdata-5">
                                          @if(Auth::check() && Auth::id() == $item->user_id || Auth::check() && Auth::user()->isAdministrator())
                                          <a class="dropdown-item p-3" href="{{ route('delete_user_post', $item->id) }}" onclick="return confirm('Do you confirm this operation?');">
                                             <div class="d-flex align-items-top">
                                                <div class="icon font-size-20">
                                                   <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <line x1="4" y1="7" x2="20" y2="7" />
                                                      <line x1="10" y1="11" x2="10" y2="17" />
                                                      <line x1="14" y1="11" x2="14" y2="17" />
                                                      <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                      <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                   </svg>
                                                </div>
                                                <div class="data ml-2">
                                                   <h6>{{ __('main.card_delete') }}</h6>
                                                   <p class="mb-0">Hapus Postingan ini Secara permanen!</p>
                                                </div>
                                             </div>
                                          </a>
                                          @endif
                                          <a class="dropdown-item p-3" href="#" onclick="savePost({{ $item->id }})">
                                             <div class="d-flex align-items-top">
                                                <div class="icon font-size-20">
                                                <svg xmlns="http://www.w3.org/2000/svg" id="save-icon-3" class="icon   text-muted  " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
                                                </div>
                                                <div class="data ml-2">
                                                   <h6>Save Post</h6>
                                                   <p class="mb-0">Add this to your saved items</p>
                                                </div>
                                             </div>
                                          </a>
                                          <!--    
                                          <a class="dropdown-item p-3" href="#">
                                             <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-close-circle-line"></i></div>
                                                <div class="data ml-2">
                                                   <h6>Hide Post</h6>
                                                   <p class="mb-0">See fewer posts like this.</p>
                                                </div>
                                             </div>
                                          </a> -->
                                          <a class="dropdown-item p-3" href="{{ route('report', $item->id) }}">
                                             <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-user-unfollow-line"></i></div>
                                                <div class="data ml-2">
                                                   <h6>Report User</h6>
                                                   <p class="mb-0">Report this user for justice.</p>
                                                </div>
                                             </div>
                                          </a>
                                          <!-- <a class="dropdown-item p-3" href="#">
                                             <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-notification-line"></i></div>
                                                <div class="data ml-2">
                                                   <h6>Notifications</h6>
                                                   <p class="mb-0">Turn on notifications for this post</p>
                                                </div>
                                             </div>
                                          </a> -->
   
                                       </div>
                                 </div>
                              </div>
                              <!-- end menu optional -->
                           </div>
                        </div>
                        <!-- isi posting -->
                        <!-- jika postingan Text  -->
                        <div class="mt-3">
                           <h5> {{ $item->title }} </h5>
                           <p> {{ $item->story }} </p>
                        </div>
                        <!-- jika postingan Text  -->
                        <!-- jika postingan Gambar  -->
                        @if($item->photo()->exists())
                        <div class="user-post">
                           <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}"><img src="{{ asset('storage/app/'.$item->photo->filename) }}" alt="post-image" class="img-fluid rounded w-100"></a>
                        </div>
                        @endif
                        <!-- jika postingan Gambar  -->
                        <!-- jika postingan Video  -->
                        <!-- <div class="user-post">
                                    <div class="embed-responsive embed-responsive-16by9">
                                       <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/j_GsIanLxZk?rel=0" allowfullscreen></iframe>
                                    </div>
                                 </div> -->
                        <!-- jika postingan Video  -->
                        <!-- Tags Area -->
                        <p>
                           @foreach($item->tags as $tag)
                           <a href="{{ route('tag', ['slug' => $tag->slug]) }}" class="badge bg-azure-lt">
                              {{ $tag->slug }}
                           </a>
                           @endforeach
                        </p>

                        <!-- Top Comment User Area -->
                        <div class="comment-area mt-3">
                           <div class="d-flex justify-content-between align-items-center">
                              <div class="like-block position-relative d-flex align-items-center">
                                 <div class="d-flex align-items-center">
                                    <div class="like-data">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                             <img src="{{asset('resources/views/assets/clean')}}/images/icon/01.png" class="img-fluid" alt="">
                                          </span>
                                          <div class="dropdown-menu">
                                             <a class="ml-2 mr-2" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like" onclick="likePost({{ $item->id }})"><img src="{{asset('resources/views/assets/clean')}}/images/icon/01.png" class="img-fluid" alt=""></a>
                                             <a class="mr-2" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Love" onclick="likePost({{ $item->id }})"><img src="{{asset('resources/views/assets/clean')}}/images/icon/02.png" class="img-fluid" alt=""></a>
                                             <a class="mr-2" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Happy" onclick="likePost({{ $item->id }})"><img src="{{asset('resources/views/assets/clean')}}/images/icon/03.png" class="img-fluid" alt=""></a>
                                             <a class="mr-2" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="HaHa" onclick="likePost({{ $item->id }})"><img src="{{asset('resources/views/assets/clean')}}/images/icon/04.png" class="img-fluid" alt=""></a>
                                             <a class="mr-2" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Think" onclick="likePost({{ $item->id }})"><img src="{{asset('resources/views/assets/clean')}}/images/icon/05.png" class="img-fluid" alt=""></a>
                                             <a class="mr-2" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sade" onclick="likePost({{ $item->id }})"><img src="{{asset('resources/views/assets/clean')}}/images/icon/06.png" class="img-fluid" alt=""></a>
                                             <a class="mr-2" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lovely" onclick="likePost({{ $item->id }})"><img src="{{asset('resources/views/assets/clean')}}/images/icon/07.png" class="img-fluid" alt=""></a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="total-like-block ml-2 mr-3">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                             <span id="like-{{ $item->id }}">@json($item->likers()->count())</span> Likes
                                          </span>
                                          <div class="dropdown-menu">
                                             <a class="dropdown-item" href="#">22 good people liked this post</a>
                                             <!-- <a class="dropdown-item" href="#">Bill Yerds</a>
                                                <a class="dropdown-item" href="#">Hap E. Birthday</a>
                                                <a class="dropdown-item" href="#">Tara Misu</a>
                                                <a class="dropdown-item" href="#">Midge Itz</a>
                                                <a class="dropdown-item" href="#">Sal Vidge</a>
                                                <a class="dropdown-item" href="#">Other</a> -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="total-comment-block">
                                    <div class="dropdown">
                                       <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                          {{ __('main.card_comments', ['count' => $item->comments()->count()]) }} </span>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#">22 wise people commented on this post</a>
                                          <!-- <a class="dropdown-item" href="#">Bill Yerds</a>
                                             <a class="dropdown-item" href="#">Hap E. Birthday</a>
                                             <a class="dropdown-item" href="#">Tara Misu</a>
                                             <a class="dropdown-item" href="#">Midge Itz</a>
                                             <a class="dropdown-item" href="#">Sal Vidge</a>
                                             <a class="dropdown-item" href="#">Other</a> -->
                                       </div>
                                    </div>
                                 </div>
                                 <div class="total-comment-block ml-2 mr-3">
                                    <div class="dropdown">
                                       <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                          {{ $item->itemView() }} {{ __('main.card_views') }} </span>
                                       <div class="dropdown-menu">
                                          <a class="dropdown-item" href="#"> {{ $item->itemView() }} people viewed this post.</a>
                                          <!-- <a class="dropdown-item" href="#">Bill Yerds</a>
                                             <a class="dropdown-item" href="#">Hap E. Birthday</a>
                                             <a class="dropdown-item" href="#">Tara Misu</a>
                                             <a class="dropdown-item" href="#">Midge Itz</a>
                                             <a class="dropdown-item" href="#">Sal Vidge</a>
                                             <a class="dropdown-item" href="#">Other</a> -->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="share-block d-flex align-items-center feather-icon mr-3">
                                 <!-- <a href="javascript:void();"><i class="ri-share-line"></i>
                                    <span class="ml-1"> 0 Share</span></a> -->
                                    <span class="dropdown">
                                          <a href="" class="text-muted" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" /><line x1="10" y1="14" x2="20" y2="4" /><polyline points="15 4 20 4 20 9" /></svg>
                                          </a>

                                          <div class="dropdown-menu">
                                             <a class="dropdown-item text-success strong" href="whatsapp://send?text={{ url('view/'.$item->id.'/'.$item->slug) }}" data-action="share/whatsapp/share">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon text-success strong" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" /><path d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1" /></svg>
                                                {{ __('Whatsapp') }}
                                             </a>
                                             <a class="dropdown-item" href="http://www.facebook.com/sharer/sharer.php?u={{ url('view/'.$item->id.'/'.$item->slug) }}&t={{ $item->title }}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon text-primary" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                                                {{ __('Facebook') }}
                                             </a>
                                             <a class="dropdown-item" href="https://twitter.com/share?url={{ url('view/'.$item->id.'/'.$item->slug) }}&text={{ $item->title }}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon text-info" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                                                {{ __('Twitter') }}
                                             </a>
                                          </div>
                                        </span>
                              </div>

                           </div>
                           <!-- comment section start -->
                           <hr>
                           @forelse($item->comments() as $comment)
                           <ul class="post-comments p-0 m-0">
                              <li class="mb-2">
                                 <div class="d-flex flex-wrap">
                                    <div class="user-img">
                                       @if(empty($comment->user()->avatar))
                                       <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> -->
                                       <img src="https://w7.pngwing.com/pngs/416/62/png-transparent-anonymous-person-login-google-account-computer-icons-user-activity-miscellaneous-computer-monochrome.png" alt="userimg" class="avatar-35 rounded-circle img-fluid">

                                       @else
                                       <img src="{{ asset('storage/app/public/images/avatar/'.$comment->user()->avatar) }}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                       @endif

                                    </div>
                                    <div class="comment-data-block ml-3">
                                       <a href="{{ url('profile/@'.$comment->user()->name) }}">
                                          <h6>{{ $comment->user()->name }}@if($item->user_id == $comment->user_id)<span class="badge badge-pill bg-red">{{ __('OP')}}</span>@endif
                                             @if(Cache::has('user-is-online-' . $comment->user_id))
                                             <!-- <small class="badge  badge-light float-right pt-1">Online</small> -->
                                             <sup class="text-success" title="{{ __('main.card_online') }}"><u>Online</u></sup>
                                             @else
                                             <sup class="text-danger" title="{{ __('main.card_offline') }}"><u>Offline</u></sup>
                                             @endif
                                          </h6>
                                       </a>



                                       <p class="mb-0">{{ $comment->comment_text }}</p>
                                       <div class="d-flex flex-wrap align-items-center comment-activity">
                                          <div class="like-block position-relative d-flex align-items-center">
                                             <div class="total-like-block text-muted  mr-2">
                                                <div class="dropdown">
                                                   <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                      <span id="like-comment-{{$comment->id}}">{{HomeController::getTotalLike($comment->id)}}</span> 
                                                      <a href="javascript:void();" id="like-text-{{$comment->id}}" onclick="likeComment({{  $comment->id }})">
                                                         @if(HomeController::hasLikeComment($comment->id))
                                                            Unlike
                                                         @else
                                                            Like
                                                         @endif
                                                      </a>
                                                   </span>
                                                   <div class="dropdown-menu">
                                                      <a class="dropdown-item" href="#">{{HomeController::getTotalLike($comment->id)}} good people liked this Comment</a>
                                                   </div>
                                                </div>
                                             </div>
                                             @if(Auth::check() && $comment->user_id == Auth::id() || Auth::check() && Auth::user()->isAdministrator())
                                                <div class="total-like-block text-muted mr-2">

                                                   <div class="dropdown">
                                                      
                                                      <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                         
                                                            Hapus 
                                                      </span>
                                                      <div class="dropdown-menu">
                                                         <a class="dropdown-item" href="{{ route('delete_comment_post',$comment->id) }}" onclick="return confirm('Do you confirm this operation?');">Hapus Komentar ini</a>
                                                      </div>
                                                   </div>
                                                </div>
                                             @endif
                                          </div>
                                          <a href="javascript:void();">Report</a>
                                          <span> {{ Carbon::parse($comment->created_at)->diffForHumans() }} </span>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           @empty
                           <div class="empty text-center">
                              <div class="empty-img ">
                                 <img src="{{ asset('resources/views/assets/img/comments.svg') }}" alt="">
                              </div>
                              <p class="empty-title">{{ __('main.card_there_are_no_comments') }}</p>
                           </div>
                           @endforelse
                           <form class="comment-text d-flex align-items-center mt-3" method="POST" action="{{ route('store') }}" role="form" id="post-comment">
                              @csrf
                              <!-- <input type="text" class="form-control rounded"> -->
                              <div class="col">
                                 <!-- <textarea type="text" class="form-control form-control-flush @error('comment_text') is-invalid @enderror" rows="2" name="comment_text" placeholder="{{ __('main.card_add_public_comment') }}">{{ old('comment_text') }}</textarea> -->
                                 <input type="text" class="form-control form-control-flush @error('comment_text') is-invalid @enderror" name="comment_text" placeholder="{{ __('main.card_add_public_comment') }}" value="{{ old('comment_text') }}">
                                 @error('comment_text')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>
                              <div class="comment-attagement d-flex">
                                 <input type="hidden" id="recipient_id" name="recipient_id" value="{{ $item->user_id }}">
                                 <input type="hidden" id="item_id" name="item_id" value="{{ $item->id }}">
                                 <button type="submit"class="btn btn-primary mr-4"><i class="ri-send-plane-fill"></i></button>
                                 <!-- <a href="javascript:void();"><i class="ri-user-smile-line mr-3"></i></a>
                                       <a href="javascript:void();"><i class="ri-camera-line mr-3"></i></a>-->
                              </div>
                           </form>
                           <!-- comment section start -->
                        </div>
                        <!-- End Top Comment User Area -->

                     </div>
                  </div>

               </div>
            
              
               <div class="col-lg-4">
                  @if($statusPoints == 1)
                     @include('layouts.topUsersPoint')
                  @endif
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Viral</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="media-story m-0 p-0">
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

               </div>
            </div>



         </div>
      </div>
   </div>
   @endsection('content')

   @push('js')
   <script>
      function likeComment(a){
     
         $.ajaxSetup({
            headers:{
               "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
            }
         });
            $(this);
            $.ajax({
               url:APP_URL+"/save_like_comment",
               type:"POST",
               dataType:"json",
               data: {
                  item:a,
                  _token:$('meta[name="csrf-token"]').attr("content")
               },
               success:function(e){
                  var t;
                  console.log(e);
                  1==e.bool?($("#like-text-"+a).text('Unlike'),t=$("#like-comment-"+a).text(),$("#like-comment-"+a).text(++t)):0==e.bool&&($("#like-text-"+a).text('Like'),t=$("#like-comment-"+a).text(),$("#like-comment-"+a).text(--t))
               },
               error:function(e){
                  location.replace(APP_URL+"/login")
               }
            })
         };
   </script>
   @endpush