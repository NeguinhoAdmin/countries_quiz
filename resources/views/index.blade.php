@include('layout.header')
<body class="d-flex flex-column min-vh-100">
    <div class="container mt-5">
        <div class="mb-4 display-4"><i>Guess the</i> <span class="mb-4 display-1">Capital</span></div>
        <form action="{{ route('post.answer') }}" method="POST">
            @csrf
            <div class="mb-3">
                <p><strong>What is the capital of {{ $single_quiz['country'] }}?</strong></p>
                <input type="hidden" name="country" value="{{ $single_quiz['country'] }}">
                @foreach($single_quiz['capitals'] as $index => $capital)
                    <div class="form-check mb-3">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name="capital" 
                            id="capital{{ $index }}" 
                            value="{{ $capital }}"
                            required> 
                        <label class="form-check-label" for="capital{{ $index }}">
                            {{ $capital }}
                        </label>
                    </div>
                @endforeach
                
                @error('capital')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            @error('country')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-success">Check Answer</button>
        </form>
    </div>
@include('layout.footer')
