import type { Action } from "svelte/action";
import { debounce } from "ts-debounce";

interface DebounceOptions {
    callback: (ev: Event) => void;
    delay?: number;
}

export const debounceInput: Action<HTMLInputElement, DebounceOptions> = (el, opts) => {
    $effect(() => {
        const { callback, delay = 500 } = opts;
        const handleInput = debounce(callback, delay);
        el.addEventListener('input', handleInput)

        return () => {
            el.removeEventListener('input', handleInput);
        }
    });
}
