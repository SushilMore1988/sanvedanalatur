<x-auth-layout>
    <x-slot name="page_title">Divyang List</x-slot>

    <x-slot name="style">

    </x-slot>

    <x-slot name="javascript">

    </x-slot>

    
    <div class="row">
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                    <tr>
                       <td>{{ $divyangs->id }}</td>
                       <td>{{ $divyangs->first_name }}</td>
                       <td></td>
                    </tr>
                    {{--@endif--}}
            </table>
            {{--{!! $identity->render() !!}--}}
        </div>
    </div>
</x-auth-layout>