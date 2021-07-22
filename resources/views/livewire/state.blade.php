<div>
    @if($isShowCreate)
        <div class="row my-3">
            <div class="col-lg-6">
                <h4 class="text-dark p-semibold f-20 d-inline-block">State</h4>
            </div>
            @can('state-list')
            <div class="col-lg-6 text-right">
                <a class="btn btn-success" href="javascript:void(0)" wire:click="$set('isShowCreate', false)"> Back</a>
            </div>
            @endcan
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <strong>Country:</strong>
                        {!! Form::select('country', $countries, null, array('placeholder' => 'Country','class' => 'form-control', 'wire:model' => 'country')) !!}
                    </div>
                    @error('country')
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
                <h4 class="text-dark p-semibold f-20 d-inline-block">States List</h4>
            </div>
            @can('state-create')
            <div class="col-lg-6 text-right">
                <a class="btn btn-success" href="javascript:void(0)" wire:click="$set('isShowCreate', true)"> Add New State</a>
            </div>
            @endcan
        </div>
        <div class="row">
            <div class="col-lg-8">
                <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
                    {{ csrf_field() }}
                    {{-- <label>Select File for Upload</label> --}}
            
                    <input type="file" name="import_file" />
            
                    <button class="btn btn-success">Import File</button>
                    <a class="btn btn-info" href="{{ url('export-excel') }}">Export File</a>
                </form>
            </div>
            <div class="col-lg-4 text-right">
                <input class="" placeholder="search..." name="search" wire:model="search">
            </div>
            <div class="col-lg-12">
                <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                    <tr>
                        <th>No</th>
                        <th>Country</th>
                        <th>State</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($states as $key => $state)
                        <tr>
                        <td>{{ $loop->index+1 + ( ($states->links()->paginator->currentPage() - 1) * 10 ) }}</td>
                        <td>{{ $state->country->name }}</td>
                        <td>{{ $state->name }}</td>
                        <td>
                            @can('state-edit')
                                <a class="btn btn-primary" href="javascript:void(0)" wire:click="edit({{ $state->id }})">Edit</a>
                            @endcan
                            @can('state-delete')
                                    <button class="btn btn-danger" wire:click="destroy({{ $state->id }})">Delete</button>
                            @endcan
                        </td>
                        </tr>
                    @endforeach
                </table>
                {{ $states->links() }}
            </div>
        </div>
    @endif
</div>
