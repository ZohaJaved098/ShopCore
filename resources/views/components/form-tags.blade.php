@props(['tags' => [], 'value' => ''])

<div class="flex flex-col w-full items-start gap-4 ">
    <p>Choose existing tags or type your own.</p>
    @if (!empty($tags))
        <div class="flex flex-wrap gap-2 ">
            @foreach ($tags as $tag)
                <button type="button" onclick="addTag('{{ strtolower($tag->name) }}')"
                    class="px-3 py-1 rounded-md border border-emerald-500 hover:bg-emerald-700 transition cursor-pointer">
                    {{ strtolower($tag->name) }}
                </button>
            @endforeach
        </div>
    @endif

    <input value="{{ old('tags', $value) }}" type="text" name="tags" id="tagsInput" placeholder="laravel, react, css"
        class="w-full placeholder:text-emerald-300 focus:outline-emerald-900 border-2 border-emerald-400 p-2 rounded-md" />
    <div id="selectedTags" class="flex flex-wrap gap-2"></div>
</div>
{{-- tags management --}}
<script>
    const tagsInput = document.getElementById('tagsInput');
    const selectedTags = document.getElementById('selectedTags');

    function normalizeTags(value) {
        return value
            .split(',')
            .map(tag => tag.trim().toLowerCase())
            .filter(tag => tag !== '');
    };

    function renderTags() {
        const tags = normalizeTags(tagsInput.value);
        selectedTags.innerHTML = '';

        tags.forEach(tag => {
            const div = document.createElement('button');
            div.type = 'button';
            div.className =
                'px-3 py-1 rounded-md bg-emerald-700 text-white text-sm hover:bg-red-600 transition';
            div.innerText = tag + ' ✕';

            div.addEventListener('click', () => {
                const updatedTags = tags.filter(t => t !== tag);
                tagsInput.value = updatedTags.join(', ');
                if (updatedTags.length > 0) {
                    tagsInput.value += ', ';
                }
                renderTags();
            });
            selectedTags.appendChild(div);
        });
    }

    function addTag(tagName) {
        tagName = tagName.toLowerCase();
        let tags = normalizeTags(tagsInput.value);
        // prevent duplicates
        if (tags.includes(tagName)) {
            alert('Tag already exists in input');
            return;
        }
        tags.push(tagName);
        tagsInput.value = tags.join(', ') + ', ';
        renderTags();
        tagsInput.focus();
    }
    tagsInput.addEventListener('input', renderTags);
    renderTags();

</script>