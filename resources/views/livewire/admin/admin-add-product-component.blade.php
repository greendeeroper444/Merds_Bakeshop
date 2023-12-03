<!-- Button trigger modal -->
<div wire:ignore.self class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Add New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form enctype="multipart/form-data" wire:submit.prevent="addProduct" wire:loading.remove>
        <div class="modal-body">
            <div class="form-grid">
                <div class="mb-3">
                    <label class="col-form-label">Product name:</label>
                    <input type="text" class="form-control" wire:model="name" wire:keyup="generateSlug" />
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Slug:</label>
                    <input class="form-control" wire:model="slug" />
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Regular Price:</label>
                    <input type="number" class="form-control" wire:model="regular_price" />
                </div>
                <div class="mb-3">
                    <label class="col-form-label">SKU:</label>
                    <input class="form-control" wire:model="SKU" />
                </div>
                <div class="form-group">
                    <label class="col-form-label">Stock</label>
                    <div class="mb-3">
                        <select class="form-control" wire:model="stock_status">
                            <option value="instock">InStock</option>
                            <option value="outofstock">Out of Stock</option>
                        </select>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label class="col-form-label">Featured</label>
                    <div class="mb-3">
                        <select class="form-control" wire:model="featured">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label class="col-form-label">Quantity</label>
                    <div class="mb-3">
                        <input type="number" placeholder="Quantity" class="form-control input-md" wire:model="quantity" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="col-form-label">Description:</label>
                    <textarea class="form-control" wire:model="description"></textarea>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Category</label>
                    <div class="mb-3">
                        <select class="form-control" wire:model="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label">Product Picture</label>
                <input class="form-control" name="img" type="file" id="formFile" onchange="showPreview(event)" required wire:model="image" />
                <div>
                @if($image)
                    <img id="imagePreview" class="m-auto d-block" style="width:100%; max-width:200px;" src="{{ $image->temporaryUrl()}}">
                    <button type="button" class="btn btn-secondary mt-2" onclick="cancelPreview()">Cancel</button>
                @endif
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="save-modal">Save</button>
        </div>
      </form>
      <div wire:loading wire:target="addProduct" class="modal-body">
        Saving...
      </div>
    </div>
  </div>
</div>
