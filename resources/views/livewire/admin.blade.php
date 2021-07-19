<div>
    @if($createAdmin)
    <form wire:submit.prevent="store" action="#">
        <div class="row my-3">
            @foreach ($errors->all() as $error)
                <li class="invalid-feedback d-block">{{ $error }}</li>
            @endforeach
            <div class="col-lg-6">
                <h4 class="text-dark p-semibold f-20 d-inline-block">{{ empty($admin_id) ? 'Create' : 'Edit' }} Admin</h4>
            </div>
            <div class="col-lg-6 text-right">
                <a class="btn btn-success" href="javascript:void(0)" wire:click="$set('createAdmin', false)"> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role: </strong>
                    {!! Form::select('role', $roles, null, array('placeholder' => 'Role','class' => 'form-control','wire:model' => 'role', 'wire:change' => 'roleChanged()')) !!}
                </div>
            </div>
            @if($showCountry)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Country:</strong>
                    {!! Form::select('country', $countries, null, array('placeholder' => 'Country','class' => 'form-control', 'wire:model' => 'country', 'wire:change' => 'changedCountry()')) !!}
                </div>
            </div>
            @endif
            @if($showState)
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>State:</strong>
                        {!! Form::select('state', $states, null, array('placeholder' => 'State','class' => 'form-control', 'wire:model' => 'state', 'wire:change' => 'changedState()')) !!}
                    </div>
                </div>
            @endif
            @if($showDistrict)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>District:</strong>
                    {!! Form::select('district', $districts, null, array('placeholder' => 'District','class' => 'form-control', 'wire:model' => 'district', 'wire:change' => 'changedDistrict()')) !!}
                </div>
            </div>
            @endif
            @if($showTaluka)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Taluka:</strong>
                    {!! Form::select('taluka', $talukas, null, array('placeholder' => 'Taluka','class' => 'form-control', 'wire:model' => 'taluka', 'wire:change' => 'changedTaluka()')) !!}
                </div>
            </div>
            @endif
            @if($showCity)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City:</strong>
                    {!! Form::select('city', $cities, null, array('placeholder' => 'City','class' => 'form-control', 'wire:model' => 'city', 'wire:change' => 'changedCity()')) !!}
                </div>
            </div>
            @endif
            @if($showNagarparishad)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nagarparishad:</strong>
                    {!! Form::select('nagarparishad', $nagarparishads, null, array('placeholder' => 'Nagarparishad','class' => 'form-control', 'wire:model' => 'nagarparishad', 'wire:change' => 'changedNagarparishad()')) !!}
                </div>
            </div>
            @endif
            @if($showNagarparishadWardNumber)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nagarparishad Ward Number:</strong>
                    {!! Form::select('nagarparishadWardNumber', $nagarparishadWardNumbers, null, array('placeholder' => 'Nagarparishad Ward Number','class' => 'form-control', 'wire:model' => 'nagarparishadWardNumber', 'wire:change' => 'changedNagarparishadWardNumber()')) !!}
                </div>
            </div>
            @endif
            @if($showMahanagarpalika)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mahanagarpalika:</strong>
                    {!! Form::select('mahanagarpalika', $mahanagarpalikas, null, array('placeholder' => 'Mahanagarpalika','class' => 'form-control', 'wire:model' => 'mahanagarpalika', 'wire:change' => 'changedMahanagarpalika()')) !!}
                </div>
            </div>
            @endif
            @if($showZone)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Zone:</strong>
                    {!! Form::select('zone', $zones, null, array('placeholder' => 'Zone','class' => 'form-control', 'wire:model' => 'zone', 'wire:change' => 'changedZone()')) !!}
                </div>
            </div>
            @endif
            @if($showMahanagarpalikaWardNumber)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mahanagarpalika Ward Number:</strong>
                    {!! Form::select('mahanagarpalikaWardNumber', $mahanagarpalikaWardNumbers, null, array('placeholder' => 'Mahanagarpalika Ward Number','class' => 'form-control', 'wire:model' => 'mahanagarpalikaWardNumber', 'wire:change' => 'changedMahanagarpalikaWardNumber()')) !!}
                </div>
            </div>
            @endif
            @if($showVillage)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Village:</strong>
                    {!! Form::select('village', $villages, null, array('placeholder' => 'Village','class' => 'form-control', 'wire:model' => 'village')) !!}
                </div>
            </div>
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'wire:model' => 'name')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control', 'wire:model' => 'email')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    {!! Form::text('phone', null, array('placeholder' => 'Phone No.','class' => 'form-control', 'wire:model' => 'phone')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::text('password', null, array('placeholder' => 'Password','class' => 'form-control', 'wire:model' => 'password')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    @else
        <div class="row my-3">
            <div class="col-lg-6">
                <h4 class="text-dark p-semibold f-20 d-inline-block">Admin List</h4>
            </div>
            @can('admin-create')
            <div class="col-lg-6 text-right">
                <a class="btn btn-success" href="javascript:void(0)" wire:click="$set('createAdmin', true)"> Create New Admin</a>
            </div>
            @endcan
        </div>
        <div class="row">
            <div class="col-lg-12 text-right">
                <input class="" placeholder="search..." name="search" wire:model="search">
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Area</th>
                            <th>Name</th>
                            <th>Mobile Number </th>
                            <th>Role</th>
                            <th>Status</th>
                            @can('admin-edit')
                            <th>Actions</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{!! $loop->index+1 !!}</td>
                            <td>{!! $user->hasRole('Admin') ? 'All' : (empty($user->areable_id) ? 'Not Assigned' : $user->areable->name) !!}</td>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->phone !!}</td>
                            <td>{!! $user->roles->pluck('name') !!}</td>
                            <td>
                                @if($user->active == 1)
                                <span class="badge badge-pill badge-primary">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger">In-Active</span>
                                @endif
                            </td>
                            @can('admin-edit')
                            <td> 
                                <a class="ml-2 ceo" href="javascript:void(0)" wire:click="edit({{ $user->id }})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <!--  <a class="ml-2" href="#" data-toggle="tooltip" data-original-title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <a class="ml-2" href="#" data-toggle="tooltip" data-original-title="Settings">
                                    <i class="fas fa-cog"></i>
                                </a> -->
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    
                </table>
            </div>
        </div>
    @endif
</div>
