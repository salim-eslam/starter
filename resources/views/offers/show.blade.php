@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
{{--                               @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href={{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}>{{ $properties['native'] }}</a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}

                {{--            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                    <li>--}}
{{--                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                            {{ $properties['native'] }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        languages
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" href={{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}>{{ $properties['native'] }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('message.offer name')}}</th>
            <th scope="col">{{__('message.offer price')}}</th>
            <th scope="col">{{__('message.offer details')}}</th>

        </tr>
        </thead>
        <tbody>
       @foreach($offer as $key)
           <tr>
               <th scope="row">{{$key->id}}</th>
               <td>{{$key->name}}</td>
               <td>{{$key->price}}</td>
               <td>{{$key->details}}</td>

           </tr>

       @endforeach
        </tbody>
    </table>
@endsection
