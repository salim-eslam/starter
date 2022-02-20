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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="post" action="{{route("store")}}">{{--  بستخدم روت فنكشن علشان اروح ل روت معين بس لازم اكون مدي الروت ده اسم فى ملف ويب --}}
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('message.offer name en')}}</label>
                                <input type="text" class="form-control" name="name_en" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('message.offer name')}}">
                                @error('name_en')
                                <small id="emailHelp" name="name" class="form-text text-muted">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('message.offer name ar')}}</label>
                                <input type="text" class="form-control" name="name_ar" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('message.offer name')}}">
                                @error('name_ar')
                                <small id="emailHelp" name="name_ar" class="form-text text-muted">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('message.offer price')}}</label>
                                <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="{{__('message.offer price')}}">
                                @error('price')
                                <small id="emailHelp" name="name" class="form-text text-muted">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('message.offer details en')}}</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="details_en" placeholder="{{__('message.offer details')}}">
                                @error('details_en')
                                <small id="emailHelp" name="name" class="form-text text-muted">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('message.offer details ar')}}</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="details_ar" placeholder="{{__('message.offer details')}}">
                                @error('details_ar')
                                <small id="emailHelp" name="name" class="form-text text-muted">{{$message}}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Store</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
