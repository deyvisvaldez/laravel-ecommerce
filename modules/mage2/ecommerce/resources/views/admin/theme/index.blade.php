@extends('mage2-ecommerce::admin.layouts.app')

@section('content')
    <div class="row mb-3">

        <div class="col-11">
            <div class="h1 float-left">
                {{  __('mage2-ecommerce::theme.theme-list') }}
            </div>
        </div>
        <div class="col-1">
            <div class="float-right">
                <a href="{{ route('admin.theme.create') }}"
                   class="btn btn-primary">
                    {{  __('mage2-ecommerce::theme.theme-upload') }}
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        @if(count($themes) <= 0)
            <p>Sorry No Theme Found</p>
        @else
            @foreach($themes as $theme)
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="http://placehold.it/250x250" alt="Card image cap">

                        <div class="card-body">
                            <div class="h1">{{ $theme['name'] }}</div>
                        </div>
                        <div class="card-footer text-right">

                            @if($theme['name'] != 'mage2-default' && $activeTheme == $theme['name'])
                                <form action="{{ route('admin.theme.deactivated', $theme['name']) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">{{ __('mage2-ecommerce::theme.deactivate') }}</button>

                                </form>
                            @elseif($theme['name'] == $activeTheme || $theme['name'] == 'mage2-default')
                                <button disabled class="btn ">{{ __('mage2-ecommerce::theme.activate') }}</button>
                            @else
                                <form action="{{ route('admin.theme.activated', $theme['name']) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('mage2-ecommerce::theme.activate') }}
                                        </button>

                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach

        @endif

    </div>

@endsection

