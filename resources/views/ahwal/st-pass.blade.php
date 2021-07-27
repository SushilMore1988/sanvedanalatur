<x-auth-layout>
    <x-slot name="page_title">Ahwal S.T. Travel Pass Wise List</x-slot>
    <x-slot name="style"></x-slot>
    <x-slot name="javascript"></x-slot>

    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Ahwal S.T. Travel Pass Wise List</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover" style="width:100%;font-size:11px;">
                <thead>
                    <tr>
                        <th>Disability Type</th>
                        <th>Yes</th>
                        <th>No</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalArray[0] = 0;
                        $totalArray[1] = 0;
                    @endphp
                    @foreach($disabilityTypes as $disabilityType)
                    <tr>
                        <td>{{ $disabilityType->type }}</td>
                        @php
                            $total = 0;
                            $count = $disabilityType->divyangs()->where('st_pass', 1)->withArea()->count();
                            $total += $count;
                            $totalArray[0] += $count;
                        @endphp
                        @if($count <= 0)
                        <td>{{ $count }}</td>
                        @else
                        <td><a href="{{ url("divyang?disability_type=$disabilityType->type&parameter=st_pass&st_pass=1")}}">{{ $count }}</a></td>
                        @endif
                        @php
                            $count = $disabilityType->divyangs()->where('st_pass', 0)->withArea()->count();
                            $total += $count;
                            $totalArray[1] += $count;
                        @endphp
                        @if($count <= 0)
                        <td>{{ $count }}</td>
                        @else
                        <td><a href="{{ url("divyang?disability_type=$disabilityType->type&parameter=st_pass&st_pass=0")}}">{{ $count }}</a></td>
                        @endif
                        @if($total <= 0)
                            <td>{{ $total }}</td>
                        @else
                            <td><a href="{{ url("divyang?disability_type=$disabilityType->type")}}">{{ $total }}</a></td>
                        @endif
                    </tr>
                    @endforeach
                    <tr>
                        <td>Total</td>
                        <td><a href="{{ url("divyang?parameter=st_pass&st_pass=1")}}">{{ $totalArray[0] }}</a></td>
                        <td><a href="{{ url("divyang?parameter=st_pass&st_pass=0")}}">{{ $totalArray[1] }}</a></td>
                        @if(($totalArray[0] + $totalArray[1]) <= 0)
                            <td>{{ $totalArray[0] + $totalArray[1] }}</td>
                        @else
                            <td><a href="{{ url("divyang")}}">{{ $totalArray[0] + $totalArray[1] }}</a></td>
                        @endif
                    </tr>
            </table>
        </div>
    </div>

</x-auth-layout>