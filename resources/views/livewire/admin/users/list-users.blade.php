<div>
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Users </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active">Dashbord</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->



          <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                       <div class=" d-flex flex-row-reverse">
                        <button class="btn btn-primary" wire:click.prevent='addnew'><i class="fa fa-plus-circle mr-2"></i> Add New User</button>
                       </div>
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="#" wire:click.prevent="edit({{ $user }})">
                                                <i class="fa fa-edit mr-3"></i>
                                            </a>
                                            <a href="#" class="fa fa-trash text-danger" wire:click.prevent="deleteUser({{ $user->id }})"></a>
                                        </td>
                                    </tr>      
                                @empty
                                    <tr>
                                        <td><h2>theres No users</h2></td>
                                    </tr>
                                @endforelse
                              
                      
                            </tbody>
                          </table>
                    
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        {{ $users->links() }}
                    </div>
                  </div>
      
                
           
                <!-- /.col-md-6 -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          </div>





          <!-- Model New User -->

  
                <!-- Modal -->
                <div class="modal fade" id="form" tabindex="-1" role="dialog" wire:ignore.self aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form wire:submit.prevent='{{ $editForm ? 'updateUser' : "createChange" }}'>
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    {{ $editForm ? 'Edit User' : "Add New User" }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                
                                        <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" placeholder="Enter A Full Name">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>                                                
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>                                                
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>                                                
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                        <label for="confirmPassword">Confirm Password </label>
                                        <input type="password" wire:model.defer="state.password_confirmation" class="form-control " id="confirmPassword" placeholder="Password Confirm">
                                    
                                        </div>
                                 
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary "><i class="fa fa-save mr-1"></i> 
                                    {{ $editForm ? 'Save Changes' : "Save" }}
 
                                </button>
                                </div>
                            </div>
                         </form>
                    </div>
                </div>

                <!-- Deleted Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" wire:ignore.self aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1>Delete Confirm</h1>
                                </div>
                                <div class="modal-body">
                                    <p>Are You Sure ? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary " data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                                    <button type="button" wire:click.prevent="confirmDelete" class="btn btn-danger "><i class="fa fa-trash mr-1"></i> 
                                        Delete
                                    </button>
                                </div>
                            </div>
                    
                    </div>
                </div>


</div>
