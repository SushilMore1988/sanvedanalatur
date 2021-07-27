<div>
    @if($isShowCreate)
    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Mahanagarpalika Ward Number</h4>
        </div>
        @can('mahanagarpalika-list')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="javascript:void(0)" wire:click="resetCreateForm()"> Back</a>
        </div>
        @endcan
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <form wire:submit.prevent="store">
                <div class="form-group">
                    <strong>Country:</strong>
                    {!! Form::select('country', $countries, null, array('placeholder' => 'Country','class' => 'form-control', 'wire:model' => 'country', 'wire:change' => 'changedCountry()')) !!}
                </div>
                @error('country')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <strong>State:</strong>
                    {!! Form::select('state', $states, null, array('placeholder' => 'State','class' => 'form-control', 'wire:model' => 'state', 'wire:change' => 'changedState()')) !!}
                </div>
                @error('state')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <strong>District:</strong>
                    {!! Form::select('district', $districts, null, array('placeholder' => 'District','class' => 'form-control', 'wire:model' => 'district', 'wire:change' => 'changedDistrict()')) !!}
                </div>
                @error('district')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <strong>Mahanagarpalika:</strong>
                    {!! Form::select('mahanagarpalika', $mahanagarpalikas, null, array('placeholder' => 'Mahanagarpalika','class' => 'form-control', 'wire:model' => 'mahanagarpalika', 'wire:change' => 'changedMahanagarpalika()')) !!}
                </div>
                @error('mahanagarpalika')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <strong>Mahanagarpalika Zone:</strong>
                    {!! Form::select('zone', $zones, null, array('placeholder' => 'Mahanagarpalika Zone','class' => 'form-control', 'wire:model' => 'zone')) !!}
                </div>
                @error('zone')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'wire:model' => 'name')) !!}
                </div>
                @error('name')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @else
    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Mahanagarpalika Ward Number List</h4>
        </div>
        @can('mahanagarpalika-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="javascript:void(0)" wire:click="$set('isShowCreate', true)"> Add New Mahanagarpalika Ward Number</a>
        </div>
        @endcan
    </div>
    <div class="row">
        <div class="col-lg-12 text-right">
            <input class="" placeholder="search..." name="search" wire:model="search">
        </div>
        <div class="col-lg-12">
        <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
                    {{ csrf_field() }}
                    {{-- <label>Select File for Upload</label> --}}
            
                    <input type="file" name="import_file" />
            
                    <button class="btn btn-success">Import File</button>
                    <a class="btn btn-info" href="{{ url('export-excel') }}">Export File</a>
                </form> 
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($wards as $key => $ward)
                    <tr>
                       <td>{{ $loop->index+1 + ( ($wards->links()->paginator->currentPage() - 1) * 10 ) }}</td>
                       <td>{{ $ward->name }}</td>
                       <td>{{ $ward->mahanagarpalika_id }}</td>
                       <td>{{ $ward->zone_id }}</td>
                       <td>
                           @can('mahanagarpalika-ward-edit')
                               <a class="btn btn-primary" href="javascript:void(0)" wire:click="edit({{ $ward->id }})">Edit</a>
                           @endcan
                           @can('mahanagarpalika-ward-delete')
                                <button class="btn btn-danger" wire:click="destroy({{ $ward->id }})">Delete</button>
                           @endcan
                       </td>
                    </tr>
                @endforeach
            </table>
            {{ $wards->links() }}
        </div>
    </div>
    @endif
</div>
