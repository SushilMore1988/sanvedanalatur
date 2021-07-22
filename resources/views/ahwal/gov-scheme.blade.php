<x-auth-layout>
    <x-slot name="page_title">Ahwal Government Scheme Advantage Wise List</x-slot>
    <x-slot name="style"></x-slot>
    <x-slot name="javascript"></x-slot>

    <div class="row my-3">
        <div class="col-lg-12">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Ahwal Government Scheme Advantage Wise List</h4>
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
                            $count = $disabilityType->divyangs->where('government_scheme', 1)->count();
                            $total += $count;
                        @endphp
                        @if($count <= 0)
                            <td>{{ $count }}</td>
                        @else
                            <td><a href="{{ url("divyang?disability_type=$disabilityType->type&parameter=government_scheme&government_scheme=1")}}">{{ $count }}</a></td>
                            @php
                                $totalArray[0] += $count;
                            @endphp
                        @endif
                        @php
                            $count = $disabilityType->divyangs->where('government_scheme', 0)->count();
                            $total += $count;
                        @endphp
                        @if($count <= 0)
                            <td>{{ $count }}</td>
                        @else
                            <td><a href="{{ url("divyang?disability_type=$disabilityType->type&parameter=government_scheme&government_scheme=0")}}">{{ $count }}</a></td>
                            @php
                                $totalArray[1] += $count;
                            @endphp
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
                        @php
                            $grandTotal = $totalArray[0] + $totalArray[1];
                        @endphp
                        <td><a href="{{ url("divyang?parameter=government_scheme&government_scheme=1")}}">{{ $totalArray[0] }}</a></td>
                        <td><a href="{{ url("divyang?parameter=government_scheme&government_scheme=0")}}">{{ $totalArray[1] }}</a></td>
                        @if($grandTotal <= 0)
                            <td>{{ $grandTotal }}</td>
                        @else
                            <td><a href="{{ url("divyang")}}">{{ $grandTotal }}</a></td>
                        @endif
                    </tr>
            </table>
        </div>
    </div>

</x-auth-layout>