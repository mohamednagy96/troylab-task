@extends('admin.layouts.master')
@section('content')
<x-card title="students List" :create="route('admin.students.create')" table="true">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('School') }}</th>
                <th>{{ __('Join Date') }}</th>
                <th>{{ __('Registered at') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->school->title }}</td>
                    <td>{{ $student->join_date }}</td>

                    <td>{{ $student->created_at }}</td>
                    <td>
                            <x-inputs.btn type="show" :route=" route('admin.students.show', $student->id) " />
                            <x-inputs.btn type="edit" :route=" route('admin.students.edit', $student->id) " />
                            <x-inputs.btn type="delete" :route=" route('admin.students.destroy', $student->id) "/>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
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
