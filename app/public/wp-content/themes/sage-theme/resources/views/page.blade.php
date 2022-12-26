@extends('layouts.app')
@section('content')
    <div class="h-50"></div>
    @while (have_posts()) @php the_post() @endphp
        @if (have_rows('c8_templates'))
            @php
                $i = 0;
                $sectionsPath = get_theme_file_path() . '/resources/views/template-parts/page';
            @endphp

            @while (have_rows('c8_templates')) @php the_row()@endphp
                @php
                    $fileName = 'module-' . get_row_layout() . '.blade.php';
                @endphp
                @if (file_exists($sectionsPath . '/' . $fileName))
                    @include('template-parts.page.module-'.get_row_layout(), ['data' =>
                    Page::getDataModule($c8_templates[$i])])
                @endif
                @php
                    $i++;
                @endphp
                <div class="h-50"></div>
            @endwhile
        @endif
    @endwhile
@endsection

{{-- @include('partials.page-header')
@include('partials.content-page') --}}
