<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
   
<head>

        @include('includes.dashboard-head')

</head>

@php
	$bodyClass = (!empty($boxedLayout)) ? 'boxed-layout' : '';
	$bodyClass .= (!empty($paceTop)) ? 'pace-top ' : '';
    $bodyClass .= (!empty($bodyExtraClass)) ? $bodyExtraClass . ' ' : '';
    $sidebarSettings = (!empty($sidebarSettings)) ? $sidebarSettings     : '';
	$sidebarHide = (!empty($sidebarHide)) ? $sidebarHide : '';
	$sidebarTwo = (!empty($sidebarTwo)) ? $sidebarTwo : '';
	$topMenu = (!empty($topMenu)) ? $topMenu : '';
	$footer = (!empty($footer)) ? $footer : '';
	
	// nedenfor er defineret class, page container
	$pageContainerClass = (!empty($sidebarHide)) ? 'user-dashboard ' : '';
	$pageContainerClass .= (!empty($sidebarSettings)) ? 'page-with-settings-sidebar ' : '';
	$pageContainerClass .= (!empty($sidebarTwo)) ? 'page-with-two-sidebar ' : '';
	$pageContainerClass .= (!empty($contentFullHeight)) ? 'page-content-full-height ' : '';
	
	$contentClass = (!empty($contentFullWidth) || !empty($contentFullHeight)) ? 'content-full-width ' : '';
    $contentClass .= (!empty($contentInverseMode)) ? 'content-inverse-mode ' : '';
    
@endphp

<body class="{{ $bodyClass }}">
    
     @include('components.page-loader')
        <!-- begin #page-container -->
        <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed {{ $pageContainerClass }}">
        
            @include('includes/dashboard-header')
            
            @includeWhen(!$sidebarHide, 'includes/dashboard-sidebar')

            @includeWhen($sidebarSettings, 'includes/dashboard-sidebar-settings')

                <div id="content" class="content">
                    
                    @yield('content')

                </div>

            @include('components.scroll-top-btn')
        
        </div>
        <!-- end page container -->

    @include('includes.page-js')

    @yield('pageLevelJs')
</body>

</html>
