@section('js')
    {{ HTML::script(asset('js/admin/list.js')) }}
@stop

@section('h1')
    <span id="nb_elements">{{ $models->getTotal() }}</span> @choice('galleries::global.galleries', $models->getTotal())
@stop

@section('titleLeftButton')
    <a href="{{ route('admin.galleries.create') }}" class=""><span class="fa fa-plus-circle"></span><span class="sr-only">{{ ucfirst(trans('galleries::global.New')) }}</span></a>
@stop

@section('main')

    <div class="list-form" lang="{{ Config::get('app.locale') }}">

        @include('admin._buttons-list')

        <div class="table-responsive">

            <table class="table table-condensed table-main">

                <thead>

                    <tr>
                        {{ Html::th('checkboxes', null, false, false) }}
                        {{ Html::th('edit', null, false, false) }}
                        {{ Html::th('status', null, false) }}
                        {{ Html::th('name', 'asc') }}
                        {{ Html::th('title', null, false) }}
                        {{ Html::th('files', null, false) }}
                    </tr>

                </thead>

                <tbody>

                    @foreach ($models as $model)

                    <tr id="item_{{ $model->id }}">
                        <td>{{ $model->present()->checkbox }}</td>
                        <td>{{ $model->present()->edit }}</td>
                        <td>{{ $model->present()->status }}</td>
                        <td>{{ $model->name }}</td>
                        <td>{{ $model->title }}</td>
                        <td>{{ $model->present()->countFiles }}</td>
                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    {{ $models->appends(Input::except('page'))->links() }}

@stop
