@php
    $prefix = Request::route()->getName();
    $title = explode('.', $prefix);
@endphp

<div class="pagetitle">
    <h1>{{ ucfirst($title[0]) }}</h1>
    <nav>
        <ol class="breadcrumb mt-2">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ ucfirst($title[0]) }}</li>
        </ol>
    </nav>
</div>