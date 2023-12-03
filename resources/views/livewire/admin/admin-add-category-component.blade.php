<!-- Button trigger modal -->
<div wire:ignore.self class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="addCategory" wire:loading.remove>
          <div class="modal-body">
            <div class="mb-3">
              <label>Category name:</label>
              <input type="text" class="form-control" required wire:model="name" wire:keyup="generateSlug" />
              @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label>Slug:</label>
              <input class="form-control" required wire:model="slug" />
              @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="save-modal" wire:target="addCategory" wire:click="$emit('category-saved')">Save</button>{{-- wire:loading.attr="disabled" --}}
          </div>
        </form>
        <div wire:loading wire:target="addCategory" class="modal-body">
          Saving...
        </div>
      </div>
    </div>
</div>
