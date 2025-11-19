@extends('crud::layouts.app')

@section('title', 'All Items')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h4 class="mb-0 text-primary">
                    <i class="fas fa-list me-2"></i>All Items
                </h4>
                <a href="{{ route('crud.create') }}" class="btn btn-primary btn-custom">
                    <i class="fas fa-plus me-1"></i>Add New Item
                </a>
            </div>
            
            <div class="card-body">
                <!-- Search and Filter Section -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <form action="{{ route('crud.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search items..." 
                                       value="{{ request('search') }}">
                                <button class="btn btn-outline-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                @if(request('search'))
                                <a href="{{ route('crud.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times"></i>
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" onchange="window.location.href=this.value">
                            <option value="{{ route('crud.index') }}">All Status</option>
                            <option value="{{ route('crud.index', ['status' => 'active']) }}" 
                                {{ request('status') == 'active' ? 'selected' : '' }}>Active Only</option>
                            <option value="{{ route('crud.index', ['status' => 'inactive']) }}"
                                {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive Only</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Total: {{ $items->total() }} items</span>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th width="50">#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                            <tr>
                                <td>{{ $loop->iteration + ($items->currentPage() - 1) * $items->perPage() }}</td>
                                <td>
                                    @if($item->image)
                                    <img src="{{ asset('images/'.$item->image) }}" alt="{{ $item->title }}" 
                                         class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-image text-white"></i>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item->title }}</strong>
                                </td>
                                <td>
                                    <span class="text-muted">
                                        {{ Str::limit($item->description, 50) ?: 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    @if($item->price)
                                    <span class="badge bg-success">
                                        ${{ number_format($item->price, 2) }}
                                    </span>
                                    @else
                                    <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $item->status ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $item->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ $item->created_at->format('M d, Y') }}
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('crud.show', $item->id) }}" 
                                           class="btn btn-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('crud.edit', $item->id) }}" 
                                           class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('crud.destroy', $item->id) }}" method="POST" 
                                              class="d-inline" onsubmit="return confirm('Delete this item?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3"></i>
                                        <h4>No Items Found</h4>
                                        <p>Get started by creating your first item.</p>
                                        <a href="{{ route('crud.create') }}" class="btn btn-primary btn-custom">
                                            <i class="fas fa-plus me-1"></i>Create First Item
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($items->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }} entries
                    </div>
                    <div>
                        {{ $items->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats Cards -->
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $totalItems }}</h4>
                        <p class="mb-0">Total Items</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-cube fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $activeItems }}</h4>
                        <p class="mb-0">Active Items</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $inactiveItems }}</h4>
                        <p class="mb-0">Inactive Items</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-pause-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>${{ number_format($totalPrice, 2) }}</h4>
                        <p class="mb-0">Total Value</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-dollar-sign fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Auto-hide alerts after 5 seconds
setTimeout(function() {
    $('.alert').fadeOut('slow');
}, 5000);

// Quick status change
function changeStatus(itemId, status) {
    if(confirm('Change item status?')) {
        fetch(`/admin/items/${itemId}/status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({status: status})
        }).then(response => {
            location.reload();
        });
    }
}
</script>
@endpush