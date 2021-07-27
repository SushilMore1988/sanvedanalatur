<x-auth-layout>
    <x-slot name="page_title">Create New Divyang</x-slot>
    <x-slot name="style">
        <link rel="stylesheet" type="text/css" href="{{url('vendor/datepicker/new-datepicker/bootstrap-datepicker.css')}}">
    </x-slot>
    <x-slot name="javascript">
        
    </x-slot>

    @livewire('divyang.create.show', ['id' => $divyang->id])
</x-auth-layout>