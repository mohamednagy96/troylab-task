@extends('admin.layouts.master')
@section('content')
<x-card title="Students {{$student->name}}">

    <div class="table-responsive mt-4">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="col">{{__('ID')}}</th>
                    <td>{{$student->id}}</td>
    
                </tr>
                <tr>
                    <th scope="col">{{__('Name')}}</th>
                    <td>{{$student->name}}</td>
                </tr>
                <tr>
                    <th scope="col">{{__('Email')}}</th>
                    <td>{{$student->email}}</td>
                </tr>
                <tr>
                    <th scope="col">{{__('Code')}}</th>
                    <td>{{$student->code}}</td>
                </tr>
                <tr>
                    <th scope="col">{{__('Gender')}}</th>
                    <td>{{$student->gender}}</td>
                </tr>
                <tr>
                    <th scope="col">{{__('Date of Birth')}}</th>
                    <td>{{$student->dob}}</td>
                </tr>
                <tr>
                    <th scope="col">{{__('School')}}</th>
                    <td>{{$student->school->title}}</td>
                </tr>
                <tr>
                    <th scope="col">{{__('Mobile')}}</th>
                    <td>{{$student->mobile}}</td>
                </tr>
                <tr>
                    <th scope="col">{{__('Parent Number')}}</th>
                    <td>{{$student->parent_number}}</td>
                </tr>
                <tr>
                    <th scope="col">{{__('level')}}</th>
                    <td>{{$student->level}}</td>
                </tr>
                <tr>
                    <th scope="col">{{__('is active')}}</th>
                    <td>{{$student->is_active ? 'yes' : 'no'}}</td>
                </tr>
                <tr>
                    <th scope="col">{{__('join Date')}}</th>
                    <td>{{$student->join_date}}</td>
                </tr>
                <tr>
                    <th scope="col">{{ __('Created At') }}</th>
                    <td>{{ $student->created_at ? $student->created_at->diffForhumans() : null}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</x-card>

@endsection


