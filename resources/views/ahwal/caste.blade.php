<x-auth-layout>
    <x-slot name="page_title">Ahwal Caste Wise List</x-slot>
    <x-slot name="style"></x-slot>
    <x-slot name="javascript"></x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Ahwal Caste Wise List</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover" style="width:100%;font-size:11px;">
                <thead>
                    <tr>
                        <th>Disability Type</th>
                        @foreach($castes as $cast)
                        <th>{{ $cast->name }}</th>
                        @endforeach
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($disabilityTypes as $disabilityType)
                    <tr>
                        <td>{{ $disabilityType->type }}</td>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($castes as $caste)
                        @php
                            $count = $disabilityType->divyangs->where('caste_id', $caste->id)->count();
                            $total += $count;
                        @endphp
                        <td>{{ $count }}</td>
                        @endforeach
                        <td>{{ $total }}</td>
                    </tr>
                    @endforeach
                
            </table>
        </div>
    </div>

</x-auth-layout>