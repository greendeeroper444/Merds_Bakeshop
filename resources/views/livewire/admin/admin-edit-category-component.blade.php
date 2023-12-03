{{-- <!-- Button trigger modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="updateCategory">
            <div class="mb-3">
              <label for="category-name" class="col-form-label">Category name:</label>
              <input type="text" class="form-control" id="category-name" wire:model="name" wire:keyup="generateSlug" />
            </div>
            <div class="mb-3">
              <label for="slug" class="col-form-label">Slug:</label>
              <input class="form-control" id="slug" wire:model="slug" />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="save-modal">Save</button>
        </div>
      </div>
    </div>
  </div> --}}
