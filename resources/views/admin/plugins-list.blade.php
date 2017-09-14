@extends('tuke-core::admin._master')

@section('css')

@endsection

@section('js')

@endsection

@section('js-init')

@endsection

@section('content')
    <div class="layout-1columns">
        <div class="column main">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="icon-layers font-dark"></i>
                        {{ trans('tuke-modules-plugin::base.plugins_list') }}
                    </h3>
                </div>
                <div class="box-body">
                    {!! $dataTable or '' !!}
                </div>
            </div>
            @php do_action(BASE_ACTION_META_BOXES, 'main', TUKE_MODULES_PLUGIN . '.plugins-list.index', null) @endphp
        </div>
    </div>
@endsection
