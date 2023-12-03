@section('title', 'All Categories')

<main class="main-container">
    <h1><strong>All Category Lists</strong></h1>
    <div class="container-add">
        <button class="add-new" type="button" data-bs-toggle="modal" data-bs-target="#categoryModal" data-bs-whatever="@mdo"><span class="fa-regular fa-circle-plus"></span> Add New</button>
    </div>
    @include('livewire.admin.admin-add-category-component')
    {{-- @if(Session::has('success_message'))
        <div class="alert alert-success-merds">
            Success | {{ Session::get('success_message') }}
        </div>
    @endif --}}
    <div class="table-container">
        @if(Session::has('success_message'))
            <div id="toast-container" class="toast-container" wire:poll.1000ms="refreshComponent">
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">
                        {{ Session::get('success_message') }}
                        <button class="close-button" onclick="closeToast()">&times;</button>
                    </div>
                </div>
            </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($categories as $category)
            <tbody>
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <button class="edit-edit" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <span class="fa-regular fa-pen-to-square"></span> Edit
                        </button>
                        {{-- @livewire('admin.admin-edit-category-component') --}}
                        <a href="#" class="delete-delete" wire:click.prevent="deleteCategory({{ $category->id }})">
                            <span class="fa-regular fa-circle-xmark"></span> Delete
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</main>

@section('script')
<script>
    Livewire.on('categoryAdded', () => {
        $('#categoryModal').modal('hide');
    });

    Livewire.on('close-modal', () => {
        $('#categoryModal').modal('hide');
    });

    Livewire.on('reset-modal', () => {
        $('#categoryModal form')[0].reset();
    });
</script>
@endsection

{{-- @section('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#categoryModal').modal('hide');
    })
</script>
@endsection --}}


{{-- @section('script')
<script>
    Livewire.on('categoryAdded', () => {
        $('#categoryModal').modal('hide');
    });
</script>
@endsection --}}
