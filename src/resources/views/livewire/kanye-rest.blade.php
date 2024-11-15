<div class="container" wire:poll.60000ms="update">
    <h1>Kanye West Quotes</h1>
    @foreach($quotes as $quote)
        <div class="quote">
            <p class="quote-text">"{{$quote}}"</p>
        </div>
    @endforeach
    <div>
        <button wire:click="update">Нова цитата</button>
    </div>
</div>
