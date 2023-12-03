<main class="main-container">
    <h1><strong>All Product Lists</strong></h1>
    <div class="container-add">
        <button class="add-new" type="button"  data-bs-toggle="modal" data-bs-target="#productModal" data-bs-whatever="@mdo"><span class="fa-regular fa-circle-plus"></span> Add New</button>
    </div>
    @include('livewire.admin.admin-add-product-component')
    @if(Session::has('success_message'))
        <div class="alert alert-success-merds">
            Success | {{ Session::get('success_message') }}
        </div>
    @endif
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($products as $product)
            <tbody>
                <tr>
                    <td><img src="{{ asset('assets/img/stocks') }}/{{ $product->image }}" alt="{{ $product->name }}"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->regular_price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a href="#" class="edit-edit"><span class="fa-regular fa-pen-to-square"></span> Edit</a>
                        <a href="#" class="delete-delete" wire:click.prevent="deleteProduct({{ $product->id }})">
                            <span class="fa-regular fa-circle-xmark"></span> Delete
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <script>
        function showPreview(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function cancelPreview() {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = "";
        }
    </script>
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
