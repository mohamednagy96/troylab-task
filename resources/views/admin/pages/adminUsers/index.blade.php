@extends('admin.layouts.master', ["breadcrumb" => "index", "breadcrumbLinks" => "Admins"])

@section('content')
    <x-card title="Admins List" :create="route('admin.admin_users.create')" can="admin_users_create" table="true">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        {{-- <th>{{ __('Active') }}</th> --}}
                        <th>{{ __('Registered at') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            {{-- <td>{{ !$admin->block_at ? 'Active' : 'Not Active' }}</td> --}}
                            <td>{{ $admin->created_at }}</td>
                            <td>
                                @can('admin_users_edit')
                                    <x-inputs.btn type="edit" :route=" route('admin.admin_users.edit', $admin->id) " />
                                @endcan
                                @can('admin_users_delete')
                                    <x-inputs.btn type="delete" :route=" route('admin.admin_users.destroy', $admin->id) "/>
                                @endcan
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
