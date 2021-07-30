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
        <form method="POST"  enctype="multipart/form-data">
                @csrf
                 
            <a class="btn btn-info" href="{{ url('/ahwal/caste/export') }}"> 
                 Export File</a>
            </form>
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
                    @php
                        $totalArray = [];
                    @endphp
                    @foreach($disabilityTypes as $disabilityType)
                        <tr>
                            <td>{{ $disabilityType->type }}</td>
                            @php
                                $total = 0;
                                $i = 0;
                            @endphp
                            @foreach($castes as $caste)
                                @php
                                    $count = $disabilityType->divyangs()->where('caste_id', $caste->id)->withArea()->count();
                                    $total += $count;
                                    if(isset($totalArray[$i])){
                                        $totalArray[$i] += $count;
                                    }else{
                                        $totalArray[$i] = $count;
                                    }
                                    $i++;
                                @endphp
                                @if($count <= 0)
                                    <td>{{ $count }}</td>
                                @else
                                    <td><a href="{{ url("divyang?disability_type=$disabilityType->type&parameter=caste_id&caste_id=$caste->id")}}">{{ $count }} Export</a></td>
                                @endif
                            @endforeach
                            {{-- <td>{{ $total }}</td> --}}
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
                            $i = 0;
                            $grandTotal = 0;
                        @endphp
                        @foreach($castes as $caste)
                            {{-- <td>{{ $totalArray[$i] }}</td> --}}
                            @if($totalArray[$i] <= 0)
                                <td>{{ $totalArray[$i] }}</td>
                            @else
                                <td><a href="{{ url("divyang?parameter=caste_id&caste_id=$caste->id")}}">{{ $totalArray[$i] }}</a></td>
                            @endif
                            @php
                                $grandTotal += $totalArray[$i];
                                $i++;
                            @endphp
                        @endforeach
                        {{-- <td>{{ $grandTotal }}</td> --}}
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