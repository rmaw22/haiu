<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>HaiU</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('storage/app/public/images/logo/favicon/'.App\Models\Settings::find('favicon')->value) }}" />
      <meta name="msapplication-TileColor" content="#3dd9c4"/>
        <meta name="theme-color" content="#3dd9c4"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="HandheldFriendly" content="True"/>
        <meta name="MobileOptimized" content="320"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="twitter:image:src" content="">
        <meta name="twitter:site" content="HaiU">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="HaiU ">
        <meta name="twitter:description" content="{{ $site_description }}">
        <meta property="og:image" content="">
        <meta property="og:image:width" content="1280">
        <meta property="og:image:height" content="640">
        <meta property="og:site_name" content="HaiU">
        <meta property="og:type" content="object">
        <meta property="og:title" content="HaiU">
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:description" content="{{ $site_description }}">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('resources/views/assets/clean/css/bootstrap.min.css') }}">
      
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ asset('resources/views/assets/clean/css/typography.css') }}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('resources/views/assets/clean/css/style.css') }}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('resources/views/assets/clean/css/responsive.css') }}">
           <!-- Styles -->
           <link rel="stylesheet" href="{{ asset('resources/views/assets/css/tabler.min.css') }}">
        <link rel="stylesheet" href="{{ asset('resources/views/assets/css/toastr.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-bootstrap/0.5pre/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet"/>

       <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />

        <!-- <link rel="stylesheet" href="{{ asset('resources/views/assets/css/extra.css') }}"> -->

        <!-- Please Wait -->
        <!-- <link href="{{ asset('resources/views/assets/css/please-wait.css') }}" rel="stylesheet"> -->
        <!-- <link href="{{ asset('resources/views/assets/css/default.css') }}" rel="stylesheet"> -->
        <!-- END -->
      @stack('css')
      <style>
        .ui-state-active h4,
        .ui-state-active h4:visited {
            color: #26004d ;
            
        }

        .ui-menu-item{
            line-height: 0px !important;
            /* height: 60px; */
            border: 1px solid #ececf9;
        }
        .ui-widget-content .ui-state-active {
            background-color: white !important;
            border: none !important;
        }
        .list_item_container {
            /* width:inherit; */
            /* height: 60px; */
            float: left;
            /* margin-left: 10px; */
        }
        .list_item_container:hover {
            /* width:100%;
            height: 60px; */
            float: left;
            /* margin-left: 10px; */
        }
        .ui-widget-content .ui-state-active .list_item_container {
            background-color: #f5f5f5;
            width:100%;
        }

        .image {
            width: auto;
            float: left;
            padding: 10px;
        }
        .image img{
            vertical-align:middle;
            width: auto;
            height : 30px;
        }
        .labelItem{
            white-space: nowrap;
            overflow: hidden;
            color: rgb(124,77,255);
            text-align: left;
        }
        input:focus{
            background-color: #f5f5f5;
        }
        .navbar-expand-lg .navbar-collapse {
                flex-direction: unset;
        }
        .navbar {
            align-items: unset !important;
        }
        @media (max-width: 991.98px){
            .navbar-expand-lg .navbar-collapse {
                flex-direction: unset;
            }
        }
            
        </style>
      <script type="text/javascript">"use strict";var APP_URL = {!! json_encode(url('/')) !!}</script>
     
   </head>
   <body class="right-column-fixed">
     <!-- loader Start -->
         @include('layouts.item.loader')
     <!-- loader END -->
        
     
     