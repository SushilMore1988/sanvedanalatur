<x-auth-layout>
    <x-slot name="page_title">Show Role</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    <div class="row">
        <div class="col-sm-12 margin-tb d-flex justify-content-between">
            <h2> Show Role {{ $role->name }}</h2>
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong><br/>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong><br/>
                {{ $rolePermissions->pluck('name')->implode(', ') }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Area:</strong><br/>
                {{ $role->area->name }}
            </div>
        </div>
    </div>

</x-auth-layout>