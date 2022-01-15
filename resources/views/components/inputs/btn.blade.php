@switch($type ?? 'default')
    @case('create')
        <a href="{{ $route }}" class="btn btn-primary">
            {{ __('Create') }}

            <i class="fa fa-plus"></i>
        </a>
        @break

    @case('edit')
        <a href="{{ $route }}"
        class="
        @isset($ddItem)
            dropdown-item
        @else
        btn btn-info btn-sm
        @endisset
        "
        title="Edit">
            <i class="fa fa-edit"></i>
            @isset($ddItem)
                Edit
            @endisset
        </a>
        @break

    @case('show')
        <a href="{{ $route }}" class="
        @isset($ddItem)
            dropdown-item
        @else
            btn btn-{{ $btnClass ?? 'info' }} btn-sm
        @endisset
        "
        title="Show">
            <i class="fa fa-eye"></i>
            {{ $name ?? '' }}
        </a>
        @break
    @case('file')
        <a href="{{ $route }}" class="
        @isset($ddItem)
            dropdown-item
        @else
            btn btn-{{ $btnClass ?? 'info' }} btn-sm
        @endisset
        "
        title="Show">
            <i class="fa fa-file"></i>
            {{ $name ?? '' }}
        </a>
        @break
    @case('question')
        <a href="{{ $route }}" class="
        @isset($ddItem)
            dropdown-item
        @else
            btn btn-{{ $btnClass ?? 'info' }} btn-sm
        @endisset
        "
        title="question">
            <i class="fa fa-question"></i>
            {{ $name ?? '' }}
        </a>
        @break

    @case('delete')
        <a title="Delete" href="javascript:;"
        class="
        @isset($ddItem)
            dropdown-item
        @else
        btn btn-danger btn-sm
        @endisset
        delete-modal-btn"
        data-url="{{ $route }}"  style="width:{{$width ?? null}}">
            <i class="fa fa-trash"></i>
            @isset($ddItem)
                Delete
            @endisset
        </a>
        @break
    @case('search')
        <button type="submit" title="Search"  class="btn btn-info">
            {{ __('Search') }}
            <i class="fa fa-search"></i>
        </button>
        @break
    @case('submit')
        <button type="submit" title={{$title ?? null}}  class="btn btn-warning">
            {{ $title ?? null }}
        </button>
        @break

    @case('save')
        <button type="submit" class="btn btn-success">
            {{ __('Save') }}
            <i class="fa fa-save"></i>
        </button>
        @break


    @default

    <a href="{{ $route }}" class="btn btn-default">
        {{ $lable ?? '' }}
    </a>
@endswitch
