import type { MenuItem } from "@/types/menu.js";

export const menuState = $state({
    isOpen: false,
    x: 0,
    y: 0,
    items: {} as MenuItem[],
    invoker: null as Element | null,
    open(event: Event, items: MenuItem[]) {
        const rect = (event.currentTarget as HTMLElement).getBoundingClientRect();
        this.items = items;
        this.x = rect.left;
        this.y = rect.bottom + window.scrollY
        this.isOpen = true;
    },
    close() {
        this.isOpen = false;
    }
});
