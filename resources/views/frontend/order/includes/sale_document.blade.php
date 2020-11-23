@foreach ($saleDocuments as $document)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sale_document_id" id="{{ $document->name }}" value="{{ $document->id }}" @if ($document->name == 'none') checked @endif @if (old('sale_document_id') == $document->id) checked @endif>
                                <label class="form-check-label" for="{{ $document->name }}">{{ $document->description }}</label>
                            </div>
@endforeach
