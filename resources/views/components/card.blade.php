<div class="card mt-2">
    <div class="card-header with-border">
        <h3 class="card-title">
            @if (isset($title))
                {{ $title }}
            @endif
        </h3>
        <div class="card-tools">
        @if (isset($create))
            @if (isset($can))
                @can($can)
                <a href="{{ $create }}" class="btn btn-primary"><span class="fa fa-plus"></span> Create New {{$name ?? ''}}</a>
                @if (isset($create2))
                    <a href="{{ $create2 }}" class="btn btn-primary"><span class="fa fa-plus"></span> Create New {{$name2  ?? ''}} </a>
                @endif
                @if (isset($create3))
                    <a href="{{ $create3 }}" class="btn btn-primary"><span class="fa fa-plus"></span> Create New {{$name3  ?? ''}} </a>
                @endif
                @endcan
             @else
                 <a href="{{ $create }}" class="btn btn-primary"><span class="fa fa-plus"></span> Create New {{ $name ?? null}}</a>
                 @isset($create2)
                    <a href="{{ $create2 }}" class="btn btn-primary"><span class="fa fa-plus"></span> Create New {{ $name2 ?? null}}</a>
                 @endisset
                 @isset($create3)
                 <a href="{{ $create3 }}" class="btn btn-primary"><span class="fa fa-plus"></span> Create New {{ $name3 ?? null}}</a>
              @endisset

            @endif
        @endif

        @isset($trans)
        <ul class="nav nav-tabs">
            @foreach (locales() as $locale)
                <li class="nav-item " >
                    <a class="nav-link @if($loop->first) active @endif" data-toggle="tab" href="#{{ $locale }}">{{ $locale }}</a>
                </li>
            @endforeach
        </ul>
        @endisset


        @if (isset($exportEssay))
            <a href="{{ $exportEssay }}" class="btn btn-success"> Download Essay</a>
        @endif

        @if (isset($exportChoose))
            <a href="{{ $exportChoose }}" class="btn btn-success"> Download Choose</a>
        @endif

        @if (isset($update))
             <a href="{{ $update }}" class="btn btn-primary"><span class="fa fa-edit"></span> Update</a>
        @endif

        @if (isset($tools))
            {{ $tools }}
        @endif

        @if(isset($edit))
        <a href="{{ $edit }}" class="btn btn-primary"><span class="fa fa-plus"></span> Edit </a>
        @endif
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {{ $slot }}

        @isset($table)
            {{-- @include('admin.partials.delete-modal') --}}
            <x-delete-modal></x-delete-modal>
        @endisset
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

