import type { Action } from "svelte/action";
import { debounce as d } from "ts-debounce";

interface Config {
    delay?: number;
    onUpdate: (target: EventTarget | null) => void;
}

export const debounce: Action<HTMLInputElement, Config> = (input, conf) => {
    $effect(() => {
        const { onUpdate, delay = 500 } = conf;
        const handler = d(() => {
            onUpdate(input);
        }, delay);

        const isText = ['text', 'number', 'password', 'email', 'search'].includes(input.type);
        const eventType = isText ? 'input' : 'change';

        input.addEventListener(eventType, () => handler());

        return () => {
            input.removeEventListener(eventType, () => handler());
        }
    });
}
