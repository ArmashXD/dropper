@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success">Upload Your Files And Generate Link</h2>
    <div class="row" style="clear: both;margin-top: 18px;">
        <div class="col-12">
          <div class="dropzone" id="file-dropzone"></div>
        </div>
    </div>
    
    <div class="container">
        <h4 class="text-center fw-bolder mt-2">
            Links will be shown here
        </h4>
        <div class="content p-4">
            <jumbotron name="" class="form-control" >
                <ul id="link-select">
               
                </ul>
            </jumbotron>
        </div>
    </div>
</div>
@push('custom-scripts')
<script>
    let arr = [];

    Dropzone.options.fileDropzone = {
    url: '{{ route('file.store') }}',
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    maxFilesize: 8,
    headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    removedfile: function(file)
    {
        var name = file.upload.filename;
        $.ajax({
        type: 'POST',
        url: '{{ route('file.remove') }}',
        data: { "_token": "{{ csrf_token() }}", name: name},
        success: function (data){
            arr.splice(0,arr.length)
        },
        error: function(e) {
            console.log(e);
        }});
        var fileRef;
        return (fileRef = file.previewElement) != null ?
        fileRef.parentNode.removeChild(file.previewElement) : void 0;
    },
    success: function (file, response) {
        arr.push(response.data.links);
        arr.forEach(element => {
            $('#link-select').append(
                `<li><a href="{{url('')}}/${element.name}" target="_blank"> ${window.location.href}${element.name}</a></li>`
            )
        });
        toastr["success"](`${response.message}`)
    },
    }
</script>
@endpush

@endsection