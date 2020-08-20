<button
    title="Start searching"
    type="button"
    class="flex md:hidden bg-gray-100 hover:bg-blue-100 justify-center items-center border border-gray-200 rounded-full focus:outline-none h-10 px-3"
    onclick="searchInput.toggle()"
>
    <img src="/assets/img/magnifying-glass.svg" alt="search icon" class="h-4 w-4 max-w-none">
</button>

<div id="js-search-input" class="docsearch-input__wrapper hidden md:block">
    <label for="search" class="hidden">Search</label>

    <input
        id="docsearch-input"
        class="docsearch-input relative block h-10 transition-fast w-full bg-gray-200 outline-none rounded-full text-gray-700 border border-transparent focus:border-blue-300 focus:bg-gray-100 ml-auto px-4 pb-0 placeholder-gray-500"
        name="docsearch"
        type="text"
        placeholder='Search the docs (Press "/" to focus)'
    >

    <button
        class="md:hidden absolute pin-t pin-r h-full font-light text-3xl text-blue-500 hover:text-blue-600 focus:outline-none -mt-px pr-7"
        onclick="searchInput.toggle()"
    >&times;</button>
</div>

@push('scripts')
    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <script type="text/javascript">
            docsearch({
                apiKey: '{{ $page->docsearchApiKey }}',
                indexName: '{{ $page->docsearchIndexName }}',
                inputSelector: '#docsearch-input',
                debug: false // Set debug to true if you want to inspect the dropdown
            });

            const searchInput = {
                toggle() {
                    const menu = document.getElementById('js-search-input');
                    menu.classList.toggle('hidden');
                    menu.classList.toggle('md:block');
                    document.getElementById('docsearch-input').focus();
                },
            }
        </script>
    @endif
@endpush
