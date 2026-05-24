
<div class="card bg-danger p-5">
    <div class="card-title">
        <span class="text-white h4 fw-bolder">{{ $message }}</span>
    </div>
    <hr class="text-white">
    <div class="card-body">
        <h5 class="text-white fw-bold">Fields Missing:</h5>
        @foreach ($missing as $miss)
            <span class="ps-3 text-white fw-bold">{{ $miss }}</span> <br>
        @endforeach
    </div>
</div>