@extends('crud::layouts.app')

@section('title', $item->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-primary">
                        <i class="fas fa-eye me-2"></i>Item Details
                    </h4>
                    <span class="badge {{ $item->status ? 'bg-success' : 'bg-secondary' }} status-badge">
                        {{ $item->status ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @if($item->image)
                    <div class="col-md-4 mb-4">
                        <div class="text-center">
                            <img src="{{ asset('images/'.$item->image) }}" alt="{{ $item->title }}" 
                                 class="img-fluid rounded" style="max-height: 250px;">
                        </div>
                    </div>
                    @endif
                    
                    <div class="{{ $item->image ? 'col-md-8' : 'col-12' }}">
                        <h3 class="text-dark mb-3">{{ $item->title }}</h3>
                        
                        @if($item->price)
                        <div class="mb-3">
                            <h5 class="text-primary">
                                <i class="fas fa-tag me-2"></i>
                                ${{ number_format($item->price, 2) }}
                            </h5>
                        </div>
                        @endif
                        
                        @if($item->description)
                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Description:</h6>
                            <p class="text-dark">{{ $item->description }}</p>
                        </div>
                        @endif
                        
                        <div class="row text-muted small">
                            <div class="col-md-6">
                                <p><strong>Created:</strong> {{ $item->created_at->format('M d, Y h:i A') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Updated:</strong> {{ $item->updated_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="d-flex gap-2">
                    <a href="{{ route('crud.edit', $item->id) }}" class="btn btn-warning btn-custom">
                        <i class="fas fa-edit me-1"></i>Edit
                    </a>
                    <form action="{{ route('crud.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-custom" 
                                onclick="return confirm('Are you sure you want to delete this item?')">
                            <i class="fas fa-trash me-1"></i>Delete
                        </button>
                    </form>
                    <a href="{{ route('crud.index') }}" class="btn btn-secondary btn-custom ms-auto">
                        <i class="fas fa-arrow-left me-1"></i>Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection