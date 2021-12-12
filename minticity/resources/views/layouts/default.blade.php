<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <title>MintiCity</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    @include('includes.head')
    @yield('head')
</head>
@include('includes.header')

<div class="content-box">
    <div class="d-flex align-items-stretch justify-content-between">
        @include('includes.navbar')
        <div class="ms-auto content">
            @yield('content')
        </div>
    </div>
</div>

@include('includes.foot')
@yield('foot')
@include('includes.footer')