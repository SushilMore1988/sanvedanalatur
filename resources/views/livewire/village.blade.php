<div>
    @if($isShowCreate)
    <div class="row my-3">
        <div class="col-lg-6">
            <h4 class="text-dark p-semibold f-20 d-inline-block">Village</h4>
        </div>
        @can('village-list')
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
                    <strong>Taluka:</strong>
                    {!! Form::select('taluka', $talukas, null, array('placeholder' => 'Taluka','class' => 'form-control', 'wire:model' => 'taluka')) !!}
                </div>
                @error('taluka')
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
            <h4 class="text-dark p-semibold f-20 d-inline-block">Villages List</h4>
        </div>
        @can('village-create')
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="javascript:void(0)" wire:click="$set('isShowCreate', true)"> Add New Village</a>
        </div>
        @endcan
    </div>
    <div class="row">
        <div class="col-lg-12 text-right">
            <input class="" placeholder="search..." name="search" wire:model="search">
        </div>
        <div class="col-lg-12">
            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($villages as $key => $village)
                    {{--@if($role->name != 'Admin')--}}
                    <tr>
                       <td>{{ $loop->index+1 + ( ($villages->links()->paginator->currentPage() - 1) * 10 ) }}</td>
                       <td>{{ $village->name }}</td>
                       <td>
                           @can('village-edit')
                               <a class="btn btn-primary" href="javascript:void(0)" wire:click="edit({{ $village->id }})">Edit</a>
                           @endcan
                           @can('village-delete')
                                <button class="btn btn-danger" wire:click="destroy({{ $village->id }})">Delete</button>
                           @endcan
                       </td>
                    </tr>
                    {{--@endif--}}
                @endforeach
            </table>
            {{ $villages->links() }}
            {{--{!! $identity->render() !!}--}}
        </div>
    </div>
    @endif
</div>
