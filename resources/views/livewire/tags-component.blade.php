<div
    class="w-full border px-4 py-2 bg-white"
    wire:ignore
    x-data
    x-init="
        new Taggle($el, {
            tags: {{ $tags }},
            onTagAdd: function (e, tag) {
                Livewire.emit('tagAdded', tag);
            },
            onTagRemove: function (e, tag) {
                Livewire.emit('tagRemoved', tag);
            }
        });

        Livewire.on('tagAddedFromBackend', tag => {
            console.log('[Backend Event] You just added \'' + tag + '\'');
        });

        Livewire.on('tagRemovedFromBackend', tag => {
            console.log('[Backend Event] You just removed \'' + tag + '\'');
        });
    "
></div>
