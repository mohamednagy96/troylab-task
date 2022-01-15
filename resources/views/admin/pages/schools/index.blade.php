@extends('admin.layouts.master')
@section('content')
<x-card title="schools List" :create="route('admin.schools.create')" table="true">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('level Count') }}</th>
                <th>{{ __('Number of Students') }}</th>

                <th>{{ __('Registered at') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($schools as $school)
                <tr>
                    <td>{{ $school->id }}</td>
                    <td>{{ $school->title }}</td>
                    <td>{{ $school->level_count }}</td>
                    <td> 
                        <a href="{{route('admin.students.index', ['school_id' => $school->id])}}">
                             {{ $school->students->count() }}
                        </a>
                    </td>
                    <td>{{ $school->created_at }}</td>
                    <td>
                        <x-inputs.btn type="edit" :route=" route('admin.schools.edit', $school->id) " />
                        <x-inputs.btn type="delete" :route=" route('admin.schools.destroy', $school->id) "/>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="alert alert-warning text-center" role="alert">
                            <strong>{{ __('No records found') }}</strong>
                        </div>
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>

</x-card>

@endsection
