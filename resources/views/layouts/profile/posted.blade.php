@extends('layouts.app2')
@section('content')
<div id="content-page" class="content-page" style="padding-top:115px !important;">
    <div class="container">
        <div class="iq-card">
            <div class="iq-card-body profile-page p-0">
                <div class="profile-header">
                    <div class="cover-container">
                        <img src="{{ asset('resources/views/assets/clean/images/page-img/profile-bg1.jpg') }}" alt="profile-bg" class="rounded img-fluid">
                        <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                            <li><a href="{{ route('profile', ['username'=>$user->name])}}"><i class="ri-home-line"></i></a></li>
                            <li><a href="{{url('settings/edit')}}"><i class="ri-bookmark-3-line"></i></a></li>
                            <li><a href="{{url('favorites')}}"><i class="ri-settings-4-line"></i></a></li>
                        </ul>
                    </div>
                    <div class="user-detail text-center mb-3">
                        <div class="profile-img">
                            @if(!empty($user->avatar))
                            <span class="avatar avatar-xl avatar-rounded">
                                <img src="{{ asset('storage/app/public/images/avatar/'.$user->avatar) }}" alt="profile-img" class="avatar-130 img-fluid">
                                @if(Cache::has('user-is-online-' . $user->id))
                                <span class="badge bg-green" title="{{ __('main.card_online') }}"></span>
                                @else
                                <span class="badge bg-x" title="{{ __('main.card_offline') }}"></span>
                                @endif
                            </span>
                            @else
                            <img src="https://w7.pngwing.com/pngs/416/62/png-transparent-anonymous-person-login-google-account-computer-icons-user-activity-miscellaneous-computer-monochrome.png" alt="userimg" class="avatar-130 img-fluid">

                            @endif

                        </div>
                        <div class="profile-detail">
                            <h3 class=""> {{ $user->name }}</h3>


                        </div>
                    </div>
                    <div class="profile-info p-4 d-flex align-items-center justify-content-between position-relative">
                        <div class="social-links">
                            <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                <li class="text-center pr-3">
                                    <div class="col-auto">
                                        <a href="{{ route('points_section') }}" class="btn btn-pill btn-lg bg-orange-lt strong">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M6 5h12l3 5l-8.5 9.5a0.7 .7 0 0 1 -1 0l-8.5 -9.5l3 -5" />
                                                <path d="M10 12l-2 -2.2l.6 -1" />
                                            </svg>
                                            {{ $user->total_point_count() }}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="social-info">
                            <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                <li class="text-center pl-3">
                                    <h6>Stories</h6>
                                    <p class="mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 20l10 -10m0 -5v5h5m-9 -1v5h5m-9 -1v5h5m-5 -5l4 -4l4 -4" />
                                            <path d="M19 10c.638 -.636 1 -1.515 1 -2.486a3.515 3.515 0 0 0 -3.517 -3.514c-.97 0 -1.847 .367 -2.483 1m-3 13l4 -4l4 -4" />
                                        </svg>
                                        <a href="{{ route('user_posted', ['username'=>$user->name])}}" class="active">
                                            {{ __('main.profile_count_post', ['count' => $user->all_posts_user->count()]) }}
                                        </a>
                                    </p>
                                </li>
                                <li class="text-center pl-3">
                                    <h6>Comments</h6>
                                    <p class="mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" />
                                            <line x1="12" y1="12" x2="12" y2="12.01" />
                                            <line x1="8" y1="12" x2="8" y2="12.01" />
                                            <line x1="16" y1="12" x2="16" y2="12.01" />
                                        </svg>
                                        <a href="{{ route('user_comments', ['username'=>$user->name])}}" class="active">
                                            {{ __('main.profile_count_comments', ['count' => $user->comments->count()]) }}
                                        </a>
                                    </p>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-8">
               @include('layouts.item.cardFeedItem')
            </div>

            <div class="col-lg-4">
                <!-- Bottom ADV -->
                @if(!empty($setting_adv_bottom))
                @if($adv_bottom->status == 1)
                <div class="mb-3">
                    {!! $adv_bottom->value !!}
                </div>
                @endif
                @endif
                <!-- End Bottom ADV -->

                <!-- Top Users -->
                @if($statusPoints == 1)
                @include('layouts.topUsers')
                @endif
                <!-- End Top Users -->
            </div>

        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>

@endsection('content')