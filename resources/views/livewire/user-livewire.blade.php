<div>

    <div>
        @if (session()->has('error'))
            <div class="alert alert-danger text-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>


    <div class="text-center">
        {{--  <div wire:loading.delay>
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
    </div>
    {{-- Stop trying to control. --}}
    @if($showForm)
    <form action="" wire:submit.prevent="saveUser" autocomplete="false">
         <h2 class="text-center">Ajouter un utilisateur</h2>
    	<div class="row">

    		<div class="col-md-4 form-group">
    			<label for=""> Nom et Prénom</label>
    			<input wire:model="name" type="text" class="form-control" autofocus>
                @error('name')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
    		</div>


             <div class="col-md-3 form-group">
                <label for="">Numero de compte</label>
                <input type="text" wire:model="compteName" class="form-control" autocomplete="false">
               
                @error('compteName')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>

    		<div class="col-md-4 form-group">
    			<label for="">Nom d'utilisateur</label>
    			<input wire:model="username" type="text" class="form-control" autocomplete="false">
                @error('username')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
    		</div>
    		<div class="col-md-4 form-group">
    			<label for="">Email | Téléphone</label>
    			<input wire:model="email" type="text" class="form-control" autocomplete="false">
                @error('email')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
    		</div>

            <div class="col-md-3 form-group">
                <label for="">Rôle</label>
                <select wire:model="role" id="" class="form-control">
                    <option value="">Choisissez ici ...</option>
                    <option value="MEMBRE">MEMBRE</option>
                    <option value="UTILISATEUR">UTILISATEUR</option>
                    <option value="ADMINISTRATEUR">ADMINISTRATEUR</option>

                </select>
                @error('email')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>



    		<div class="col-md-2 form-group">
    			<label for="">Mot de pass </label>
    			<input wire:model="password" type="password" class="form-control" autocomplete="false">
                @error('password')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
    		</div>

    		<div class="col-md-2 form-group">
    			<label for="">Confirmer </label>
    			<input wire:model="password_confirmation" type="password" autocomplete="false" class="form-control">
    		</div>
            
    		<div class="col-md-4 d-flex form-group mt-3 justify-content-around">
    			
    			<input type="submit" value="Enregistrer" class="form-control btn btn-primary">

                <input wire:click="annuler" type="reset"  value="Annuler" class="form-control">
    		</div>
           
    	</div>
    	
    </form>

    @endif

    <div>
        <div class="d-flex justify-content-between">
            <h5>Liste des utilisateurs</h5>
            <button wire:click="$set('showForm', true)">
                <i class="fa fa-user-plus"></i>Ajouter un utilisateur</button>
        </div>
        
        <table class="table table-sm table-bordered">
            <thead class="badge-primary">
                <tr>
                    <th>Nom et prénom </th>
                    <th>Nom d'utilisateur</th>
                    <th>Email ou Téléphone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                   <tr>
                       <td>{{ $user->name }}</td>
                       <td>{{ $user->username }}</td>
                       <td>{{ $user->email }}</td>
                       <td> 
                        <button wire:click="modifier({{ $user->id }})" class="btn btn-info btn-sm">
                        <i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm">
                        <i class="fa fa-remove"></i></button>
                    </td>
                   </tr>
                @endforeach
            </tbody>
        </table>

       {{  $users->links() }}
    </div>
    	
</div>
